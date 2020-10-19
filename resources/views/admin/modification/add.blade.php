@extends('admin.index')
@section('meta')
    <title>Создание модификации</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('add_modification') }}">

            @csrf

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="title">Название</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>
            </div>
            <input type="hidden" name="cat" value="{{ $category }}">


            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
