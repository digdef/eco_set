@extends('index')
@section('meta')
    <title>404</title>
    <meta name="description" lang="ru" content="ДСВ – Інновації для Вашого успіху">

    <meta property="og:title" content="ДСВ – Інновації для Вашого успіху">
    <meta property="og:type" content="website">
    <meta property="og:description" content="ДСВ – Інновації для Вашого успіху">
    <style>
        .error-page p a {
            transition: 0.2s;
            text-decoration: underline;
        }

        .error-page p a:hover {
            color: gray;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
    <div class="main-wrapper">
        <div class="main">
            <div class="error-page">
                <div class="wrapper">
                    <p style="margin-bottom: 10px;">
                        Извините, такого адреса (раздела сайта) <br>не существует.Пожалуйста, проверьте адрес <br>и
                        попробуйте еще раз.
                    </p>
                    <p style="margin-bottom: 4px;">
                        <a href="/" style="font-size: 16px; ">Вернуться на главную</a>
                    </p>
                    <h1 style="color: #e6e6e6;">
                        <span>ошибка</span>
                        404
                    </h1>


                </div>
            </div>
        </div>
    </div>
@endsection
