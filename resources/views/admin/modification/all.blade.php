@extends('admin.index')
@section('meta')
    <title>Все модификации</title>
@endsection

@section('content')
    <h4>Модификации</h4>
    <a class="btn btn-success" href="/admin/modification/{{ $id }}/add">Добавить</a>
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modifications as $modification)
            <tr>

                <th scope="row">{{ $modification->id }}</th>
                <td>{{ $modification->title }}</td>
                <td>
                    <form action="{{ route('delete_modification') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $modification->id }}" name="id">
                        <a href="{!! route('all_product', [$modification->id]) !!}" class='btn btn-primary'>Перейти</a>
                        <a href="{!! route('edit_modification', [$modification->id]) !!}" class='btn btn-success'>Изменить</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
