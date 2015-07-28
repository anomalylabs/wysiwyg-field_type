<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Support\String;
use Illuminate\View\Factory;

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
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The string parser.
     *
     * @var String
     */
    protected $string;

    /**
     * The decorated field type.
     * This is for IDE hinting.
     *
     * @var WysiwygFieldType
     */
    protected $object;

    /**
     * Create a new EditorFieldTypePresenter instance.
     *
     * @param Factory $view
     * @param String  $string
     * @param         $object
     */
    public function __construct(Factory $view, String $string, $object)
    {
        $this->view   = $view;
        $this->string = $string;

        parent::__construct($object);
    }

    /**
     * Return the applicable path.
     *
     * @return null|string
     */
    public function path()
    {
        return $this->object->getViewPath();
    }

    /**
     * Return the rendered content.
     *
     * @return string
     */
    public function rendered()
    {
        return $this->view->make($this->path())->render();
    }

    /**
     * Return the parse the content.
     *
     * @return string
     */
    public function parsed()
    {
        return $this->string->render($this->content());
    }

    /**
     * Return the file contents.
     *
     * @return string
     */
    public function content()
    {
        return file_get_contents($this->object->getStoragePath());
    }

    /**
     * Return the parsed content.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->rendered();
    }
}
