@extends('index')
@section('meta')
    <title>{{ $seo->meta_title ?? 'Сравнение товаров' }}</title>
    <meta name="description" lang="ru" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">

    <meta property="og:title" content="{{ $seo->meta_title ?? 'Сравнение товаров' }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <span>Сравнение товаров</span>
            </div>
        </div>
        <div class="comparison">
            <div class="wrapper wrapper-m">
                <div class="wrapper">
                    <h1 class="title title-s">Сравнение товаров</h1>
                </div>
                <div class="comparison-list {{ count($comparisons) > 0 ? '' : 'no-cnt' }}" style="margin-bottom: 30px">
                    <p class="comparison-no-cnt">Нету товаров для сравнения!</p>
                </div>

                <div class="comparison-list {{ $comparisons_type1 > 0 ? '' : 'no-cnt' }}" style="margin-bottom: 30px">
                    <p class="comparison-no-cnt"></p>
                    @if($category_type->where('type', '=', 1)->first())
                        <div class="comparison-parameters">
                            <div class="comparison-top">
                                <p>параметры</p>
                            </div>
                            {{--<div class="comparison-row gray-row">--}}
                            {{--<div class="comparison-title">--}}
                            {{--<p>--}}
                            {{--<span>Модификация</span>--}}
                            {{--<a href="#" class="filter-item-info">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
                            {{--<defs>--}}
                            {{--<style>.cls-1 {--}}
                            {{--fill: #a6a6a6;--}}
                            {{--}</style>--}}
                            {{--</defs>--}}
                            {{--<g>--}}
                            {{--<g>--}}
                            {{--<path class="cls-1"--}}
                            {{--d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>--}}
                            {{--<path class="cls-1"--}}
                            {{--d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>--}}
                            {{--<path class="cls-1"--}}
                            {{--d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>--}}
                            {{--</g>--}}
                            {{--</g>--}}
                            {{--</svg>--}}
                            {{--<span class="filter-item-info-hidden">--}}
                            {{--<img src="/images/popup-close.svg" alt="icon-close">--}}
                            {{--Станции биологической очистки больше подходят для дома с постоянным проживанием, не требуют вызова ассенизационной машины, сервисное обслуживание рекомендуется производить не реже 1 раза в год.--}}
                            {{--Био-септики больше подойдут для использования на дачах, не требуют консервации, неприхотливы, но требуют вызова ассенизационной машины 1 раз в 2 года--}}
                            {{--</span>--}}
                            {{--</a>--}}
                            {{--</p>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="comparison-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Тип водоотвода</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->type_of_drainage) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row gray-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Производительность</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->performance) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Залповый сброс </span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->salvo_discharge) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row gray-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Глубина врезки</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->insert_depth) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Размеры</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->dimensions) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row gray-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Потребление электроэнергии</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->electricity_consumption) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Масса</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->weight) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row gray-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Монтаж "под ключ"</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->mounting) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="comparison-items-wrap">
                            <div class="comparison-items">
                                @foreach($products as $product)
                                    @if($category_type->where('product', '=', $product->id)->first()['type'] == 1)
                                        <div class="comparison-item">
                                            <div class="comparison-top comparison-top-item">
                                                <form class="comparison-form">
                                                    <div class="comparison-triggers item-triggers">

                                                        <input type="hidden" name="id_product"
                                                               value="{{ $product->id }}">
                                                        @csrf

                                                        <svg class="item-trigger btn_favorites {{ $favorites_user->contains($product->id) ? 'active' : '' }}"
                                                             width="25" height="24" version="1.1"
                                                             xmlns="http://www.w3.org/2000/svg"
                                                             x="0px" y="0px"
                                                             viewBox="0 0 90.7 87.9"
                                                             style="enable-background:new 0 0 90.7 87.9;"
                                                             xml:space="preserve">
                                                        <style type="text/css">
                                                            .st0 {
                                                                fill: #8DC63F;
                                                            }
                                                        </style>
                                                            <path class="st0" d="M88.7,39.8c1.8-1.8,2.4-4.3,1.6-6.7c-0.8-2.4-2.8-4.1-5.3-4.5l-22-3.2c-0.9-0.1-1.7-0.7-2.2-1.6L51.2,3.7
                                                        C50.1,1.4,47.8,0,45.4,0c-2.5,0-4.7,1.4-5.8,3.7l-9.8,20.1c-0.4,0.9-1.2,1.5-2.2,1.6l-22,3.2c-2.5,0.4-4.5,2.1-5.3,4.5
                                                        c-0.8,2.4-0.1,5,1.6,6.7l15.9,15.7c0.7,0.7,1,1.6,0.8,2.6l-3.8,22.1c-0.4,2.5,0.6,4.9,2.6,6.4c2,1.5,4.6,1.7,6.9,0.5L44,76.7
                                                        c0.8-0.4,1.8-0.4,2.7,0l19.6,10.4c1,0.5,2,0.8,3,0.8c1.3,0,2.7-0.4,3.8-1.3c2-1.5,3-3.9,2.6-6.4L72,58.1c-0.2-0.9,0.2-1.9,0.8-2.6
                                                        L88.7,39.8z M68.4,58.7l3.8,22.1c0.2,1.1-0.2,2.2-1.1,2.8c-0.9,0.7-2,0.7-3,0.2L48.4,73.4c-0.9-0.5-2-0.8-3-0.8s-2.1,0.3-3,0.8
                                                        L22.7,83.9c-1,0.5-2.1,0.4-3-0.2c-0.9-0.7-1.3-1.7-1.1-2.8l3.8-22.1c0.4-2.1-0.3-4.3-1.9-5.8L4.5,37.2c-0.8-0.8-1.1-1.9-0.7-3
                                                        c0.3-1.1,1.2-1.8,2.3-2l22-3.2c2.1-0.3,4-1.7,4.9-3.6l9.8-20.1c0.5-1,1.5-1.6,2.6-1.6c1.1,0,2.1,0.6,2.6,1.6l9.8,20.1
                                                        c0.9,1.9,2.8,3.3,4.9,3.6l22,3.2c1.1,0.2,2,0.9,2.3,2c0.3,1.1,0.1,2.2-0.7,3L70.3,52.9C68.8,54.4,68.1,56.5,68.4,58.7z"></path>
                                                    </svg>

                                                        <svg class="item-trigger delete-comparison" width="16"
                                                             height="16"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #d7d7d7;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M505.94,6.06a20.68,20.68,0,0,0-29.25,0L6.06,476.69a20.68,20.68,0,1,0,29.25,29.25L505.94,35.31A20.68,20.68,0,0,0,505.94,6.06Z"></path>
                                                                    <path class="cls-1"
                                                                          d="M505.94,476.69,35.31,6.06A20.68,20.68,0,0,0,6.06,35.31L476.69,505.94a20.68,20.68,0,1,0,29.25-29.25Z"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>

                                                </form>
                                                <div class="comparison-top-item-cnt">
                                                    <div class="comparison-top-item-img">
                                                        <img src="/images/{{ $product->img }}" alt="comparison">
                                                    </div>
                                                    <div class="comparison-top-item-info">
                                                        <a class="comparison-item-title"
                                                           href="{!! route('product', [$product->id]) !!}">{{ $product->title }}</a>
                                                        <p>{{ $product->price }} <span>руб</span></p>
                                                        <div>
                                                            <a href="{!! route('product', [$product->id]) !!}"
                                                               class="cart-trigger fix-trigger">
                                                                <svg width="30" height="29" version="1.1"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     x="0px" y="0px"
                                                                     viewBox="0 0 82.2 76.5"
                                                                     style="enable-background:new 0 0 82.2 76.5;"
                                                                     xml:space="preserve">
                                                            <style type="text/css">
                                                                .st0 {
                                                                    fill: #8DC63F;
                                                                }
                                                            </style>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st0" d="M81.9,11.1c-0.3-0.3-0.7-0.7-1.4-0.7H15.4l-1.7-9c0-0.7-1-1.4-1.7-1.4H1.7C0.7,0,0,0.7,0,1.7s0.7,1.7,1.7,1.7
                                                                        h8.9l8.2,42.4c1,5.6,6.2,9.7,11.6,9.7h39.4c1,0,1.7-0.7,1.7-1.7s-0.7-1.7-1.7-1.7h-39c-2.7,0-5.5-1.4-6.9-3.8l50-7
                                                                        c0.7,0,1.4-0.7,1.4-1.4l6.9-27.8C82.2,12.2,82.2,11.5,81.9,11.1z M72.3,38.3l-50,6.6l-6.2-31.3h62L72.3,38.3z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st0" d="M29.1,59.1c-4.8,0-8.6,3.8-8.6,8.7c0,4.9,3.8,8.7,8.6,8.7c4.8,0,8.6-3.8,8.6-8.7C37.7,63,33.9,59.1,29.1,59.1
                                                                        z M29.1,73.1c-2.7,0-5.1-2.4-5.1-5.2c0-2.8,2.4-5.2,5.1-5.2s5.1,2.4,5.1,5.2C34.3,70.6,31.9,73.1,29.1,73.1z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st0" d="M63.4,59.1c-4.8,0-8.6,3.8-8.6,8.7c0,4.9,3.8,8.7,8.6,8.7c4.8,0,8.6-3.8,8.6-8.7C71.9,63,68.2,59.1,63.4,59.1
                                                                        z M63.4,73.1c-2.7,0-5.1-2.4-5.1-5.2c0-2.8,2.4-5.2,5.1-5.2c2.7,0,5.1,2.4,5.1,5.2C68.5,70.6,66.1,73.1,63.4,73.1z"/>
                                                                        </g>
                                                                    </g>
                                                        </svg>
                                                            </a>
                                                            <a href="#" class="one-click-trigger link-text call-popup"
                                                               data-popup="oneClick">купить <br> в 1 клик</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--<div class="comparison-row gray-row">--}}
                                            {{--<p class="row-p">--}}
                                            {{--<span>Модификация</span>--}}
                                            {{--<a href="#" class="filter-item-info">--}}
                                            {{--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
                                            {{--<defs>--}}
                                            {{--<style>.cls-1 {--}}
                                            {{--fill: #a6a6a6;--}}
                                            {{--}</style>--}}
                                            {{--</defs>--}}
                                            {{--<g>--}}
                                            {{--<g>--}}
                                            {{--<path class="cls-1"--}}
                                            {{--d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>--}}
                                            {{--<path class="cls-1"--}}
                                            {{--d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>--}}
                                            {{--<path class="cls-1"--}}
                                            {{--d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>--}}
                                            {{--</g>--}}
                                            {{--</g>--}}
                                            {{--</svg>--}}
                                            {{--<span class="filter-item-info-hidden"><img--}}
                                            {{--src="/images/popup-close.svg"--}}
                                            {{--alt="icon-close">Станции биологической очистки больше подходят для дома с постоянным проживанием, не требуют вызова ассенизационной машины, сервисное обслуживание рекомендуется производить не реже 1 раза в год.--}}
                                            {{--Био-септики больше подойдут для использования на дачах, не требуют консервации, неприхотливы, но требуют вызова ассенизационной машины 1 раз в 2 года--}}
                                            {{--</span>--}}
                                            {{--</a>--}}
                                            {{--</p>--}}
                                            {{--<p>{{ $product->modification }}</p>--}}
                                            {{--</div>--}}
                                            <div class="comparison-row">
                                                <p class="row-p">
                                                    <span>Тип водоотвода </span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->type_of_drainage) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->type_of_drainage }}</p>
                                            </div>
                                            <div class="comparison-row gray-row">
                                                <p class="row-p">
                                                    <span>Производительность</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->performance) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->performance }} м3/сут.</p>
                                            </div>
                                            <div class="comparison-row">
                                                <p class="row-p">
                                                    <span>Залповый сброс</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->salvo_discharge) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->salvo_discharge }} л.</p>
                                            </div>
                                            <div class="comparison-row gray-row">
                                                <p class="row-p">
                                                    <span>Глубина врезки</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->insert_depth) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->insert_depth }} см.</p>
                                            </div>
                                            <div class="comparison-row">
                                                <p class="row-p">
                                                    <span>Размеры</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->dimensions) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->dimensions }} мм.</p>
                                            </div>
                                            <div class="comparison-row gray-row">
                                                <p class="row-p">
                                                    <span>Потребление электроэнергии</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->electricity_consumption) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->electricity_consumption }} кВт/сут</p>
                                            </div>
                                            <div class="comparison-row">
                                                <p class="row-p">
                                                    <span>Масса</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->weight) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->weight }} кг.</p>
                                            </div>
                                            <div class="comparison-row gray-row">
                                                <p class="row-p">
                                                    <span>Монтаж "под ключ"</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->mounting) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->mounting }} <span>руб</span></p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="comparison-list {{ $comparisons_type2 > 0 ? '' : 'no-cnt' }}" style="margin-bottom: 30px">
                    <p class="comparison-no-cnt"></p>
                    @if($category_type->where('type', '=', 2)->first())
                        <div class="comparison-parameters">
                            <div class="comparison-top">
                                <p>параметры</p>
                            </div>
                            <div class="comparison-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Удлиненная горловина</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->elongate) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row gray-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Габариты</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->weight) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Размер входа </span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->entrance_size) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row gray-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Вес</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->weight) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Полезный объем</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->useful_volume) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row gray-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Комплектация</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->equipment) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="comparison-row gray-row">
                                <div class="comparison-title">
                                    <p>
                                        <span>Якорение</span>
                                        <a href="#" class="filter-item-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <defs>
                                                    <style>.cls-1 {
                                                            fill: #a6a6a6;
                                                        }</style>
                                                </defs>
                                                <g>
                                                    <g>
                                                        <path class="cls-1"
                                                              d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                        <path class="cls-1"
                                                              d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                        <path class="cls-1"
                                                              d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="filter-item-info-hidden">
                                            <img src="/images/popup-close.svg" alt="icon-close">
                                                {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->anchor) !!}
                                        </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="comparison-items-wrap">
                            <div class="comparison-items">
                                @foreach($products as $product)
                                    @if($category_type->where('product', '=', $product->id)->first()['type'] == 2)
                                        <div class="comparison-item">
                                            <div class="comparison-top comparison-top-item">
                                                <form class="comparison-form">
                                                    <div class="comparison-triggers item-triggers">

                                                        <input type="hidden" name="id_product"
                                                               value="{{ $product->id }}">
                                                        @csrf

                                                        <svg class="item-trigger btn_favorites {{ $favorites_user->contains($product->id) ? 'active' : '' }}"
                                                             width="25" height="24" version="1.1"
                                                             xmlns="http://www.w3.org/2000/svg"
                                                             x="0px" y="0px"
                                                             viewBox="0 0 90.7 87.9"
                                                             style="enable-background:new 0 0 90.7 87.9;"
                                                             xml:space="preserve">
                                                        <style type="text/css">
                                                            .st0 {
                                                                fill: #8DC63F;
                                                            }
                                                        </style>
                                                            <path class="st0" d="M88.7,39.8c1.8-1.8,2.4-4.3,1.6-6.7c-0.8-2.4-2.8-4.1-5.3-4.5l-22-3.2c-0.9-0.1-1.7-0.7-2.2-1.6L51.2,3.7
                                                        C50.1,1.4,47.8,0,45.4,0c-2.5,0-4.7,1.4-5.8,3.7l-9.8,20.1c-0.4,0.9-1.2,1.5-2.2,1.6l-22,3.2c-2.5,0.4-4.5,2.1-5.3,4.5
                                                        c-0.8,2.4-0.1,5,1.6,6.7l15.9,15.7c0.7,0.7,1,1.6,0.8,2.6l-3.8,22.1c-0.4,2.5,0.6,4.9,2.6,6.4c2,1.5,4.6,1.7,6.9,0.5L44,76.7
                                                        c0.8-0.4,1.8-0.4,2.7,0l19.6,10.4c1,0.5,2,0.8,3,0.8c1.3,0,2.7-0.4,3.8-1.3c2-1.5,3-3.9,2.6-6.4L72,58.1c-0.2-0.9,0.2-1.9,0.8-2.6
                                                        L88.7,39.8z M68.4,58.7l3.8,22.1c0.2,1.1-0.2,2.2-1.1,2.8c-0.9,0.7-2,0.7-3,0.2L48.4,73.4c-0.9-0.5-2-0.8-3-0.8s-2.1,0.3-3,0.8
                                                        L22.7,83.9c-1,0.5-2.1,0.4-3-0.2c-0.9-0.7-1.3-1.7-1.1-2.8l3.8-22.1c0.4-2.1-0.3-4.3-1.9-5.8L4.5,37.2c-0.8-0.8-1.1-1.9-0.7-3
                                                        c0.3-1.1,1.2-1.8,2.3-2l22-3.2c2.1-0.3,4-1.7,4.9-3.6l9.8-20.1c0.5-1,1.5-1.6,2.6-1.6c1.1,0,2.1,0.6,2.6,1.6l9.8,20.1
                                                        c0.9,1.9,2.8,3.3,4.9,3.6l22,3.2c1.1,0.2,2,0.9,2.3,2c0.3,1.1,0.1,2.2-0.7,3L70.3,52.9C68.8,54.4,68.1,56.5,68.4,58.7z"></path>
                                                    </svg>

                                                        <svg class="item-trigger delete-comparison" width="16"
                                                             height="16"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #d7d7d7;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M505.94,6.06a20.68,20.68,0,0,0-29.25,0L6.06,476.69a20.68,20.68,0,1,0,29.25,29.25L505.94,35.31A20.68,20.68,0,0,0,505.94,6.06Z"></path>
                                                                    <path class="cls-1"
                                                                          d="M505.94,476.69,35.31,6.06A20.68,20.68,0,0,0,6.06,35.31L476.69,505.94a20.68,20.68,0,1,0,29.25-29.25Z"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>

                                                </form>
                                                <div class="comparison-top-item-cnt">
                                                    <div class="comparison-top-item-img">
                                                        <img src="/images/{{ $product->img }}" alt="comparison">
                                                    </div>
                                                    <div class="comparison-top-item-info">
                                                        <a class="comparison-item-title"
                                                           href="{!! route('product', [$product->id]) !!}">{{ $product->title }}</a>
                                                        <p>{{ $product->price }} <span>руб</span></p>
                                                        <div>
                                                            <a href="{!! route('product', [$product->id]) !!}"
                                                               class="cart-trigger fix-trigger">
                                                                <svg width="30" height="29" version="1.1"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     x="0px" y="0px"
                                                                     viewBox="0 0 82.2 76.5"
                                                                     style="enable-background:new 0 0 82.2 76.5;"
                                                                     xml:space="preserve">
                                                            <style type="text/css">
                                                                .st0 {
                                                                    fill: #8DC63F;
                                                                }
                                                            </style>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st0" d="M81.9,11.1c-0.3-0.3-0.7-0.7-1.4-0.7H15.4l-1.7-9c0-0.7-1-1.4-1.7-1.4H1.7C0.7,0,0,0.7,0,1.7s0.7,1.7,1.7,1.7
                                                                        h8.9l8.2,42.4c1,5.6,6.2,9.7,11.6,9.7h39.4c1,0,1.7-0.7,1.7-1.7s-0.7-1.7-1.7-1.7h-39c-2.7,0-5.5-1.4-6.9-3.8l50-7
                                                                        c0.7,0,1.4-0.7,1.4-1.4l6.9-27.8C82.2,12.2,82.2,11.5,81.9,11.1z M72.3,38.3l-50,6.6l-6.2-31.3h62L72.3,38.3z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st0" d="M29.1,59.1c-4.8,0-8.6,3.8-8.6,8.7c0,4.9,3.8,8.7,8.6,8.7c4.8,0,8.6-3.8,8.6-8.7C37.7,63,33.9,59.1,29.1,59.1
                                                                        z M29.1,73.1c-2.7,0-5.1-2.4-5.1-5.2c0-2.8,2.4-5.2,5.1-5.2s5.1,2.4,5.1,5.2C34.3,70.6,31.9,73.1,29.1,73.1z"/>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st0" d="M63.4,59.1c-4.8,0-8.6,3.8-8.6,8.7c0,4.9,3.8,8.7,8.6,8.7c4.8,0,8.6-3.8,8.6-8.7C71.9,63,68.2,59.1,63.4,59.1
                                                                        z M63.4,73.1c-2.7,0-5.1-2.4-5.1-5.2c0-2.8,2.4-5.2,5.1-5.2c2.7,0,5.1,2.4,5.1,5.2C68.5,70.6,66.1,73.1,63.4,73.1z"/>
                                                                        </g>
                                                                    </g>
                                                        </svg>
                                                            </a>
                                                            <a href="#" class="one-click-trigger link-text call-popup"
                                                               data-popup="oneClick">купить <br> в 1 клик</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="comparison-row">
                                                <p class="row-p">
                                                    <span>Удлиненная горловина</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->elongate) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->elongate }}</p>
                                            </div>


                                            <div class="comparison-row gray-row">
                                                <p class="row-p">
                                                    <span>Габариты</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->weight) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->weight }} мм.</p>
                                            </div>
                                            <div class="comparison-row">
                                                <p class="row-p">
                                                    <span>Размер входа</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->entrance_size) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->entrance_size }} мм.</p>
                                            </div>
                                            <div class="comparison-row gray-row">
                                                <p class="row-p">
                                                    <span>Вес</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->weight) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->weight }} кг</p>
                                            </div>
                                            <div class="comparison-row">
                                                <p class="row-p">
                                                    <span>Полезный объем</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->useful_volume) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->useful_volume }}
                                                    куб/м</p>
                                            </div>
                                            <div class="comparison-row gray-row">
                                                <p class="row-p">
                                                    <span>Комплектация</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->equipment) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->equipment }}</p>
                                            </div>
                                            <div class="comparison-row gray-row">
                                                <p class="row-p">
                                                    <span>Якорение</span>
                                                    <a href="#" class="filter-item-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <defs>
                                                                <style>.cls-1 {
                                                                        fill: #a6a6a6;
                                                                    }</style>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <path class="cls-1"
                                                                          d="M277.33,384A21.33,21.33,0,1,1,256,362.67,21.33,21.33,0,0,1,277.33,384Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,512C114.84,512,0,397.16,0,256S114.84,0,256,0,512,114.84,512,256,397.16,512,256,512Zm0-480C132.48,32,32,132.48,32,256S132.48,480,256,480,480,379.52,480,256,379.52,32,256,32Z"/>
                                                                    <path class="cls-1"
                                                                          d="M256,314.67a16,16,0,0,1-16-16V277.12a48.1,48.1,0,0,1,32-45.27c25.49-9,42.63-36.14,42.63-55.85a58.67,58.67,0,0,0-117.34,0,16,16,0,0,1-32,0,90.67,90.67,0,0,1,181.34,0c0,35.59-28.1,73.37-64,86A16,16,0,0,0,272,277.14v21.53A16,16,0,0,1,256,314.67Z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="filter-item-info-hidden"><img
                                                                    src="/images/popup-close.svg"
                                                                    alt="icon-close">
                                                            {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->anchor) !!}
                                                </span>
                                                    </a>
                                                </p>
                                                <p>{{ $product->anchor }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $('.btn_favorites').click(function (e) {
            e.preventDefault();
            var form = $(this).closest('.comparison-form').serialize();

            $.ajax({
                url: '/add-in-favorites',
                type: "POST",
                data: form,
                success: function (data) {
                    if (data == 'add') {
                        $('#favorites_count').html(Number($('#favorites_count').html()) + 1);
                    } else {
                        $('#favorites_count').html($('#favorites_count').html() - 1);
                    }
                    console.log(123);
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
        });

    </script>
@endsection
