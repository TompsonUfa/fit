<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />

    @vite(['resources/sass/app.scss', 'resources/sass/style.scss'])

    <title>@yield('title')</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-md-3 sidebar p-0">
                <div class="sidebar__content">
                    <div class="sidebar__logo">
                        <img src="/logo.png" alt="ШКОЛА ФИТНЕСА «Ө-FIT»">
                    </div>
                    <ul class="sidebar__nav nav">
                        <li class="nav__item {{ request()->is('admin/directions*') ? 'nav__item_active' : null }}">
                            <a href="{{ url('admin/directions') }}" class="nav__link">
                                Секция "Направления"
                            </a>
                        </li>
                        <li class="nav__item {{ request()->is('admin/page_courses*') ? 'nav__item_active' : null }}">
                            <a href="{{ url('admin/page_courses') }}" class="nav__link">
                                Секция "Курсы"
                            </a>
                        </li>
                        <li class="nav__item {{ request()->is('admin/posters*') ? 'nav__item_active' : null }}">
                            <a href="{{ url('admin/posters') }}" class="nav__link">
                                Секция "Афиши"
                            </a>
                        </li>
                        <li class="nav__item {{ request()->is('admin/teachers*') ? 'nav__item_active' : null }}">
                            <a href="{{ url('admin/teachers') }}" class="nav__link">
                                Секция "ПРЕПОДАВАТЕЛИ"
                            </a>
                        </li>
                        <li class="nav__item {{ request()->is('admin/employment*') ? 'nav__item_active' : null }}">
                            <a href="{{ url('admin/employment') }}" class="nav__link">
                                Секция "ТРУДОУСТРОЙСТВО"
                            </a>
                        </li>
                        <hr>
                        <li class="nav__item">
                            <a href="{{ route('private') }}" class="nav__link">
                                Просмотр личного кабинета
                            </a>
                        </li>
                        <li class="nav__item {{ request()->is('admin/users*') ? 'nav__item_active' : null }}">
                            <a href="{{ url('admin/users') }}" class="nav__link">
                                Пользователи
                            </a>
                        </li>
                        <li class="nav__item {{ request()->is('admin/course*') ? 'nav__item_active' : null }}">
                            <a href="{{ route('course.list') }}" class="nav__link">
                                Курсы
                            </a>
                        </li>
                        <hr>
                        <li class="nav__item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn nav__link">
                                    Выйти
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
                <div class="sidebar__btn_close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                        class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>
                </div>
            </div>
            <div class="col">
                <div class="burger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
    @stack('scripts')
    <script  type="module" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>

</body>

</html>
