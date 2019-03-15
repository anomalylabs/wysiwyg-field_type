<?php namespace Anomaly\WysiwygFieldType\Table;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Application\Application;

/**
 * Class FileTableButtons
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FileTableButtons
{

    /**
     * Handle the table buttons.
     *
     * @param FileTableBuilder $builder
     */
    public function handle(Application $application, FileTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'select' => [
                    'data-select' => $builder->getMode(),
                    'data-entry'  => function (FileInterface $entry) use ($application) {

                        if (!strpos(asset($application->getAssetsPath('files-module')), $url = $entry->url())) {
                            return $entry->path();
                        }

                        return $url;
                    },
                ],
            ]
        );
    }
}
