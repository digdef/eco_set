@extends('index')
@section('meta')
    <title>{{ $ceo_text->meta_title ?? 'Главная' }}</title>
    <meta name="description" lang="ru" content="{{ $ceo_text->meta_description ?? 'Главная' }}">

    <meta property="og:title" content="{{ $ceo_text->meta_title ?? 'Главная' }}">
    <meta property="og:type" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:description" content="{{ $ceo_text->meta_description ?? 'Главная' }}">
    <link rel="canonical" href="{{ $url_not_get }}" />
@endsection

@section('content')

    <div class="main">
        <div class="banner">
            <div class="wrapper-ml wrapper">
                <div class="banner-slider owl-carousel">
                    <div class="banner-item">
                        <div class="banner-item-cnt">
                            <div class="banner-title">{{ $slider->title1 }}</div>
                            <a href="{{ $slider->link1 }}" class="btn">узнать подробнее</a>
                        </div>
                        <div class="banner-img">
                            <img src="images/{{ $slider->img1 }}" alt="banner">
                        </div>
                    </div>
                    <div class="banner-item">
                        <div class="banner-item-cnt">
                            <div class="banner-title">{{ $slider->title2 }}</div>
                            <a href="{{ $slider->link2 }}" class="btn">узнать подробнее</a>
                        </div>
                        <div class="banner-img">
                            <img src="images/{{ $slider->img2 }}" alt="banner">
                        </div>
                    </div>
                    <div class="banner-item">
                        <div class="banner-item-cnt">
                            <div class="banner-title">{{ $slider->title3 }}</div>
                            <a href="{{ $slider->link3 }}" class="btn">узнать подробнее</a>
                        </div>
                        <div class="banner-img">
                            <img src="images/{{ $slider->img3 }}" alt="banner">
                        </div>
                    </div>

                    @isset($slider->img4)
                        <div class="banner-item">
                            <div class="banner-item-cnt">
                                <div class="banner-title">{{ $slider->title4 }}</div>
                                <a href="{{ $slider->link4 }}" class="btn">узнать подробнее</a>
                            </div>
                            <div class="banner-img">
                                <img src="images/{{ $slider->img4 }}" alt="banner">
                            </div>
                        </div>
                    @endisset

                    @isset($slider->img5)
                        <div class="banner-item">
                            <div class="banner-item-cnt">
                                <div class="banner-title">{{ $slider->title5 }}</div>
                                <a href="{{ $slider->link5 }}" class="btn">узнать подробнее</a>
                            </div>
                            <div class="banner-img">
                                <img src="images/{{ $slider->img5 }}" alt="banner">
                            </div>
                        </div>
                    @endisset

                    @isset($slider->img6)
                        <div class="banner-item">
                            <div class="banner-item-cnt">
                                <div class="banner-title">{{ $slider->title6 }}</div>
                                <a href="{{ $slider->link6 }}" class="btn">узнать подробнее</a>
                            </div>
                            <div class="banner-img">
                                <img src="images/{{ $slider->img6 }}" alt="banner">
                            </div>
                        </div>
                    @endisset

                </div>
            </div>
        </div>
        <div class="sections">
            <div class="wrapper wrapper-l">
                <div class="sections-list">
                    <div class="sections-item sections-item-1">
                        <div class="sections-cnt">
                            <a href="/catalog/septic" class="sections-title">септики</a>
                            <div class="sections-links">
                                <a href="/catalog/septic?manufacturer%5B%5D=8">Биодека</a>
                                <a href="/catalog/septic?manufacturer%5B%5D=6">Астра</a>
                                <a href="/catalog/septic?manufacturer%5B%5D=7">Топас</a>
                                <a href="/catalog/septic?manufacturer%5B%5D=10">Волга</a>
                                <a href="/catalog/septic?manufacturer%5B%5D=11">Genesis</a>
                            </div>
                        </div>
                        <div class="sections-img"><img src="./images/sections-img-1.png" alt="sections"></div>
                    </div>
                    <div class="sections-item sections-item-2">
                        <div class="sections-cnt">
                            <a href="/catalog/water" class="sections-title">Водоснабжение</a>
                            <div class="sections-links">
                                <a href="#">От скважины в дом</a>
                                <a href="#">От колодца в дом </a>
                                <a href="#">От магистральной трубы в дом</a>
                            </div>
                        </div>
                        <div class="sections-img"><img src="./images/sections-img-2.png" alt="sections"></div>
                    </div>
                    <div class="sections-item sections-item-3">
                        <div class="sections-cnt">
                            <a href="/catalog/cellars" class="sections-title">погреба</a>
                            <div class="sections-links">
                                <a href="/catalog/cellars?manufacturer%5B%5D=21">Тингард</a>
                                <a href="/catalog/cellars?manufacturer%5B%5D=22">Kellari </a>
                                <a href="/catalog/cellars?manufacturer%5B%5D=23">Топас</a>
                                <a href="/catalog/cellars?manufacturer%5B%5D=24">Kelder </a>
                            </div>
                        </div>
                        <div class="sections-img"><img src="./images/sections-img-3.png" alt="sections"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="benefits">
            <div class="wrapper">
                <h3 class="title">Почему мы</h3>
                <div class="benefits-list">
                    <div class="bnf">
                        <div class="bnf-icon"><img src="./images/bnf-icon-1.svg" alt="bnf-icon"></div>
                        <p>{{ $why_us->description1 }}</p>
                    </div>
                    <div class="bnf">
                        <div class="bnf-icon"><img src="./images/bnf-icon-2.svg" alt="bnf-icon"></div>
                        <p>{{ $why_us->description2 }}</p>
                    </div>
                    <div class="bnf">
                        <div class="bnf-icon"><img src="./images/bnf-icon-3.svg" alt="bnf-icon"></div>
                        <p>{{ $why_us->description3 }}</p>
                    </div>
                    <div class="bnf">
                        <div class="bnf-icon"><img class="bnf-icon-4" src="./images/bnf-icon-4.svg" alt="bnf-icon">
                        </div>
                        <p>{{ $why_us->description4 }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="prices">
            <div class="wrapper">
                <h3 class="title">НАШИ ЦЕНЫ</h3>
                <div class="prices-list">
                    <a href="/price/cat/6" class="price-item">
                            <span class="price-img">
                                <img src="/images/price-item-1.png" alt="price-item">
                            </span>
                        <span class="price-name">Юнилос астра</span>
                    </a>
                    <a href="/price/cat/7" class="price-item">
                            <span class="price-img">
                                <img src="/images/price-item-2.png" alt="price-item">
                            </span>
                        <span class="price-name">Топас</span>
                    </a>
                    <a href="/price/cat/9" class="price-item">
                            <span class="price-img">
                                <img src="/images/price-item-3.png" alt="price-item">
                            </span>
                        <span class="price-name">Юбас ЕВРОБИОН</span>
                    </a>
                    <a href="#" class="price-item">
                            <span class="price-img">
                                <img src="/images/price-item-4.png" alt="price-item">
                            </span>
                        <span class="price-name">Монтаж</span>
                    </a>
                    <a href="/price/5" class="price-item">
                            <span class="price-img">
                                <img src="/images/price-item-5.png" alt="price-item">
                            </span>
                        <span class="price-name">Обслуживание</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="catalog-preview">
            <div class="wrapper-m wrapper tabs-wrapper">
                <div class="catalog-head">
                    <div class="wrapper">
                        <h3 class="title">Каталог</h3>
                        <div class="tabs-section">
                            <a href="#" class="active" data-cnt="tab-cnt-1">топ</a>
                            <a href="#" data-cnt="tab-cnt-2">Советуем</a>
                            <a href="#" data-cnt="tab-cnt-3">новинка</a>
                            <a href="#" data-cnt="tab-cnt-4">Акции</a>
                        </div>
                    </div>
                </div>
                <div class="tabs-content">
                    <div class="catalog-list-wrap more-cnt tab-cnt tab-cnt-1 active">
                        <div class="catalog-list more-cnt-list">
                            @foreach($products_top as $product)
                                <div class="catalog-item more-cnt-item">
                                    <div class="stickers">
                                        <div class="sticker sticker-green" {{ $product->top ? '' : 'style=display:none' }}>
                                            Топ
                                        </div>
                                        <div class="sticker sticker-m sticker-green" {{ $product->new ? '' : 'style=display:none' }}>
                                            Новинка
                                        </div>
                                        <div class="sticker sticker-orange" {{ $product->action ? '' : 'style=display:none' }}>
                                            Акция
                                        </div>
                                        <div class="sticker sticker-s sticker-orange" {{ $product->advise ? '' : 'style=display:none' }}>
                                            Советуем
                                        </div>
                                    </div>
                                    <form method="POST" class="favorites-form">
                                        @csrf
                                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                                        <div class="item-triggers">
                                            <svg class="btn_comparison item-trigger {{ $comparisons_user->contains($product->id) ? 'active' : '' }}"
                                                 width="23" height="22" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 x="0px" y="0px"
                                                 viewBox="0 0 85 82.2" style="enable-background:new 0 0 85 82.2;"
                                                 xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #8DC63F;
                                                    }
                                                </style>
                                                <g>
                                                    <g>
                                                        <path class="st0" d="M84.9,41.8L84.9,41.8l-12.3-31h5.6c1,0,1.8-0.8,1.8-1.8s-0.8-1.8-1.8-1.8h-34V1.8c0-1-0.8-1.8-1.8-1.8
                                                            s-1.8,0.8-1.8,1.8v5.3h-34C5.6,7.2,4.8,8,4.8,9s0.8,1.8,1.8,1.8h5.8l-12.2,31C0.1,42,0,42.3,0,42.5C0,51,6.7,57.8,15,57.8
                                                            s15-6.9,15-15.3c0-0.2-0.1-0.5-0.1-0.7l-12.2-31h22.8v57c-8.6,0.7-15.4,6-15.4,12.5c0,1,0.8,1.8,1.8,1.8h30.7c1,0,1.8-0.8,1.8-1.8
                                                            c0-6.5-6.7-11.8-15.4-12.5v-57h23.1l-12.1,31C55,42,55,42.3,55,42.5c0,8.5,6.7,15.3,15,15.3S85,51,85,42.5
                                                            C85,42.3,85,42,84.9,41.8z M15,54.2c-5.6,0-10.4-4.2-11.3-9.8h22.4C25.3,50,20.6,54.1,15,54.2z M25.6,40.7h-21l10.5-26.8
                                                            L25.6,40.7z M55.6,78.5H29.1c1.3-4,6.9-7,13.2-7S54.3,74.5,55.6,78.5z M69.9,13.9l10.5,26.7h-21L69.9,13.9z M69.9,54.2L69.9,54.2
                                                            c-5.6,0-10.3-4.2-11.2-9.8h22.4C80.3,50,75.5,54.2,69.9,54.2z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg class="btn_favorites item-trigger {{ $favorites_user->contains($product->id) ? 'active' : '' }}"
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
                                                c0.9,1.9,2.8,3.3,4.9,3.6l22,3.2c1.1,0.2,2,0.9,2.3,2c0.3,1.1,0.1,2.2-0.7,3L70.3,52.9C68.8,54.4,68.1,56.5,68.4,58.7z"/>
                                            </svg>
                                        </div>
                                    </form>

                                    <a href="{!! route('product', [$product->id]) !!}" class="catalog-item-img">
                                        <img src="/images/{{ $product->img }}" alt="catalog">
                                    </a>
                                    <a href="{!! route('product', [$product->id]) !!}"
                                       class="catalog-item-title">{{ $product->title }}</a>
                                    <p>дачная канализация</p>
                                    <ul class="circle-list">
                                        <li>Для {{ $product->persons }} человек</li>
                                        <li>Производительность {{ $product->performance }} л/сутки</li>
                                        <li>Залповый сброс {{ $product->salvo_discharge }} л</li>
                                    </ul>
                                    <div class="catalog-item-price">
                                        @if($product->action)
                                            @if($stockToProducts->where('id_product', '=', $product->id)->count() > 0)
                                                <span class="old"><span>{{ number_format($product->price, 0, '', ' ') }}</span> <span
                                                            class="price-value">руб</span></span>
                                                <span class="new">{{ number_format($product->price - ($product->price * ($stock->where('id', '=', $stockToProducts->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)), 0, '', ' ') }}
                                                    <span>руб</span></span>
                                            @else
                                                <span class="new">{{ number_format($product->price, 0, '', ' ') }}
                                                    <span>руб</span></span>
                                            @endif
                                        @else
                                            <span class="new">{{ number_format($product->price, 0, '', ' ') }}
                                                <span>руб</span></span>
                                        @endif
                                    </div>
                                    <div class="catalog-item-links">
                                        <a href="{!! route('product', [$product->id]) !!}" class="btn">подробнее</a>
                                        <a href="#" class="one-click-trigger link-text call-popup"
                                           data-popup="oneClick">купить <br> в 1 клик</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <a href="#" class="more-btn"><span>показать еще</span><img src="./images/arrow-double.svg"
                                                                                   alt="arrow"></a>
                    </div>
                    <div class="catalog-list-wrap more-cnt tab-cnt tab-cnt-2">
                        <div class="catalog-list more-cnt-list">
                            @foreach($products_advise as $product)
                                <div class="catalog-item more-cnt-item">
                                    <div class="stickers">
                                        <div class="sticker sticker-green" {{ $product->top ? '' : 'style=display:none' }}>
                                            Топ
                                        </div>
                                        <div class="sticker sticker-m sticker-green" {{ $product->new ? '' : 'style=display:none' }}>
                                            Новинка
                                        </div>
                                        <div class="sticker sticker-orange" {{ $product->action ? '' : 'style=display:none' }}>
                                            Акция
                                        </div>
                                        <div class="sticker sticker-s sticker-orange" {{ $product->advise ? '' : 'style=display:none' }}>
                                            Советуем
                                        </div>
                                    </div>
                                    <form method="POST" class="favorites-form">
                                        @csrf
                                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                                        <div class="item-triggers">
                                            <svg class="btn_comparison item-trigger {{ $comparisons_user->contains($product->id) ? 'active' : '' }}"
                                                 width="23" height="22" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 x="0px" y="0px"
                                                 viewBox="0 0 85 82.2" style="enable-background:new 0 0 85 82.2;"
                                                 xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #8DC63F;
                                                    }
                                                </style>
                                                <g>
                                                    <g>
                                                        <path class="st0" d="M84.9,41.8L84.9,41.8l-12.3-31h5.6c1,0,1.8-0.8,1.8-1.8s-0.8-1.8-1.8-1.8h-34V1.8c0-1-0.8-1.8-1.8-1.8
                                                            s-1.8,0.8-1.8,1.8v5.3h-34C5.6,7.2,4.8,8,4.8,9s0.8,1.8,1.8,1.8h5.8l-12.2,31C0.1,42,0,42.3,0,42.5C0,51,6.7,57.8,15,57.8
                                                            s15-6.9,15-15.3c0-0.2-0.1-0.5-0.1-0.7l-12.2-31h22.8v57c-8.6,0.7-15.4,6-15.4,12.5c0,1,0.8,1.8,1.8,1.8h30.7c1,0,1.8-0.8,1.8-1.8
                                                            c0-6.5-6.7-11.8-15.4-12.5v-57h23.1l-12.1,31C55,42,55,42.3,55,42.5c0,8.5,6.7,15.3,15,15.3S85,51,85,42.5
                                                            C85,42.3,85,42,84.9,41.8z M15,54.2c-5.6,0-10.4-4.2-11.3-9.8h22.4C25.3,50,20.6,54.1,15,54.2z M25.6,40.7h-21l10.5-26.8
                                                            L25.6,40.7z M55.6,78.5H29.1c1.3-4,6.9-7,13.2-7S54.3,74.5,55.6,78.5z M69.9,13.9l10.5,26.7h-21L69.9,13.9z M69.9,54.2L69.9,54.2
                                                            c-5.6,0-10.3-4.2-11.2-9.8h22.4C80.3,50,75.5,54.2,69.9,54.2z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg class="btn_favorites item-trigger {{ $favorites_user->contains($product->id) ? 'active' : '' }}"
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
                                                c0.9,1.9,2.8,3.3,4.9,3.6l22,3.2c1.1,0.2,2,0.9,2.3,2c0.3,1.1,0.1,2.2-0.7,3L70.3,52.9C68.8,54.4,68.1,56.5,68.4,58.7z"/>
                                            </svg>
                                        </div>
                                    </form>

                                    <a href="{!! route('product', [$product->id]) !!}" class="catalog-item-img">
                                        <img src="/images/{{ $product->img }}" alt="catalog">
                                    </a>
                                    <a href="{!! route('product', [$product->id]) !!}"
                                       class="catalog-item-title">{{ $product->title }}</a>
                                    <p>дачная канализация</p>
                                    <ul class="circle-list">
                                        <li>Для {{ $product->persons }} человек</li>
                                        <li>Производительность {{ $product->performance }} л/сутки</li>
                                        <li>Залповый сброс {{ $product->salvo_discharge }} л</li>
                                    </ul>
                                    <div class="catalog-item-price">
                                        @if($product->action)
                                            @if($stockToProducts->where('id_product', '=', $product->id)->count() > 0)
                                                <span class="old"><span>{{ number_format($product->price, 0, '', ' ') }}</span> <span
                                                            class="price-value">руб</span></span>
                                                <span class="new">{{ number_format($product->price - ($product->price * ($stock->where('id', '=', $stockToProducts->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)), 0, '', ' ') }}
                                                    <span>руб</span></span>
                                            @else
                                                <span class="new">{{ number_format($product->price, 0, '', ' ') }}
                                                    <span>руб</span></span>
                                            @endif
                                        @else
                                            <span class="new">{{ number_format($product->price, 0, '', ' ') }}
                                                <span>руб</span></span>
                                        @endif
                                    </div>
                                    <div class="catalog-item-links">
                                        <a href="{!! route('product', [$product->id]) !!}" class="btn">подробнее</a>
                                        <a href="#" class="one-click-trigger link-text call-popup"
                                           data-popup="oneClick">купить <br> в 1 клик</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="#" class="more-btn"><span>показать еще</span><img src="./images/arrow-double.svg"
                                                                                   alt="arrow"></a>
                    </div>
                    <div class="catalog-list-wrap more-cnt tab-cnt tab-cnt-3">
                        <div class="catalog-list more-cnt-list">
                            @foreach($products_new as $product)
                                <div class="catalog-item more-cnt-item">
                                    <div class="stickers">
                                        <div class="sticker sticker-green" {{ $product->top ? '' : 'style=display:none' }}>
                                            Топ
                                        </div>
                                        <div class="sticker sticker-m sticker-green" {{ $product->new ? '' : 'style=display:none' }}>
                                            Новинка
                                        </div>
                                        <div class="sticker sticker-orange" {{ $product->action ? '' : 'style=display:none' }}>
                                            Акция
                                        </div>
                                        <div class="sticker sticker-s sticker-orange" {{ $product->advise ? '' : 'style=display:none' }}>
                                            Советуем
                                        </div>
                                    </div>
                                    <form method="POST" class="favorites-form">
                                        @csrf
                                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                                        <div class="item-triggers">
                                            <svg class="btn_comparison item-trigger {{ $comparisons_user->contains($product->id) ? 'active' : '' }}"
                                                 width="23" height="22" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 x="0px" y="0px"
                                                 viewBox="0 0 85 82.2" style="enable-background:new 0 0 85 82.2;"
                                                 xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #8DC63F;
                                                    }
                                                </style>
                                                <g>
                                                    <g>
                                                        <path class="st0" d="M84.9,41.8L84.9,41.8l-12.3-31h5.6c1,0,1.8-0.8,1.8-1.8s-0.8-1.8-1.8-1.8h-34V1.8c0-1-0.8-1.8-1.8-1.8
                                                            s-1.8,0.8-1.8,1.8v5.3h-34C5.6,7.2,4.8,8,4.8,9s0.8,1.8,1.8,1.8h5.8l-12.2,31C0.1,42,0,42.3,0,42.5C0,51,6.7,57.8,15,57.8
                                                            s15-6.9,15-15.3c0-0.2-0.1-0.5-0.1-0.7l-12.2-31h22.8v57c-8.6,0.7-15.4,6-15.4,12.5c0,1,0.8,1.8,1.8,1.8h30.7c1,0,1.8-0.8,1.8-1.8
                                                            c0-6.5-6.7-11.8-15.4-12.5v-57h23.1l-12.1,31C55,42,55,42.3,55,42.5c0,8.5,6.7,15.3,15,15.3S85,51,85,42.5
                                                            C85,42.3,85,42,84.9,41.8z M15,54.2c-5.6,0-10.4-4.2-11.3-9.8h22.4C25.3,50,20.6,54.1,15,54.2z M25.6,40.7h-21l10.5-26.8
                                                            L25.6,40.7z M55.6,78.5H29.1c1.3-4,6.9-7,13.2-7S54.3,74.5,55.6,78.5z M69.9,13.9l10.5,26.7h-21L69.9,13.9z M69.9,54.2L69.9,54.2
                                                            c-5.6,0-10.3-4.2-11.2-9.8h22.4C80.3,50,75.5,54.2,69.9,54.2z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg class="btn_favorites item-trigger {{ $favorites_user->contains($product->id) ? 'active' : '' }}"
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
                                                c0.9,1.9,2.8,3.3,4.9,3.6l22,3.2c1.1,0.2,2,0.9,2.3,2c0.3,1.1,0.1,2.2-0.7,3L70.3,52.9C68.8,54.4,68.1,56.5,68.4,58.7z"/>
                                            </svg>
                                        </div>
                                    </form>

                                    <a href="{!! route('product', [$product->id]) !!}" class="catalog-item-img">
                                        <img src="/images/{{ $product->img }}" alt="catalog">
                                    </a>
                                    <a href="{!! route('product', [$product->id]) !!}"
                                       class="catalog-item-title">{{ $product->title }}</a>
                                    <p>дачная канализация</p>
                                    <ul class="circle-list">
                                        <li>Для {{ $product->persons }} человек</li>
                                        <li>Производительность {{ $product->performance }} м3/сут</li>
                                        <li>Залповый сброс {{ $product->salvo_discharge }} л</li>
                                    </ul>
                                    <div class="catalog-item-price">
                                        @if($product->action)
                                            @if($stockToProducts->where('id_product', '=', $product->id)->count() > 0)
                                                <span class="old"><span>{{ number_format($product->price, 0, '', ' ') }}</span> <span
                                                            class="price-value">руб</span></span>
                                                <span class="new">{{ number_format($product->price - ($product->price * ($stock->where('id', '=', $stockToProducts->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)), 0, '', ' ') }}
                                                    <span>руб</span></span>
                                            @else
                                                <span class="new">{{ number_format($product->price, 0, '', ' ') }}
                                                    <span>руб</span></span>
                                            @endif
                                        @else
                                            <span class="new">{{ number_format($product->price, 0, '', ' ') }}
                                                <span>руб</span></span>
                                        @endif
                                    </div>
                                    <div class="catalog-item-links">
                                        <a href="{!! route('product', [$product->id]) !!}" class="btn">подробнее</a>
                                        <a href="#" class="one-click-trigger link-text call-popup"
                                           data-popup="oneClick">купить <br> в 1 клик</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="#" class="more-btn"><span>показать еще</span><img src="./images/arrow-double.svg"
                                                                                   alt="arrow"></a>
                    </div>
                    <div class="catalog-list-wrap more-cnt tab-cnt tab-cnt-4">
                        <div class="catalog-list more-cnt-list">
                            @foreach($products_stock as $product)
                                <div class="catalog-item more-cnt-item">
                                    <div class="stickers">
                                        <div class="sticker sticker-green" {{ $product->top ? '' : 'style=display:none' }}>
                                            Топ
                                        </div>
                                        <div class="sticker sticker-m sticker-green" {{ $product->new ? '' : 'style=display:none' }}>
                                            Новинка
                                        </div>
                                        <div class="sticker sticker-orange" {{ $product->action ? '' : 'style=display:none' }}>
                                            Акция
                                        </div>
                                        <div class="sticker sticker-s sticker-orange" {{ $product->advise ? '' : 'style=display:none' }}>
                                            Советуем
                                        </div>
                                    </div>
                                    <form method="POST" class="favorites-form">
                                        @csrf
                                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                                        <div class="item-triggers">
                                            <svg class="btn_comparison item-trigger {{ $comparisons_user->contains($product->id) ? 'active' : '' }}"
                                                 width="23" height="22" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 x="0px" y="0px"
                                                 viewBox="0 0 85 82.2" style="enable-background:new 0 0 85 82.2;"
                                                 xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #8DC63F;
                                                    }
                                                </style>
                                                <g>
                                                    <g>
                                                        <path class="st0" d="M84.9,41.8L84.9,41.8l-12.3-31h5.6c1,0,1.8-0.8,1.8-1.8s-0.8-1.8-1.8-1.8h-34V1.8c0-1-0.8-1.8-1.8-1.8
                                                            s-1.8,0.8-1.8,1.8v5.3h-34C5.6,7.2,4.8,8,4.8,9s0.8,1.8,1.8,1.8h5.8l-12.2,31C0.1,42,0,42.3,0,42.5C0,51,6.7,57.8,15,57.8
                                                            s15-6.9,15-15.3c0-0.2-0.1-0.5-0.1-0.7l-12.2-31h22.8v57c-8.6,0.7-15.4,6-15.4,12.5c0,1,0.8,1.8,1.8,1.8h30.7c1,0,1.8-0.8,1.8-1.8
                                                            c0-6.5-6.7-11.8-15.4-12.5v-57h23.1l-12.1,31C55,42,55,42.3,55,42.5c0,8.5,6.7,15.3,15,15.3S85,51,85,42.5
                                                            C85,42.3,85,42,84.9,41.8z M15,54.2c-5.6,0-10.4-4.2-11.3-9.8h22.4C25.3,50,20.6,54.1,15,54.2z M25.6,40.7h-21l10.5-26.8
                                                            L25.6,40.7z M55.6,78.5H29.1c1.3-4,6.9-7,13.2-7S54.3,74.5,55.6,78.5z M69.9,13.9l10.5,26.7h-21L69.9,13.9z M69.9,54.2L69.9,54.2
                                                            c-5.6,0-10.3-4.2-11.2-9.8h22.4C80.3,50,75.5,54.2,69.9,54.2z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg class="btn_favorites item-trigger {{ $favorites_user->contains($product->id) ? 'active' : '' }}"
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
                                                c0.9,1.9,2.8,3.3,4.9,3.6l22,3.2c1.1,0.2,2,0.9,2.3,2c0.3,1.1,0.1,2.2-0.7,3L70.3,52.9C68.8,54.4,68.1,56.5,68.4,58.7z"/>
                                            </svg>
                                        </div>
                                    </form>

                                    <a href="{!! route('product', [$product->id]) !!}" class="catalog-item-img">
                                        <img src="/images/{{ $product->img }}" alt="catalog">
                                    </a>
                                    <a href="{!! route('product', [$product->id]) !!}"
                                       class="catalog-item-title">{{ $product->title }}</a>
                                    <p>дачная канализация</p>
                                    <ul class="circle-list">
                                        <li>Для {{ $product->persons }} человек</li>
                                        <li>Производительность {{ $product->performance }} л/сутки</li>
                                        <li>Залповый сброс {{ $product->salvo_discharge }} л</li>
                                    </ul>
                                    <div class="catalog-item-price">
                                        @if($product->action)
                                            @if($stockToProducts->where('id_product', '=', $product->id)->count() > 0)
                                                <span class="old"><span>{{ $product->price }}</span> <span
                                                            class="price-value">руб</span></span>
                                                <span class="new">{{ $product->price - ($product->price * ($stock->where('id', '=', $stockToProducts->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)) }}
                                                    <span>руб</span></span>
                                            @else
                                                <span class="new">{{ $product->price }} <span>руб</span></span>
                                            @endif
                                        @else
                                            <span class="new">{{ $product->price }} <span>руб</span></span>
                                        @endif
                                    </div>
                                    <div class="catalog-item-links">
                                        <a href="{!! route('product', [$product->id]) !!}" class="btn">подробнее</a>
                                        <a href="#" class="one-click-trigger link-text call-popup"
                                           data-popup="oneClick">купить <br> в 1 клик</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="#" class="more-btn"><span>показать еще</span><img src="./images/arrow-double.svg"
                                                                                   alt="arrow"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="infobanner">
            <div class="wrapper wrapper-m">
                <div class="infobanner-list">
                    <a href="{{ $banners->link1 }}" style="background-image: url('/images/banner-info-1.jpg');">
                            <span>
                                <span class="infobanner-title">Монтаж</span>
                                <span class="infobanner-title-s">канализации  <br> под ключ</span>
                            </span>
                    </a>
                    <a href="{{ $banners->link2 }}" style="background-image: url('/images/banner-info-2.jpg');">
                            <span>
                                <span class="infobanner-title">Доставка</span>
                            </span>
                    </a>
                    <a href="{{ $banners->link3 }}" style="background-image: url('/images/banner-info-3.jpg');">
                            <span>
                                <span class="infobanner-title">Консультация</span>
                                <span class="infobanner-title-m">и подбор</span>
                            </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="infoblock">
            <div class="wrapper">
                <a href="/" class="logo"><img src="/images/logo.svg" alt="logo"></a>
                <div class="infoblock-cnt">
                    <div class="infoblock-row">
                        <div class="infoblock-column">
                            <div class="paragraph-item">
                                <h5>{{ $ceo_text->title1 }}</h5>
                                <p>{!!  $ceo_text->text1 !!}</p>
                            </div>
                            <div class="paragraph-item">
                                <h5>{{ $ceo_text->title2 }}</h5>
                                <p>{!!  $ceo_text->text2 !!}</p>
                            </div>
                        </div>
                        <div class="infoblock-column">
                            <div class="paragraph-item">
                                <h5>{{ $ceo_text->title3 }}</h5>
                                <p>{!!  $ceo_text->text3 !!}</p>
                            </div>
                            <div class="paragraph-item">
                                <h5>{{ $ceo_text->title4 }}</h5>
                                <p>{!!  $ceo_text->text4 !!}</p>
                            </div>
                        </div>
                    </div>
                    <p>{!!  $ceo_text->text5 !!}</p>
                    <div class="infoblock-popular">
                        <h5>Популярные категории септиков:</h5>
                        @foreach($links as $link)
                            <a href="{{ $link->link }}">{{ $link->title }}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('.btn_favorites').click(function (e) {
            e.preventDefault();
            var form = $(this).closest('.favorites-form').serialize();

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

        $('.btn_comparison').click(function (e) {
            e.preventDefault();
            var form = $(this).closest('.favorites-form').serialize();

            $.ajax({
                url: '/post-comparison',
                type: "POST",
                data: form,
                success: function (data) {
                    if (data == 'add') {
                        $('#comparison_count').html(Number($('#comparison_count').html()) + 1);
                    } else {
                        $('#comparison_count').html($('#comparison_count').html() - 1);
                    }
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
        });

    </script>
@endsection
