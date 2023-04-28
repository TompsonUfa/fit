@extends('admin.index')

@section('title', 'Панель администратора | Курсы')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5">
            <h2 class="panel__title mb-3">
                Курсы
            </h2>
            <p class="panel__desc mb-3">
                Количество курсов на сайте: <span class="panel__counter">{{ $total }}</span>
            </p>
            <a href="{{route('course.add')}}" class="btn btn-success panel__btn mb-3">Добавить курс
            </a>
        </div>
    </div>

    @push('scripts')
        @vite(['resources/sass/app.scss', 'resources/js/bootstrap.js', 'resources/js/sidebar.js', 'resources/js/delete.js'])
    @endpush
@endsection
