<?php namespace Anomaly\WysiwygFieldType\Command;

use Anomaly\WysiwygFieldType\WysiwygFieldType;
use Illuminate\Filesystem\Filesystem;

/**
 * Class DeleteDirectory
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class DeleteDirectory
{

    /**
     * The editor field type instance.
     *
     * @var WysiwygFieldType
     */
    protected $fieldType;

    /**
     * Create a new DeleteDirectory instance.
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
        $path = $this->fieldType->getStoragePath();

        if ($path && $files->isDirectory(dirname($path))) {
            $files->deleteDirectory(dirname($path));
        }
    }
}
