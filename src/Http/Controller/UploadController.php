<?php namespace Anomaly\WysiwygFieldType\Http\Controller;

use Anomaly\FilesModule\Disk\Contract\DiskRepositoryInterface;
use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use League\Flysystem\MountManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class UploadController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType\Http\Controller
 */
class UploadController extends PublicController
{

    /**
     * Handle the file upload.
     *
     * @param DiskRepositoryInterface $disks
     * @param ResponseFactory         $response
     * @param MountManager            $manager
     * @param Request                 $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(
        DiskRepositoryInterface $disks,
        ResponseFactory $response,
        MountManager $manager,
        Request $request
    ) {

        $path = 'wysiwyg-field-type';

        $file   = $request->file('file');
        $disk   = $request->get('disk');
        $field  = $request->get('field');
        $folder = $request->get('folder');

        if (is_numeric($disk)) {
            $disk = $disks->find($disk);
        } elseif (is_string($disk)) {
            $disk = $disks->findBySlug($disk);
        }

        if (!$disk) {
            return $response->json(
                'The configured upload disk [' . $request->get('disk') . '] does not exist!',
                500
            );
        }

        /* @var FileInterface|UploadedFile $file */
        $file = $manager->putStream(
            $disk->path(ltrim(trim($path, '/') . "/{$field}/{$folder}/" . $file->getClientOriginalName(), '/')),
            fopen($file->getRealPath(), 'r+')
        );

        return stripslashes(json_encode(['filelink' => url($file->publicPath())]));
    }
}
