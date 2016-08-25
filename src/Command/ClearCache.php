<?php namespace Anomaly\WysiwygFieldType\Command;


use Illuminate\Filesystem\Filesystem;
use TwigBridge\Bridge;

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
