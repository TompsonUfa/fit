<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    @vite(['resources/sass/app.scss', 'resources/sass/auth.scss'])
    <title>Фитнес клуб Ө-FIT | Авторизация</title>
</head>

<body>
    <div class="container py-5 vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-7 col-lg-5">
                <div class="login  p-4 p-md-5">
                    <div class="login__img mb-3">
                        <img src="/logo.png" alt="О-ФИТ Школа фитнеса">
                    </div>
                    <h3 class="login__title text-center mb-3">Авторизация</h3>
                    <form action="" method="POST" class="login__form">
                        @csrf
                        {{-- <div class="form-group">
                            <input type="text" class="form-control login__input" id="email" type="email"
                                name="email" required>
                            <label class="login__label" for="email">Email:</label>
                            <div class="login__icon">
                                <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100"
                                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                    <style type="text/css">
                                        .st0 {
                                            fill: none;
                                        }
                                    </style>
                                    <g transform="translate(0 -952.36)">
                                        <path
                                            d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z">
                                        </path>
                                    </g>
                                    <rect class="st0" width="100" height="100"></rect>
                                </svg>
                            </div>
                        </div> --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="exampleInputPassword" name="password"
                                required>
                        </div>
                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-warning" role="alert">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Войти</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
