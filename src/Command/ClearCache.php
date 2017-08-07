<?php namespace Anomaly\WysiwygFieldType\Command;


use Anomaly\Streams\Platform\View\Twig\Bridge;
use Illuminate\Filesystem\Filesystem;

/**
 * Class ClearCache
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ClearCache
{

    /**
     * Handle the command.
     *
     * @param Bridge     $twig
     * @param Filesystem $files
     */
    public function handle(Bridge $twig, Filesystem $files)
    {
        $files->deleteDirectory($twig->getCache());
    }
}
