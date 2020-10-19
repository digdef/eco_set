@extends('admin.index')
@section('meta')
    <title>Баннера</title>
@endsection

@section('content')
    <h4>Баннера</h4>

    <form method="post" action="/admin/banners" enctype="multipart/form-data">
        @csrf

        {{--<div class="form-row">--}}
            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="title">Заголовок</label>--}}
                {{--<input class="form-control" type="text" name="title1" id="title" value="{{ $banners->title1 ?? '' }}">--}}
            {{--</div>--}}

            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="link">Ссылка</label>--}}
                {{--<input class="form-control" type="text" name="link1" id="link" value="{{ $banners->link1 ?? '' }}">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-row">--}}
            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="img">Изображение</label>--}}
                {{--@if($banners->img1)--}}
                    {{--<div style="width: 100%; height: 300px; background: url('http://127.0.0.1:8000/images/{{ $banners->img1 }}') no-repeat center;background-size: contain;"></div>--}}
                {{--@endif--}}

                {{--<input type="file" name="img1">--}}
                {{--<input type="hidden" name="img1" value="{{ $banners->img1 ?? '' }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{----}}
        {{--<div class="form-row">--}}
            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="title">Заголовок</label>--}}
                {{--<input class="form-control" type="text" name="title2" id="title" value="{{ $banners->title2  ?? ''}}">--}}
                {{--<input type="hidden" name="in-img1" value="{{ $banners->img1 ?? '' }}">--}}
            {{--</div>--}}

            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="link">Ссылка</label>--}}
                {{--<input class="form-control" type="text" name="link2" id="link" value="{{ $banners->link2  ?? ''}}">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-row">--}}
            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="img">Изображение</label>--}}
                {{--@if($banners->img2)--}}
                    {{--<div style="width: 100%; height: 300px; background: url('http://127.0.0.1:8000/images/{{ $banners->img2 }}') no-repeat center;background-size: contain;"></div>--}}
                {{--@endif--}}

                {{--<input type="file" name="img2">--}}
                {{--<input type="hidden" name="img2" value="{{ $banners->img2 ?? '' }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{----}}
        {{--<div class="form-row">--}}
            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="title">Заголовок</label>--}}
                {{--<input class="form-control" type="text" name="title3" id="title" value="{{ $banners->title3  ?? ''}}">--}}
            {{--</div>--}}

            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="link">Ссылка</label>--}}
                {{--<input class="form-control" type="text" name="link3" id="link" value="{{ $banners->link3  ?? ''}}">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-row">--}}
            {{--<div class="form-group col-md-6 col-sm-12">--}}
                {{--<label for="img">Изображение</label>--}}
                {{--@if($banners->img3)--}}
                    {{--<div style="width: 100%; height: 300px; background: url('http://127.0.0.1:8000/images/{{ $banners->img3 }}') no-repeat center;background-size: contain;"></div>--}}
                {{--@endif--}}
                {{--<input type="file" name="img3">--}}
                {{--<input type="hidden" name="img3" value="{{ $banners->img3 ?? '' }}">--}}
            {{--</div>--}}
        {{--</div>--}}


        <div class="form-row">
            <div class="form-group col-12">
                <label for="link">Ссылка "Монтаж канализации под ключ"</label>
                <input class="form-control" type="text" name="link1" id="link" value="{{ $banners->link1 ?? '' }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-12">
                <label for="link2">Ссылка "Доставка"</label>
                <input class="form-control" type="text" name="link2" id="link2" value="{{ $banners->link2 ?? '' }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-12">
                <label for="link3">Ссылка "Консультация и подбор"</label>
                <input class="form-control" type="text" name="link3" id="link3" value="{{ $banners->link3 ?? '' }}">
            </div>
        </div>



        <button class="btn btn-success">Сохранить</button>
    </form>

@endsection
