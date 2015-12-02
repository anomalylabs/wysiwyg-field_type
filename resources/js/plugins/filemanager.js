(function ($) {
    $.Redactor.prototype.filemanager = function () {
        return {
            init: function () {

                var manager = this.button.add('file', 'Insert File');
                var upload = this.button.add('upload', 'Upload File');

                this.button.addCallback(upload, this.filemanager.upload);
                this.button.addCallback(manager, this.filemanager.choose);
            },
            choose: function () {

                console.log(this.core.getElement().data('field'));

                var redactor = this;

                var modal = $('#' + this.opts.field + '-modal');

                modal.find('.modal-content').html('<div class="modal-loading"><div class="active loader"></div></div>');
                modal.modal('show').find('.modal-content').load('/streams/wysiwyg-field_type/index');

                modal.unbind().on('click', '[data-file]', function (e) {

                    e.preventDefault();

                    var text = redactor.selection.getText().length ? redactor.selection.getText() : APPLICATION_URL + '/files/' + $(this).data('entry');

                    redactor.file.insert('<a href="' + APPLICATION_URL + '/files/' + $(this).data('entry') + '">' + text + '</a>');

                    $(this).closest('.modal').modal('hide');
                });
            },
            upload: function () {

                var modal = $('#' + this.opts.field + '-modal');

                modal.find('.modal-content').html('<div class="modal-loading"><div class="active loader"></div></div>');
                modal.modal('show').find('.modal-content').load('/streams/wysiwyg-field_type/choose/' + this.opts.field);
            }
        };
    };
})(jQuery);