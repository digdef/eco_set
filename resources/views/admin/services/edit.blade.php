@extends('admin.index')
@section('meta')
    <title>Редактирование услуги</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('update_services') }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="id" value="{{ $service->id ?? '' }}">

            <div class="form-row">
                <div class="form-group col-md-6 col-12">
                    <label for="title">Заголовок</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $service->title }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control">{!! $service->description !!}</textarea>
                </div>
            </div>

            <div class="form-row example-2">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="img">Изображение</label>
                    @if($service->img)
                        <div style="width: 100%; height: 300px; background: url('/images/{{ $service->img }}') no-repeat center;background-size: contain;"></div>
                    @endif

                    <input type="file" name="img" id="img" class="input-file">
                    <label for="img" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить Изображение</span>
                    </label>
                    <input type="hidden" name="in_img" value="{{ $service->img ?? '' }}">
                </div>
            </div>

            <button type="button" class="btn btn-primary" onclick='plus()'>+ товар</button>

            <button class="btn btn-success">Сохранить</button>
        </form>
    </div>

    <script src="/js/libs/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace(document.getElementById('description'));
    </script>
@endsection
