<?php namespace Anomaly\WysiwygFieldType\Table;

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
    public function handle(FileTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'select' => [
                    'data-select' => $builder->getMode(),
                    'data-entry'  => '{entry.path}',
                ],
            ]
        );
    }
}
