@extends('index')
@section('meta')
    <title>Водоснабжение</title>
    <meta name="description" lang="ru" content="ДСВ – Інновації для Вашого успіху">
    <meta name="keywords" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:title" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:type" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:description" content="ДСВ – Інновації для Вашого успіху">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <span>Водоснабжение</span>
            </div>
        </div>
        <div class="stocks">
            <div class="wrapper">
                <h1 class="title title-s">Водоснабжение</h1>
                <div class="stocks-preview">

                    @foreach($waters as $water)

                        <div class="stocks-preview-item">
                            <div class="stocks-preview-item-img"><img src="/images/{{ $water->img }}"
                                                                      alt="stocks-prev-img"></div>
                            <div class="stocks-preview-item-cnt">
                                <a href="/water/{{ $water->id }}" class="stocks-preview-item-title">{{ $water->title }}</a>
                                <p>{!! mb_strimwidth($water->description, 0, 100, "...") !!}</p>
                                <a href="/water/{{ $water->id }}" class="stocks-preview-item-more">подробнее</a>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

