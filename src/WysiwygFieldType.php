<?php namespace Anomaly\WysiwygFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class WysiwygFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\WysiwygFieldType
 */
class WysiwygFieldType extends FieldType
{

    /**
     * The database column type.
     *
     * @var string
     */
    protected $columnType = 'text';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.wysiwyg::input';

    /**
     * The default config.
     *
     * @var array
     */
    protected $config = [
        'linebreaks' => false,
        'buttons'    => 'simple',
        'height'     => 200
    ];

    /**
     * The available button sets.
     *
     * @var array
     */
    protected $buttons = [
        'advanced' => [
            'html',
            'formatting',
            'bold',
            'italic',
            'deleted',
            'unorderedlist',
            'orderedlist',
            'outdent',
            'indent',
            'image',
            'file',
            'link',
            'alignment',
            'horizontalrule',
            'underline'
        ],
        'default'  => [
            'html',
            'formatting',
            'bold',
            'italic',
            'deleted',
            'unorderedlist',
            'orderedlist',
            'outdent',
            'indent',
            'link',
            'alignment',
            'horizontalrule'
        ],
        'basic'    => [
            'formatting',
            'bold',
            'italic',
            'link'
        ],
        'simple'   => [
            'formatting',
            'bold',
            'italic'
        ]
    ];

    /**
     * Get the config array.
     *
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();

        /**
         * If the button config is a button set then
         * use the corresponding set's buttons.
         */
        if (is_string($config['buttons'])) {
            $config['buttons'] = array_get($this->buttons, $config['buttons'], $this->buttons['default']);
        }

        return $config;
    }
}
