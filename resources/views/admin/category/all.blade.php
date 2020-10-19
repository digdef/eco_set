@extends('admin.index')
@section('meta')
    <title>Все производители</title>
@endsection

@section('content')
    <h4>Производители</h4>
    <a class="btn btn-success" href="/admin/category/{{ $id }}/add">Добавить</a>
    <a class="btn btn-success" href="/admin/category/{{ $id }}/ceo">CEO текст</a>
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>

                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>
                    <form action="{{ route('delete_category') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $category->id }}" name="id">
                        <a href="{!! route('all_modification', [$category->id]) !!}" class='btn btn-primary'>Перейти</a>
                        <a href="{!! route('edit_category', [$category->id]) !!}" class='btn btn-success'>Изменить</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
