@extends('index')
@section('meta')
    <title>{{ $stock->meta_title ?? $stock->title }}</title>
    <meta name="description" lang="ru" content="{{ $stock->meta_description ?? $stock->title }}">

    <meta property="og:title" content="{{ $stock->meta_title ?? $stock->title }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $stock->meta_description ?? $stock->title }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <a href="/stocks">Акции</a>
                <span class="breadcrumbs-slash">|</span>
                <span>{{ $stock->title }}</span>
            </div>
        </div>
        <div class="stocks stocks-open">
            <div class="wrapper">
                <div class="stocks-article article">
                    <h1>{{ $stock->title }}</h1>
                    <img src="/images/{{ $stock->img }}"  alt="article">
                    <p>{!! $stock->description !!}</p>
                    <div><a href="#">{{ $stock->created_at }}</a></div>
                    <div class="article-share">

                        <div class="article-share-trigger">
                            <img src="/images/share.svg" alt="share">
                        </div>
                        <div class="article-share-cnt">
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"><img src="/images/twitter.svg" alt="twitter"></a>
                            @if($stock->pinterest)
                                <a href="{{ $stock->pinterest ?? '#' }}"><img src="/images/pintarest.svg" alt="pintarest"></a>
                            @endif
                            <a href="https://www.linkedin.com/cws/share/?url={{ url()->current() }}"><img src="/images/linkedin.svg" alt="linkedin"></a>
                            <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"><img src="/images/facebook.svg" alt="facebook"></a>
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
