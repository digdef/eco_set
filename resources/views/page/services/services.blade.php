@extends('index')
@section('meta')
    <title>{{ $seo->meta_title ?? 'Услуги' }}</title>
    <meta name="description" lang="ru" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">

    <meta property="og:title" content="{{ $seo->meta_title ?? 'Услуги' }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <span>Услуги</span>
            </div>
        </div>
        <div class="services">
            <div class="wrapper">
                <h1 class="title title-s">Услуги</h1>
                <div class="services-preview">
                    @foreach($services as $service)
                        @php($arr = explode(' ',trim($service->title)))
                        <div class="services-preview-item">
                            <div class="services-preview-item-cnt">
                                <a href="/service/{{ $service->id }}" class="services-preview-item-title">{{ $arr[0] }}</a>
                                <p>{{ strstr($service->title," ") }}</p>
                                <a href="/service/{{ $service->id }}" class="services-preview-item-more">подробнее</a>
                            </div>
                            <a class="services-preview-item-img" href="#"><img src="/images/{{ $service->img }}" alt="service-prev"></a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
