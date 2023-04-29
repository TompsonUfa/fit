@extends('personal.layouts.app')

@section('title', 'Фитнес клуб Ө-FIT | Личный кабинет')

@section('content')
    <div class="dashboard__content pt-5">
        <h1 class="title dashboard__title mb-5">Онлайн курсы:</h1>
        <div class="dashboard__сourses сourses gap-3 gap-md-5 row">
            @if (count($courses) > 0)
                @foreach ($courses as $course)
                    <div class="сourses__item ">
                        <a href="{{ route('course.detail', $course->id) }}" class="сourses__link">
                            <div class="сourses__bg"></div>
                            <div class="сourses__title">{{ $course->caption }}</div>
                            <time class="сourses__date" datetime="{{ $course->updated_at }}">
                                <span>Обновлен:</span> {{ $course->updated_at->translatedFormat('j F, Y') }}
                            </time>
                        </a>
                    </div>
                @endforeach
                {{ $courses->links() }}
            @else
                <p class="сourses__message">Список курсов пуст...</p>
            @endif
        </div>
    </div>
@endsection
