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
        <div class="col-12 mt-5">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Caption</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->caption}}</td>
                        <td>
                            <a href="{{route('course.edit', $course->id)}}">edit</a>
                        </td>
                        <td>
                            <form action="{{route('course.delete', $course->id)}}" method="post">
                                @csrf
                                <button type="submit">delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </table>

            {{ $courses->links()  }}

        </div>
    </div>

@endsection