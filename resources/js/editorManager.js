

$('.file').on('click', function (e) {
    window.opener.CKEDITOR.tools.callFunction(
        $('#CKEditorFuncNum').val(),
        $(this).data('url')
    );
    window.close()
});

$('.close').on('click', function () {
    window.close()
});
