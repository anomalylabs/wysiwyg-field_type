# WYSIWYG Field Type

*anomaly.field_type.wysiwyg*

A powerful WYSIWYG (What You See Is What You Get) editor field type powered by RedactorJS.

## Description

The WYSIWYG field type provides a rich text editing experience with RedactorJS, offering intuitive formatting tools, media embedding, and extensive customization options for content creation in PyroCMS.

## Features

- **RedactorJS Powered**: Industry-standard WYSIWYG editor
- **Rich Formatting**: Bold, italic, lists, headings, links, and more
- **Media Embedding**: Images, videos, and file uploads
- **Code View**: Switch between visual and HTML source modes
- **Customizable Toolbar**: Configure visible buttons and plugins
- **Multiple Configurations**: Different editor setups for different contexts
- **Template Parsing**: Support for Twig template syntax
- **Line Break Control**: Choose between `<p>` tags or `<br>` tags
- **Validation**: HTML validation and iframe domain whitelisting
- **Auto-save**: Optional content synchronization

## Configuration

### Basic Configuration

```php
'content' => [
    'type' => 'anomaly.field_type.wysiwyg',
],
```

### Configuration Options

#### `configuration` (default: 'default')
Pre-defined editor configuration preset.

```php
'config' => [
    'configuration' => 'default', // Or 'simple', 'advanced', custom name
]
```

#### `height` (default: 75)
Editor height in percentage or pixels.

```php
'config' => [
    'height' => 500, // Fixed height in pixels
    // or
    'height' => 75,  // Percentage
]
```

#### `line_breaks` (default: false)
Use `<br>` tags instead of `<p>` tags for line breaks.

```php
'config' => [
    'line_breaks' => true, // Use <br> tags
]
```

#### `buttons`
Customize visible toolbar buttons.

```php
'config' => [
    'buttons' => ['format', 'bold', 'italic', 'link', 'image'],
]
```

#### `plugins`
Enable RedactorJS plugins.

```php
'config' => [
    'plugins' => ['table', 'video', 'fontcolor'],
]
```

## Usage Examples

### Basic Content Editor

```php
protected $fields = [
    'content' => [
        'type' => 'anomaly.field_type.wysiwyg',
    ],
];
```

### Simple Editor

```php
'description' => [
    'type'   => 'anomaly.field_type.wysiwyg',
    'config' => [
        'configuration' => 'simple',
        'height'        => 200,
        'buttons'       => ['bold', 'italic', 'link'],
    ],
],
```

### Full-Featured Editor

```php
'article_content' => [
    'type'   => 'anomaly.field_type.wysiwyg',
    'config' => [
        'configuration' => 'advanced',
        'height'        => 600,
        'plugins'       => ['table', 'video', 'fontcolor'],
    ],
],
```

## Accessing Values

### In Templates

```twig
{# Output HTML content #}
<div class="article-content">
    {{ entry.content|raw }}
</div>

{# Parse as template #}
{{ entry.content|parse|raw }}
```

## Requirements

- PyroCMS 3.x
- Anomaly Streams Platform ^1.10
- RedactorJS (included)

## License

This field type is open-sourced software licensed under the [MIT license](LICENSE.md).

## Authors

- **PyroCMS, Inc.** - [Website](http://pyrocms.com/) - support@pyrocms.com
- **Ryan Thompson** - [Website](http://ryanthepyro.com/)

