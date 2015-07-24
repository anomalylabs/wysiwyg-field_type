<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Anomaly\WysiwygFieldType\Command\GetFile;
use Anomaly\WysiwygFieldType\Command\PutFile;
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
     * Get the value off the entry.
     *
     * @return string
     */
    public function get()
    {
        if (!file_exists($this->fieldType->getStoragePath())) {
            $this->dispatch(new PutFile($this->fieldType));
        }

        return $this->dispatch(new GetFile($this->fieldType));
    }
}
