<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    @vite(['resources/sass/app.scss', 'resources/sass/auth.scss'])
    <title>Фитнес клуб Ө-FIT | Создать новый пароль</title>
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
                    <form action="{{ route('registration.update') }}" method="POST" class="login__form">
                        @csrf
                        <div class="login__wrap-input mb-4">
                            <input class="form-control login__input" id="name" type="name" name="name"
                                placeholder="Ваше имя" required>
                            <div class="login__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </div>
                        </div>
                        <div class="login__wrap-input mb-4">
                            <input class="form-control login__input" id="password" type="password" name="password"
                                placeholder="Придумайте пароль" required>
                            <div class="login__icon">
                                <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24"
                                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                    <style type="text/css">
                                        .st0 {
                                            fill: none;
                                        }

                                        .st1 {
                                            fill: #010101;
                                        }
                                    </style>
                                    <rect class="st0" width="24" height="24"></rect>
                                    <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"></path>
                                    <path class="st1"
                                        d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z">
                                    </path>
                                    <path class="st1"
                                        d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="login__wrap-input mb-4">
                            <input class="form-control login__input" type="password" name="password_confirmation"
                                placeholder="Подтвердите пароль" required>
                            <div class="login__icon">
                                <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24"
                                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                    <style type="text/css">
                                        .st0 {
                                            fill: none;
                                        }

                                        .st1 {
                                            fill: #010101;
                                        }
                                    </style>
                                    <rect class="st0" width="24" height="24"></rect>
                                    <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"></path>
                                    <path class="st1"
                                        d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z">
                                    </path>
                                    <path class="st1"
                                        d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-warning mb-4" role="alert">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
