@extends('admin.index')
@section('meta')
    <title>Почему мы</title>
@endsection

@section('content')
    <h4>Почему мы</h4>

    <form method="post" action="/admin/why_us" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="description1">Описание 1</label>
                <input class="form-control" type="text" name="description1" id="description1" value="{{ $why_us->description1 }}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="description2">Описание 2</label>
                <input class="form-control" type="text" name="description2" id="description2" value="{{ $why_us->description2 ?? '' }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="description3">Описание 3</label>
                <input class="form-control" type="text" name="description3" id="description3" value="{{ $why_us->description3  ?? ''}}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="description4">Описание 4</label>
                <input class="form-control" type="text" name="description4" id="description4" value="{{ $why_us->description4  ?? ''}}">
            </div>
        </div>

        <button class="btn btn-success">Сохранить</button>
    </form>

@endsection
