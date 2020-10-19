@extends('index')
@section('meta')
    <title>{{ $product->meta_title ?? $product->title }}</title>
    <meta name="description" lang="ru" content="{{ $product->meta_description ?? $product->title }}">
    <meta name="keywords" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:title" content="{{ $product->meta_title ?? $product->title }}">
    <meta property="og:type" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:description" content="{{ $product->meta_description ?? $product->title }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <a href="/catalog/{{ $cat }}">Каталог</a>
                <span class="breadcrumbs-slash">|</span>
                <span>{{ $product->title }}</span>
            </div>
        </div>
        <form method="POST" action="/add-in-favorites" class="favorites-form-card" style="display:none;">
            @csrf

            <input type="hidden" name="id_product" value="{{ $product->id }}">

        </form>
        <div class="card">
            <div class="card-item-wrap">
                <div class="wrapper">
                    <div class="card-item-title">
                        <h1 class="title title-s">{{ $product->title }}</h1>
                        <div class="card-item-add card-item-add-link btn_comparison_card {{ $comparisons_user->contains($product->id) ? 'active' : '' }}">
                            <svg class="item-trigger card-item-add-trigger " width="19" height="18" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 x="0px" y="0px"
                                 viewBox="0 0 85 82.2" style="enable-background:new 0 0 85 82.2;" xml:space="preserve">
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
                            <span>к  сравнению </span>
                        </div>
                        <form method="POST" action="/add-in-favorites" class="favorites-form">
                            @csrf

                            <input type="hidden" name="id_product" value="{{ $product->id }}">
                            <button type="button" style="background: none"
                                    class="btn_favorites card-item-add card-item-add-link {{ $favorites_user->contains($product->id) ? 'active' : '' }}">
                                <svg class="item-trigger card-item-add-trigger " width="18" height="18" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg"
                                     x="0px" y="0px"
                                     viewBox="0 0 90.7 87.9" style="enable-background:new 0 0 90.7 87.9;"
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
                                <span>в избранное</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-item">
                    <div class="wrapper wrapper-m">
                        <div class="card-item-row">
                            <div class="card-img-wrap">
                                <img class="card-img-bg" src="/images/card-img-bg.png" alt="card-img">
                                <img class="card-img-bg card-img-bg-mob" src="/images/card-img-bg-mob.png"
                                     alt="card-img">
                                @if($category->type == 1)

                                    <div class="card-icons-list">
                                        <div class="card-icon card-icon-1"><img src="/images/card-icon-1.svg"
                                                                                alt="card-icon"><span>{{ $product->toilet }}</span>
                                        </div>
                                        <div class="card-icon card-icon-2"><img src="/images/card-icon-2.svg"
                                                                                alt="card-icon"><span>{{ $product->bath }}</span>
                                        </div>
                                        <div class="card-icon card-icon-3"><img src="/images/card-icon-3.svg"
                                                                                alt="card-icon"><span>{{ $product->shower }}</span>
                                        </div>
                                        <div class="card-icon card-icon-4"><img src="/images/card-icon-4.svg"
                                                                                alt="card-icon"><span>{{ $product->sink }}</span>
                                        </div>
                                        <div class="card-icon card-icon-5"><img src="/images/card-icon-5.svg"
                                                                                alt="card-icon"><span>{{ $product->washer }}</span>
                                        </div>
                                    </div>
                                @endif
                                <a href="/images/{{ $product->img }}" data-fancybox class="card-img">
                                    <img src="/images/{{ $product->img }}" alt="card-img">
                                </a>
                            </div>
                            <div class="card-buy-info">
                                <div class="card-price">
                                    <div class="card-triggers">
                                        <span class="card-trigger green" {{ $product->new ? '' : 'style=display:none' }}>новинка</span>
                                        <span class="card-trigger green" {{ $product->advise ? '' : 'style=display:none' }}>советуем</span>
                                        <span class="card-trigger green" {{ $product->top ? '' : 'style=display:none' }}>ТОП</span>
                                        <span class="card-trigger orange" {{ $product->action ? '' : 'style=display:none' }}>Акция</span>
                                    </div>
                                    @if($product->action)
                                        @isset($stock)
                                            <span class="card-price-old">{{ number_format($product->price, 0, '', ' ') }}
                                                <span>руб</span></span>
                                            <span class="card-price-new">{{ number_format($product->price - ($product->price * ($stock->percent/100)), 0, '', ' ') }}
                                                <span>руб</span></span>
                                        @else
                                            <span class="card-price-new">{{ number_format($product->price, 0, '', ' ') }}
                                                <span>руб</span></span>
                                        @endisset
                                    @else
                                        <span class="card-price-new">{{ number_format($product->price, 0, '', ' ') }}
                                            <span>руб</span></span>
                                    @endif
                                </div>
                                <form method="POST" class="cart-form">
                                    @csrf
                                    <input name="id_product" value="{{ $product->id }}" style="display: none">
                                    <input name="number" value="1" style="display: none">
                                    <div class="card-buy-buttons">
                                        <button type="button" class="btn btn_cart">В корзину</button>
                                        <a href="#"
                                           class="one-click-trigger link-text call-popup call-popup-product-page"
                                           data-popup="oneClick">купить в 1 клик</a>
                                    </div>
                                </form>

                            </div>
                            <div class="card-info">
                                @if($category->type == 2)
                                    <div class="card-info-row">
                                        <p class="card-info-name">
                                            Объем
                                            <a href="#" class="filter-item-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <defs>
                                                        <style>.cls-1 {
                                                                fill: #959595;
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
                                        <span>{{ $product->useful_volume }} куб/м</span>
                                    </div>
                                @else
                                    <div class="card-info-row">
                                        <p class="card-info-name">
                                            Глубина врезки
                                            <a href="#" class="filter-item-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <defs>
                                                        <style>.cls-1 {
                                                                fill: #959595;
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
                                                    {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->inset_depth_prod) !!}
                                            </span>
                                            </a>
                                        </p>
                                        <span>{{ $product->insert_depth }} см</span>
                                    </div>
                                @endif
                                @if($category->type == 2)
                                    <div class="card-info-row">
                                        <p class="card-info-name">
                                            Размер входа
                                            <a href="#" class="filter-item-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <defs>
                                                        <style>.cls-1 {
                                                                fill: #959595;
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
                                        <span>{{ $product->entrance_size }} мм.</span>
                                    </div>
                                @else
                                    <div class="card-info-row">
                                        <p class="card-info-name">
                                            Тип сброса
                                            <a href="#" class="filter-item-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <defs>
                                                        <style>.cls-1 {
                                                                fill: #959595;
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
                                                    {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->reset_type_prod) !!}
                                            </span>
                                            </a>
                                        </p>
                                        <span>{{ $product->reset_type }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="card-text">
                                {{--<p>Станция биологической очистки сточных вод Астра-3 с самотечным отведением очищенной воды. Число пользователей от 1 до 3 человек! Производительность 0,6 куб. м. в сутки.</p>--}}
                                {{--<p>Рассчитана на минимальное количество  сантехнических приборов. Не допускается  использование больших ванн.  Мощность компрессора 40 Вт.</p>--}}
                                <p>{!! $product->thumbnail !!}</p>
                                <a href="#" class="btn-orange call-popup" data-popup="callbackPopupInstallation"><img
                                            src="/images/orange-btn-icon.svg" alt="icon"> Заказать монтаж</a>
                            </div>
                            <div class="article-share">

                                <div class="article-share-trigger"><img src="/images/share.svg" alt="share"></div>
                                <div class="article-share-cnt">
                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"><img
                                                src="/images/twitter.svg" alt="twitter"></a>
                                    <a href="{{ $product->pinterest ?? '#' }}"><img src="/images/pintarest.svg"
                                                                                    alt="pintarest"></a>
                                    <a href="https://www.linkedin.com/cws/share/?url={{ url()->current() }}"><img
                                                src="/images/linkedin.svg" alt="linkedin"></a>
                                    <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"><img
                                                src="/images/facebook.svg" alt="facebook"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($product->action)
                    @isset($stock)
                        <div class="card-stock">
                            <div class="wrapper wrapper-m">
                                <div class="card-stock-sticker">Акция</div>
                                <a href="/stock/{{ $stock->id }}">{{$stock->title}}</a>
                                <a class="card-stock-more" href="/stock/{{ $stock->id }}">Узнать подробнее</a>
                                <div class="card-stock-date">
                                    <span>Дата окончания акции:</span>
                                    <p>{{ date("d.m.Y", strtotime($stock->finish)) }}</p>
                                </div>
                            </div>
                        </div>
                    @endisset
                @endif
            </div>
            <div class="tabs-content card-tabs">
                <div class="wrapper tabs-wrapper">
                    <div class="tabs-section">
                        <a href="#" class="active" data-cnt="tab-cnt-characteristics">характеристики </a>
                        <a href="#" data-cnt="tab-cnt-description">описание</a>
                        <a href="#" data-cnt="tab-cnt-delivery">Доставка <span> и Оплата</span> </a>
                    </div>
                    <div class="tabs-content">
                        <div class="tab-cnt tab-cnt-characteristics active">
                            <div class="characteristics">
                                @if($category->type == 2)
                                    <div class="characteristics-table">
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Модификация
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                                        {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->modification) !!}
                                                    </span>
                                                </a>
                                            </p>
                                            <span class="characteristics-info">{{ $modification->title }}</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Габариты
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->weight }} мм.</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Размер входа
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->entrance_size }} мм.</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Вес
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->weight }} кг</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Полезный объем
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->useful_volume }}
                                                куб/м</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Комплектация
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->equipment }}</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">Удлиненная горловина
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->elongate }}</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">Якорение
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->anchor }}</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="characteristics-table">
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Модификация
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                                        {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->modification) !!}
                                                    </span>
                                                </a>
                                            </p>
                                            <span class="characteristics-info">{{ $modification->title }}</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Тип водоотвода
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->type_of_drainage }}</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Производительность
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                                        {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->performance_prod) !!}
                                                    </span>
                                                </a>
                                            </p>
                                            <span class="characteristics-info">{{ $product->performance }}
                                                м3/сут.</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Залповый сброс
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->salvo_discharge }} л.</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Глубина врезки
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                                        {!! str_replace(array('<p>', '</p>'), array('', '<br>'), $hint->inset_depth_prod) !!}
                                                    </span>
                                                </a>
                                            </p>
                                            <span class="characteristics-info">{{ $product->insert_depth }} см</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Размеры
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->dimensions }} мм.</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">Потребление электроэнергии.
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->electricity_consumption }}
                                                кВт/сут</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Масса
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->weight }} кг.</span>
                                        </div>
                                        <div class="characteristics-table-row">
                                            <p class="characteristics-name">
                                                Монтаж "под ключ"
                                                <a href="#" class="filter-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <defs>
                                                            <style>.cls-1 {
                                                                    fill: #959595;
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
                                            <span class="characteristics-info">{{ $product->mounting }} руб.</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="files-items-wrap">
                                    @if($product->wiring_diagram)
                                        <div class="audio-item">
                                            <img src="/images/pdf-item.svg" alt="audio">
                                            <form method="post" action="/download/{{ $product->wiring_diagram }}"
                                                  class="audio-item-cnt">
                                                @csrf
                                                <a class="audio-title" href="#"
                                                   onclick="event.preventDefault();$('.download1').click();">Монтажная
                                                    <br> схема </a>
                                                <button class="audio-listen download1" style="background: none">
                                                    Скачать
                                                </button>
                                            </form>
                                        </div>
                                    @endif

                                    @if($product->technical_certificate)
                                        <div class="audio-item">
                                            <img src="/images/pdf-item.svg" alt="audio">
                                            <form method="post" action="/download/{{ $product->technical_certificate }}"
                                                  class="audio-item-cnt">
                                                @csrf
                                                <a class="audio-title" href="#"
                                                   onclick="event.preventDefault();$('.download2').click();">Технический
                                                    <br> паспорт </a>
                                                <button class="audio-listen download2" style="background: none">
                                                    Скачать
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-cnt tab-cnt-description">
                            <div class="card-description article">
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>
                        <div class="tab-cnt tab-cnt-delivery">
                            <div class="how">
                                <div class="how-list benefits-list">
                                    <div class="bnf">
                                        <div class="bnf-icon"><img src="/images/bnf-icon-2.svg" alt="bnf-icon"></div>
                                        <p>Банковской картой <br> через сайт </p>
                                    </div>
                                    <div class="bnf">
                                        <div class="bnf-icon"><img class="bnf-icon-5" src="/images/bnf-icon-5.svg"
                                                                   alt="bnf-icon"></div>
                                        <p>Наличными или <br>банковской картой <br>у нас в офисе</p>
                                    </div>
                                    <div class="bnf">
                                        <div class="bnf-icon"><img class="bnf-icon-6" src="/images/bnf-icon-6.svg"
                                                                   alt="bnf-icon"></div>
                                        <p>Наличными при<br> доставке</p>
                                    </div>
                                    <div class="bnf">
                                        <div class="bnf-icon"><img class="bnf-icon-7" src="/images/bnf-icon-7.svg"
                                                                   alt="bnf-icon"></div>
                                        <p>По счету - наш менеджер <br> выставит счет как на физ. <br> так и на юр. лицо
                                        </p>
                                    </div>
                                </div>
                                <p class="bold"><b>Когда ждать доставку? </b></p>
                                <p>Доставка осуществляется в течение 1-3х рабочих дней после оформления заказа, или в
                                    более поздние сроки по вашему желанию (приобретенное у нас оборудование может
                                    бесплатно храниться на нашем складе до 6-ти месяцев по договору ответственного
                                    хранения). Приобретайте выгодно оборудование зимой.</p>
                                <p class="bold"><b>Сколько стоит доставка?</b></p>
                                <p>Доставка товара в пределах 80 км от КАД осуществляется бесплатно в течение 3-х
                                    рабочих дней с момента заказа. Доставка товара дальше 80 км от КАД рассчитывается
                                    менеджером после оформления заказа и осуществляется также в сроки не более 3-х
                                    рабочих дней с момента звонка менеджера</p>
                                <p class="bold"><b>Возврат или обмен</b></p>
                                <p>Наступил гарантийный случай? Хотите оформить возврат или обмен? Обратитесь за помощью
                                    к нашему менеджеру мы незамедлительно все исправим: бесплатно доставим новое
                                    оборудование взамен бракованного или вернем вам деньги.</p>
                            </div>
                        </div>
                    </div>
                    @if($category->type == 2)
                        <div class="table-wrap">
                            <h4>Модификации продукции</h4>
                            <div class="table">
                                <table>
                                    <tr>
                                        <th>Модель</th>
                                        <th>Количество человек</th>
                                        <th>Залповый сброс, л</th>
                                        <th>Объем переработки, м3/сут</th>
                                        <th>Габариты, м</th>
                                        <th>ЦЕНА, руб</th>
                                    </tr>
                                    @foreach($product_modifications as $product_modification)
                                        @if($product_modification->id != $product->id)
                                            <tr onclick="location.href = '{!! route('product', [$product_modification->id]) !!}'">
                                                <td>{{ $product_modification->title }}</td>
                                                <td>{{ $product_modification->persons }}</td>
                                                <td>{{ $product_modification->salvo_discharge }}</td>
                                                <td>{{ $product_modification->performance }}</td>
                                                <td>{{ $product_modification->dimensions }}</td>
                                                <td>{{ number_format($product_modification->price, 0, '', ' ') }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                            <img src="/images/swipe.svg" alt="swipe" class="table-mob-img">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="catalog-preview catalog-preview-card">
            <div class="wrapper-m wrapper tabs-wrapper">
                <div class="catalog-head">
                    <div class="wrapper">
                        <h3 class="title">Каталог</h3>
                        <div class="tabs-section">
                            <a href="#" class="active" data-cnt="tab-cnt-1">Похожие</a>
                            <a href="#" data-cnt="tab-cnt-2">Советуем</a>
                        </div>
                    </div>
                </div>
                <div class="tabs-content">
                    <div class="catalog-list-wrap more-cnt tab-cnt tab-cnt-1 active">
                        <div class="catalog-list more-cnt-list">
                            @foreach($products as $product)
                                <div class="catalog-item">
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
                                    <p>{{ $product->header_note }}</p>
                                    <ul class="circle-list">
                                        <li>Для {{ $product->persons }} человек</li>
                                        <li>Производительность {{ $product->performance }} л/сутки</li>
                                        <li>Залповый сброс {{ $product->salvo_discharge }} л</li>
                                    </ul>
                                    <div class="catalog-item-price">
                                        @if($product->action)
                                            @if($stockToProd->where('id_product', '=', $product->id)->count() > 0)
                                                <span class="old"><span>{{ number_format($product->price, 0, '', ' ') }}</span> <span
                                                            class="price-value">руб</span></span>
                                                <span class="new">{{ number_format($product->price - ($product->price * ($stoc->where('id', '=', $stockToProd->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)), 0, '', ' ') }}
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
                    </div>
                    <div class="catalog-list-wrap more-cnt tab-cnt tab-cnt-2">
                        <div class="catalog-list more-cnt-list">
                            @foreach($products_advise as $product)
                                <div class="catalog-item">
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
                                    <p>{{ $product->header_note }}</p>
                                    <ul class="circle-list">
                                        <li>Для {{ $product->persons }} человек</li>
                                        <li>Производительность {{ $product->performance }} л/сутки</li>
                                        <li>Залповый сброс {{ $product->salvo_discharge }} л</li>
                                    </ul>
                                    <div class="catalog-item-price">
                                        @if($product->action)
                                            @if($stockToProd->where('id_product', '=', $product->id)->count() > 0)
                                                <span class="old"><span>{{ number_format($product->price, 0, '', ' ') }}</span> <span
                                                            class="price-value">руб</span></span>
                                                <span class="new">{{ number_format($product->price - ($product->price * ($stoc->where('id', '=', $stockToProd->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)), 0, '', ' ') }}
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
                        <a href="#" class="more-btn"><span>показать еще</span><img src="/images/arrow-double.svg"
                                                                                   alt="arrow"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="questions">
            <div class="wrapper">
                <div class="questions-titles">
                    <img src="/images/fly.png" alt="fly">
                    <h3 class="title">Остались вопросы? </h3>
                    <p class="questions-subtitle">Получите консультацию по выбору оборудования, и стоимости монтажных
                        работ</p>
                </div>
                <form action="/notifications" method="post">
                    @csrf
                    <input type="hidden" name="title" class="inp-title" value="Остались вопросы">
                    <input type="hidden" name="massege" value=" ">
                    <div class="questions-row">
                        <div class="questions-fields">
                            <input type="text" placeholder="Ваше имя" class="field" name="name">
                            <input type="tel" placeholder="телефон* " class="field phone-mask" name="phone">
                            <input class="btn" type="submit" value="отправить">
                        </div>
                        <p>или позвоните нам по телефону <a href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="infoblock">
            <div class="wrapper">
                <a href="index.html" class="logo"><img src="/images/logo.svg" alt="logo"></a>
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
                        $('.favorites_count').html(Number($('.favorites_count').html()) + 1);
                    } else {
                        $('.favorites_count').html($('.favorites_count').html() - 1);
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
                        $('.comparison_count').html(Number($('.comparison_count').html()) + 1);
                    } else {
                        $('.comparison_count').html($('.comparison_count').html() - 1);
                    }
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
        });

        $('.btn_comparison_card').click(function (e) {
            e.preventDefault();
            var form = $('.favorites-form-card').serialize();
            $.ajax({
                url: '/post-comparison',
                type: "POST",
                data: form,
                success: function (data) {
                    if (data == 'add') {
                        $('.comparison_count').html(Number($('.comparison_count').html()) + 1);
                    } else {
                        $('.comparison_count').html($('.comparison_count').html() - 1);
                    }
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
        });
    </script>

    <script>

        $('.btn_cart').click(function (e) {
            e.preventDefault();
            var form = $(this).closest('.cart-form').serialize();

            $.ajax({
                url: '/add-in-cart',
                type: "POST",
                data: form,
                success: function (data) {
                    if (data == 'add') {
                        $('.cart_count').html(Number($('.cart_count').html()) + 1);
                    }
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
        });

    </script>
@endsection






