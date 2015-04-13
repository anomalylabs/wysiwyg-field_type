<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Illuminate\Filesystem\Filesystem;

/**
 * Class WysiwygFieldTypeAccessor
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType
 */
class WysiwygFieldTypeAccessor extends FieldTypeAccessor
{

    /**
     * The file system.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * The field type.
     *
     * @var WysiwygFieldType
     */
    protected $fieldType;

    /**
     * Create a new MarkdownFieldTypeAccessor instance.
     *
     * @param WysiwygFieldType $fieldType
     * @param Filesystem       $files
     */
    public function __construct(WysiwygFieldType $fieldType, Filesystem $files)
    {
        $this->files = $files;

        parent::__construct($fieldType);
    }

    /**
     * Set the value on the entry.
     *
     * @param EloquentModel $entry
     * @param               $value
     */
    public function set(EloquentModel $entry, $value)
    {
        if ($entry instanceof EntryInterface && $entry->getTitle() && $this->fieldType->setEntry($entry)) {

            $path = $this->fieldType->getStoragePath($entry);

            if ($path && !is_dir(dirname($path))) {
                $this->files->makeDirectory(dirname($path), 0777, true, true);
            }

            $this->files->put($path, $value);
        }

        parent::set($entry, $value);
    }

    /**
     * Get the value off the entry.
     *
     * @param EloquentModel $entry
     * @return mixed
     */
    public function get(EloquentModel $entry)
    {
        if ($entry instanceof EntryInterface && $this->fieldType->setEntry($entry)) {

            $path = $this->fieldType->getStoragePath($entry);

            if ($path && file_exists($path) && $value = $this->files->get($path)) {

                return $value;
            }
        }

        return parent::get($entry);
    }
}
