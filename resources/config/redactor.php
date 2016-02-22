<?php

return [
    'buttons'        => [
        'html',
        'formatting',
        'bold',
        'italic',
        'deleted',
        'unorderedlist',
        'orderedlist',
        'outdent',
        'indent',
        'link',
        'alignment',
        'horizontalrule',
        'underline'
    ],
    'plugins'        => [
        'table',
        'video',
        'fontsize',
        'filemanager',
        'imagemanager',
        'fullscreen'
    ],
    'paths'          => [
        'table'        => 'anomaly.field_type.wysiwyg::js/plugins/table.js',
        'video'        => 'anomaly.field_type.wysiwyg::js/plugins/video.js',
        'fontsize'     => 'anomaly.field_type.wysiwyg::js/plugins/fontsize.js',
        'filemanager'  => 'anomaly.field_type.wysiwyg::js/plugins/filemanager.js',
        'imagemanager' => 'anomaly.field_type.wysiwyg::js/plugins/imagemanager.js',
        'fullscreen'   => 'anomaly.field_type.wysiwyg::js/plugins/fullscreen.js'
    ],
    'configurations' => [
        'default' => [
            'buttons' => [
                'html',
                'formatting',
                'bold',
                'italic',
                'deleted',
                'unorderedlist',
                'orderedlist',
                'outdent',
                'indent',
                'link',
                'alignment',
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
                'unorderedlist',
                'orderedlist',
                'link',
                'underline'
            ],
            'plugins' => [
                'fullscreen'
            ]
        ]
    ]
];
