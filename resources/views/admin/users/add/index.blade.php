@extends('admin.index')

@section('title', 'Панель администратора | Добавить нового преподавателя')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5 mb-5 ">
            <div class="row">
                <div class="col-12">
                    <h1 class="panel__title mb-3">
                        Добавить пользователей
                    </h1>
                </div>
            </div>
            <div class="adding-users">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <label for="exampleInputTitle" class="form-label">Укажите одного или
                            несколько пользователей </label>
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-12 d-flex align-items-center gap-3">
                        <input type="text" name="title" class="adding-users__input form-control"
                            id="exampleInputTitle">
                        <div class="adding-users__add">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" fill="#4bd396" class="bi bi-plus-square"
                                viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="row adding-users__result">
                    <div class="col-12">
                        <h3 class="panel__title mb-3">Список добавленных пользователей</h3>
                    </div>
                    <div class="col-12">
                        <div class="adding-users__list mb-3">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-submit" type="submit">Создать</button>
            </div>
        </div>

    </div>
    <div class="alert alert-success position-fixed" style="display:none; bottom: 25px; right: 25px" role="alert"></div>
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModal">Внимание</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed top-0 start-0 loader">
        <p class="loader__bar"></p>
        <div class="spinner-grow" role="status">
        </div>
    </div>
@endsection
@push('scripts')
    @vite(['resources/sass/app.scss', 'resources/sass/style.scss', 'resources/js/sidebar.js', 'resources/js/bootstrap.js', 'resources/js/add-users.js'])
@endpush
