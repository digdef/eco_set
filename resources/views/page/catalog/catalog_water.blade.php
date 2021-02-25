@extends('index')
@section('meta')
    <title>{{ $ceo_text->meta_title ?? 'Водоснабжение' }}</title>
    <meta name="description" lang="ru" content="{{ $ceo_text->meta_description ?? 'Водоснабжение' }}">

    <meta property="og:title" content="{{ $ceo_text->meta_title ?? 'Водоснабжение' }}">
    <meta property="og:type" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:description" content="{{ $ceo_text->meta_description ?? 'Водоснабжение' }}">
    <link rel="canonical" href="{{ $url_not_get }}" />
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
        <div class="infoblock">
            <div class="wrapper">
{{--                <a href="index.html" class="logo"><img src="/images/logo.svg" alt="logo"></a>--}}
                <div class="infoblock-cnt">
                    <div class="infoblock-row">
                        <div class="infoblock-column">
                            <div class="paragraph-item">
                                <h5>{{ $ceo_text->title1 ?? '' }}</h5>
                                <p>{!!  $ceo_text->text1 ?? '' !!}</p>
                            </div>
                            <div class="paragraph-item">
                                <h5>{{ $ceo_text->title2 ?? '' }}</h5>
                                <p>{!!  $ceo_text->text2 ?? '' !!}</p>
                            </div>
                        </div>
                        <div class="infoblock-column">
                            <div class="paragraph-item">
                                <h5>{{ $ceo_text->title3 ?? '' }}</h5>
                                <p>{!!  $ceo_text->text3 ?? '' !!}</p>
                            </div>
                            <div class="paragraph-item">
                                <h5>{{ $ceo_text->title4 ?? '' }}</h5>
                                <p>{!!  $ceo_text->text4 ?? '' !!}</p>
                            </div>
                        </div>
                    </div>
                    <p>{!!  $ceo_text->text5 ?? '' !!}</p>

                </div>
            </div>
        </div>
    </div>
@endsection

