@extends('index')
@section('meta')
    <title>Оформление заказа</title>
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
                <a href="/cart">Корзина </a>
                <span class="breadcrumbs-slash">|</span>
                <span>Оформление заказа</span>
            </div>
        </div>
        <div class="checkout">
            <div class="wrapper">
                <h1 class="title title-s">Оформление заказа</h1>
                <div class="checkout-block">
                    <div class="checkout-form">
                        <form action="/checkout" method="post">
                            @csrf
                            <input type="hidden" name="total" value="{{ $sum }}">
                            <div class="checkout-form-row">
                                <p>Контактные данные</p>
                                <input type="text" placeholder="Имя и фамилия" class="field" name="name">
                                <input type="text" placeholder="Город" class="field" name="city">
                                <input type="tel" placeholder="Мобильный телефон" class="field phone-mask" name="phone">
                                <input type="email" placeholder="Эл. почта" class="field" name="email">
                                <textarea class="field" placeholder="Комментарий к заказу" name="comment"></textarea>
                            </div>
                            <div class="checkout-form-row">
                                <p>Выбор способов доставки и оплаты</p>
                                <div class="checkout-form-column-wrap">
                                    <div class="checkout-form-column">
                                        <span>Доставка</span>
                                        <div class="custom-select">
                                            <select name="delivery">
                                                <option value="Самовывоз">Самовывоз</option>
                                                <option value="С пункта выдачи">С пункта выдачи</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="checkout-form-column">
                                        <span>Оплата</span>
                                        <div class="custom-select">
                                            <select name="payment">
                                                <option value="Оплатить заказ при получении">Оплатить заказ при получении</option>
                                                <option value="Наличными при доставке">Наличными при доставке</option>
                                                <option value="По счету - наш менеджер выставит счет как на физ. так и на юр. лицо">По счету - наш менеджер выставит счет как на физ. так
                                                    и на юр. лицо
                                                </option>
                                                <option value="Наличными или банковской картой у нас в офисе">Наличными или банковской картой у нас в офисе</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn" type="submit" value="заказать">
                        </form>
                    </div>
                    <div class="checkout-info">
                        @foreach($products as $product)
                            <div class="checkout-info-row">
                                <a href="{!! route('product', [$product->id]) !!}">{{ $product->title }}</a>
                                <span><span>{{ $numbers->where('id', $product->id)->first()['number'] }}</span> шт.</span>
                                @if($product->action)
                                    @if($stockToProducts->where('id_product', '=', $product->id)->count() > 0)
                                        <p>{{ $numbers->where('id', $product->id)->first()['number'] * ($product->price - ($product->price * ($stock->where('id', '=', $stockToProducts->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100))) }} <span>руб</span></p>
                                    @else
                                        <p>{{ $numbers->where('id', $product->id)->first()['number'] * $product->price }} <span>руб</span></p>
                                    @endif
                                @else
                                    <p>{{ $numbers->where('id', $product->id)->first()['number'] * $product->price }} <span>руб</span></p>
                                @endif
                            </div>
                        @endforeach
                            <div class="checkout-info-row checkout-info-row-all">
                                <p class="checkout-all">Итого </p>
                                <p>{{ $sum }}  <span>руб</span></p>
                            </div>
                        <a href="/cart" class="checkout-edit">Редактировать заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
