@extends('admin.index')
@section('meta')
    <title>Акции</title>
@endsection

@section('content')
    <h4>Акции</h4>

    <form method="post" action="/top" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="4">
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
    <script>
        function plus() {
            $('#add-product-block').append($('#example').html());
        }
    </script>
@endsection
