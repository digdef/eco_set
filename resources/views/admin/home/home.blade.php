@extends('admin.index')
@section('meta')
    <title>Главная</title>
@endsection

@section('content')
    <h4>Главная</h4>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>Слайдер</td>
            <td>
                <a href="/admin/slider" class='btn btn-primary'>Перейти</a>
            </td>
        </tr>

        <tr>
            <td>Почему мы</td>
            <td>
                <a href="/admin/why_us" class='btn btn-primary'>Перейти</a>
            </td>
        </tr>

        <tr>
            <td>Топ</td>
            <td>
                <a href="/admin/top" class='btn btn-primary'>Перейти</a>
            </td>
        </tr>

        <tr>
            <td>Советуем </td>
            <td>
                <a href="/admin/advise" class='btn btn-primary'>Перейти</a>
            </td>
        </tr>

        <tr>
            <td>Новинки</td>
            <td>
                <a href="/admin/new" class='btn btn-primary'>Перейти</a>
            </td>
        </tr>

        <tr>
            <td>Акции</td>
            <td>
                <a href="/admin/stock" class='btn btn-primary'>Перейти</a>
            </td>
        </tr>

        <tr>
            <td>Баннера</td>
            <td>
                <a href="/admin/banners" class='btn btn-primary'>Перейти</a>
            </td>
        </tr>

        <tr>
            <td>CEO текст</td>
            <td>
                <a href="/admin/ceo-text" class='btn btn-primary'>Перейти</a>
            </td>
        </tr>


        </tbody>
    </table>
@endsection
