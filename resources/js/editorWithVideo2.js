let config = {};

config.extraPlugins = 'filebrowser';

config.filebrowserUploadUrl = '/admin/media/upload?a=b';
config.filebrowserBrowseUrl = '/admin/media/manager';

config.extraPlugins = 'video';
config.extraPlugins = 'html5video';

config.fileTools_requestHeaders = {
    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content'),
};
if ($('#wysiwyg_video').length)
    CKEDITOR.replace( 'wysiwyg_video', config);
