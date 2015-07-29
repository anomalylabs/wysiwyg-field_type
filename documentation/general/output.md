# Output

This field type returns the rendered content by default

### Rendered

Returns the rendered content.

```
// Twig usage
{{ entry.example.rendered|raw }}

// API usage
$entry->example->rendered;
```

### Parsed

Returns the content parsed through the parser.

```
// Twig usage
{{ entry.example.parsed|raw }}

// API usage
$entry->example->parsed }}
```

### Content

Returns the un-parsed and un-rendered file content.

```
// Twig usage
{{ entry.example.content|raw }}

// API usage
$entry->example->content;
```
