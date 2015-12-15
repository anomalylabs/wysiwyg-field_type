$(function () {

    var uploaded = [];

    var uploader = $('#upload');
    var element = $('.dropzone');
    var template = uploader.find('.template');
    var preview = template.html();

    template.remove();

    var dropzone = new Dropzone('.dropzone',
        {
            paramName: 'upload',
            url: '/streams/wysiwyg-field_type/handle',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            sending: function (file, xhr, formData) {
                formData.append('folder', element.data('folder'));
            },

            autoQueue: true,
            thumbnailWidth: 24,
            thumbnailHeight: 24,
            previewTemplate: preview,
            previewsContainer: '.uploads',
            maxFilesize: element.data('max-size'),
            acceptedFiles: element.data('allowed'),
            parallelUploads: element.data('max-parallel'),
            dictDefaultMessage: element.data('icon') + ' ' + element.data('message')
        }
    );

    // While file is in transit.
    dropzone.on('sending', function (file) {

        uploader.find('.uploaded .modal-body').html(element.data('uploading') + '...');

        // If a preview is not possible - use no-preview.
        var images = ['jpeg', 'jpg', 'png', 'bmp', 'gif'];
        var regex = /(?:\.([^.]+))?$/;
        var extension = regex.exec(file.name)[1];

        extension = extension.toLowerCase();

        if (images.indexOf(extension) == -1) {
            file.previewElement.querySelector('img').remove();
        }
    });

    // When file successfully uploads.
    dropzone.on('success', function (file) {

        var response = JSON.parse(file.xhr.response);

        uploaded.push(response.id);

        file.previewElement.querySelector('[data-progress="file"] .progress-bar').setAttribute('class', 'progress-bar progress-bar-success');

        setTimeout(function () {
            file.previewElement.remove();
        }, 500);
    });

    // When file fails to upload.
    dropzone.on('error', function (file) {
        file.previewElement.querySelector('[data-progress="file"] .progress-bar').setAttribute('class', 'progress-bar progress-bar-danger');
    });

    // When all files are processed.
    dropzone.on('queuecomplete', function () {

        uploader.find('.uploaded .modal-body').html(element.data('loading') + '...');

        uploader.find('.uploaded').load('/streams/wysiwyg-field_type/recent?' + $.param({
            mode: element.data('mode'),
            uploaded: uploaded.join(',')
        }));
    });
});
