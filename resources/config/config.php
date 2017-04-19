<?php

return [
    'buttons'     => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'options' => function (\Illuminate\Contracts\Config\Repository $config) {

                $keys = array_keys($config->get('anomaly.field_type.wysiwyg::redactor.buttons'));

                $values = array_map(
                    function ($value) {
                        return trans('anomaly.field_type.wysiwyg::redactor.button.' . $value);
                    },
                    $keys
                );

                return array_combine($keys, $values);
            },
        ],
    ],
    'plugins'     => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'options' => function (\Illuminate\Contracts\Config\Repository $config) {

                $keys = array_keys($config->get('anomaly.field_type.wysiwyg::redactor.plugins'));

                $values = array_map(
                    function ($value) {
                        return trans('anomaly.field_type.wysiwyg::redactor.plugin.' . $value);
                    },
                    $keys
                );

                return array_combine($keys, $values);
            },
        ],
    ],
    'height'      => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'step' => 25,
            'min'  => 75,
        ],
    ],
    'line_breaks' => [
        'type' => 'anomaly.field_type.boolean',
    ],
];
