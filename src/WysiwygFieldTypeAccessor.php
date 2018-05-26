<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Anomaly\WysiwygFieldType\Command\PutFile;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class WysiwygFieldTypeAccessor
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class WysiwygFieldTypeAccessor extends FieldTypeAccessor
{

    use DispatchesJobs;

    /**
     * The field type instance.
     * This is for IDE hinting.
     *
     * @var WysiwygFieldType
     */
    protected $fieldType;

    /**
     * Get the value off the entry.
     *
     * @return string
     */
    public function get()
    {
        if (!file_exists($this->fieldType->getStoragePath())) {
            $this->dispatch(new PutFile($this->fieldType));
        }

        return parent::get();
    }

}
