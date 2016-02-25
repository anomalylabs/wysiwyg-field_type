<?php

return [
    'buttons'        => [
        'formatting',
        'bold',
        'italic',
        'deleted',
        'lists',
        'link',
        'horizontalrule',
        'underline'
    ],
    'plugins'        => [
        'table',
        'video',
        'filemanager',
        'imagemanager',
        'fullscreen'
    ],
    'paths'          => [
        'table'        => 'anomaly.field_type.wysiwyg::js/plugins/table.js',
        'video'        => 'anomaly.field_type.wysiwyg::js/plugins/video.js',
        'filemanager'  => 'anomaly.field_type.wysiwyg::js/plugins/filemanager.js',
        'imagemanager' => 'anomaly.field_type.wysiwyg::js/plugins/imagemanager.js',
        'fullscreen'   => 'anomaly.field_type.wysiwyg::js/plugins/fullscreen.js'
    ],
    'configurations' => [
        'default' => [
            'buttons' => [
                'formatting',
                'bold',
                'italic',
                'deleted',
                'lists',
                'link',
                'horizontalrule',
                'underline'
            ],
            'plugins' => [
                'table',
                'video',
                'fontsize',
                'filemanager',
                'imagemanager',
                'fullscreen'
            ]
        ],
        'basic'   => [
            'buttons' => [
                'bold',
                'italic',
                'lists',
                'link',
                'underline'
            ],
            'plugins' => [
                'fullscreen'
            ]
        ]
    ]
];
