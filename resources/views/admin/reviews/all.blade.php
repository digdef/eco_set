@extends('admin.index')
@section('meta')
    <title>Все отзывы</title>
@endsection

@section('content')
    <h4>Отзывы</h4>
    <a class="btn btn-success" href="/admin/reviews/{{ $type }}/add">Добавить</a>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>

                <th scope="row">{{ $review->id }}</th>
                <td>{{ $review->title }}</td>
                <td>
                    <form action="{{ route('delete_reviews') }}" method="post" class='btn-group'>
                        @csrf
                        <input type="hidden" value="{{ $review->id }}" name="id">
                        <a href="{!! route('edit_reviews', [$review->id]) !!}" class='btn btn-success'>Изменить</a>
                        <button class='btn btn-danger' onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
