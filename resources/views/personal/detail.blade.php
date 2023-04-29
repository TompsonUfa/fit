@extends('personal.layouts.app')

@section('title', 'Панель администратора | Курсы')

@section('content')
    <div class="course mt-5 p-sm-3 p-md-5 ">
        <a class="course__link" href="/private">Назад</a>
        <h2 class="course__title my-3">Курс - {{ $course->caption }}</h2>
        <div class="course__desc">
            {!! $course->text !!}
        </div>
    </div>
@endsection
