<?php namespace Anomaly\Streams\Addon\FieldType\Wysiwyg;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class WysiwygFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Wysiwyg
 */
class WysiwygFieldType extends FieldType
{

    /**
     * The database column type.
     *
     * @var string
     */
    protected $columnType = 'text';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'field_type.wysiwyg::input';
}
