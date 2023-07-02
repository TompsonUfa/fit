@extends('admin.index')

@section('title', 'Панель администратора | Редактировать курс')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5 mb-5 ">
            <div class="row">
                <div class="col-12">
                    <h2 class="panel__title mb-3">
                        Редактировать Курс «{{ $course->title }}»
                    </h2>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="sending-post">
                @csrf
                <div class="row justify-content-center mb-3">
                    <div class="col-12 text-center mb-3">
                        <div class="col-12">
                            <div class="file-input">
                                <img class="prev-img mb-3"
                                    src="/storage/images/courses/{{ $course->id }}/{{ Str::slug($course->title) . '.webp?=r' . rand(0, 999999) }}">
                                <p class="prev-name mb-3"></p>
                                <input type="file" id="image" name="image" class="image"
                                    accept=".jpg,.png,.jpeg,.gif,.webp,.svg">
                                <label for="image" class="btn btn-success">
                                    Изменить фотографию
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Город</label>
                            <select name="city" class="form-select" id="inputGroupSelect01">
                                @foreach ($cities as $city)
                                    @if($city->id == $course->city_id)
                                        <option selected value={{$city->id}}>
                                            {{$city->name}}
                                        </option>
                                    @else
                                        <option value={{$city->id}}>
                                            {{$city->name}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputTitle" class="form-label">Заголовок курса</label>
                            <input type="text" name="title" class="form-control" id="exampleInputTitle"
                                value="{{ $course->title }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputDesc" class="form-label">Краткое описание курса</label>
                            <input type="text" name="desc" value="{{ $course->desc }}" class="form-control"
                                id="exampleInputDesc">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputTime" class="form-label">Длительность (Кол-во месяцев)</label>
                            <select id="exampleInputTime" class="form-select" name="time" aria-label="Default select example">
                                @for ($i = 1; $i <= 10; $i++)
                                    @if($course->time == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                    @else               
                                        <option value="{{$i}}">{{$i}}</option>       
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputPrice" class="form-label">Цена</label>
                            <input type="text" name="price" value="{{ $course->price }}" class="form-control form-control_number"
                                id="exampleInputPrice">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleInputDate" class="form-label">Старт обучения</label>
                            <input class="form-control" type="date" name="date" value="{{$course->date != null ? date('Y-m-d', strtotime($course->date)) : '' }}" 
                            id="exampleInputDate">
                        </div>
                    </div>
                    <div class="col-12">
                        <textarea class="wysiwyg" id="wysiwyg" name="text">{{ $course->text }}</textarea>
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

