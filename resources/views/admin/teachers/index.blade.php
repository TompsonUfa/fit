@extends('admin.index')



@section('title', 'Панель администратора | Преподаватели')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5">
            <h2 class="panel__title mb-3">
                Преподаватели
            </h2>
            <p class="panel__desc mb-3">
                Количество записей на сайте: <span class="panel__counter">{{ $total }}</span>
            </p>
            <a href="teachers/add" class="btn btn-success panel__btn mb-3">Добавить преподавателя
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
                    <div class="col-sm-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Фото</th>
                                    <th scope="col">ФИО</th>
                                    <th scope="col" class="text-center">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr data-item-id={{ $teacher['id'] }}>
                                        <td class="align-middle text-center">
                                            <img class="table__img"
                                                src="/storage/images/teachers/{{ $teacher['id'] . '/' . $teacher['img'] . '.webp?=r' . rand(0, 999999) }}"
                                                alt="{{ $teacher['fullName'] }}">
                                        </td>
                                        <td class="align-middle table__title">{{ $teacher['fullName'] }}</td>
                                        <td class="align-middle text-center">
                                            <a href="{{ url('admin/teachers/edit') }}{{ '/' . $teacher['id'] }}"
                                                class="table__btn table__btn_edit mx-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </a>
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
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Внимание</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <p class="modal-desc">Вы точно хотите удалить запись</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary btn_remove">Удалить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed top-0 start-0 loader">
        <div class="spinner-grow" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @push('scripts')
        @vite(['resources/sass/app.scss', 'resources/sass/style.scss', 'resources/js/sidebar.js', 'resources/js/bootstrap.js', 'resources/js/delete.js'])
    @endpush
@endsection
