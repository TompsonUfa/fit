<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico'/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/editorWithVideo2.js', 'resources/js/editorManager.js'])

    <title>@yield('title')</title>
</head>

<body>
<div class="container-fluid">
    @foreach($files as $file)
        <div class="row">
            <div class="col">
                <a class="file" href="#">{{$file}}</a>
            </div>
        </div>
    @endforeach
</div>

</body>

</html>
