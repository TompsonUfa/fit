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
                    <div class="login__img mb-4">
                        <img src="/logo.png" alt="О-ФИТ Школа фитнеса">
                    </div>
                    <h3 class="login__title text-center mb-4">Авторизация</h3>
                    <form action="" method="POST" class="login__form">
                        @csrf
                        <div class="login__wrap-input mb-4">
                            <input class="form-control login__input" id="email" type="email" name="email"
                                placeholder="Email" required>
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
                        </div>
                        <div class="login__wrap-input mb-4">
                            <input class="form-control login__input" id="password" type="password" name="password"
                                placeholder="Пароль" required>
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
                        <div class="w-100 text-start mb-4">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" />
                                <svg viewBox="0 0 21 18">
                                    <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69"
                                            fill="none" stroke-width="2.25" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </symbol>
                                    <defs>
                                        <mask id="tick">
                                            <use class="tick mask" href="#tick-path" />
                                        </mask>
                                    </defs>
                                    <use class="tick" href="#tick-path" stroke="currentColor" />
                                    <path fill="white" mask="url(#tick)"
                                        d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                                </svg>
                                <svg class="lines" viewBox="0 0 11 11">
                                    <path d="M5.88086 5.89441L9.53504 4.26746" />
                                    <path d="M5.5274 8.78838L9.45391 9.55161" />
                                    <path d="M3.49371 4.22065L5.55387 0.79198" />
                                </svg>
                                Запомнить
                            </label>
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

                        <button type="submit" class="btn login__btn">Войти</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
