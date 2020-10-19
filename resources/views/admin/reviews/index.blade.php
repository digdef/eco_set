@extends('admin.index')
@section('meta')
    <title>Отзывы</title>
@endsection

@section('content')
    <h4>Отзывы</h4>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">Тип</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Изображения</td>
            <td>
                <a href="/admin/reviews/all/1" class='btn btn-success'>Изменить</a>
            </td>
        </tr>
        <tr>
            <td>Видео</td>
            <td>
                <a href="/admin/reviews/all/2" class='btn btn-success'>Изменить</a>
            </td>
        </tr>
        <tr>
            <td>Текст</td>
            <td>
                <a href="/admin/reviews/all/3" class='btn btn-success'>Изменить</a>
            </td>
        </tr>
        <tr>
            <td>Аудио</td>
            <td>
                <a href="/admin/reviews/all/4" class='btn btn-success'>Изменить</a>
            </td>
        </tr>

        </tbody>
    </table>
@endsection
