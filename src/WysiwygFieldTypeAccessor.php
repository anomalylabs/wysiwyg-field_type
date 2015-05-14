<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAccessor;
use Anomaly\WysiwygFieldType\Command\GetFile;
use Illuminate\Foundation\Bus\DispatchesCommands;

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

    use DispatchesCommands;

    /**
     * Get the value off the entry.
     *
     * @return string
     */
    public function get()
    {
        return $this->dispatch(new GetFile($this->fieldType));
    }
}
