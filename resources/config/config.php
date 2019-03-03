<?php

return [
    'buttons'     => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'handler' => \Anomaly\WysiwygFieldType\Support\Config\ButtonsHandler::class,
        ],
    ],
    'plugins'     => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'handler' => \Anomaly\WysiwygFieldType\Support\Config\PluginsHandler::class,
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
