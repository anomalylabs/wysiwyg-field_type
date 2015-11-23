<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Support\Decorator;
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
     * Return the rendered content.
     *
     * @param array $payload
     * @return string
     */
    public function rendered(array $payload = [])
    {
        return $this->view->make($this->object->getViewPath(), $payload)->render();
    }

    /**
     * Return the parsed content.
     *
     * @param array $payload
     * @return string
     */
    public function parsed(array $payload = [])
    {
        return $this->string->render($this->content(), (new Decorator())->decorate($payload));
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
     * Return the text from the content.
     *
     * @return string
     */
    public function text()
    {
        return strip_tags($this->content());
    }

    /**
     * Return the parsed content.
     *
     * @return string
     */
    public function __toString()
    {
        if (!$this->object->getValue()) {
            return '';
        }

        return $this->rendered();
    }
}
