$(function () {

    // Initialize WYSIWYG editors.
    $('.wysiwyg-field_type').each(function () {

        var wrapper = $(this);
        var field = wrapper.data('field');
        var textarea = wrapper.find('textarea');

        textarea.redactor({

            /**
             * Data
             */
            field: field,

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
            buttons: textarea.data('buttons').split(','),
            plugins: textarea.data('plugins').split(','),
            placeholder: textarea.attr('placeholder'),
            minHeight: textarea.data('height')
        });
    });
});
