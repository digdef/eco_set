@extends('admin.index')
@section('meta')
    <title>Создание статьи водоснабжение</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('add_water') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
                <div class="form-group col-md-6 col-12">
                    <label for="title">Заголовок</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img">Изображение</label>
                    <input type="file" name="img" id="img" class="input-file">
                    <label for="img" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-12">
                    <label for="pinterest">pinterest</label>
                    <input class="form-control" type="text" name="pinterest" id="pinterest">
                </div>
            </div>

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>

    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace(document.getElementById('description'));
    </script>
@endsection
