@extends('admin.index')

@section('title', 'Панель администратора | Редактировать запись')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5 mb-5 ">
            <div class="row">
                <div class="col-12">
                    <h2 class="panel__title mb-3">
                        Редактировать запись «{{ $employment->name }}»
                    </h2>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="sending-post">
                @csrf
                <div class="row justify-content-center mb-3">
                    <div class="col-12 text-center mb-3">
                        <div class="col-12">
                            <div class="file-input">
                                @if (empty($employment->img))
                                    <img class="prev-img mb-3 d-none" src="/images/no-image.webp">
                                    <p class="prev-name mb-3">{{ $employment->video }}.mp4</p>
                                @else
                                    <img class="prev-img mb-3"
                                        src="/storage/media/employment/{{ $employment->id }}/{{ Str::slug($employment->img) . '.webp?=r' . rand(0, 999999) }}">
                                    <p class="prev-name mb-3"></p>
                                @endif
                                <input type="file" id="file" name="file" class="file"
                                    accept=".jpg,.png,.jpeg,.gif,.webp,.svg, .mp4">
                                <label for="file" class="btn btn-success">
                                    Изменить фотографию или видео
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputTitle" class="form-label">Заголовок записи</label>
                            <input type="text" name="title" class="form-control" id="exampleInputTitle"
                                value="{{ $employment->name }}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success panel__btn" type="submit">Сохранить</button>
            </form>
        </div>

    </div>
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
    @vite(['resources/sass/app.scss', 'resources/js/sidebar.js', 'resources/js/bootstrap.js', 'resources/js/change-img.js', 'resources/js/sending-posts.js'])
@endpush
