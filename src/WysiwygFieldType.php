<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\WysiwygFieldType\Command\DeleteDirectory;
use Anomaly\WysiwygFieldType\Command\PutFile;

/**
 * Class WysiwygFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType
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
        'line_breaks' => false,
        'buttons'     => 'default',
        'plugins'     => 'default',
        'height'      => 200
    ];

    /**
     * The available button sets.
     *
     * @var array
     */
    protected $buttons = [
        'advanced' => [
            'html',
            'formatting',
            'bold',
            'italic',
            'deleted',
            'unorderedlist',
            'orderedlist',
            'outdent',
            'indent',
            'link',
            'alignment',
            'horizontalrule',
            'underline'
        ],
        'default'  => [
            'html',
            'formatting',
            'bold',
            'italic',
            'deleted',
            'unorderedlist',
            'orderedlist',
            'outdent',
            'indent',
            'link',
            'alignment',
            'horizontalrule',
            'underline'
        ],
        'basic'    => [
            'formatting',
            'bold',
            'italic',
            'link'
        ],
        'simple'   => [
            'formatting',
            'bold',
            'italic'
        ]
    ];

    /**
     * The available plugin sets.
     *
     * @var array
     */
    protected $plugins = [
        'default' => [
            'fullscreen'
        ]
    ];

    /**
     * The application utility.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new WysiwygFieldType instance.
     *
     * @param Application $application
     */
    public function __construct(Application $application)
    {
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

        /**
         * If the buttons config is a button set then
         * use the corresponding set of buttons.
         */
        if (is_string($config['buttons'])) {
            $config['buttons'] = array_get($this->buttons, $config['buttons'], $this->buttons['default']);
        }

        /**
         * If the plugins config is a plugin set then
         * use the corresponding set of plugins.
         */
        if (is_string($config['plugins'])) {
            $config['plugins'] = array_get($this->plugins, $config['plugins'], $this->plugins['default']);
        }

        /**
         * If no buttons are specified
         * use the default set.
         */
        if (!array_filter($config['buttons'])) {
            $config['buttons'] = $this->buttons['default'];
        }

        /**
         * If no plugins are specified
         * use the default set.
         */
        if (!array_filter($config['plugins'])) {
            $config['plugins'] = $this->plugins['default'];
        }

        return $config;
    }

    /**
     * Get the storage path.
     *
     * @return null|string
     */
    public function getStoragePath()
    {
        $slug      = $this->entry->getStreamSlug();
        $namespace = $this->entry->getStreamNamespace();
        $directory = $this->entry->getEntryId();
        $file      = $this->getStorageFileName();

        return $this->application->getStoragePath("{$namespace}/types/{$slug}/{$directory}/{$file}");
    }

    /**
     * Get the application storage page.
     *
     * @return string
     */
    public function getAppStoragePath()
    {
        return str_replace(base_path(), '', $this->getStoragePath());
    }

    /**
     * Get the storage file name.
     *
     * @return string
     */
    protected function getStorageFileName()
    {
        return trim($this->getField() . '_' . $this->getLocale(), '_') . '.html';
    }

    /**
     * Fired after an entry is saved.
     */
    public function onEntrySaved()
    {
        if (!$this->getLocale()) {
            $this->dispatch(new PutFile($this));
        }
    }

    /**
     * Fired after an entry translation is saved.
     */
    public function onEntryTranslationSaved()
    {
        $this->dispatch(new PutFile($this));
    }

    /**
     * Fired after an entry is deleted.
     */
    public function onEntryDeleted()
    {
        if (!$this->getLocale()) {
            $this->dispatch(new DeleteDirectory($this));
        }
    }

    /**
     * Fired after an entry translation is deleted.
     */
    public function onEntryTranslationDeleted()
    {
        $this->dispatch(new DeleteDirectory($this));
    }
}
