@extends('admin.index')
@section('meta')
    <title>Редактирование товара</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('update_product') }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="cat" value="{{ $modification->category }}">
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="modification" value="{{ $modification->id }}">


            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img">Изображение</label>
                    @if($product->img)
                        <div style="width: 100%; height: 300px; background: url('/images/{{ $product->img }}') no-repeat center;background-size: contain;"></div>
                    @endif

                    <input type="file" name="img" id="img" class="input-file">
                    <label for="img" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>

                    {{--<input type="file" name="img">--}}
                    <input type="hidden" name="in_img" value="{{ $product->img ?? '' }}">
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="wiring_diagram">Монтажная схема</label><br>
                    {{--<input type="file" name="wiring_diagram">--}}
                    @if($product->wiring_diagram)
                        <p>Добавлена</p>
                        <button type="button" class="btn btn-danger" onclick="$(this).closest('.form-row').remove();">Удалить файл</button>
                    @endif

                    <input type="file" name="wiring_diagram" id="wiring_diagram" class="input-file">
                    <label for="wiring_diagram" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить монтажную схему</span>
                    </label>

                    <input type="hidden" name="in_wiring_diagram" value="{{ $product->wiring_diagram ?? '' }}">
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="technical_certificate">Технический паспорт</label><br>
                    {{--<input type="file" name="technical_certificate">--}}
                    @if($product->technical_certificate)
                        <p>Добавлена</p>
                        <button type="button" class="btn btn-danger" onclick="$(this).closest('.form-row').remove();">Удалить файл</button>
                    @endif

                    <input type="file" name="technical_certificate" id="technical_certificate" class="input-file">
                    <label for="technical_certificate" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить технический паспорт</span>
                    </label>

                    <input type="hidden" name="in_technical_certificate" value="{{ $product->technical_certificate ?? '' }}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title">Название</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $product->title }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="price">Цена</label>
                    <input class="form-control" type="text" name="price" id="price" value="{{ $product->price }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="header_note">Примечание заголовка</label>
                    <input class="form-control" type="text" name="header_note" id="header_note" value="{{ $product->header_note }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="thumbnail">Краткое описание</label>
                    <textarea name="thumbnail" id="thumbnail" class="form-control">{!! $product->thumbnail !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description"
                              class="form-control">{!! $product->description !!}</textarea>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="elongate">Удлиненная горловина</label>
                    <select class="form-control" name="elongate" id="elongate">
                        <option value="{{ $product->elongate }}">{{ $product->elongate }}</option>
                        @if($product->elongate == 'Нет')
                            <option value="Да">Да</option>
                        @else
                            <option value="Нет">Нет</option>
                        @endif
                    </select>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="anchor">Якорение </label>
                    <select class="form-control" name="anchor" id="anchor">
                        <option value="{{ $product->anchor }}">{{ $product->anchor }}</option>
                        @if($product->anchor == 'Нет')
                            <option value="Да">Да</option>
                        @else
                            <option value="Нет">Нет</option>
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="equipment">Комплектация</label>
                    <input name="equipment" id="equipment" class="form-control" type="text" value="{{ $product->equipment }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="dimensions">Габариты </label>
                    <input name="dimensions" id="dimensions" class="form-control" type="text" value="{{ $product->dimensions }}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="entrance_size">Размер входа</label>
                    <input name="entrance_size" id="entrance_size" class="form-control" type="text" value="{{ $product->entrance_size }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="weight">Вес </label>
                    <input name="weight" id="weight" class="form-control" type="text" value="{{ $product->weight }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="useful_volume">Полезный объем</label>
                    <input name="useful_volume" id="useful_volume" class="form-control" type="text" value="{{ $product->useful_volume }}">
                </div>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="1" id="action"
                       name="action" {{ $product->action ? 'checked' : '' }}>
                <label class="form-check-label" for="action">Акция</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="1" id="new"
                       name="new" {{ $product->new ? 'checked' : '' }}>
                <label class="form-check-label" for="new">Новинка</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="1" id="top"
                       name="top" {{ $product->top ? 'checked' : '' }}>
                <label class="form-check-label" for="top">Топ</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="1" id="advise"
                       name="advise" {{ $product->advise ? 'checked' : '' }}>
                <label class="form-check-label" for="advise">Советуем</label>
            </div>


            <b>CEO</b>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title1">Заголовок 1</label>
                    <input type="text" name="title1" id="title1" class="form-control" value="{{ $ceo_text->title1 ?? '' }}">
                    <label for="text1">Текст 1</label>
                    <textarea name="text1" id="text1" class="form-control">{{ $ceo_text->text1 ?? '' }}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="title2">Заголовок 2</label>
                    <input type="text" name="title2" id="title2" class="form-control" value="{{ $ceo_text->title2 ?? '' }}">
                    <label for="text2">Текст 2</label>
                    <textarea name="text2" id="text2" class="form-control">{{ $ceo_text->text2 ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title3">Заголовок 3</label>
                    <input type="text" name="title3" id="title3" class="form-control" value="{{ $ceo_text->title3 ?? '' }}">
                    <label for="text3">Текст 3</label>
                    <textarea name="text3" id="text3" class="form-control">{{ $ceo_text->text3 ?? '' }}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="title4">Заголовок 4</label>
                    <input type="text" name="title4" id="title4" class="form-control" value="{{ $ceo_text->title4 ?? '' }}">
                    <label for="text4">Текст 4</label>
                    <textarea name="text4" id="text4" class="form-control">{{ $ceo_text->text4 ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="text5">Текст 5</label>
                    <textarea name="text5" id="text5" class="form-control">{{ $ceo_text->text5 ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="pinterest">Ссылка на pinterest</label>
                    <input class="form-control" type="text" name="pinterest" id="pinterest" value="{{ $product->pinterest }}">
                </div>
            </div>

            <button class="btn btn-success">Сохранить</button>
        </form>
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
    </script>
@endsection
