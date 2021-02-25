@extends('admin.index')
@section('meta')
    <title>Seo</title>
@endsection

@section('content')
    <div class="main">
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>


            @foreach($seo as $ceo_text)
                <tr>
                    <td>{{ $ceo_text->type }}</td>
                    <td>
                        <a href="/admin/seo/{{ $ceo_text->type }}" class='btn btn-primary'>Перейти</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
