<?php

return [
    'configuration' => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options' => function (\Illuminate\Config\Repository $config) {

                $configurations = array_keys($config->get('anomaly.field_type.wysiwyg::redactor'));

                return array_combine(
                    $configurations,
                    array_map(
                        function ($configuration) {
                            return 'anomaly.field_type.wysiwyg::redactor.' . $configuration;
                        },
                        $configurations
                    )
                );
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
