<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class WysiwygFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType
 */
class WysiwygFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The decorated field type.
     * This is for IDE hinting.
     *
     * @var WysiwygFieldType
     */
    protected $object;

    /**
     * Return the storage path.
     *
     * @return null|string
     */
    public function path()
    {
        return $this->object->getStoragePath();
    }
}
