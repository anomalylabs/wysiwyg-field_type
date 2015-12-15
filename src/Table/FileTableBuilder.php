<?php namespace Anomaly\WysiwygFieldType\Table;

use Anomaly\FilesModule\File\FileModel;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class FileTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType\Table
 */
class FileTableBuilder extends TableBuilder
{

    /**
     * The table mode.
     *
     * @var string
     */
    protected $mode = 'file';

    /**
     * The ajax flag.
     *
     * @var bool
     */
    protected $ajax = true;

    /**
     * The table model.
     *
     * @var string
     */
    protected $model = FileModel::class;

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'folder',
        'name'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'title' => 'anomaly.field_type.wysiwyg::message.choose_file'
    ];

    /**
     * Get the mode.
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set the mode.
     *
     * @param $mode
     * @return $this
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }
}
