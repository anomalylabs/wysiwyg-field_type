## Introduction[](#introduction)

`anomaly.field_type.wysiwyg`

The WYSIWYG field type provides a rich text editor input powered by [Redactor](https://imperavi.com/redactor/).


### Configuration[](#introduction/configuration)

Below is the full configuration available with defaults values:

    "example" => [
        "type"   => "anomaly.field_type.wysiwyg",
        "config" => [
            "default_value" => null,
            "configuration" => "default",
            "line_breaks"   => false,
            "sync"          => true,
            "height"        => 500,
            "buttons"       => [],
            "plugins"       => [],
        ]
    ]

###### Configuration

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Example</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

default_value

</td>

<td>

`<h1>Hello World</h1>`

</td>

<td>

The default value.

</td>

</tr>

<tr>

<td>

configuration

</td>

<td>

basic

</td>

<td>

The configuration preset.

</td>

</tr>

<tr>

<td>

line_breaks

</td>

<td>

true

</td>

<td>

If enabled, line breaks will be used instead of new paragraphs when pressing enter in the editor.

</td>

</tr>

<tr>

<td>

sync

</td>

<td>

true

</td>

<td>

If disabled, storage files will NOT be synced with DB content.

</td>

</tr>

<tr>

<td>

height

</td>

<td>

750

</td>

<td>

The height of the editor.

</td>

</tr>

<tr>

<td>

buttons

</td>

<td>

["bold", "italic"]

</td>

<td>

Specify the available buttons for the editor. By default, available options are `format`, `bold`, `italic`, `deleted`, `lists`, `link`, `horizontalrule`, and `underline`.

</td>

</tr>

<tr>

<td>

plugins

</td>

<td>

["filemanager", "imagemanager"]

</td>

<td>

Specify the available plugins for the editor. By default, available options are `alignment`, `inlinestyle`, `table`, `video`, `filemanager`, `imagemanager`, `source`, and `fullscreen`.

</td>

</tr>

</tbody>

</table>


### Addon Configuration[](#introduction/addon-configuration)

The WYSIWYG field type configures Redactor options using it's `redactor.php` config file. You can also modify storage defaults with `storage.php`.

You can override these options by publishing the addon and modifying the resulting configuration file:

    php artisan addon:publish anomaly.field_type.wysiwyg

The field type will be published to `/resources/{application}/addons/anomaly/wysiwyg-field_type`.

<div class="alert alert-success">**Success:** If you feel something is missing - add it to the config and send a pull request to [https://github.com/anomalylabs/wysiwyg-field_type](https://github.com/anomalylabs/wysiwyg-field_type)</div>


### Storage Files[](#introduction/storage-files)

The WYSIWYG field type dumps content to a corresponding `storage file`. The path to this file will be visible underneath the editor when `app.debug` is enabled.

You can edit this file directly and it will automatically sync back and forth with the database value. This is for convenience only, never commit the storage directory.
