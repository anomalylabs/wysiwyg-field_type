<?php namespace Anomaly\WysiwygFieldType\Command;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Anomaly\WysiwygFieldType\WysiwygFieldType;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class SyncFile
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SyncFile
{

    use DispatchesJobs;

    /**
     * The editor field type instance.
     *
     * @var WysiwygFieldType
     */
    protected $fieldType;

    /**
     * Create a new SyncFile instance.
     *
     * @param WysiwygFieldType $fieldType
     */
    public function __construct(WysiwygFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param  EntryRepositoryInterface $repository
     * @param Repository                $config
     * @return string
     */
    public function handle(EntryRepositoryInterface $repository, Repository $config)
    {
        $path  = $this->fieldType->getStoragePath();
        $entry = $this->fieldType->getEntry();

        if (!file_exists($this->fieldType->getStoragePath())) {
            $this->dispatch(new PutFile($this->fieldType));
        }

        $content = $this->dispatch(new GetFile($this->fieldType));

        /**
         * If content is the same then
         * use the content - doesn't matter.
         */
        if (md5($content) == md5(array_get($entry->getAttributes(), $this->fieldType->getField()))) {
            return $content;
        }

        /**
         * If the file is newer and we're debugging
         * then update with the file's content.
         */
        if (
            $entry->lastModified()
            && filemtime($path) > $entry->lastModified()->timestamp
            && $config->get('app.debug')
        ) {
            $repository->save($entry->setRawAttribute($this->fieldType->getField(), $content));
        }

        /**
         * If we're NOT debugging and we got this
         * far then we know that the content has been
         * updated, so write the content to the file.
         */
        if (!$config->get('app.debug')) {

            $this->dispatch(new PutFile($this->fieldType));

            $content = array_get($entry->getAttributes(), $this->fieldType->getField());
        }

        /**
         * If the database is newer then update the file
         * since that is what we use anyways.
         */
        if ($entry->lastModified() && filemtime($path) < $entry->lastModified()->timestamp) {

            $this->dispatch(new PutFile($this->fieldType));

            $content = array_get($entry->getAttributes(), $this->fieldType->getField());
        }

        $this->dispatch(new ClearCache());

        return $content;
    }
}
