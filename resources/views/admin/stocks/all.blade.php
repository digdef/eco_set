@extends('admin.index')
@section('meta')
    <title>Все акции</title>
@endsection

@section('content')
    <h4>Акции</h4>
    <a class="btn btn-success" href="/admin/stocks/add">Добавить</a>
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Окончание</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stocks as $stock)
            <tr>

                <th scope="row">{{ $stock->id }}</th>
                <td>{{ $stock->title }}</td>
                <td>{{ $stock->finish }}</td>
                <td>
                    <form action="{{ route('delete_stocks') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $stock->id }}" name="id">
                        <a href="{!! route('edit_stocks', [$stock->id]) !!}" class='btn btn-success'>Изменить</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
