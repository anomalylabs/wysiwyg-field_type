<?php namespace Anomaly\WysiwygFieldType\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;
use TwigBridge\Bridge;

/**
 * Class ClearCache
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\WysiwygFieldType\Command
 */
class ClearCache implements SelfHandling
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
