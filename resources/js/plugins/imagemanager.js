(function ($) {
    $.Redactor.prototype.imagemanager = function () {
        return {
            init: function () {

                var button = this.button.add('image', 'Insert Image');

                this.button.setIcon(button, '<i class="fa fa-picture-o"></i>');

                this.button.addDropdown(
                    button,
                    {
                        select: {title: 'Select Image', func: this.imagemanager.select},
                        upload: {title: 'Upload Image', func: this.imagemanager.upload}
                    }
                );

                $('#' + this.opts.element.attr('name') + '-modal').on(
                    'click',
                    '[data-select="image"]',
                    this.imagemanager.insert
                );
            },
            select: function () {

                this.selection.save();

                var params = this.imagemanager.params();

                $('#' + this.opts.element.attr('name') + '-modal')
                    .modal('show')
                    .find('.modal-content')
                    .load('/streams/wysiwyg-field_type/index?' + params);
            },
            upload: function () {

                this.selection.save();

                var params = this.imagemanager.params();

                $('#' + this.opts.element.attr('name') + '-modal')
                    .modal('show')
                    .find('.modal-content')
                    .load('/streams/wysiwyg-field_type/choose?' + params);
            },
            insert: function (e) {

                this.selection.restore();

                this.buffer.set();
                this.air.collapsed();

                var url = '/files/' + $(e.target).data('entry');

                this.insert.node($('<img />').attr('src', url));

                $(e.target).closest('.modal').modal('hide');

                return false;
            },
            params: function () {
                return $.param({
                    mode: 'image',
                    folders: this.opts.folders
                });
            }
        };
    };
})(jQuery);