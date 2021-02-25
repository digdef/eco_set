@extends('index')
@section('meta')
    <title>{{ $article->meta_title ?? $article->title }}</title>
    <meta name="description" lang="ru" content="{{ $article->meta_description ?? $article->title }}">

    <meta property="og:title" content="{{ $article->meta_title ?? $article }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $article->meta_description ?? $article->title }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <a href="/articles">Статьи</a>
                <span class="breadcrumbs-slash">|</span>
                <span>{{ $article->title }}</span>
            </div>
        </div>
        <div class="services">
            <div class="wrapper">
                <div class="services-article article">
                    <h1>{{ $article->title }}</h1>
                    <p>{!! $article->description !!}</p>
                    <div><a href="#">{{ $article->created_at }}</a></div>
                    <div class="article-share">

                        <div class="article-share-trigger"><img src="/images/share.svg" alt="share"></div>
                        <div class="article-share-cnt">
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"><img src="/images/twitter.svg" alt="twitter"></a>
                            <a href="{{ $article->pinterest ?? '#' }}"><img src="/images/pintarest.svg" alt="pintarest"></a>
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
