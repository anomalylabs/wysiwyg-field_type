<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

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
     * Defer processing so the
     * title has been set already.
     *
     * @var bool
     */
    protected $deferred = true;

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
        'linebreaks' => false,
        'buttons'    => 'default',
        'height'     => 200
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
            'image',
            'file',
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
            'horizontalrule'
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
         * If the button config is a button set then
         * use the corresponding set's buttons.
         */
        if (is_string($config['buttons'])) {
            $config['buttons'] = array_get($this->buttons, $config['buttons'], $this->buttons['default']);
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

        // If it's manually set just return it.
        if ($path = $this->configGet('path')) {
            return $path;
        }

        // No entry, no path.
        if (!$this->entry) {
            return null;
        }

        // If the entry is not an EntryInterface skip it.
        if (!$this->entry instanceof EntryInterface) {
            return null;
        }

        if (!$this->entry->getTitle()) {
            return null;
        }

        $slug      = $this->entry->getStreamSlug();
        $namespace = $this->entry->getStreamNamespace();
        $folder    = str_slug($this->entry->getTitle(), '_');
        $file      = $this->getField() . '.html';

        return $this->application->getStoragePath("{$namespace}/{$slug}/{$folder}/{$file}");
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
}
