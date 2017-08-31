<?php namespace Anomaly\WysiwygFieldType\Support\Config;

use Anomaly\CheckboxesFieldType\CheckboxesFieldType;
use Illuminate\Contracts\Config\Repository;

class PluginsOptions
{

    /**
     * Handle the select options.
     *
     * @param      CheckboxesFieldType        $fieldType  The field type
     * @param      StreamRepositoryInterface  $streams    The streams
     */
    public function handle(
        CheckboxesFieldType $fieldType,
        Repository $config
    )
    {
        $keys = array_keys($config->get('anomaly.field_type.wysiwyg::redactor.plugins'));

        $fieldType->setOptions(array_combine(
            $keys,
            array_map(function ($value) {
                return trans('anomaly.field_type.wysiwyg::redactor.plugin.' . $value);
            }, $keys)
        ));
    }
}
