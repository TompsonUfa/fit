@extends('admin.index')

@section('title', 'Панель администратора | Редактировать курс')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5 mb-5 ">
            <div class="row">
                <div class="col-12">
                    <h2 class="panel__title mb-3">
                        Редактировать секцию «Направления»
                    </h2>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="sending-post">
                @csrf
                <div class="row justify-content-center mb-3">
                    <div class="col-12 text-center mb-3">
                        <div class="col-12">
                            <div class="file-input">
                                @if (isset($direction))
                                    <img class="prev-img mb-3"
                                        src="/storage/images/direction/{{ 'shkola-fitnesa-dlya-trenerov-i-instruktorov.webp?=r' . rand(0, 999999) }}">
                                @else
                                    <img class="prev-img mb-3 d-block" src="/images/no-image.webp">
                                @endif
                                <p class="prev-name"></p>
                                <input type="file" id="image" name="image" class="image"
                                    accept=".jpg,.png,.jpeg,.gif,.webp,.svg">
                                <label for="image" class="btn btn-success">
                                    Изменить фотографию
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputTitle" class="form-label">Заголовок секции</label>
                            @if (isset($direction))
                                <input type="text" name="title" class="form-control" id="exampleInputTitle"
                                    value="{{ $direction->title }}">
                            @else
                                <input type="text" name="title" class="form-control" id="exampleInputTitle">
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        @if (isset($direction))
                            <textarea class="wysiwyg" name="text">{{ $direction->text }}</textarea>
                        @else
                            <textarea class="wysiwyg" name="text"></textarea>
                        @endif
                    </div>
                </div>
                <button class="btn btn-success panel__btn" type="submit">Сохранить</button>
            </form>
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

