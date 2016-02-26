(function ($) {
    $.Redactor.prototype.imagemanager = function () {
        return {
            init: function () {

                var editor = this;

                var button = this.button.add('image', 'Insert Image');

                this.button.setIcon(button, '<i class="fa fa-picture-o"></i>');

                this.button.addDropdown(
                    button,
                    {
                        select: {title: 'Select Image', func: this.imagemanager.select},
                        upload: {title: 'Upload Image', func: this.imagemanager.upload}
                    }
                );

                $('#' + this.opts.element.data('field') + '-modal').on('click', '[data-select="image"]', function (e) {

                    e.preventDefault();

                    var url = APPLICATION_URL + '/files/' + $(this).data('entry');

                    editor.file.insert('<img src="' + url + '"/>');

                    $(this).closest('.modal').modal('hide');
                });
            },
            select: function () {

                var params = this.imagemanager.params();

                $('#' + this.opts.element.data('field') + '-modal')
                    .modal('show')
                    .find('.modal-content')
                    .load('/streams/wysiwyg-field_type/index?' + params);
            },
            upload: function () {

                var params = this.imagemanager.params();

                $('#' + this.opts.element.data('field') + '-modal')
                    .modal('show')
                    .find('.modal-content')
                    .load('/streams/wysiwyg-field_type/choose?' + params);
            },
            params: function() {
                return $.param({
                    mode: 'image',
                    folders: this.opts.folders
                });
            }
        };
    };
})(jQuery);