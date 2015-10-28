<?php namespace Anomaly\WysiwygFieldType\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;
use TwigBridge\Bridge;

/**
 * Class ClearCache
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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
