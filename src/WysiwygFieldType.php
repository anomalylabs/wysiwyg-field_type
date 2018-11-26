<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Support\Template;

/**
 * Class WysiwygFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
    protected $inputView = 'anomaly.field_type.wysiwyg::input';

    /**
     * The default config.
     *
     * @var array
     */
    protected $config = [
        'configuration' => 'default',
        'line_breaks'   => false,
        'height'        => 75,
    ];

    /**
     * The template utility.
     *
     * @var Template
     */
    protected $template;

    /**
     * The application utility.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new WysiwygFieldType instance.
     *
     * @param Template $template
     * @param Application $application
     */
    public function __construct(Template $template, Application $application)
    {
        $this->template    = $template;
        $this->application = $application;
    }

    /**
     * Get the config array.
     *
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();

        /*
         * Get the configuration values.
         */
        $configuration = config(
            $this->getNamespace('redactor.configurations.' . $this->config('configuration', 'default'))
        );

        $buttons = array_keys(config($this->getNamespace('redactor.buttons')));
        $plugins = array_keys(config($this->getNamespace('redactor.plugins')));

        /*
         * Set the buttons and plugins from config.
         */
        $config['buttons'] = array_intersect((array)$this->config('buttons', $configuration['buttons']), $buttons);
        $config['plugins'] = array_intersect((array)$this->config('plugins', $configuration['plugins']), $plugins);

        return $config;
    }
    
}
