@extends('index')
@section('meta')
    <title>{{ $seo->meta_title ?? 'Карта сайта' }}</title>
    <meta name="description" lang="ru" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">
    <meta property="og:title" content="{{ $seo->meta_title ?? 'Карта сайта' }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <span>Карта сайта</span>
            </div>
        </div>
        <div class="website-map">
            <div class="wrapper">
                <h1 class="title title-s">карта сайта</h1>
                <div class="map-list">
                    <div class="map-item row-hidden">
                        <div class="map-item-title row-hidden-item">
                                <span class="row-hidden-trigger">
                                    <img class="minus-icon" src="/images/minus.svg" alt="minus">
                                    <img class="plus-icon" src="/images/plus.svg" alt="minus">
                                </span>
                            <a href="/catalog/1">Каталог</a>
                        </div>
                        <div class="map-item-category map-item row-hidden row-hidden-cnt">
                            <div class="map-item-title  row-hidden-item">
                                    <span class="row-hidden-trigger">
                                        <img class="minus-icon" src="/images/minus.svg" alt="minus">
                                        <img class="plus-icon" src="/images/plus.svg" alt="minus">
                                    </span>
                                <a href="/catalog/1">Септики</a>
                            </div>
                            <div class="map-item-links row-hidden-cnt">
                                @foreach($categories as $category)
                                    @if($category->type == 1)
                                        <a href="/catalog/1?manufacturer%5B%5D={{ $category->id }}">{{ $category->title }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="map-item-category map-item row-hidden row-hidden-cnt">
                            <div class="map-item-title  row-hidden-item">
                                    <span class="row-hidden-trigger">
                                        <img class="minus-icon" src="/images/minus.svg" alt="minus">
                                        <img class="plus-icon" src="/images/plus.svg" alt="minus">
                                    </span>
                                <a href="/catalog/2">Погреба</a>
                            </div>
                            <div class="map-item-links row-hidden-cnt">
                                @foreach($categories as $category)
                                    @if($category->type == 2)
                                        <a href="/catalog/2?manufacturer%5B%5D={{ $category->id }}">{{ $category->title }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="map-item-category map-item row-hidden row-hidden-cnt">
                            <div class="map-item-title  row-hidden-item">
                                    <span class="row-hidden-trigger">
                                        <img class="minus-icon" src="/images/minus.svg" alt="minus">
                                        <img class="plus-icon" src="/images/plus.svg" alt="minus">
                                    </span>
                                <a href="/catalog/3">Водоснабжение</a>
                            </div>
                            <div class="map-item-links row-hidden-cnt">
                                <a href="#">Водоснабжение</a>
                                <a href="#">Водоснабжение</a>
                                <a href="#">От магистрали в дом</a>
                            </div>
                        </div>
                        <div class="map-item-category map-item row-hidden row-hidden-cnt">
                            <div class="map-item-title  row-hidden-item">
                                    <span class="row-hidden-trigger">
                                        <img class="minus-icon" src="/images/minus.svg" alt="minus">
                                        <img class="plus-icon" src="/images/plus.svg" alt="minus">
                                    </span>
                                <a href="/catalog/4">Комплектующие</a>
                            </div>
                            <div class="map-item-links row-hidden-cnt">
                                @foreach($categories as $category)
                                    @if($category->type == 4)
                                        <a href="/catalog/4?manufacturer%5B%5D={{ $category->id }}">{{ $category->title }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/stocks">Акции</a>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/services">Услуги</a>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/articles">Статьи</a>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/ourWorks">Наши работы</a>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/price/1">Наши цены</a>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/reviews">Отзывы</a>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/howToBuy">Как купить</a>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/about">Компания</a>
                        </div>
                    </div>
                    <div class="map-item map-item-single">
                        <div class="map-item-title">
                            <a href="/contacts">Контакты</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

