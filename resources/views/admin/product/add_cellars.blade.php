@extends('admin.index')
@section('meta')
    <title>Создание товара</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('add_product') }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="cat" value="{{ $modification->category }}">
            <input type="hidden" name="modification" value="{{ $modification->id }}">


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

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="wiring_diagram">Монтажная схема</label><br>

                    <input type="file" name="wiring_diagram" id="wiring_diagram" class="input-file">
                    <label for="wiring_diagram" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить монтажную схему</span>
                    </label>
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="technical_certificate">Технический паспорт</label><br>
                    <input type="file" name="technical_certificate" id="technical_certificate" class="input-file">
                    <label for="technical_certificate" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить технический паспорт</span>
                    </label>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title">Название</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="price">Цена</label>
                    <input class="form-control" type="text" name="price" id="price">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="header_note">Примечание заголовка</label>
                    <input class="form-control" type="text" name="header_note" id="header_note">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="thumbnail">Краткое описание</label>
                    <textarea name="thumbnail" id="thumbnail" class="form-control"></textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="youtube_description">Описание YouTube</label>
                    <textarea name="youtube_description" id="youtube_description" class="form-control"></textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="youtube">Ссылка YouTube</label>
                    <input type="text" name="youtube" id="youtube" onchange=" this.value = this.value.replace('watch?v=', 'embed/')" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="elongate">Удлиненная горловина</label>
                    <select class="form-control" name="elongate" id="elongate">
                        <option value="Да">Да</option>
                        <option value="Нет">Нет</option>
                    </select>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="anchor">Якорение </label>
                    <select class="form-control" name="anchor" id="anchor">
                        <option value="Да">Да</option>
                        <option value="Нет">Нет</option>
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="equipment">Комплектация</label>
                    <input name="equipment" id="equipment" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="dimensions">Габариты </label>
                    <input name="dimensions" id="dimensions" class="form-control" type="text">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="entrance_size">Размер входа</label>
                    <input name="entrance_size" id="entrance_size" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="weight">Вес </label>
                    <input name="weight" id="weight" class="form-control" type="text">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="useful_volume">Полезный объем</label>
                    <input name="useful_volume" id="useful_volume" class="form-control" type="text">
                </div>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="1" id="action" name="action">
                <label class="form-check-label" for="action">Акция</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="1" id="new" name="new">
                <label class="form-check-label" for="new">Новинка</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="1" id="top" name="top">
                <label class="form-check-label" for="top">Топ</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="1" id="advise" name="advise">
                <label class="form-check-label" for="advise">Советуем</label>
            </div>


            <b>CEO</b>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title1">Заголовок 1</label>
                    <input type="text" name="title1" id="title1" class="form-control">
                    <label for="text1">Текст 1</label>
                    <textarea name="text1" id="text1" class="form-control"></textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="title2">Заголовок 2</label>
                    <input type="text" name="title2" id="title2" class="form-control">
                    <label for="text2">Текст 2</label>
                    <textarea name="text2" id="text2" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title3">Заголовок 3</label>
                    <input type="text" name="title3" id="title3" class="form-control">
                    <label for="text3">Текст 3</label>
                    <textarea name="text3" id="text3" class="form-control"></textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="title4">Заголовок 4</label>
                    <input type="text" name="title4" id="title4" class="form-control">
                    <label for="text4">Текст 4</label>
                    <textarea name="text4" id="text4" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="text5">Текст 5</label>
                    <textarea name="text5" id="text5" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="pinterest">Ссылка на pinterest</label>
                    <input class="form-control" type="text" name="pinterest" id="pinterest">
                </div>
            </div>

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace(document.getElementById('thumbnail'));
        CKEDITOR.replace(document.getElementById('description'));
        CKEDITOR.replace(document.getElementById('youtube_description'));
        CKEDITOR.replace(document.getElementById('text1'));
        CKEDITOR.replace(document.getElementById('text2'));
        CKEDITOR.replace(document.getElementById('text3'));
        CKEDITOR.replace(document.getElementById('text4'));
        CKEDITOR.replace(document.getElementById('text5'));
    </script>
@endsection
