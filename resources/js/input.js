$(function () {

    // Initialize WYSIWYG editors.
    $('textarea.wysiwyg').each(function () {
        $(this).redactor({
            buttons: $(this).data('buttons').split(','),
            plugins: $(this).data('plugins').split(','),
            minHeight: $(this).data('height'),
            placeholder: $(this).attr('placeholder'),
            lang: $(this).data('locale')
        });
    });
});
