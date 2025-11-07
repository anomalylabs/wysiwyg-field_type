<?php

namespace Anomaly\WysiwygFieldType\Validation;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\WysiwygFieldType\WysiwygFieldType;
use DOMDocument;
use DOMXPath;

class IframeValidator
{
    protected SettingRepositoryInterface $settings;

    public function __construct(SettingRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function handle(WysiwygFieldType $fieldType, $attribute, $value)
    {
        // If sanitization is disabled, always pass validation
        if (!$this->settings->value('anomaly.field_type.wysiwyg::sanitize_input')) {
            return true;
        }

        // If value is empty, it's valid (no iframes to check)
        if (empty($value)) {
            return true;
        }

        // Get allowed iframe domains
        $allowedDomains = array_merge([
            'https://www.youtube.com',
            'https://www.youtube-nocookie.com',
            'https://player.vimeo.com',
            '//www.youtube.com',
            '//www.youtube-nocookie.com',
            '//player.vimeo.com',
        ], $this->settings->value('anomaly.field_type.wysiwyg::accepted_iframe_domains') ?? []);

        // Extract iframes from HTML
        $iframes = $this->extractIframes($value);

        // If no iframes found, validation passes
        if (empty($iframes)) {
            return true;
        }

        // Check each iframe src against allowed domains
        foreach ($iframes as $iframe) {
            if (!$this->isAllowedDomain($iframe, $allowedDomains)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Extract iframe src URLs from HTML content
     *
     * @param string $html
     * @return array
     */
    protected function extractIframes($html)
    {
        $iframes = [];

        // Use DOMDocument to parse HTML
        $dom = new DOMDocument();
        // Suppress errors for malformed HTML
        @$dom->loadHTML('<?xml encoding="UTF-8">' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $xpath = new DOMXPath($dom);
        $iframeNodes = $xpath->query('//iframe[@src]');

        foreach ($iframeNodes as $node) {
            $src = $node->getAttribute('src');
            if (!empty($src)) {
                $iframes[] = $src;
            }
        }

        return $iframes;
    }

    /**
     * Check if iframe src is from an allowed domain
     *
     * @param string $src
     * @param array $allowedDomains
     * @return bool
     */
    protected function isAllowedDomain($src, $allowedDomains)
    {
        // Normalize protocol-relative URLs by prepending https:
        $normalizedSrc = $this->normalizeUrl($src);

        $parsed = parse_url($normalizedSrc);

        if (!isset($parsed['scheme']) || !isset($parsed['host'])) {
            return false;
        }

        $srcBase = $parsed['scheme'] . '://' . $parsed['host'];

        foreach ($allowedDomains as $allowedDomain) {
            // Normalize allowed domain URL
            $normalizedAllowed = $this->normalizeUrl($allowedDomain);
            $allowedParsed = parse_url($normalizedAllowed);

            if (!isset($allowedParsed['scheme']) || !isset($allowedParsed['host'])) {
                continue;
            }

            $allowedBase = $allowedParsed['scheme'] . '://' . $allowedParsed['host'];

            if ($srcBase === $allowedBase) {
                return true;
            }
        }

        return false;
    }

    /**
     * Normalize URL by converting protocol-relative URLs to https
     *
     * @param string $url
     * @return string
     */
    protected function normalizeUrl($url)
    {
        if (strpos($url, '//') === 0) {
            return 'https:' . $url;
        }

        return $url;
    }
}