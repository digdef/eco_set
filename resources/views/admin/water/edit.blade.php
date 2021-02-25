@extends('admin.index')
@section('meta')
    <title>Редактирование водоснабжение</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('update_water') }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="id" value="{{ $article->id ?? '' }}">

            <div class="form-row">
                <div class="form-group col-md-6 col-12">
                    <label for="title">Заголовок</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $article->title }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control">{!! $article->description !!}</textarea>
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img">Изображение</label>
                    @if($article->img)
                        <div style="width: 100%; height: 300px; background: url('/images/{{ $article->img }}') no-repeat center;background-size: contain;"></div>
                    @endif

                    <input type="file" name="img" id="img" class="input-file">
                    <label for="img" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>
                    <input type="hidden" name="in_img" value="{{ $article->img ?? '' }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-12">
                    <label for="pinterest">pinterest</label>
                    <input class="form-control" type="text" name="pinterest" id="pinterest" value="{{ $article->pinterest }}">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="url">url</label>
                    <input class="form-control" type="text" name="url" id="url" value="{{ $article->url }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="meta_title">title</label>
                    <input name="meta_title" id="meta_title" class="form-control" type="text"
                           value="{{ $article->meta_title }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="meta_description">description</label>
                    <input name="meta_description" id="meta_description" class="form-control" type="text"
                           value="{{ $article->meta_description }}">
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
