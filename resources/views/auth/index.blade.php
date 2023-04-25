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
                            <input class="form-control login__input" id="email" type="email"
                                name="email" placeholder="Email" required>
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
                            <input class="form-control login__input" id="password" type="password"
                                name="password" placeholder="Пароль" required>
                            <div class="login__icon">
                                <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                    <style type="text/css">
                                        .st0{fill:none;}
                                        .st1{fill:#010101;}
                                    </style>
                                            <rect class="st0" width="24" height="24"></rect>
                                            <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"></path>
                                            <path class="st1" d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z"></path>
                                            <path class="st1" d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z"></path>
                                    </svg>
                            </div> 
                        </div>
                        <div class="form-group d-flex">
                            <div class="w-50 text-start">
                                <label class="login__remember">Remember Me
                                    <input type="checkbox" checked="">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                           <div class="w-50 text-end">
                                <a href="" >Сбросить пароль</a>
                           </div>
                        </div>
                       
                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-warning mt-4" role="alert">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                       
                        <button type="submit" class="btn login__btn mt-4">Войти</button>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
