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
                    <label for="type_of_shell">Тип корпуса</label>
                    <select class="form-control" name="type_of_shell" id="type_of_shell">
                        <option value="Цилиндрический">Цилиндрический</option>
                        <option value="Прямоугольный">Прямоугольный</option>
                    </select>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="reset_type">Тип сброса</label>
                    <select class="form-control" name="reset_type" id="reset_type">
                        <option value="Самотечный">Самотечный</option>
                        <option value="Принудительный">Принудительный</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="type_septic">Тип септика</label>
                    <select class="form-control" name="type_septic" id="type_septic">
                        <option value="Био - септики">Био - септики</option>
                        <option value="Станции биологической очистки">Станции биологической очистки</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="insert_depth">Глубина врезки</label>
                    <input name="insert_depth" id="insert_depth" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="type_of_drainage">Тип водоотвода</label>
                    <input name="type_of_drainage" id="type_of_drainage" class="form-control" type="text">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="performance">Производительность</label>
                    <input name="performance" id="performance" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="salvo_discharge">Залповый сброс</label>
                    <input name="salvo_discharge" id="salvo_discharge" class="form-control" type="text">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="electricity_consumption">Потребление электроэнергии</label>
                    <input name="electricity_consumption" id="electricity_consumption" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="weight">Масса</label>
                    <input name="weight" id="weight" class="form-control" type="text">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="mounting">Монтаж "под ключ"</label>
                    <input name="mounting" id="mounting" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="dimensions">Размеры</label>
                    <input name="dimensions" id="dimensions" class="form-control" type="text">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="persons">Количество человек</label>
                    <input name="persons" id="persons" class="form-control" type="text">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="sink">Раковина</label>
                    <input name="sink" id="sink" class="form-control" type="text">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="bath">Ванна</label>
                    <input name="bath" id="bath" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="toilet">Унитаз</label>
                    <input name="toilet" id="toilet" class="form-control" type="text">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="washer">Стиралка</label>
                    <input name="washer" id="washer" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="shower">Душ</label>
                    <input name="shower" id="shower" class="form-control" type="text">
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

            <div id="add-product-block">

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

            <div class="form-group col-md-6 col-sm-12">
                <label for="link">Ссылка</label>
                <input type="text" name="link[]" id="link" class="form-control">
            </div>
        </div>
    </div>

    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace(document.getElementById('thumbnail'));
        CKEDITOR.replace(document.getElementById('description'));
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
