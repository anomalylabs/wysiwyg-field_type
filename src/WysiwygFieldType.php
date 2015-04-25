<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\WysiwygFieldType\Command\DeleteDirectory;
use Anomaly\WysiwygFieldType\Command\PutFile;
use Anomaly\WysiwygFieldType\Command\RenameDirectory;

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
        $directory = $this->getStorageDirectoryName();
        $file      = $this->getStorageFileName();

        return $this->application->getStoragePath("{$namespace}/{$slug}/{$directory}/{$file}");
    }

    /**
     * Get the file extension for the config mode.
     *
     * @return mixed
     */
    protected function getFileExtension()
    {
        $mode = array_get($this->getConfig(), 'mode');

        return array_get($this->extensions, $mode, $mode);
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
     * Get the storage directory name.
     *
     * @return string
     */
    protected function getStorageDirectoryName()
    {
        return str_slug($this->entry->getTitle() . '_' . $this->entry->getId(), '_');
    }

    /**
     * Get the storage file name.
     *
     * @return string
     */
    protected function getStorageFileName()
    {
        return $this->getField() . '.html';
    }

    /**
     * Fired after an entry is saved.
     */
    public function onEntrySaved()
    {
        $this->dispatch(new PutFile($this));
    }

    /**
     * Fired after an entry is deleted.
     */
    public function onEntryDeleted()
    {
        $this->dispatch(new DeleteDirectory($this));
    }

    /**
     * Fired after an entry is deleted.
     */
    public function onEntryUpdated()
    {
        $this->dispatch(new RenameDirectory($this));
    }
}
