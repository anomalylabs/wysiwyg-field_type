<?php namespace Anomaly\WysiwygFieldType\Table;

/**
 * Class UploadTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType\Table
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
                    'data-entry'  => '{entry.path}'
                ]
            ]
        );
    }
}
