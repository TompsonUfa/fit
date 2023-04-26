<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    @vite(['resources/sass/app.scss', 'resources/sass/auth.scss'])
    <title>Фитнес клуб Ө-FIT | Восстановить пароль</title>
</head>

<body>
<div class="container py-5 vh-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-7 col-lg-5">
            <div class="login p-4 p-md-5">
                <div class="login__img mb-4">
                    <img src="/logo.png" alt="О-ФИТ Школа фитнеса">
                </div>
                <h3 class="login__title text-center mb-4">Ссылка для восстановления пароля отправлена на почту</h3>
            </div>
        </div>
    </div>
</div>
</body>

</html>
