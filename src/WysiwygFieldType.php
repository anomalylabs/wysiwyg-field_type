<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryTranslationsModel;
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
         * Set default syncing behavior.
         */
        $config['sync'] = array_get($config, 'sync', config($this->getNamespace('storage.sync')));

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

    /**
     * Get the file path.
     *
     * @return null|string
     */
    public function getFilePath()
    {
        if ($this->entry === null || !is_object($this->entry) || !$this->entry->getId()) {
            return null;
        }

        if (!$this->entry instanceof EntryInterface && !$this->entry instanceof EntryTranslationsModel) {
            return null;
        }

        $slug      = $this->entry->getStreamSlug();
        $namespace = $this->entry->getStreamNamespace();
        $directory = $this->entry->getEntryId();
        $file      = $this->getFileName();

        return "{$namespace}/{$slug}/{$directory}/{$file}";
    }

    /**
     * Get the storage path.
     *
     * @return null|string
     */
    public function getStoragePath()
    {
        if (!$path = $this->getFilePath()) {
            return null;
        }

        return $this->application->getStoragePath($path);
    }

    /**
     * Get the view path.
     *
     * @return string
     */
    public function getViewPath()
    {
        if ($this->config('sync') === false) {
            return app(Template::class)->path($this->getValue());
        }

        if (!$path = $this->getFilePath()) {
            return null;
        }

        return 'storage::' . str_replace(['.html', '.twig'], '', $path);
    }

    /**
     * Get the asset path.
     *
     * @return string
     */
    public function getAssetPath()
    {
        if (!$path = $this->getFilePath()) {
            return null;
        }

        return 'storage::' . $path;
    }

    /**
     * Get the storage file name.
     *
     * @return string
     */
    protected function getFileName()
    {
        return trim($this->getField() . '_' . $this->getLocale(), '_') . '.twig';
    }
}
