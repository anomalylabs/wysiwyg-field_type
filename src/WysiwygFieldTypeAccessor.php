<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Anomaly\WysiwygFieldType\Command\SyncFile;
use Illuminate\Foundation\Bus\DispatchesJobs;

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
        return $this->dispatch(new SyncFile($this->fieldType));
    }
}
