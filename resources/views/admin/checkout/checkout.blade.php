@extends('admin.index')
@section('meta')
    <title>Заказы</title>
@endsection

@section('content')
    <h4>Заказы</h4>
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">Номер</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Почта</th>
            <th scope="col">Город</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Доставка</th>
            <th scope="col">Оплата</th>
            <th scope="col">Стоимость</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($checkouts as $checkout)
            <tr>

                <td>{{ $checkout->id }}</td>
                <td>{{ $checkout->name }}</td>
                <td>{{ $checkout->phone }}</td>
                <td>{{ $checkout->email }}</td>
                <td>{{ $checkout->city }}</td>
                <td>{{ $checkout->comment }}</td>
                <td>{{ $checkout->delivery }}</td>
                <td>{{ $checkout->payment }}</td>
                <td>{{ $checkout->total }}</td>
                <td>
                    <form action="{{ route('delete_checkout') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $checkout->id }}" name="id">
                        <a href="{!! route('edit_checkout', [$checkout->id]) !!}" class='btn btn-success'>Инфо</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
