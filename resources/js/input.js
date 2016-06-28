$(function () {

    // Initialize WYSIWYG editors.
    $('textarea[data-provides="anomaly.field_type.wysiwyg"]').each(function () {

        /**
         * Gather available buttons / plugins.
         */
        var buttons = $(this).data('available_buttons');
        var plugins = $(this).data('available_plugins');

        $(this).redactor({

            element: $(this),

            /**
             * Initialize the editor icons.
             */
            callbacks: {
                init: function () {

                    var icons = {};

                    $.each(buttons, function (k, v) {
                        if (v.icon) {
                            icons[v.button ? v.button : k] = '<i class="' + v.icon + '"></i>';
                        }
                    });

                    $.each(plugins, function (k, v) {
                        if (v.icon) {
                            icons[v.button ? v.button : k] = '<i class="' + v.icon + '"></i>';
                        }
                    });

                    $.each(this.button.all(), $.proxy(function (i, s) {

                        var key = $(s).attr('rel');

                        if (typeof icons[key] !== 'undefined') {
                            var icon = icons[key];
                            var button = this.button.get(key);
                            this.button.setIcon(button, icon);
                        }

                    }, this));
                }
            },

            /**
             * Settings
             */
            script: false,
            cleanOnPaste: true,
            removeEmpty: ['strong', 'em', 'p'],

            /**
             * Features
             */
            minHeight: $(this).data('height'),
            placeholder: $(this).attr('placeholder'),
            folders: $(this).data('folders').toString().split(','),
            buttons: $(this).data('buttons').toString().split(','),
            plugins: $(this).data('plugins').toString().split(',')
        });
    });
});
