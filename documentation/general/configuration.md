# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.url',
        'config' => [
            'line_breaks' => false,
            'buttons'     => 'default',
            'plugins'     => 'default',
            'height'      => 200
        ]
    ]
];
```

### `line_breaks`

If line breaks is set to true then the break tag will be used rather than paragraph tags. The default value is `false`.

### `buttons`

The button set to be used for the editor. Valid options are `advanced`, `default`, `basic`, and `simple`. You may also pass an array of buttons. The default value is the `default` button set.

Below are the buttons included in each set:

```
    'advanced' => [
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
    'default'  => [
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
    'basic'    => [
        'formatting',
        'bold',
        'italic',
        'link'
    ],
    'simple'   => [
        'formatting',
        'bold',
        'italic'
    ]
```

### `plugins`

Plugins that are enabled for the editor. Valid options are `default`. You may also pass an array of plugins. The default value is the `default` set.  

Below are the plugins included in each set:

```
    'default' => [
        'fullscreen'
    ]
```

### `height`

The height in pixels of the editor. The default is `300`.
