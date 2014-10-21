<?php namespace Anomaly\Streams\Addon\FieldType\Wysiwyg;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class WysiwygFieldType extends FieldTypeAddon
{
    /**
     * The database column type this field type uses.
     *
     * @var string
     */
    public $columnType = 'text';

    /**
     * Field type version
     *
     * @var string
     */
    public $version = '1.1.0';

    /**
     * Field type author information.
     *
     * @var array
     */
    public $author = array(
        'name' => 'AI Web Systems, Inc.',
        'url'  => 'http://aiwebsystems.com/',
    );
}
