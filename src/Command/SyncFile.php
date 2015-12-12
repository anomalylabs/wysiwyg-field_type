<?php namespace Anomaly\WysiwygFieldType\Command;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Anomaly\WysiwygFieldType\WysiwygFieldType;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class SyncFile
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType\Command
 */
class SyncFile implements SelfHandling
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
     * @param EntryRepositoryInterface $repository
     * @return string
     */
    public function handle(EntryRepositoryInterface $repository)
    {
        $path  = $this->fieldType->getStoragePath();
        $entry = $this->fieldType->getEntry();

        if (!file_exists($this->fieldType->getStoragePath())) {
            $this->dispatch(new PutFile($this->fieldType));
        }

        $content = $this->dispatch(new GetFile($this->fieldType));

        if (md5($content) == md5(array_get($entry->getAttributes(), $this->fieldType->getField()))) {
            return $content;
        }

        if (filemtime($path) > $entry->lastModified()->timestamp) {
            $repository->save($entry->setRawAttribute($this->fieldType->getField(), $content));
        }

        if (filemtime($path) < $entry->lastModified()->timestamp) {

            $this->dispatch(new PutFile($this->fieldType));

            $content = array_get($entry->getAttributes(), $this->fieldType->getField());
        }

        $this->dispatch(new ClearCache());

        return $content;
    }
}
