@extends('index')
@section('meta')
    <title>{{ $seo->meta_title ?? 'Как купить' }}</title>
    <meta name="description" lang="ru" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">

    <meta property="og:title" content="{{ $seo->meta_title ?? 'Как купить' }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $seo->meta_description ?? 'ДСВ – Інновації для Вашого успіху' }}">
@endsection

@section('content')
    <div class="main">
        <div class="breadcrumbs">
            <div class="wrapper">
                <a href="index.html">Главная</a>
                <span class="breadcrumbs-slash">|</span>
                <span>Как купить</span>
            </div>
        </div>
        <div class="how">
            <div class="wrapper">
                <h1 class="title title-s">Как купить</h1>
                <div class="how-list benefits-list">
                    <div class="bnf">
                        <div class="bnf-icon"><img src="./images/bnf-icon-2.svg" alt="bnf-icon"></div>
                        <p>{!! $howToBuy->text_icon1 !!} </p>
                    </div>
                    <div class="bnf">
                        <div class="bnf-icon"><img class="bnf-icon-5" src="./images/bnf-icon-5.svg" alt="bnf-icon"></div>
                        <p>{!! $howToBuy->text_icon2 !!}</p>
                    </div>
                    <div class="bnf">
                        <div class="bnf-icon"><img class="bnf-icon-6" src="./images/bnf-icon-6.svg" alt="bnf-icon"></div>
                        <p>{!! $howToBuy->text_icon3 !!}</p>
                    </div>
                    <div class="bnf">
                        <div class="bnf-icon"><img class="bnf-icon-7" src="./images/bnf-icon-7.svg" alt="bnf-icon"></div>
                        <p>{!! $howToBuy->text_icon4 !!}</p>
                    </div>
                </div>
                {!! $howToBuy->text !!}
            </div>
        </div>
        <div class="questions">
            <div class="wrapper">
                <div class="questions-titles">
                    <img src="./images/fly.png" alt="fly">
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
