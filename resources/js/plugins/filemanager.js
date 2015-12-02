(function ($) {
    $.Redactor.prototype.filemanager = function () {
        return {
            init: function () {

                var editor = this;

                this.button.addDropdown(
                    this.button.add('file', 'File'),
                    {
                        select: {title: 'Select File', func: this.filemanager.select},
                        upload: {title: 'Upload File', func: this.filemanager.upload}
                    }
                );

                $('#' + this.opts.element.data('field') + '-modal').on('click', '[data-select="file"]', function (e) {

                    e.preventDefault();

                    var url = APPLICATION_URL + '/files/' + $(this).data('entry');

                    var text = editor.selection.getText().length ? editor.selection.getText() : url;

                    editor.file.insert('<a href="' + url + '">' + text + '</a>');

                    $(this).closest('.modal').modal('hide');
                });
            },
            select: function () {

                var params = this.filemanager.params();

                $('#' + this.opts.element.data('field') + '-modal')
                    .modal('show')
                    .find('.modal-content')
                    .load('/streams/wysiwyg-field_type/index?' + params);
            },
            upload: function () {

                var params = this.filemanager.params();

                $('#' + this.opts.element.data('field') + '-modal')
                    .modal('show')
                    .find('.modal-content')
                    .load('/streams/wysiwyg-field_type/choose?' + params);
            },
            params: function () {
                return $.param({
                    mode: 'file',
                    folders: this.opts.folders
                });
            }
        };
    };
})(jQuery);