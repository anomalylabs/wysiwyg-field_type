<?php

return [
    'buttons'        => [
        'format'         => [],
        'bold'           => [
            'icon' => 'fa fa-bold',
        ],
        'italic'         => [
            'icon' => 'fa fa-italic',
        ],
        'deleted'        => [
            'icon' => 'fa fa-strikethrough',
        ],
        'lists'          => [
            'icon' => 'fa fa-list',
        ],
        'link'           => [
            'icon' => 'fa fa-link',
        ],
        'horizontalrule' => [
            'icon' => 'fa fa-minus',
        ],
        'underline'      => [
            'icon' => 'fa fa-underline',
        ],

    ],
    'plugins'        => [
        'alignment'    => [
            'icon'    => 'fa fa-align-left',
            'scripts' => [
                'anomaly.field_type.wysiwyg::js/plugins/alignment/alignment.js',
            ],
            'styles'  => [
                'anomaly.field_type.wysiwyg::js/plugins/alignment/alignment.css',
            ],
        ],
        'inlinestyle'  => [
            'button'  => 'inline',
            'scripts' => [
                'anomaly.field_type.wysiwyg::js/plugins/inlinestyle.js',
            ],
        ],
        'table'        => [
            'icon'    => 'fa fa-table',
            'scripts' => [
                'anomaly.field_type.wysiwyg::js/plugins/table.js',
            ],
        ],
        'video'        => [
            'icon'    => 'fa fa-video-camera',
            'scripts' => [
                'anomaly.field_type.wysiwyg::js/plugins/video.js',
            ],
        ],
        'filemanager'  => [
            'icon'    => 'fa fa-paperclip',
            'scripts' => [
                'anomaly.field_type.wysiwyg::js/plugins/filemanager.js',
            ],
        ],
        'imagemanager' => [
            'icon'    => 'fa fa-picture-o',
            'scripts' => [
                'anomaly.field_type.wysiwyg::js/plugins/imagemanager.js',
            ],
        ],
        'codemirror'   => [
            'icon'    => 'fa fa-code',
            'styles'  => [
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/lib/codemirror.css',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/theme/mbo.css',
            ],
            'scripts' => [
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/lib/codemirror.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/keymap/sublime.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/addon/emmet.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/addon/mode/multiplex.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/mode/xml/xml.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/mode/javascript/javascript.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/mode/css/css.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/mode/htmlmixed/htmlmixed.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/mode/clike/clike.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/mode/php/php.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror/mode/twig/twig.js',
                'anomaly.field_type.wysiwyg::js/plugins/codemirror.js',
            ],
        ],
        // 'source'       => [
        //     'icon'    => 'fa fa-code',
        //     'scripts' => [
        //         'anomaly.field_type.wysiwyg::js/plugins/source.js',
        //     ],
        // ],
        'fullscreen'   => [
            'icon'    => 'fa fa-arrows-alt',
            'scripts' => [
                'anomaly.field_type.wysiwyg::js/plugins/fullscreen.js',
            ],
        ],
    ],
    'configurations' => [
        'default' => [
            'buttons' => [
                'format',
                'bold',
                'italic',
                'deleted',
                'lists',
                'link',
                'horizontalrule',
                'underline',
            ],
            'plugins' => [
                'codemirror',
                'table',
                'video',
                'inlinestyle',
                'filemanager',
                'imagemanager',
                'fullscreen',
                'alignment',
            ],
        ],
        'basic'   => [
            'buttons' => [
                'bold',
                'italic',
                'lists',
                'link',
                'underline',
            ],
            'plugins' => [
                'fullscreen',
            ],
        ],
    ],
];
