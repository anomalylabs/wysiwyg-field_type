(function($) {
    $.Redactor.prototype.imagemanager = function() {
        return {
            init: function() {

                var button = this.button.add('image', 'Insert Image');

                this.button.setIcon(button, '<i class="fa fa-picture-o"></i>');

                this.button.addDropdown(
                    button, {
                        select: {
                            title: 'Select Image',
                            func: this.imagemanager.select
                        },
                        upload: {
                            title: 'Upload Image',
                            func: this.imagemanager.upload
                        }
                    }
                );

                $('#' + this.opts.element.attr('name') + '-modal').on(
                    'click',
                    '[data-select="image"]',
                    this.imagemanager.insert
                );
            },
            select: function() {

                this.selection.save();

                var params = this.imagemanager.params();

                $('#' + this.opts.element.attr('name') + '-modal')
                    .modal('show')
                    .find('.modal-content')
                    .load(REQUEST_ROOT_PATH + '/streams/wysiwyg-field_type/index?' + params);
            },
            upload: function() {

                this.selection.save();

                var params = this.imagemanager.params();

                $('#' + this.opts.element.attr('name') + '-modal')
                    .modal('show')
                    .find('.modal-content')
                    .load(REQUEST_ROOT_PATH + '/streams/wysiwyg-field_type/choose?' + params);
            },
            insert: function(e) {

                this.selection.restore();

                this.buffer.set();
                this.air.collapsed();

                var file = $(e.target).data('entry');

                if (file == undefined) {

                    console.log(e);

                    alert('There was a problem attaching this image. Please try again.');

                    return false;
                }

                var url = REQUEST_ROOT_PATH + '/files/' + file;

                this.insert.node($('<img />').attr('src', url));

                $(e.target).closest('.modal').modal('hide');

                return false;
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
