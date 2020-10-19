@extends('admin.index')
@section('meta')
    <title>Как купить</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="/admin/howToBuy">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="text1">Текст иконки 1</label>
                    <textarea name="text1" id="text1" class="form-control">{!! $howToBuy->text_icon1 !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="text2">Текст иконки 2</label>
                    <textarea name="text2" id="text2" class="form-control">{!! $howToBuy->text_icon2 !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="text3">Текст иконки 3</label>
                    <textarea name="text3" id="text3" class="form-control">{!! $howToBuy->text_icon3 !!}</textarea>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="text4">Текст иконки 4</label>
                    <textarea name="text4" id="text4" class="form-control">{!! $howToBuy->text_icon4 !!}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="text5">Текст</label>
                    <textarea name="text5" id="text5" class="form-control">{!! $howToBuy->text !!}</textarea>
                </div>
            </div>

            <button type="button" class="btn btn-primary" onclick='plus()'>+ Ссылка</button>


            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>

    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace(document.getElementById('text1'));
        CKEDITOR.replace(document.getElementById('text2'));
        CKEDITOR.replace(document.getElementById('text3'));
        CKEDITOR.replace(document.getElementById('text4'));
        CKEDITOR.replace(document.getElementById('text5'));
    </script>
@endsection
