@extends('personal.layouts.app')

@section('title', 'Панель администратора | Курсы')

@section('content')
    <div class="row-12 bg-white">
        <div class="panel p-3 p-md-5 mt-5">
            <h2 class="panel__title mb-3">
                Курс - {{$course->caption}}
            </h2>
            <div>
                {!! $course->text !!}
            </div>
        </div>
    </div>

@endsection
