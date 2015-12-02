<?php namespace Anomaly\WysiwygFieldType\Table;

/**
 * Class FileTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType\Table
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
                    'data-entry'  => '{entry.path}'
                ]
            ]
        );
    }
}
