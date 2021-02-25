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
                    <textarea name="thumbnail" id="thumbnail" class="form-control">{{ $product->thumbnail }}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description"
                              class="form-control">{{ $product->description }}</textarea>
                </div>
            </div>



            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="youtube_description">Описание YouTube</label>
                    <textarea name="youtube_description" id="youtube_description" class="form-control">{{ $product->youtube_description }}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="youtube">Ссылка YouTube</label>
                    <input type="text" name="youtube" id="youtube" onchange=" this.value = this.value.replace('watch?v=', 'embed/')" class="form-control" value="{!! $product->youtube !!}">
                </div>
            </div>





            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="insert_depth">Глубина врезки</label>
                    <input name="insert_depth" id="insert_depth" class="form-control" type="text"
                           value="{{ $product->insert_depth }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="reset_type">Тип сброса</label>
                    <select class="form-control" name="reset_type" id="reset_type">
                        <option value="{{ $product->reset_type }}">{{ $product->reset_type }}</option>
                        @if($product->reset_type == 'Самотечный')
                            <option value="Принудительный">Принудительный</option>
                        @else
                            <option value="Самотечный">Самотечный</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="type_septic">Тип септика</label>
                    <select class="form-control" name="type_septic" id="type_septic">
                        <option value="{{ $product->type_septic }}">{{ $product->type_septic }}</option>
                        @if($product->type_septic == 'Станции биологической очистки')
                            <option value="Био - септики">Био - септики</option>
                        @else
                            <option value="Станции биологической очистки">Станции биологической очистки</option>
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="persons">Количество человек</label>
                    <input name="persons" id="persons" class="form-control" type="text" value="{{ $product->persons }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="type_of_shell">Тип корпуса</label>
                    <select class="form-control" name="type_of_shell" id="type_of_shell">
                        <option value="{{ $product->type_of_shell }}">{{ $product->type_of_shell }}</option>
                        @if($product->type_of_shell == 'Цилиндрический')
                            <option value="Прямоугольный">Прямоугольный</option>
                        @else
                            <option value="Цилиндрический">Цилиндрический</option>
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="performance">Производительность</label>
                    <input name="performance" id="performance" class="form-control" type="text"
                           value="{{ $product->performance }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="salvo_discharge">Залповый сброс</label>
                    <input name="salvo_discharge" id="salvo_discharge" class="form-control" type="text"
                           value="{{ $product->salvo_discharge }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="electricity_consumption">Потребление электроэнергии</label>
                    <input name="electricity_consumption" id="electricity_consumption" class="form-control" type="text"
                           value="{{ $product->electricity_consumption }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="weight">Масса</label>
                    <input name="weight" id="weight" class="form-control" type="text" value="{{ $product->weight }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="mounting">Монтаж "под ключ"</label>
                    <input name="mounting" id="mounting" class="form-control" type="text"
                           value="{{ $product->mounting }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="dimensions">Размеры</label>
                    <input name="dimensions" id="dimensions" class="form-control" type="text"
                           value="{{ $product->dimensions }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="type_of_drainage">Тип водоотвода</label>
                    <input name="type_of_drainage" id="type_of_drainage" class="form-control" type="text"
                           value="{{ $product->type_of_drainage }}">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="sink">Раковина</label>
                    <input name="sink" id="sink" class="form-control" type="text" value="{{ $product->sink }}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="bath">Ванна</label>
                    <input name="bath" id="bath" class="form-control" type="text" value="{{ $product->bath }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="toilet">Унитаз</label>
                    <input name="toilet" id="toilet" class="form-control" type="text" value="{{ $product->toilet }}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="washer">Стиралка</label>
                    <input name="washer" id="washer" class="form-control" type="text" value="{{ $product->washer }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="shower">Душ</label>
                    <input name="shower" id="shower" class="form-control" type="text" value="{{ $product->shower }}">
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
                    <label for="url">url</label>
                    <input name="url" id="url" class="form-control" type="text"
                           value="{{ $product->url }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="meta_title">title</label>
                    <input name="meta_title" id="meta_title" class="form-control" type="text"
                           value="{{ $product->meta_title }}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="meta_description">description</label>
                    <input name="meta_description" id="meta_description" class="form-control" type="text"
                           value="{{ $product->meta_description }}">
                </div>
            </div>


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
        CKEDITOR.replace(document.getElementById('thumbnail'));
        CKEDITOR.replace(document.getElementById('description'));
        CKEDITOR.replace(document.getElementById('youtube_description'));
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
