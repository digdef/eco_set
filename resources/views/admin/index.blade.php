<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
@yield('meta')

<!-- favicons -->
    <link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/images/favicons/android-chrome-192x192.png" sizes="192x192">
    <meta name="msapplication-square70x70logo" content="/images/favicons/smalltile.png"/>
    <meta name="msapplication-square150x150logo" content="/images/favicons/mediumtile.png"/>
    <meta name="msapplication-wide310x150logo" content="/images/favicons/widetile.png"/>
    <meta name="msapplication-square310x310logo" content="/images/favicons/largetile.png"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>

    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            padding-top: 4.5rem;
            margin-bottom: 4.5rem;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 3.5rem;
            line-height: 3.5rem;
            background-color: #ccc;
        }

        .nav-link:hover {
            transition: all 0.4s;
        }

        .nav-link-collapse:after {
            float: right;
            content: '\f067';
            font-family: 'FontAwesome';
        }

        .nav-link-show:after {
            float: right;
            content: '\f068';
            font-family: 'FontAwesome';
        }

        .nav-item ul.nav-second-level {
            padding-left: 0;
        }

        .nav-item ul.nav-second-level > .nav-item {
            padding-left: 20px;
        }

        @media (min-width: 992px) {
            .sidenav {
                position: absolute;
                top: 0;
                left: 0;
                width: 230px;
                height: calc(100vh - 3.5rem);
                margin-top: 3.5rem;
                background: #343a40;
                box-sizing: border-box;
                border-top: 1px solid rgba(0, 0, 0, 0.3);
            }

            .navbar-expand-lg .sidenav {
                flex-direction: column;
            }



            .footer {
                width: calc(100% - 230px);
                margin-left: 230px;
            }
        }








        .example-2 .btn-tertiary {
            color: #555;
            padding: 0;
            line-height: 40px;
            width: 300px;
            /*margin: auto;*/
            margin-top: 10px;
            display: block;
            border: 2px solid #555
        }

        .example-2 .btn-tertiary:hover, .example-2 .btn-tertiary:focus {
            color: #888;
            border-color: #888
        }

        .example-2 .input-file {
            width: .1px;
            height: .1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1
        }

        .example-2 .input-file + .js-labelFile {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            padding: 0 10px;
            cursor: pointer
        }

        .example-2 .input-file + .js-labelFile .icon:before {
            content: "\f093"
        }

        .example-2 .input-file + .js-labelFile.has-file .icon:before {
            content: "\f00c";
            color: #5AAC7B
        }

    </style>
    @if(Auth::check())
        <style>
            @media (min-width: 992px) {

                .content-wrapper {
                    margin-left: 230px;
                }
            }
        </style>
    @endif

</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Экосеть</a>
    @if(Auth::check())
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                <li class="nav-item {{ Request::is('admin/checkout') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/checkout">Заказы <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('admin/product/add') || Request::is('admin/product/all') || Request::is('edit_product') ? 'active' : '' }}">
                    <a class="nav-link nav-link-collapse"
                       href="#"
                       id="hasSubItems"
                       data-toggle="collapse"
                       data-target="#collapseSubItems2"
                       aria-controls="collapseSubItems2"
                       aria-expanded="false">Товары</a>
                    <ul class="nav-second-level collapse" id="collapseSubItems2" data-parent="#navAccordion">
                        <li class="nav-item {{ Request::is('admin/category/all/1') ? 'active' : '' }}">
                            <a class="nav-link" href="{!! route('all_category', [1]) !!}">
                                <span class="nav-link-text">Септики</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/category/all/2') ? 'active' : '' }}">
                            <a class="nav-link" href="{!! route('all_category', [2]) !!}">
                                <span class="nav-link-text">Погреба</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/water/all') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/water/all">
                                <span class="nav-link-text">Водоснабжение</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/category/all/4') ? 'active' : '' }}">
                            <a class="nav-link" href="{!! route('all_category', [4]) !!}">
                                <span class="nav-link-text">Комплектующие</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--<li class="nav-item {{ Request::is('admin_price') ? 'active' : '' }}">--}}
                {{--<a class="nav-link" href="/admin/price">Наши цены <span class="sr-only">(current)</span></a>--}}
                {{--</li>--}}

                <li class="nav-item {{ Request::is('admin/stocks/all') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/stocks/all/">Акции <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/services/all') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/services/all/">Услуги <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/reviews/all') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/reviews/all/">Отзывы <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/ourWorks/all') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/ourWorks/all/">Наши работы <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/contacts') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/contacts/">Контакты <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/notifications') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/notifications/">Уведомления <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/article/all') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/article/all/">Статьи <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/howToBuy') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/howToBuy/">Как купить <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/about') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/about/">Компания <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/hints') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/hints/">Подсказки <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/seo') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/seo/">SEO<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    @endif
</nav>

<main class="content-wrapper">
    <div class="container-fluid">
        @yield('content')
    </div>
</main>

<script src="/js/jquery-3.3.1.min.js"></script>


<script>
    $(document).ready(function () {
        $('.nav-link-collapse').on('click', function () {
            $('.nav-link-collapse').not(this).removeClass('nav-link-show');
            $(this).toggleClass('nav-link-show');
        });
    });

    $('.upload_img').click(function (e) {
        e.preventDefault();

        var form = $(this).closest('.upload_img_form').serialize();

        $.ajax({
            url: '/upload-img',
            type: "POST",
            data: form,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == 'add') {
                    $('#cart_count').html(Number($('#cart_count').html()) + 1);
                } else {
                    $('#cart_count').html($('#cart_count').html() - 1);
                }
            },
            error: function (msg) {
                alert('Ошибка');
            }

        });
    });

    (function() {
        'use strict';
        $('.input-file').each(function() {
            var $input = $(this),
                $label = $input.next('.js-labelFile'),
                labelVal = $label.html();

            $input.on('change', function(element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
            });
        });

    })();

</script>
</body>
</html>