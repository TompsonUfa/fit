<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    @vite(['resources/sass/app.scss'])
    <title>Фитнес клуб Ө-FIT | Авторизация</title>
</head>

<body>
    <div class="container py-5 vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                <form action="" method="POST">
                    @csrf
                    <h3 class="title mb-3 text-center">Авторизация</h3>
                    <div class="mb-3">
                        <label for="email" class="form-label">Логин</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword" name="password" required>
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
</body>

</html>
