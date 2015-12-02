(function ($) {
    $.Redactor.prototype.imagemanager = function () {
        return {
            init: function () {

                var manager = this.button.add('image', 'Insert Image');

                this.button.addCallback(manager, this.imagemanager.choose);
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

                    redactor.file.insert('<img src="' + APPLICATION_URL + '/files/' + $(this).data('entry') + '"/>');

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