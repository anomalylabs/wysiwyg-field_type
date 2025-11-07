<?php

namespace Anomaly\WysiwygFieldType;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Anomaly\Streams\Platform\Support\Purifier;

class WysiwygFieldTypeModifier extends FieldTypeModifier
{
    protected SettingRepositoryInterface $settings;

    /**
     * Create a new WysiwygFieldTypeModifier instance.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(SettingRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Modify the value for storage.
     *
     * @param $value
     * @return string
     */
    public function modify($value)
    {
        if($this->settings->value('anomaly.field_type.wysiwyg::sanitize_input')) {
            $value = $this->purify($value);
        }

        return parent::modify($value);
    }

    protected function purify($value)
    {
        $config = \HTMLPurifier_Config::createDefault();

        $configItems = config('anomaly.field_type.wysiwyg::purifier');

        // If Safe Iframe is enabled but no regex is set, build one from allowed domains
        if($configItems['HTML.SafeIframe'] && !isset($configItems['URI.SafeIframeRegexp'])) {
            $customDomains = $this->settings->value('anomaly.field_type.wysiwyg::accepted_iframe_domains') ?? [];

            $allowedIframeUrls = [
                'https://www.youtube.com',
                'https://www.youtube-nocookie.com',
                'https://player.vimeo.com',
                '//www.youtube.com',
                '//www.youtube-nocookie.com',
                '//player.vimeo.com',
            ];

            if(is_array($customDomains)) {
                $allowedIframeUrls = array_merge($allowedIframeUrls, $customDomains);
            }

            $regexParts = [];

            foreach ($allowedIframeUrls as $url) {
                // Handle protocol-relative URLs (starting with //)
                if (strpos($url, '//') === 0) {
                    $parsed = parse_url('https:' . $url);
                    if (isset($parsed['host'])) {
                        $host = preg_quote($parsed['host'], '%');
                        $regexParts[] = "^//{$host}(/.*)?$";
                    }
                    continue;
                }

                $parsed = parse_url($url);

                // Only add to regex if we have valid scheme and host
                if (isset($parsed['scheme']) && isset($parsed['host'])) {
                    $scheme = preg_quote($parsed['scheme'], '%');
                    $host = preg_quote($parsed['host'], '%');
                    $regexParts[] = "^{$scheme}://{$host}(/.*)?$";
                }
            }

            // Only set regex if we have valid parts
            if (!empty($regexParts)) {
                $configItems['URI.SafeIframeRegexp'] = '%' . implode('|', $regexParts) . '%';
            }
        }

        foreach ($configItems as $key => $item) {
            $config->set($key, $item);
        }

        return (new \HTMLPurifier($config))->purify($value);
    }
}