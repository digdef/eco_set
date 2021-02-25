@extends('admin.index')
@section('meta')
    <title>Создание акции</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('add_stocks') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="title">Заголовок</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="percent">Процент скидки</label>
                    <input class="form-control" type="text" name="percent" id="percent">
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img">Изображение</label>
                    <span>Размер фото 547x254</span>
                    <input type="file" name="img" id="img" class="input-file">
                    <label for="img" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="finish">Дата окончания акции</label>
                    <input type="date" class="form-control" id="finish" name="finish">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="meta_title">title</label>
                    <input name="meta_title" id="meta_title" class="form-control" type="text">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="meta_description">description</label>
                    <input name="meta_description" id="meta_description" class="form-control" type="text">
                </div>
            </div>

            <div id="add-product-block">

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
