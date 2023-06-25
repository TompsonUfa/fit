@extends('admin.index')

@section('title', 'Панель администратора | Добавить Город')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5 mb-5 ">
            <div class="row">
                <div class="col-12">
                    <h2 class="panel__title mb-3">
                        Добавить Город
                    </h2>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="sending-post">
                @csrf
                <div class="row justify-content-center mb-3">                    
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputTitle" class="form-label">Название города</label>
                            <input type="text" name="name" class="form-control" id="exampleInputTitle">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputDomain" class="form-label">Домен</label>
                            <input type="text" name="domain" class="form-control" id="exampleInputDomain">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputDesc" class="form-label">Описание (SEO)</label>
                            <input type="text" name="desc" class="form-control" id="exampleInputDesc">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputWords" class="form-label">Ключевые слова (SEO)</label>
                            <input type="text" name="keywords" class="form-control" id="exampleInputWords">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success panel__btn" type="submit">Создать</button>
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

