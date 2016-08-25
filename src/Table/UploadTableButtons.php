<?php namespace Anomaly\WysiwygFieldType\Table;

/**
 * Class UploadTableButtons
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UploadTableButtons
{

    /**
     * Handle the table buttons.
     *
     * @param UploadTableBuilder $builder
     */
    public function handle(UploadTableBuilder $builder)
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
