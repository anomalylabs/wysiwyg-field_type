<?php namespace Anomaly\WysiwygFieldType\Support\Config;

use Anomaly\CheckboxesFieldType\CheckboxesFieldType;

/**
 * Class PluginsHandler
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PluginsHandler
{

    /**
     * Handle the options.
     *
     * @param CheckboxesFieldType $fieldType
     */
    public function handle(CheckboxesFieldType $fieldType)
    {
        $keys = array_keys(config('anomaly.field_type.wysiwyg::redactor.plugins'));

        $values = array_map(
            function ($value) {
                return trans('anomaly.field_type.wysiwyg::redactor.plugin.' . $value);
            },
            $keys
        );

        $fieldType->setOptions(array_combine($keys, $values));
    }
}
