<?php

return [
    'sanitize_input' => [
        'type' => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => true
        ]
    ],
    'accepted_iframe_domains' => [
        'type' => 'anomaly.field_type.tags',
        'config' => [
            'filter' => 'FILTER_VALIDATE_URL',
        ]
    ],
];