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

The button set to be used for the editor. Available options are `advanced`, `default`, `basic`, and `simple`. The default value is `default`.  
Below are the buttons included in each set.

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

Plugins that are enabled for the editor. Available options are `default`. The default value is `default`.  
Below are the plugins included in each set.

```
    'default' => [
        'fullscreen'
    ]
```

### `height`

The height in pixels of the editor. The default is `200`.
