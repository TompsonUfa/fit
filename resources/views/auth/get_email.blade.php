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
                <h3 class="login__title text-center mb-4">Создать новый пароль</h3>
                <form action="{{ route('password.get_email_') }}" method="POST" class="login__form">
                    @csrf
                    <div class="login__wrap-input mb-4">
                        <label>Добавить валидацию на мыло</label>
                        <input class="form-control login__input" id="email" type="text" name="email"
                               placeholder="Почта" required>
                        <div class="login__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </div>
                    </div>
                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-warning mb-4" role="alert">
                            <ul class="list-unstyled mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary w-100">Отправить письмо</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
