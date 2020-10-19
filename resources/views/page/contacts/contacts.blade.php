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
                    <div class="contacts-cnt">
                        <div class="contacts-column">
                            <div class="contacts-item">
                                <div class="contacts-item-title">АДРЕС ОФИСА</div>
                                <p>{{ $contacts->address }}</p>
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
                                <p>{{ $contacts->schedule }}</p>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">EMAIL</div>
                                <a href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                            </div>
                            <div class="contacts-item">
                                <div class="contacts-item-title">ТЕЛЕФОН </div>
                                <a href="teL:{{ $contacts->phone }}">{{ $contacts->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="contacts-map">
                        <iframe class="b-lazy" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2005.7006925783917!2d30.358308516218926!3d59.82089207855354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696251a51ff16b9%3A0x60b998098483b344!2z0JzQvtGB0LrQvtCy0YHQutC-0LUg0YguLCAyNSwg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsINCg0L7RgdGB0LjRjywgMTk2MTU4!5e0!3m2!1sru!2sua!4v1591874976532!5m2!1sru!2sua" width="600" height="450"  style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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