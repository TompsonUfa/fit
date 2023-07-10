@extends('layouts.page')
@section('desc', 'Школа фитнеса «O-fit»: ' . $course['title'] . ' в г.' . $city->name)
@section('keywords', $city->keywords . ', ' . $course['title'])
@section('title', 'Школа фитнеса в Уфе | фитнес клуб Ө-FIT | '. $course->title)

@section('content')
    <a href="/#courses" class="d-block mb-3">На главную</a>
    <div class="page">
        <div class="row">
            <div class="col-12">
                <div class="page__content row">
                    <div class="col-12 mb-3 mb-lg-0 col-lg-5 d-flex justify-content-center">
                        <div class="page__img">
                            <img src="/storage/images/courses/{{ $course['id'] }}/{{ $course['img'] . '.webp?=r' . rand(0, 999999) }}"
                                alt="{{ $course['fullName'] }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <h1 class="page__title ">{{$course->title}}</h1>
                        <p class="page__desc ">
                            {!!$course['desc']!!}
                        </p>
                        <div class="page__text">
                            {!!$course['text']!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection