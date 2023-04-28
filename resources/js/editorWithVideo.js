// import Video from "@visao/ckeditor5-video/src/video";
// import VideoUpload from "@visao/ckeditor5-video/src/videoupload";


// function VideoUploadAdapterPlugin(editor) {
//     editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
//         return new VideoUploadAdapter(loader);
//     };
// }

ClassicEditor
    .create(
        document.querySelector('.wysiwyg_video'), {
            // plugins: [Video, VideoUpload],
            // extraPlugins: [VideoUploadAdapterPlugin],
            // toolbar: ['videoUpload'],
            // video: {
            //     upload: {
            //         types: ['mp4', 'webm', 'ogg', 'mkv'],
            //         allowMultipleFiles: false,
            //     }
            // }
            mediaEmbed: {
                providers: [
                    {
                        name: 'localhost',
                        url: /^localhost/,
                        html: match => {
                            console.log(match);

                            const url = 'http://' + match['input'];

                            console.log('match[\'input\']', match['input'])
                            console.log('url', url)

                            return (
                                '<video width="320" height="240" controls>' +
                                '<source src="' + url + '" type="video/mp4">' +
                                'Your browser does not support the video tag.' +
                                '</video> '
                            );
                        }
                    },
                    // More providers.
                    // ...
                ]
            },
            simpleUpload: {
                uploadUrl: '/panel/image/upload',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content'),
                }
            },
        }
    )
    .catch(error => {
        console.log(`error`, error)
    });
ClassicEditor.builtinPlugins.map(plugin => console.log(plugin.pluginName));


