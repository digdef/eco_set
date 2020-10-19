@extends('admin.index')
@section('meta')
    <title>Редактирование модификации</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('update_modification') }}">

            @csrf

            <input type="hidden" name="id" value="{{ $modification->id }}">
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="title">Название</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $modification->title }}">
                </div>
            </div>

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
