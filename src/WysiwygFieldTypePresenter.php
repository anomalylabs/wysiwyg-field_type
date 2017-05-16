<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\Support\Str;
use Anomaly\Streams\Platform\Support\Template;
use Illuminate\View\Factory;

/**
 * Class WysiwygFieldTypePresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class WysiwygFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The string utility.
     *
     * @var Str
     */
    protected $str;

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The template parser.
     *
     * @var Template
     */
    protected $template;

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
     * @param Str      $str
     * @param Factory  $view
     * @param Template $template
     * @param          $object
     */
    public function __construct(Str $str, Factory $view, Template $template, $object)
    {
        $this->str      = $str;
        $this->view     = $view;
        $this->template = $template;

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
     * @param  array $payload
     * @return string
     */
    public function render(array $payload = [])
    {
        return $this->view->make($this->object->getViewPath(), $payload)->render();
    }

    /**
     * Return the rendered content.
     *
     * @param  array $payload
     * @return string
     * @deprecated since version 2.0
     */
    public function rendered(array $payload = [])
    {
        return $this->render($payload);
    }

    /**
     * Return the parsed content.
     *
     * @param  array $payload
     * @return string
     */
    public function parse(array $payload = [])
    {
        return $this->template->render($this->content(), (new Decorator())->decorate($payload));
    }

    /**
     * Return the parsed content.
     *
     * @param  array $payload
     * @return string
     * @deprecated since version 2.0
     */
    public function parsed(array $payload = [])
    {
        return $this->parse($payload);
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
     * Return an excerpt of the text.
     *
     * @param  int    $length
     * @param  string $ending
     * @return string
     */
    public function excerpt($length = 100, $ending = '...')
    {
        return $this->str->truncate($this->text(), $length, $ending);
    }

    /**
     * Return the text from the content.
     *
     * @param  null $allowed
     * @return string
     */
    public function text($allowed = null)
    {
        return strip_tags($this->content(), $allowed);
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

        return $this->render();
    }
}
