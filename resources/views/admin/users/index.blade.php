@extends('admin.index')

@section('title', 'Панель администратора | Пользователи')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5">
            <h2 class="panel__title mb-3">
                Пользователи
            </h2>
            <p class="panel__desc mb-3">
                Количество пользователей на сайте: <span class="panel__counter">{{ $total }}</span>
            </p>
            <a href="users/add" class="btn btn-success panel__btn mb-3">Добавить пользователей
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                </svg>
            </a>
            <div class="table-wrapper">
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6 ">
                        <form action="" class="form-search">
                            <label class="form-search__label">
                                Поиск:
                            </label>
                            <input autocomplete="off" method="GET" type="search" class="form-search__input form-control"
                                name="search" id="search" value="{{ $_GET['search'] ?? '' }}">
                            <button type="submit" class="btn btn-success form-search__btn">Найти</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 overflow-auto">
                        <table class="table table-striped table-bordered table-users">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">E-mail</th>
                                    <th scope="col" class="text-center">Срок доступа</th>
                                    <th scope="col" class="text-center">Статус доступа</th>
                                    <th scope="col" class="text-center">Продлить / Закрыть доступ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr data-item-id={{ $user->id }}>
                                        <td class="align-middle text-center table-users__email">{{ $user->email }}
                                        </td>
                                        <td class="align-middle text-center table-users__date">
                                            {{ $user->access_at }}</td>
                                        <td class="align-middle text-center table-users__status">
                                            {{ $user->blocked_at == null ? 'Открыт' : 'Закрыт' }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="table__btn table__btn_edit mx-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                                    <path
                                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                                </svg>
                                            </div>
                                            <div class="table__btn table__btn_remove mx-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-x-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-extend" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Продление доступа</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <p class="modal-desc modal-extend__user">
                        Пользовать: romanrus98@mail.ru
                    </p>
                    <p class="modal-desc modal-extend__date">
                        Cрок доступа: 2023-06-18 10:30:13
                    </p>
                    <input type="text" class="form-control modal-extend__input" placeholder="Пример: 1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary modal-extend__btn" disabled>Продлить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-success position-fixed" style="display:none; bottom: 25px; right: 25px" role="alert"></div>
    <div class="position-fixed top-0 start-0 loader">
        <div class="spinner-grow" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @push('scripts')
        @vite(['resources/sass/app.scss', 'resources/sass/style.scss', 'resources/js/sidebar.js', 'resources/js/bootstrap.js', 'resources/js/user-access.js'])
    @endpush
@endsection
