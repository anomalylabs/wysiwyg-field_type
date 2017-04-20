$(document).on('ajaxComplete ready', function () {

    // Initialize WYSIWYG editors.
    $('textarea[data-provides="anomaly.field_type.wysiwyg"]:not(.hasEditor)').each(function () {

        /**
         * Gather available buttons / plugins.
         */
        var buttons = $(this).data('available_buttons');
        var plugins = $(this).data('available_plugins');

        $(this).addClass('hasEditor');

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

                    emmetCodeMirror(this.codemirror.editor);
                }
            },

            /**
             * Settings
             */
            script: false,
            structure: true,
            linkTooltip: true,
            cleanOnPaste: true,
            toolbarFixed: false,
            imagePosition: true,
            imageResizable: true,
            imageFloatMargin: '20px',
            removeEmpty: ['strong', 'em', 'p'],

            /**
             * Features
             */
            minHeight: $(this).data('height'),
            placeholder: $(this).attr('placeholder'),
            folders: $(this).data('folders').toString().split(','),
            buttons: $(this).data('buttons').toString().split(','),
            plugins: $(this).data('plugins').toString().split(','),
            codemirror: {
                theme: 'mbo',
                lineNumbers: true,
                mode: 'php',
                indentUnit: 4,
                profile: 'xhtml',
                lineWrapping: true,
                tabSize: 4,
                indentWithTabs: 'spaces',
                showCursorWhenSelecting: true,
                cursorScrollMargin: 2,
                cursorHeight: 0.95,
                lineWiseCopyCut: false,
                viewportMargin: Infinity,
                // allowDropFileTypes: ['image/jpg', 'image/png', 'image/gif'],
                autoCloseBrackets: true,
                highlightSelectionMatches: true,
                keyMap: 'sublime',
                // lint: true,
                // matchBrackets: true,
                styleActiveLine: false,
                gutters: ['CodeMirror-lint-markers'],
                extraKeys: {
                    F10: function (cm) {
                        cm.setOption('fullScreen', !cm.getOption('fullScreen'));
                    },
                    Esc: function (cm) {
                        if (cm.getOption('fullScreen')) {
                            cm.setOption('fullScreen', false);
                        }
                    }
                }
            }
        });
    });
});
