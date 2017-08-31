<?php

use Anomaly\WysiwygFieldType\Support\Config\ButtonsOptions;
use Anomaly\WysiwygFieldType\Support\Config\PluginsOptions;

return [
    'buttons'     => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'handler' => ButtonsOptions::class,
        ],
    ],
    'plugins'     => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'handler' => PluginsOptions::class,
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
