# Configuration

- [Addon Configuration](#addon)
- [Basic Configuration](#basic)
- [Extra Configuration](#extra)

<hr>

Below is the full configuration available with defaults.

    protected $fields = [
        "example" => [
            "type"   => "anomaly.field_type.country",
            "config" => [
                "default_value" => null,
                "configuration" => "default",
                "line_breaks"   => false,
                "height"        => 500,
                "buttons"       => [],
                "plugins"       => []
            ]
        ]
    ];

<hr>

<a name="addon"></a>
## Addon Configuration

The wysiwyg field type configures Redactor options using it's `redactor.php` config file.

You can override these options by overloading the configuration file with a config file of your own at `/resources/{reference}/config/addons/wysiwyg-field_type/wysiwyg.php`

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

    "default_value" => "<h1>Hello World</h1>"

The `default_value` is a core option. This field type accepts any string value.

<hr>

<a name="extra"></a>
## Extra Configuration

### Line Breaks

    "line_breaks" => true

When enabled, line breaks will be used instead of new paragraphs when pressing enter in the editor.

<hr>

### Buttons

    "buttons" => ["bold", "italic"]

Specify the available buttons for the editor. By default, available options are `format`, `bold`, `italic`, `deleted`, `lists`, `link`, `horizontalrule`, and `underline`.

### Plugins

    "plugins" => ["filemanager", "imagemanager"]

Specify the available plugins for the editor. By default, available options are `alignment`, `inlinestyle`, `table`, `video`, `filemanager`, `imagemanager`, `source`, and `fullscreen`.

### Configuration Set

    "configuration" => "basic"

Specify the configuration set to use. The configuration sets are determined by the `redactor.php` config file. The configuration set dictates sets of plugins and buttons displayed in the editor (instead of selecting them individually).

<div class="alert alert-primary">
<strong>Note:</strong> This option is currently only available via API.
</div>