@extends('admin.index')
@section('meta')
    <title>Слайдер</title>
@endsection

@section('content')
    <h4>Слайдер</h4>

    <form method="post" action="/upload-img" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Заголовок</label>
                <input class="form-control" type="text" name="title1" id="title" value="{{ $slider->title1 ?? '' }}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="link">Ссылка</label>
                <input class="form-control" type="text" name="link1" id="link" value="{{ $slider->link1 ?? '' }}">
            </div>
        </div>

        <div class="form-row example-2">
            <div class="form-group col-md-6 col-sm-12">
                <label for="img">Изображение</label>
                @if($slider->img1)
                    <div style="width: 100%; height: 300px; background: url('/images/{{ $slider->img1 }}') no-repeat center;background-size: contain;"></div>
                @endif
                <input type="file" name="img1" id="img1" class="input-file">
                <label for="img1" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Загрузить Изображение</span>
                </label>
                <input type="hidden" name="in_img1" value="{{ $slider->img1 ?? '' }}">

            </div>
        </div>




        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Заголовок</label>
                <input class="form-control" type="text" name="title2" id="title" value="{{ $slider->title2  ?? ''}}">
                <input type="hidden" name="in-img1" value="{{ $slider->img1 ?? '' }}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="link">Ссылка</label>
                <input class="form-control" type="text" name="link2" id="link" value="{{ $slider->link2  ?? ''}}">
            </div>
        </div>

        <div class="form-row example-2">
            <div class="form-group col-md-6 col-sm-12">
                <label for="img">Изображение</label>
                @if($slider->img2)
                    <div style="width: 100%; height: 300px; background: url('/images/{{ $slider->img2 }}') no-repeat center;background-size: contain;"></div>
                @endif
                <input type="file" name="img2" id="img2" class="input-file">
                <label for="img2" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Загрузить Изображение</span>
                </label>
                <input type="hidden" name="in_img2" value="{{ $slider->img2 ?? '' }}">

            </div>
        </div>



        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Заголовок</label>
                <input class="form-control" type="text" name="title3" id="title" value="{{ $slider->title3  ?? ''}}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="link">Ссылка</label>
                <input class="form-control" type="text" name="link3" id="link" value="{{ $slider->link3  ?? ''}}">
            </div>
        </div>


        <div class="form-row example-2">
            <div class="form-group col-md-6 col-sm-12">
                <label for="img">Изображение</label>
                @if($slider->img3)
                    <div style="width: 100%; height: 300px; background: url('/images/{{ $slider->img3 }}') no-repeat center;background-size: contain;"></div>
                @endif
                <input type="file" name="img3" id="img3" class="input-file">
                <label for="img3" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Загрузить Изображение</span>
                </label>
                <input type="hidden" name="in_img3" value="{{ $slider->img3 ?? '' }}">

            </div>
        </div>













        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Заголовок</label>
                <input class="form-control" type="text" name="title4" id="title" value="{{ $slider->title4  ?? ''}}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="link">Ссылка</label>
                <input class="form-control" type="text" name="link4" id="link" value="{{ $slider->link4  ?? ''}}">
            </div>
        </div>


        <div class="form-row example-2">
            <div class="form-group col-md-6 col-sm-12">
                <label for="img">Изображение</label>
                @if($slider->img4)
                    <div style="width: 100%; height: 300px; background: url('/images/{{ $slider->img4 }}') no-repeat center;background-size: contain;"></div>
                @endif
                <input type="file" name="img4" id="img4" class="input-file">
                <label for="img4" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Загрузить Изображение</span>
                </label>
                <input type="hidden" name="in_img4" value="{{ $slider->img4 ?? '' }}">

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Заголовок</label>
                <input class="form-control" type="text" name="title5" id="title" value="{{ $slider->title5  ?? ''}}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="link">Ссылка</label>
                <input class="form-control" type="text" name="link5" id="link" value="{{ $slider->link5  ?? ''}}">
            </div>
        </div>


        <div class="form-row example-2">
            <div class="form-group col-md-6 col-sm-12">
                <label for="img">Изображение</label>
                @if($slider->img5)
                    <div style="width: 100%; height: 300px; background: url('/images/{{ $slider->img5 }}') no-repeat center;background-size: contain;"></div>
                @endif
                <input type="file" name="img5" id="img5" class="input-file">
                <label for="img5" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Загрузить Изображение</span>
                </label>
                <input type="hidden" name="in_img5" value="{{ $slider->img5 ?? '' }}">

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Заголовок</label>
                <input class="form-control" type="text" name="title6" id="title" value="{{ $slider->title6  ?? ''}}">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="link">Ссылка</label>
                <input class="form-control" type="text" name="link6" id="link" value="{{ $slider->link6  ?? ''}}">
            </div>
        </div>


        <div class="form-row example-2">
            <div class="form-group col-md-6 col-sm-12">
                <label for="img">Изображение</label>
                @if($slider->img6)
                    <div style="width: 100%; height: 300px; background: url('/images/{{ $slider->img6 }}') no-repeat center;background-size: contain;"></div>
                @endif
                <input type="file" name="img6" id="img6" class="input-file">
                <label for="img6" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Загрузить Изображение</span>
                </label>
                <input type="hidden" name="in_img3" value="{{ $slider->img6 ?? '' }}">

            </div>
        </div>




        <button class="btn btn-success">Сохранить</button>
    </form>

@endsection
