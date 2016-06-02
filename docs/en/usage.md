# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You can set the wysiwyg field type value with a string.

    $entry->example = $html;

<hr>

<a name="output"></a>
## Basic Output

The wysiwyg field type always returns the storage file content.

    $entry->example; // Contents of storage::example/input/file.twig

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the country field type presenter is returned instead.

#### Storage Path

The storage path is the hinted path string for the field type's storage file. The path hint is shown instead of the full system path.

    $entry->example->path(); // storage::example/input/file.twig

#### Render

Return the storage file rendered through the view system. An optional argument of view payload data can also be passed.

    $entry->example->render();                          // The rendered content.
    $entry->example->render(['products' => $products]); // The rendered content with extra data.

#### Content

Return the storage file contents. If there is newer information in the database, it will be synced first.

    $entry->example->content(); // The storage file content

#### Text

Return the text only contents. This method runs the HTML value through `strip_tags()`;

    $entry->example->text(); // The text only value

#### Excerpt

Return a substring of the text value. An optional length and ending string parameters can also be passed.

    $entry->example->excerpt();              // The text only value limited to 100 characters and ending in "..."
    $entry->example->excerpt(160, '[more]'); // The text only value limited to 160 characters and ending in "[more]"
