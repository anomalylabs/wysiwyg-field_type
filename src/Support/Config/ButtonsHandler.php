<?php namespace Anomaly\WysiwygFieldType\Support\Config;

use Anomaly\CheckboxesFieldType\CheckboxesFieldType;

/**
 * Class ButtonsHandler
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ButtonsHandler
{

    /**
     * Handle the options.
     *
     * @param CheckboxesFieldType $fieldType
     */
    public function handle(CheckboxesFieldType $fieldType)
    {
        $keys = array_keys(config('anomaly.field_type.wysiwyg::redactor.buttons'));

        $values = array_map(
            function ($value) {
                return trans('anomaly.field_type.wysiwyg::redactor.button.' . $value);
            },
            $keys
        );

        $fieldType->setOptions(array_combine($keys, $values));
    }
}
