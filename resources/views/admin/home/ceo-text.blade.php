@extends('admin.index')
@section('meta')
    <title>Создание товара</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="/admin/ceo-text">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="meta_title">title</label>
                    <input name="meta_title" id="meta_title" class="form-control" type="text"
                           value="{{ $ceo_text->meta_title }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="meta_description">description</label>
                    <input name="meta_description" id="meta_description" class="form-control" type="text"
                           value="{{ $ceo_text->meta_description }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title1">Заголовок 1</label>
                    <input type="text" name="title1" id="title1" class="form-control" value="{{ $ceo_text->title1 }}">
                    <label for="text1">Текст 1</label>
                    <textarea name="text1" id="text1" class="form-control">{!! $ceo_text->text1 !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="title2">Заголовок 2</label>
                    <input type="text" name="title2" id="title2" class="form-control" value="{{ $ceo_text->title2 }}">
                    <label for="text2">Текст 2</label>
                    <textarea name="text2" id="text2" class="form-control">{!! $ceo_text->text2 !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title3">Заголовок 3</label>
                    <input type="text" name="title3" id="title3" class="form-control" value="{{ $ceo_text->title3 }}">
                    <label for="text3">Текст 3</label>
                    <textarea name="text3" id="text3" class="form-control">{!! $ceo_text->text3 !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="title4">Заголовок 4</label>
                    <input type="text" name="title4" id="title4" class="form-control" value="{{ $ceo_text->title4 }}">
                    <label for="text4">Текст 4</label>
                    <textarea name="text4" id="text4" class="form-control">{!! $ceo_text->text4 !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="text5">Текст 5</label>
                    <textarea name="text5" id="text5" class="form-control">{!! $ceo_text->text5 !!}</textarea>
                </div>
            </div>

            <div id="add-product-block">
                @foreach($links as $link)
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="title_link">Название</label>
                            <input type="text" name="title_link[]" id="title_link" class="form-control" value="{{ $link->title }}">
                        </div>

                        <div class="form-group col-md-5 col-sm-12">
                            <label for="link">Ссылка</label>
                            <input type="text" name="link[]" id="link" class="form-control" value="{{ $link->link }}">
                        </div>
                        <div class="col-1" style="display: flex; align-items: center; margin-top: 15px">
                            <button type="button" class="btn btn-danger"
                                    onclick="$(this).closest('.form-row').remove();">Удалить Блок
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" class="btn btn-primary" onclick='plus()'>+ Ссылка</button>


            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>

    <div style="display: none" id="example">
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title_link">Название</label>
                <input type="text" name="title_link[]" id="title_link" class="form-control">
            </div>

            <div class="form-group col-md-5 col-sm-12">
                <label for="link">Ссылка</label>
                <input type="text" name="link[]" id="link" class="form-control">
            </div>
            <div class="col-1" style="display: flex; align-items: center; margin-top: 15px">
                <button type="button" class="btn btn-danger"
                        onclick="$(this).closest('.form-row').remove();">Удалить Блок
                </button>
            </div>
        </div>
    </div>

    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace(document.getElementById('text1'));
        CKEDITOR.replace(document.getElementById('text2'));
        CKEDITOR.replace(document.getElementById('text3'));
        CKEDITOR.replace(document.getElementById('text4'));
        CKEDITOR.replace(document.getElementById('text5'));

        function plus() {
            $('#add-product-block').append($('#example').html());
        }
    </script>
@endsection
