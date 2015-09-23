<?php

return [
    'buttons'     => [
        'type'   => 'anomaly.field_type.checkboxes',
        'rules'  => [
            'array'
        ],
        'config' => [
            'options' => function (\Illuminate\Config\Repository $config) {

                $keys = $config->get('anomaly.field_type.wysiwyg::buttons.available');

                $values = array_map(
                    function ($button) {
                        return trans('anomaly.field_type.wysiwyg::button.' . $button);
                    },
                    $keys
                );

                return array_combine($keys, $values);
            }
        ]
    ],
    'plugins'     => [
        'type'   => 'anomaly.field_type.checkboxes',
        'rules'  => [
            'array'
        ],
        'config' => [
            'options' => function (\Illuminate\Config\Repository $config) {

                $keys = $config->get('anomaly.field_type.wysiwyg::plugins.available');

                $values = array_map(
                    function ($button) {
                        return trans('anomaly.field_type.wysiwyg::plugin.' . $button);
                    },
                    $keys
                );

                return array_combine($keys, $values);
            }
        ]
    ],
    'disk'        => [
        'type'   => 'anomaly.field_type.relationship',
        'config' => [
            'related' => 'Anomaly\FilesModule\Disk\DiskModel'
        ]
    ],
    'height'      => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'step' => 50,
            'min'  => 200
        ]
    ],
    'line_breaks' => [
        'type' => 'anomaly.field_type.boolean'
    ]
];
