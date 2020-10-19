@extends('admin.index')
@section('meta')
    <title>Уведомления</title>
@endsection

@section('content')
    <h4>Уведомления</h4>
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
            <tr>

                <td>{{ $notification->title }}</td>
                <td>{{ $notification->name }}</td>
                <td>{{ $notification->phone }}</td>
                <td>{{ $notification->text }}</td>
                <td>
                    <form action="{{ route('delete_notifications') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $notification->id }}" name="id">
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
