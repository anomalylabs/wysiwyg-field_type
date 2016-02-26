<?php

return [
    'buttons'        => [
        'format'         => [
            'icon' => 'fa fa-paragraph'
        ],
        'bold'           => [
            'icon' => 'fa fa-bold'
        ],
        'italic'         => [
            'icon' => 'fa fa-italic'
        ],
        'deleted'        => [
            'icon' => 'fa fa-strikethrough'
        ],
        'lists'          => [
            'icon' => 'fa fa-list'
        ],
        'link'           => [
            'icon' => 'fa fa-link'
        ],
        'horizontalrule' => [
            'icon' => 'fa fa-minus'
        ],
        'underline'      => [
            'icon' => 'fa fa-underline'
        ],

    ],
    'plugins'        => [
        'alignment'    => [
            'icon' => 'fa fa-align-left',
            'path' => 'anomaly.field_type.wysiwyg::js/plugins/alignment/alignment.js'
        ],
        'table'        => [
            'icon' => 'fa fa-table',
            'path' => 'anomaly.field_type.wysiwyg::js/plugins/table.js'
        ],
        'video'        => [
            'icon' => 'fa fa-video-camera',
            'path' => 'anomaly.field_type.wysiwyg::js/plugins/video.js'
        ],
        'filemanager'  => [
            'icon' => 'fa fa-paperclip',
            'path' => 'anomaly.field_type.wysiwyg::js/plugins/filemanager.js'
        ],
        'imagemanager' => [
            'icon' => 'fa fa-picture-o',
            'path' => 'anomaly.field_type.wysiwyg::js/plugins/imagemanager.js'
        ],
        'fullscreen'   => [
            'icon' => 'fa fa-arrows-alt',
            'path' => 'anomaly.field_type.wysiwyg::js/plugins/fullscreen.js'
        ]
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
