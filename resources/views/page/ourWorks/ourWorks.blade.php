@extends('index')
@section('meta')
    <title>{{ $seo->meta_title ?? 'Наши работы' }}</title>
    <meta name="description" lang="ru" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">

    <meta property="og:title" content="{{ $seo->meta_title ?? 'Наши работы' }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <span>Наши работы</span>
            </div>
        </div>
        <div class="services">
            <div class="wrapper">
                <h1 class="title title-s">Наши работы</h1>
                <div class="services-preview">
                    @foreach($ourWorks as $ourWork)
                        @php($arr = explode(' ',trim($ourWork->title)))
                        <div class="services-preview-item">
                            <div class="services-preview-item-cnt">
                                <a href="/ourWork/{{ $ourWork->id }}" class="services-preview-item-title">{{ $arr[0] }}</a>
                                <p>{{ strstr($ourWork->title," ") }}</p>
                                <a href="/ourWork/{{ $ourWork->id }}" class="services-preview-item-more">подробнее</a>
                            </div>
                            <a class="services-preview-item-img" href="#"><img src="/images/{{ $ourWork->img }}" alt="service-prev"></a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
