<?php namespace Anomaly\WysiwygFieldType\Command;

use Anomaly\WysiwygFieldType\WysiwygFieldType;
use Illuminate\Filesystem\Filesystem;

/**
 * Class PutFile
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PutFile
{

    /**
     * The editor field type instance.
     *
     * @var WysiwygFieldType
     */
    protected $fieldType;

    /**
     * Create a new PutFile instance.
     *
     * @param WysiwygFieldType $fieldType
     */
    public function __construct(WysiwygFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Filesystem $files
     */
    public function handle(Filesystem $files)
    {
        $entry = $this->fieldType->getEntry();
        $path  = $this->fieldType->getStoragePath();

        if ($path && !is_dir(dirname($path))) {
            $files->makeDirectory(dirname($path), 0777, true, true);
        }

        if ($path) {
            $files->put($path, array_get($entry->getAttributes(), $this->fieldType->getField()));
        }
    }
}
