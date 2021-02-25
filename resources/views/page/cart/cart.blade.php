@extends('index')
@section('meta')
    <title>{{ $seo->meta_title ?? 'Корзина' }}</title>
    <meta name="description" lang="ru" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">

    <meta property="og:title" content="{{ $seo->meta_title ?? 'Корзина' }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <span>Корзина</span>
            </div>
        </div>
        <div class="cart cart-section">
            <div class="wrapper">
                <h1 class="title title-s">Корзина</h1>
                <div class="cart-list {{ count($carts) > 0 ? '' : 'no-cnt' }}">
                    <p class="cart-without">Ваша корзина пустая</p>
                    {{--<form action="#">--}}
                    <div class="cart-row cart-navigation">
                        <p class="cart-name">Наименование</p>
                        <p class="cart-info">Доп. информация</p>
                        <p class="cart-quantity">Кол-во</p>
                        <p class="cart-price">Цена</p>
                    </div>
                    @foreach($products as $product)
                        <div class="cart-row cart-item">
                            <a href="{!! route('product', [$product->id]) !!}" class="cart-img"><img
                                        src="/images/{{ $product->img }}" alt="cart-img"></a>
                            <a href="{!! route('product', [$product->id]) !!}"
                               class="cart-name">{{ $product->title }}</a>
                            <div class="cart-info">
                                <ul>
                                    <li>Для {{ $product->persons }} человек</li>
                                    <li>Производительность {{ $product->performance }} л/сутки</li>
                                    <li>Залповый сброс {{ $product->salvo_discharge }} л</li>
                                </ul>
                            </div>
                            <form class="cart-quantity">
                                @csrf
                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                <input type="hidden" id="quantity" name="quantity" value="{{ $numbers->where('id', $product->id)->first()['number'] }}">
                                <p>Кол-во</p>
                                <div class="quantity-row">
                                    @if($product->action)
                                        @if($stockToProducts->where('id_product', '=', $product->id)->count() > 0)
                                            <div class="price-val" style="display: none">{{ $product->price - ($product->price * ($stock->where('id', '=', $stockToProducts->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)) }}</div>
                                        @else
                                            <div class="price-val" style="display: none">{{ $product->price }}</div>
                                        @endif
                                    @else
                                        <div class="price-val" style="display: none">{{ $product->price }}</div>
                                    @endif
                                    <button class="quantity-plus"><img src="/images/plus.svg" alt="plus"></button>
                                    <input type="text" disabled
                                           value="{{ $numbers->where('id', $product->id)->first()['number'] }}">
                                    <button class="quantity-minus"><img src="/images/minus.svg" alt="minus">
                                    </button>
                                </div>
                            </form>
                            <div class="cart-price">
                                @if($product->action)
                                    @if($stockToProducts->where('id_product', '=', $product->id)->count() > 0)
                                        <p class="cart-price-old"><span>{{ number_format($product->price*$numbers->where('id', $product->id)->first()['number'], 0, '', ' ') }}</span> <span class="price-value">руб</span></p>
                                        <p class="cart-price-new">{{ number_format(($product->price - ($product->price * ($stock->where('id', '=', $stockToProducts->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)))*$numbers->where('id', $product->id)->first()['number'], 0, '', ' ') }} <span>руб</span></p>
                                    @else
                                        <p class="cart-price-new">{{ number_format($product->price*$numbers->where('id', $product->id)->first()['number'], 0, '', ' ') }} <span>руб</span></p>
                                    @endif
                                @else
                                    <p class="cart-price-new">{{ number_format($product->price*$numbers->where('id', $product->id)->first()['number'], 0, '', ' ') }} <span>руб</span></p>
                                @endif
                            </div>
                            <form method="POST" class="cart-form">
                                @csrf
                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                <button type="button" class="delete-cart-item" style="background: none">
                                    <img src="/images/popup-close.svg" alt="close">
                                </button>
                            </form>

                        </div>
                    @endforeach
                    <div class="price-all" style="display: none">{{ $sum }}</div>
                    <div class="cart-row cart-buttons">
                        <div>
                            <p class="cart-all">Итого</p>
                            <p class="cart-buttons-price">{{ $sum }} <span>руб</span></p>
                        </div>
                        <input onclick="location.href = '/checkout'" class="btn" type="submit" value="Оформить заказ">
                    </div>
                    {{--</form>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
