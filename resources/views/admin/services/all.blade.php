@extends('admin.index')
@section('meta')
    <title>Все услуги</title>
@endsection

@section('content')
    <h4>Услуги</h4>
    <a class="btn btn-success" href="/admin/services/add">Добавить</a>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>

                <th scope="row">{{ $service->id }}</th>
                <td>{{ $service->title }}</td>
                <td>
                    <form action="{{ route('delete_services') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $service->id }}" name="id">
                        <a href="{!! route('edit_services', [$service->id]) !!}" class='btn btn-success'>Изменить</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
