

$('.file').on('click', function (e) {
    window.opener.CKEDITOR.tools.callFunction( 1, 'http://localhost/media/'+$(this).html());
    window.close()
});
