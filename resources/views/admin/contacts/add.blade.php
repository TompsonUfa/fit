@extends('admin.index')

@section('title', 'Панель администратора | Добавить контакт')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5 mb-5 ">
            <div class="row">
                <div class="col-12">
                    <h2 class="panel__title mb-3">
                        Добавить контакт
                    </h2>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="sending-post">
                @csrf
                <div class="row justify-content-center mb-3">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Город</label>
                            <select name="city" class="form-select" id="inputGroupSelect01">
                                @foreach ($cities as $city)
                                    <option value={{$city->id}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="wysiwyg" class="form-label mb-3">Адрес</label>
                        <textarea class="wysiwyg" id="wysiwyg" name="address"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputPhone" class="form-label">Телефон</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputPhone">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="wysiwygTwo" class="form-label mb-3">Описание</label>
                        <textarea class="wysiwyg" id="wysiwygTwo" name="desc"></textarea>
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
