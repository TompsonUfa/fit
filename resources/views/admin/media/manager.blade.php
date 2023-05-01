<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>

    @vite(['resources/sass/app.scss', 'resources/sass/style.scss', 'resources/js/editorAdmin.js', 'resources/js/editorManager.js'])

    <title>@yield('title')</title>
</head>

<body>
    <input type="hidden" id="CKEditorFuncNum" value="{{ $CKEditorFuncNum }}">
    <div class="container">
        <div class="file-manager row p-4 my-5">
            <div class="col-12 file-manager__header">
                <h3 class="title file-manager__title mb-4">Файлы</h3>
                <a class="btn btn-primary close">Закрыть</a>
            </div>
            <div class="file-manager__files">
                @foreach ($files as $file)
                    <div class="col-12 mb-1">
                        <a class="file" data-url="/private/media/{{ $file->caption }}" href="#">
                            @if ($file->mimeType == 'image/jpeg')
                                <img class="file__icon" src="/private/media/{{ $file->caption }}"
                                    alt={{ $file->caption }}>
                            @else
                                <svg class="file__icon" viewBox="0 0 24.00 24.00" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M4 15V9C4 7.89543 4.89543 7 6 7H13C14.1046 7 15 7.89543 15 9V15C15 16.1046 14.1046 17 13 17H6C4.89543 17 4 16.1046 4 15Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M18.3753 8.29976L15.3753 10.6998C15.1381 10.8895 15 11.1768 15 11.4806V12.5194C15 12.8232 15.1381 13.1105 15.3753 13.3002L18.3753 15.7002C19.0301 16.2241 20 15.7579 20 14.9194V9.08062C20 8.24212 19.0301 7.77595 18.3753 8.29976Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            @endif
                            <div class="file__name">
                                {{ str_limit($file->caption, $limit = 30, $end = '...') }}
                            </div>
                            {{-- ({{ $file->size }}) --}}
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- <a class="close" href="#"></a> --}}
        </div>
    </div>
</body>

</html>
