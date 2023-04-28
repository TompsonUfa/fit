@extends('personal.layouts.app')


@section('title', 'Панель администратора | Курсы')

@section('content')
    <div class="row-12">
        <div class="panel p-3 p-md-5 mt-5">
            <h2 class="panel__title mb-3">
                Курсы
            </h2>
        </div>
        <div class="col-12 mt-5">
            <table class="table table-bordered bg-white">
                <tr>
                    <th>#</th>
                    <th>Caption</th>
                    <th></th>
                </tr>
                @foreach($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->caption}}</td>
                        <td>
                            <a href="{{route('course.detail', $course->id)}}">Read</a>
                        </td>
                    </tr>

                @endforeach
            </table>

            {{ $courses->links()  }}

        </div>
    </div>

@endsection
