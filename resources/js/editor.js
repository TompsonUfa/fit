let config = {};

config.removePlugins = 'image,pwimage';

if ($('#wysiwyg').length)
    CKEDITOR.replace( 'wysiwyg', config);
