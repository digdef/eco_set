@extends('admin.index')
@section('meta')
<title>Seo</title>
@endsection

@section('content')
<div class="main">

    <form method="post" action="{{ route('seo.update', $seo->id) }}">
        {{ method_field('PUT') }}
        @csrf

        <b>{{ $seo->type }}</b>
        <input type="hidden" name="id" value="{{ $seo->id }}">

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="meta_title">title</label>
                <input name="meta_title" id="meta_title" class="form-control" type="text"
                       value="{{ $seo->meta_title }}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="meta_description">description</label>
                <input name="meta_description" id="meta_description" class="form-control" type="text"
                       value="{{ $seo->meta_description }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title1">Заголовок 1</label>
                <input type="text" name="title1" id="title1" class="form-control" value="{{ $seo->title1 }}">
                <label for="text1">Текст 1</label>
                <textarea name="text1" id="text1" class="form-control">{!! $seo->text1 !!}</textarea>
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="title2">Заголовок 2</label>
                <input type="text" name="title2" id="title2" class="form-control" value="{{ $seo->title2 }}">
                <label for="text2">Текст 2</label>
                <textarea name="text2" id="text2" class="form-control">{!! $seo->text2 !!}</textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title3">Заголовок 3</label>
                <input type="text" name="title3" id="title3" class="form-control" value="{{ $seo->title3 }}">
                <label for="text3">Текст 3</label>
                <textarea name="text3" id="text3" class="form-control">{!! $seo->text3 !!}</textarea>
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="title4">Заголовок 4</label>
                <input type="text" name="title4" id="title4" class="form-control" value="{{ $seo->title4 }}">
                <label for="text4">Текст 4</label>
                <textarea name="text4" id="text4" class="form-control">{!! $seo->text4 !!}</textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-12">
                <label for="text5">Текст 5</label>
                <textarea name="text5" id="text5" class="form-control">{{ $seo->text5 ?? '' }}</textarea>
            </div>
        </div>

        <button class="btn btn-success">Сохранить</button>
    </form>
</div>

<script src="/js/libs/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace(document.getElementById('text1'));
    CKEDITOR.replace(document.getElementById('text2'));
    CKEDITOR.replace(document.getElementById('text3'));
    CKEDITOR.replace(document.getElementById('text4'));
    CKEDITOR.replace(document.getElementById('text5'));
</script>
@endsection
