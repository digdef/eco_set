@extends('admin.index')
@section('meta')
    <title>Все наши работы</title>
@endsection

@section('content')
    <h4>Наши работы</h4>
    <a class="btn btn-success" href="/admin/ourWorks/add">Добавить</a>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ourWorks as $ourWork)
            <tr>

                <th scope="row">{{ $ourWork->id }}</th>
                <td>{{ $ourWork->title }}</td>
                <td>
                    <form action="{{ route('delete_ourWorks') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $ourWork->id }}" name="id">
                        <a href="{!! route('edit_ourWorks', [$ourWork->id]) !!}" class='btn btn-success'>Изменить</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
