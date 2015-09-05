<?php namespace Anomaly\WysiwygFieldType\Http\Controller;

use Anomaly\FilesModule\Disk\Contract\DiskRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use League\Flysystem\MountManager;

/**
 * Class JsonController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType\Http\Controller
 */
class JsonController extends AdminController
{

    /**
     * The disk repository.
     *
     * @var DiskRepositoryInterface
     */
    protected $disks;

    /**
     * Create a new JsonController instance.
     *
     * @param DiskRepositoryInterface $disks
     */
    public function __construct(DiskRepositoryInterface $disks)
    {
        $this->disks = $disks;

        parent::__construct();
    }

    /**
     * Return the JSON image map.
     *
     * @param MountManager $manager
     * @param              $disk
     * @param              $field
     * @return string
     */
    public function images(MountManager $manager, $disk, $field)
    {
        $disk = $this->disks->find($disk);

        $images = $manager->listContents($disk->path("wysiwyg-field-type/{$field}/images"));

        return json_encode(
            array_map(
                function ($image) use ($disk) {
                    return [
                        'thumb' => url('files/thumb/' . $disk->getSlug() . '/' . $image['path']),
                        'image' => url('files/get/' . $disk->getSlug() . '/' . $image['path'])
                    ];
                },
                $images
            )
        );
    }

    /**
     * Return the JSON file map.
     *
     * @param MountManager $manager
     * @param              $disk
     * @param              $field
     * @return string
     */
    public function files(MountManager $manager, $disk, $field)
    {
        $disk = $this->disks->find($disk);

        $files = $manager->listContents($disk->path("wysiwyg-field-type/{$field}/images"));

        return json_encode(
            array_map(
                function ($file) use ($disk) {

                    $size = [' B', ' KB', ' MB', ' GB'];

                    $factor = floor((strlen($bytes = $file['size']) - 1) / 3);

                    return [
                        'title' => $file['basename'],
                        'name'  => $file['basename'],
                        'link'  => url('files/download/' . $disk->getSlug() . '/' . $file['path']),
                        'size'  => (float)sprintf("%.2f", $bytes / pow(1024, $factor)) . @$size[(int)$factor]
                    ];
                },
                $files
            )
        );
    }

}
