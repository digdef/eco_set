@extends('index')
@section('meta')
    <title>Контакты</title>
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
                <span>Контакты</span>
            </div>
        </div>
        <div class="contacts">
            <div class="wrapper">
                <h1 class="title title-s">Контакты</h1>
            </div>
            <div class="wrapper-big">
                <div class="contacts-row">
                    <div class="contacts-cnt" itemtype="http://schema.org/LocalBusiness" itemscope>
                        <meta itemprop="name" content="ЭКО-СЕТЬ"/>
                        <div class="contacts-column">
                            <div class="contacts-item">
                                <div class="contacts-item-title">АДРЕС ОФИСА</div>
                                <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">{!! $contacts->address !!}</p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">МЫ В СОЦСЕТЯХ: </div>
                                <div class="socials-links">
                                    <a href="{{ $contacts->facebook }}"><img src="/images/facebook.svg" alt="facebook"></a>
                                    <a href="{{ $contacts->vk }}"><img src="/images/vk.svg" alt="vk"></a>
                                    <a href="{{ $contacts->instagram }}"><img src="/images/instagram.svg" alt="instagram"></a>
                                </div>
                            </div>
                        </div>
                        <div class="contacts-column">
                            <div class="contacts-item">
                                <div class="contacts-item-title">ГРАФИК РАБОТЫ </div>
                                <p>{!! $contacts->schedule !!}</p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">EMAIL</div>
                                <meta itemprop="email" content="{{ $contacts->email }}"/>
                                <a href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">ТЕЛЕФОН </div>
                                <meta itemprop="telephone" content="{{ $contacts->phone }}"/>
                                <a href="teL:{{ $contacts->phone }}">{{ $contacts->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="contacts-map">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A16967e4407394c73724948b6f566b2f1983bd57fe7937c97d9aa04101f4d1094&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
                    </div>
                </div>
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
