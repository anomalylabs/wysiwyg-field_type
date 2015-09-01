$(function () {

    // Initialize WYSIWYG editors.
    $('textarea.wysiwyg').each(function () {
        $(this).redactor({
            buttons: $(this).data('buttons').split(','),
            plugins: $(this).data('plugins').split(','),
            minHeight: $(this).data('height'),
            placeholder: $(this).attr('placeholder'),
            fileUpload: APPLICATION_URL + '/streams/wysiwyg-field_type/upload',
            fileManagerJson: '/images/images.json',
            uploadFileFields: {
                disk: $(this).data('disk'),
                _token: CSRF_TOKEN

            },
            imageUpload: APPLICATION_URL + '/streams/wysiwyg-field_type/upload',
            imageManagerJson: '/images/images.json',
            uploadImageFields: {
                disk: $(this).data('disk'),
                _token: CSRF_TOKEN

            },
            imageUploadErrorCallback: function () {
                alert('There was an error uploading your image.');
            }
        });
    });
});
