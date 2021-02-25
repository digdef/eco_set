@extends('index')
@section('meta')
    <title>{{ $seo->meta_title ?? 'Статьи' }}</title>
    <meta name="description" lang="ru" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">

    <meta property="og:title" content="{{ $seo->meta_title ?? 'Статьи' }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="/">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <span>Статьи</span>
            </div>
        </div>
        <div class="stocks">
            <div class="wrapper">
                <h1 class="title title-s">Статьи</h1>
                <div class="stocks-preview">

                    @foreach($articles as $article)

                        <div class="stocks-preview-item">
                            <div class="stocks-preview-item-img"><img src="/images/{{ $article->img }}"
                                                                      alt="stocks-prev-img"></div>
                            <div class="stocks-preview-item-cnt">
                                <a href="/article/{{ $article->id }}" class="stocks-preview-item-title">{{ $article->title }}</a>
                                <p>{!! mb_strimwidth($article->description, 0, 100, "...") !!}</p>
                                <a href="/article/{{ $article->id }}" class="stocks-preview-item-more">подробнее</a>
                            </div>
                        </div>

                    @endforeach

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
    </div>
@endsection
