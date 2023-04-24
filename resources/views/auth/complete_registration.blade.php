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
            <div class="login  p-4 p-md-5">
                <div class="login__img mb-3">
                    <img src="/logo.png" alt="О-ФИТ Школа фитнеса">
                </div>
                <h3 class="login__title text-center mb-3">Создать новый пароль</h3>
                <form action="{{route('password.update')}}" method="POST" class="login__form">
                    @csrf
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword" name="password"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Пароль 2</label>
                        <input type="password" class="form-control" id="exampleInputPassword" name="password_confirmation"
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
                    <button type="submit" class="btn btn-primary w-100">Изменить</button>
                </form>
            </div>

        </div>
    </div>
</div>
</body>

</html>
