<?php

return [
    'configuration' => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options' => function (\Illuminate\Config\Repository $config) {

                $keys = $values = array_keys($config->get('anomaly.field_type.wysiwyg::redactor.configuration'));

                return array_combine($keys, $values);
            }
        ]
    ],
    'height'        => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'step' => 50,
            'min'  => 200
        ]
    ],
    'line_breaks'   => [
        'type' => 'anomaly.field_type.boolean'
    ]
];
