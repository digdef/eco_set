@extends('admin.index')
@section('meta')
    <title>Редактирование акции</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('update_stocks') }}" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="id" value="{{ $stock->id ?? '' }}">

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title">Заголовок</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $stock->title ?? '' }}">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="percent">Процент скидки</label>
                    <input class="form-control" type="text" name="percent" id="percent" value="{{ $stock->percent ?? '' }}">
                </div>
            </div>


            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img">Изображение</label>
                    @if($stock->img)
                        <div style="width: 100%; height: 300px; background: url('/images/{{ $stock->img }}') no-repeat center;background-size: contain;"></div>
                    @endif

                    <input type="file" name="img" id="img" class="input-file">
                    <span>Размер фото 547x254</span>

                    <label for="img" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>
                    <input type="hidden" name="in_img" value="{{ $stock->img ?? '' }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control">{!! $stock->description !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="finish">Дата окончания акции</label>
                    <input type="date" class="form-control" id="finish" name="finish" value="{{ $stock->finish ?? '' }}">
                </div>
            </div>


            <div id="add-product-block">

                @foreach($products_catalog as $catalog)
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="product">Товар</label>
                            <select class="form-control" name="product[]" id="product">
                                <option value="{{ $catalog->id }}">{{ $catalog->title }}</option>
                                @foreach($products as $product)
                                    @if($catalog->id != $product->id)
                                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6" style="display: flex; align-items: center; margin-top: 15px">
                            <button type="button" class="btn btn-danger"
                                    onclick="$(this).closest('.form-row').remove();">Удалить Блок
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" class="btn btn-primary" onclick='plus()'>+ товар</button>

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>

    <div style="display: none" id="example">
        <div class="form-row">
            <div class="form-group col-6">
                <label for="product">Товар</label>
                <select class="form-control" name="product[]" id="product">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6" style="display: flex; align-items: center; margin-top: 15px">
                <button type="button" class="btn btn-danger"
                        onclick="$(this).closest('.form-row').remove();">Удалить Блок
                </button>
            </div>
        </div>
    </div>
    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace(document.getElementById('description'));

        function plus() {
            $('#add-product-block').append($('#example').html());
        }
    </script>
@endsection
