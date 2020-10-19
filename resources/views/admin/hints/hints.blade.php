@extends('admin.index')
@section('meta')
    <title>Подсказки</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="/admin/hints">
            @csrf

            <h3>Каталог</h3>
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="septic_type">Тип септика</label>
                    <textarea name="septic_type" id="septic_type" class="form-control">{!! $hint->septic_type !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="performance">Производительность </label>
                    <textarea name="performance" id="performance" class="form-control">{!! $hint->performance !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="persons">Количество человек</label>
                    <textarea name="persons" id="persons" class="form-control">{!! $hint->persons !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="reset_type">Тип сброса</label>
                    <textarea name="reset_type" id="reset_type" class="form-control">{!! $hint->reset_type !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inset_depth">Глубина врезки трубы</label>
                    <textarea name="inset_depth" id="inset_depth" class="form-control">{!! $hint->inset_depth !!}</textarea>
                </div>
            </div>

            <h3>Страница товара и Сравнение товаров</h3>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="modification">Модификация</label>
                    <textarea name="modification" id="modification" class="form-control">{!! $hint->modification !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="type_of_drainage">Тип водоотвода </label>
                    <textarea name="type_of_drainage" id="type_of_drainage" class="form-control">{!! $hint->type_of_drainage !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="performance_prod">Производительность</label>
                    <textarea name="performance_prod" id="performance_prod" class="form-control">{!! $hint->performance_prod !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="salvo_discharge">Залповый сброс</label>
                    <textarea name="salvo_discharge" id="salvo_discharge" class="form-control">{!! $hint->salvo_discharge !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="inset_depth_prod">Глубина врезки</label>
                    <textarea name="inset_depth_prod" id="inset_depth_prod" class="form-control">{!! $hint->inset_depth_prod !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="dimensions">Размеры</label>
                    <textarea name="dimensions" id="dimensions" class="form-control">{!! $hint->dimensions !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="electricity_consumption">Потребление электроэнергии</label>
                    <textarea name="electricity_consumption" id="electricity_consumption" class="form-control">{!! $hint->electricity_consumption !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="weight">Масса</label>
                    <textarea name="weight" id="weight" class="form-control">{!! $hint->weight !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="mounting">Монтаж "под ключ"</label>
                    <textarea name="mounting" id="mounting" class="form-control">{!! $hint->mounting !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="reset_type_prod">Тип сброса</label>
                    <textarea name="reset_type_prod" id="reset_type_prod" class="form-control">{!! $hint->reset_type_prod !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="entrance_size">Размер входа</label>
                    <textarea name="entrance_size" id="entrance_size" class="form-control">{!! $hint->entrance_size !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="useful_volume">Полезный объем</label>
                    <textarea name="useful_volume" id="useful_volume" class="form-control">{!! $hint->useful_volume !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="equipment">Комплектация</label>
                    <textarea name="equipment" id="equipment" class="form-control">{!! $hint->equipment !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="elongate">Удлиненная горловина</label>
                    <textarea name="elongate" id="elongate" class="form-control">{!! $hint->elongate !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="anchor">Якорение</label>
                    <textarea name="anchor" id="anchor" class="form-control">{!! $hint->anchor !!}</textarea>
                </div>
            </div>

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>

    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>

        CKEDITOR.replace(document.getElementById('septic_type'));
        CKEDITOR.replace(document.getElementById('performance'));
        CKEDITOR.replace(document.getElementById('persons'));
        CKEDITOR.replace(document.getElementById('reset_type'));
        CKEDITOR.replace(document.getElementById('inset_depth'));
        CKEDITOR.replace(document.getElementById('modification'));
        CKEDITOR.replace(document.getElementById('type_of_drainage'));
        CKEDITOR.replace(document.getElementById('performance_prod'));
        CKEDITOR.replace(document.getElementById('salvo_discharge'));
        CKEDITOR.replace(document.getElementById('inset_depth_prod'));
        CKEDITOR.replace(document.getElementById('dimensions'));
        CKEDITOR.replace(document.getElementById('electricity_consumption'));
        CKEDITOR.replace(document.getElementById('weight'));
        CKEDITOR.replace(document.getElementById('mounting'));
        CKEDITOR.replace(document.getElementById('reset_type_prod'));
        CKEDITOR.replace(document.getElementById('entrance_size'));
        CKEDITOR.replace(document.getElementById('useful_volume'));
        CKEDITOR.replace(document.getElementById('equipment'));
        CKEDITOR.replace(document.getElementById('elongate'));
        CKEDITOR.replace(document.getElementById('anchor'));
    </script>
@endsection
