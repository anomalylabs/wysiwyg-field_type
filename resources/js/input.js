$(function () {

    // Initialize WYSIWYG editors.
    $('[data-provides="wysiwyg"]').each(function () {

        $(this).redactor({

            element: $(this),

            /**
             * Settings
             */
            cleanOnPaste: true,
            replaceTags: [
                ['strike', 'del'],
                ['i', 'em'],
                ['b', 'strong'],
                ['big', 'strong'],
                ['strike', 'del']
            ],
            removeEmpty: ['strong', 'em', 'span', 'p'],

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
