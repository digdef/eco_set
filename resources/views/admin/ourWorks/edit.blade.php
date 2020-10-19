@extends('admin.index')
@section('meta')
    <title>Редактирование статьи</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('update_article') }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="id" value="{{ $ourWork->id ?? '' }}">

            <div class="form-row">
                <div class="form-group col-md-6 col-12">
                    <label for="title">Заголовок</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $ourWork->title }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control">{!! $ourWork->description !!}</textarea>
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img">Изображение</label>
                    @if($ourWork->img)
                        <div style="width: 100%; height: 300px; background: url('/images/{{ $ourWork->img }}') no-repeat center;background-size: contain;"></div>
                    @endif

                    <input type="file" name="img" id="img" class="input-file">
                    <label for="img" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>
                    <input type="hidden" name="in_img" value="{{ $ourWork->img ?? '' }}">
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
