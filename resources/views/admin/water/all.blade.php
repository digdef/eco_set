@extends('admin.index')
@section('meta')
    <title>Все статьи водоснабжения</title>
@endsection

@section('content')
    <h4>Водоснабжение</h4>
    <a class="btn btn-success" href="/admin/water/add">Добавить</a>
    <a class="btn btn-success" href="/admin/seo/waters">SEO текст</a>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>

                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>
                    <form action="{{ route('delete_water') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $article->id }}" name="id">
                        <a href="{!! route('edit_water', [$article->id]) !!}" class='btn btn-success'>Изменить</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
