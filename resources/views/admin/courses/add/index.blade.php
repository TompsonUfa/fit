@extends('admin.index')

@section('title', 'Панель администратора | Добавить новый курс')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5 mb-5 ">
            <div class="row">
                <div class="col-12">
                    <h2 class="panel__title mb-3">
                        Добавить Курс
                    </h2>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="sending-post">
                @csrf
                <div class="row justify-content-center mb-3">
                    <div class="col-12 text-center mb-3">
                        <div class="col-12">
                            <div class="file-input">
                                <img class="prev-img mb-3 d-block" src="/images/no-image.webp">
                                <p class="prev-name mb-3"></p>
                                <input type="file" id="image" name="image" class="file"
                                    accept=".jpg,.png,.jpeg,.gif,.webp,.svg">
                                <label for="image" class="btn btn-success">
                                    Добавить фотографию
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputTitle" class="form-label">Заголовок курса</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                id="exampleInputTitle">
                        </div>
                    </div>
                    <div class="col-12">
                        <textarea class="wysiwyg" name="text">{{ old('text') }}</textarea>
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
