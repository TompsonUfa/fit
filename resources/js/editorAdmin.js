let config = {};

config.extraPlugins = 'filebrowser';

config.filebrowserUploadUrl = '/admin/media/upload?a=b';
config.filebrowserBrowseUrl = '/admin/media/manager';

config.extraPlugins = 'video';
config.extraPlugins = 'html5video';

config.fileTools_requestHeaders = {
    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content'),
};

if ($('#editor_admin').length)
    CKEDITOR.replace( 'editor_admin', config);
