@extends('index')
@section('meta')
    <title>{{$categ->meta_title_price ?? $ceo_text->meta_title}}</title>
    <meta name="description" lang="ru" content="{{$categ->meta_description_price ?? $ceo_text->meta_description}}">

    <meta property="og:title" content="{{$categ->meta_title_price ?? $ceo_text->meta_title}}">
    <meta property="og:type" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:description" content="{{$categ->meta_description_price ?? $ceo_text->meta_description}}">
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
                @if($categ)
                    <h1 class="title title-s">{{ $categ->title_price ?? 'Наши цены' }}</h1>
                @else
                    <h1 class="title title-s">Наши цены</h1>
                @endif
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
                                <a href="/price/2" class="sections-title">погреба</a>
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
{{--                <div class="price-info">--}}
{{--                    @if($categ)--}}
{{--                        <h5>{{ $categ->title_price }}</h5>--}}
{{--                    @endif--}}
{{--                </div>--}}
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

