<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Anomaly\WysiwygFieldType\Command\SyncFile;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class WysiwygFieldTypeAccessor
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
        if ($this->fieldType->config('sync') === false) {
            return parent::get();
        }

        return $this->dispatch(new SyncFile($this->fieldType));
    }
}
