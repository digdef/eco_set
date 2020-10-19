@extends('index')
@section('meta')
    <title>Компания</title>
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
                <span>компания</span>
            </div>
        </div>
        <div class="about">
            <div class="wrapper">
                <h1 class="title title-s">компания</h1>
                <div class="about-cnt">
                    <div class="about-row">
                        <div class="about-img wow fadeInLeft about-img-1">
                            <img src="/images/{{ $about->img1 }}" alt="about">
                            {{--<img class="about-img-bg" src="/images/about-img-11.png" alt="about">--}}
                        </div>
                        <div class="about-text  wow fadeInRight">
                            {!! $about->text1 !!}
                        </div>
                    </div>
                    <div class="about-row">
                        <div class="about-text wow  fadeInLeft">
                            {!! $about->text2 !!}
                        </div>
                        <div class="about-img about-img-2  wow fadeInRight">
                            <img src="/images/{{ $about->img2 }}" alt="about">
                            {{--<img class="about-img-bg" src="/images/about-img-22.png" alt="about">--}}
                        </div>
                    </div>
                    <div class="about-row about-row-3">
                        <div class="about-text">
                            {!! $about->text3 !!}
                        </div>
                    </div>
                </div>
                <div class="slider-wrap">
                    <div class="slider-item slider-letters">
                        <div class="slider-title">
                            <p>Наши сертификаты</p>
                            <div class="slide-nav">
                                <button class="am-prev owl-prev" data-slider=".slider-letters .slider">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.93 39.9"><defs><style>.cls-1{fill:#8bc441;}</style></defs><g><g><path class="cls-1" d="M2.77,30.07a19.93,19.93,0,0,0,27.4,7,.81.81,0,0,0-.8-1.4,8.27,8.27,0,0,1-1.6.9,18.32,18.32,0,1,1,9.5-10.4.79.79,0,0,0,1.5.5,19.83,19.83,0,0,0-.8-15.3,20.24,20.24,0,0,0-11.3-10.2,19.95,19.95,0,0,0-23.9,28.9Z"/><path class="cls-1" d="M11.77,20.77h20.3a.8.8,0,1,0,0-1.6H11.77a.8.8,0,1,0,0,1.6Z"/><path class="cls-1" d="M9,20l8.5-8.4a.85.85,0,0,0-1.2-1.2l-9.1,9.1h0a.78.78,0,0,0,0,1.1l9.1,9.1a.85.85,0,0,0,1.2-1.2Z"/></g></g></svg>
                                </button>
                                <button class="am-next owl-next" data-slider=".slider-letters .slider">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.93 39.9"><defs><style>.cls-1{fill:#8bc441;}</style></defs><g><g><path class="cls-1" d="M38.77,13.27a19.94,19.94,0,0,0-25.5-12.1A20.24,20.24,0,0,0,2,11.37a19.83,19.83,0,0,0-.8,15.3.88.88,0,0,0,1,.5.88.88,0,0,0,.5-1,18.47,18.47,0,1,1,9.5,10.4,8.27,8.27,0,0,1-1.6-.9.81.81,0,0,0-.8,1.4,19.93,19.93,0,0,0,29-23.8Z"/><path class="cls-1" d="M29,20a.86.86,0,0,0-.8-.8H7.87a.8.8,0,1,0,0,1.6h20.3A.86.86,0,0,0,29,20Z"/><path class="cls-1" d="M22.47,28.47a.85.85,0,0,0,1.2,1.2l9.1-9.1a.78.78,0,0,0,0-1.1h0l-9.1-9.1a.85.85,0,0,0-1.2,1.2L31,20Z"/></g></g></svg>
                                </button>
                            </div>
                        </div>
                        <div class="slider owl-carousel">
                            @foreach($reviews as $review)
                                @if($review->type == 5)
                                    <a data-fancybox href="/images/{{ $review->content }}"><img  class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/{{ $review->content }}" alt="letter"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="questions">
            <div class="wrapper">
                <div class="questions-titles">
                    <img src="/images/fly.png" alt="fly">
                    <h3 class="title">Остались вопросы? </h3>
                    <p class="questions-subtitle">Получите консультацию по выбору оборудования, и стоимости монтажных работ</p>
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
    </div>
@endsection