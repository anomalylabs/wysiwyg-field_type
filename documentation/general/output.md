# Output

This field type returns the parsed content by default

### Path

Returns the storage path for the editor.

```
// Twig usage
{{ entry.example.path }}

// API usage
$entry->example->path;
```

### Rendered

Returns the rendered content

```
// Twig usage
{{ entry.example.rendered }}

// API usage
$entry->example->rendered;
```

### Parsed

Returns the parsed content

```
// Twig usage
{{ entry.example.parsed }}

// API usage
$entry->example->parsed }}
```

### Content

Returns the un-parsed and un-rendered file content.

```
// Twig usage
{{ entry.example.content }}

// API usage
$entry->example->content;
```
