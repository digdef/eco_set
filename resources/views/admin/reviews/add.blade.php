@extends('admin.index')
@section('meta')
    <title>Создание отзыва</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('add_reviews') }}" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="type" value="{{ $type }}">

            <div class="form-row">
                <div class="form-group col-md-6 col-12">
                    <label for="title">Заголовок</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>
            </div>

            @if($type == 1)
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
            @elseif($type == 2)
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="content">Ссылка на видео</label>
                        <input type="text" name="content" id="content" onchange=" this.value = this.value.replace('watch?v=', 'embed/')" class="form-control">
                    </div>
                </div>
            @elseif($type == 3)
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="content">Описание</label>
                        <textarea name="content" id="content" class="form-control"></textarea>
                    </div>
                </div>
            @elseif($type == 4)
                <div class="form-row example-2">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="content">Аудио</label><br>
                        <input type="file" name="img" id="img" class="input-file">
                        <label for="img" class="btn btn-tertiary js-labelFile">
                            <i class="icon fa fa-check"></i>
                            <span class="js-fileName">Загрузить Аудио</span>
                        </label>
                    </div>
                </div>
            @endif


            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
    @if($type == 3)
        <script src="/js/libs/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace(document.getElementById('content'));
        </script>
    @endif

@endsection
