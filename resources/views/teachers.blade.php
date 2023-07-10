@extends('layouts.page')
@section('desc', 'Школа фитнеса «O-fit»: '.$teacher['desc']. ' ' . $teacher['fullName'] . ' в г.' . $city->name)
@section('keywords', $city->keywords . ', ' . $teacher->fullName)
@section('title', 'Школа фитнеса в Уфе | фитнес клуб Ө-FIT | '. $teacher->fullName)

@section('content')
    <a href="/" class="d-block mb-3">На главную</a>
    <div class="page">
        <div class="row">
            <div class="col-12">
                <div class="page__content row">
                    <div class="col-12 mb-3 mb-lg-0 col-lg-5 d-flex justify-content-center">
                        <div class="page__img">
                            <img src="/storage/images/teachers/{{ $teacher['id'] }}/{{ $teacher['img'] . '.webp?=r' . rand(0, 999999) }}"
                                alt="{{ $teacher['fullName'] }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <h1 class="page__title ">{{$teacher->fullName}}</h1>
                        <p class="page__desc ">
                            {!!$teacher['desc']!!}
                        </p>
                        <div class="page__text">
                            {!!$teacher['text']!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection