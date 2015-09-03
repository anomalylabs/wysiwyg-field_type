$(function () {

    // Initialize WYSIWYG editors.
    $('textarea.wysiwyg').each(function () {
        $(this).redactor({

            /**
             * Settings
             */
            cleanOnPaste: true,
            pastePlainText: true,
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
            buttons: $(this).data('buttons').split(','),
            plugins: $(this).data('plugins').split(','),
            minHeight: $(this).data('height'),
            placeholder: $(this).attr('placeholder'),

            /**
             * File Manager
             */
            fileUpload: APPLICATION_URL + '/streams/wysiwyg-field_type/upload',
            fileManagerJson: APPLICATION_URL + '/streams/wysiwyg-field_type/files/' + $(this).data('disk') + '/' + $(this).data('field'),
            uploadFileFields: {
                folder: 'files',
                disk: $(this).data('disk'),
                field: $(this).data('field'),
                _token: CSRF_TOKEN

            },
            fileUploadErrorCallback: function () {
                alert('There was an error uploading your file.');
            },

            /**
             * File Manager
             */
            imageUpload: APPLICATION_URL + '/streams/wysiwyg-field_type/upload',
            imageManagerJson: APPLICATION_URL + '/streams/wysiwyg-field_type/images/' + $(this).data('disk') + '/' + $(this).data('field'),
            uploadImageFields: {
                folder: 'images',
                disk: $(this).data('disk'),
                field: $(this).data('field'),
                _token: CSRF_TOKEN

            },
            imageUploadErrorCallback: function () {
                alert('There was an error uploading your image.');
            }
        });
    });
});
