@extends('admin.index')
@section('meta')
    <title>Редактирование товара</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="/admin/about" enctype="multipart/form-data">

            @csrf

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img">Изображение</label>
                    @if($about->img1)
                        <div style="width: 100%; height: 300px; background: url('/images/{{ $about->img1 }}') no-repeat center;background-size: contain;"></div>
                    @endif

                    <input type="file" name="img" id="img" class="input-file">
                    <label for="img" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>

                    {{--<input type="file" name="img">--}}
                    <input type="hidden" name="in_img" value="{{ $about->img1 ?? '' }}">
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img2">Изображение</label>
                    @if($about->img2)
                        <div style="width: 100%; height: 300px; background: url('/images/{{ $about->img2 }}') no-repeat center;background-size: contain;"></div>
                    @endif

                    <input type="file" name="img2" id="img2" class="input-file">
                    <label for="img2" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>

                    {{--<input type="file" name="img">--}}
                    <input type="hidden" name="in_img2" value="{{ $about->img2 ?? '' }}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="text1">Текст 1</label>
                    <textarea name="text1" id="text1" class="form-control">{!! $about->text1 !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="text2">Текст 2</label>
                    <textarea name="text2" id="text2"
                              class="form-control">{!! $about->text2 !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="text3">Текст 3</label>
                    <textarea name="text3" id="text3"
                              class="form-control">{!! $about->text3 !!}</textarea>
                </div>
            </div>

            <b>Сертификаты</b>

            <div id="add-product-block">
                @foreach($reviews as $review)
                    <div class="form-row example-2">

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="img">Изображение</label>
                            <div style="width: 100%; height: 300px; background: url('/images/{{ $review->content }}') no-repeat center;background-size: contain;"></div>
                            <input type="hidden" name="img_about_in[]" value="{{ $review->content ?? '' }}">
                            <button type="button" class="btn btn-danger"
                                    onclick="$(this).closest('.form-row').remove();">Удалить Блок
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" class="btn btn-primary" onclick='plus()'>+ сертификат</button>

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>


    <div style="display: none" id="example">
        <div class="form-row example-2">
            <div class="form-group col-md-6 col-sm-12">
                <label for="img">Изображение</label>

                <input type="file" name="img_about[]" id="img">

            </div>
        </div>
    </div>

    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace(document.getElementById('text1'));
        CKEDITOR.replace(document.getElementById('text2'));
        CKEDITOR.replace(document.getElementById('text3'));

        function plus() {
            $('#add-product-block').append($('#example').html());
        }
    </script>
@endsection
