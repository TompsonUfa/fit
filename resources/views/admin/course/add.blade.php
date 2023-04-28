@extends('admin.index')

@section('title', 'Панель администратора | Курсы')

@section('content')
    <div class="row-12">

        <form action="{{route('course.add_')}}" method="POST" enctype="multipart/form-data" class="sending-post">
            @csrf
            <div class="row justify-content-center mb-3">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleInputTitle" class="form-label">Заголовок курса</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                               id="exampleInputTitle">
                    </div>
                </div>
                <div class="col-12">
                    <textarea class="wysiwyg_video" id="wysiwyg_video" name="text">{{ old('text') }}</textarea>
                </div>
            </div>
            <button class="btn btn-success panel__btn" type="submit">Сохранить</button>
        </form>


    </div>

@endsection


