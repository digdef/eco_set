@extends('index')
@section('meta')
    <title>Наши цены</title>
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
                <span>Наши цены</span>
            </div>
        </div>
        <div class="price">
            <div class="wrapper">
                <h1 class="title title-s">Наши цены</h1>
            </div>
            <div class="sections">
                <div class="wrapper wrapper-l">
                    <div class="sections-list">
                        <div class="sections-item sections-item-1 {{ $cat == 1 ? 'active' : '' }}">
                            <div class="sections-cnt">
                                <a href="/price/1" class="sections-title">септики</a>
                                <div class="sections-links">
                                    @foreach($categories as $category)
                                        @if($category->type == 1)
                                            <a class="{{ $mod == $category->id ? 'active' : '' }}" href="/price/cat/{{ $category->id }}">{{ $category->title }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="sections-img"><img src="/images/sections-img-1.png" alt="sections"></div>
                        </div>
                        <div class="sections-item sections-item-2 {{ $cat == 3 ? 'active' : '' }}">
                            <div class="sections-cnt">
                                <a href="/price/3" class="sections-title">Водоснабжение</a>
                                <div class="sections-links">
                                    <a href="#">От скважины в дом</a>
                                    <a href="#">От колодца в дом </a>
                                    <a href="#">От магистральной трубы в дом</a>
                                </div>
                            </div>
                            <div class="sections-img"><img src="/images/sections-img-2.png" alt="sections"></div>
                        </div>
                        <div class="sections-item sections-item-3 {{ $cat == 2 ? 'active' : '' }}">
                            <div class="sections-cnt">
                                <a href="/price/3" class="sections-title">погреба</a>
                                <div class="sections-links">
                                    @foreach($categories as $category)
                                        @if($category->type == 2)
                                            <a class="{{ $mod == $category->id ? 'active' : '' }}" href="/price/cat/{{ $category->id }}">{{ $category->title }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="sections-img"><img src="/images/sections-img-3.png" alt="sections"></div>
                        </div>
                        <div class="sections-item sections-item-4 {{ $cat == 4 ? 'active' : '' }}">
                            <div class="sections-cnt">
                                <a href="/price/4" class="sections-title">комплектующие</a>
                                <div class="sections-links">
                                    @foreach($categories as $category)
                                        @if($category->type == 4)
                                            <a class="{{ $mod == $category->id ? 'active' : '' }}" href="/price/cat/{{ $category->id }}">{{ $category->title }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="sections-img"><img src="/images/sections-img-4.png" alt="sections"></div>
                        </div>
                        <div class="sections-item sections-item-6 {{ $cat == 5 ? 'active' : '' }}">
                            <div class="sections-cnt">
                                <a href="/price/5" class="sections-title">обслуживание </a>
                            </div>
                            <div class="sections-img"><img src="/images/sections-img-6.png" alt="sections"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="price-info">
                    <h5>Стоимость канализации загородного дома BioDeka</h5>
                    <p>Стоимость канализации загородного дома BioDeka</p>
                    <p>Нижеуказанная цена Юнилос Астра не включает монтаж. Монтаж рассчитывается отдельно с учетом особенностей грунта, протяженности сетей и других  параметров. Вы можете рассчитать цену канализации Астра с монтажом самостоятельно с помощью удобного онлайн - калькулятора "Стоимость монтажа",  встроенного в карточку товара. Или просто набрать нам в офис по телефону: +7 (812) 385-73-83</p>
                    <p>Комплект аварийной сигнализации бесплатно!</p>
                    <p>При принудительном способе отведения воды в стоимость входит встроенная емкость и дренажный насос Pedrollo TOP-1/DAB NOVA 180-M</p>
                </div>
                <div class="table-wrap">
                    <div class="table">
                        <table>
                            <tr>
                                <th>Модель</th>
                                <th>Тип сброса</th>
                                <th>Глубина врезки</th>
                                <th>Объем переработки, м3/сут </th>
                                <th>Габариты, м </th>
                                <th>ЦЕНА, руб</th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td><a href="{!! route('product', [$product->id]) !!}">{{ $product->title }}</a></td>
                                    <td>{{ $product->reset_type }}</td>
                                    <td>{{ $product->insert_depth }}</td>
                                    <td>{{ $product->performance }}</td>
                                    <td>{{ $product->dimensions }}</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <img src="/images/swipe.svg" alt="swipe" class="table-mob-img">
                </div>
            </div>
        </div>
    </div>
@endsection

