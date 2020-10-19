@extends('admin.index')
@section('meta')
    <title>Все товары</title>
@endsection

@section('content')
    <h4>Товары</h4>
    <a class="btn btn-success" href="/admin/product/{{ $id }}/add">Добавить</a>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Модификация</th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>

                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->title }}</td>
                <td>{{ $product->modification }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="{{ route('delete_product') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <a href="{!! route('edit_product', [$product->id]) !!}" class='btn btn-success'>Изменить</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
