<footer class="footer">
    <div class="wrapper">
        <div class="footer-row">
            <div class="footer-column">
                <div class="footer-column-item">
                    <a class="footer-column-item-title" href="/catalog/septic">Септики</a>
                    @foreach($categories as $category)
                        @if($category->type == 1)
                            <a href="/catalog/septic?manufacturer%5B%5D={{ $category->id }}">{{ $category->title }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-column-item">
                    <a class="footer-column-item-title" href="/catalog/cellars">Погреба</a>
                    @foreach($categories as $category)
                        @if($category->type == 2)
                            <a href="/catalog/cellars?manufacturer%5B%5D={{ $category->id }}">{{ $category->title }}</a>
                        @endif
                    @endforeach
                </div>
                <div class="footer-column-item">
                    <span class="footer-column-item-title">Другое</span>
                    <a href="/catalog/accessories">Комплектующие</a>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-column-item">
                    <span class="footer-column-item-title">Навигация по сайту</span>
                    <a href="/stocks">Акции</a>
                    <a href="/services">Услуги</a>
                    <a href="/articles">Статьи</a>
                    <a href="/ourWorks">Наши работы</a>
                    <a href="/price/1">Наши цены</a>
                    <a href="/reviews">Отзывы</a>
                    <a href="/howToBuy">Как купить</a>
                    <a href="/about">Компания</a>
                    <a href="/contacts">Контакты</a>
                    <a href="/map">Карта сайта</a>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-column-item">
                    <span class="footer-column-item-title">Связаться с нами</span>
                    <span class="footer-adress">{!! $contacts->address !!}</span>
                    <a href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</a>
                </div>
                <div class="footer-column-item">
                    <span class="footer-column-item-title socials-links-title">Мы в соц. сетях  </span>
                    <div class="socials-links">
                        <a href="{{ $contacts->facebook }}"><img src="/images/facebook.svg" alt="facebook"></a>
                        <a href="{{ $contacts->vk }}"><img src="/images/vk.svg" alt="vk"></a>
                        <a href="{{ $contacts->instagram }}"><img src="/images/instagram.svg" alt="instagram"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-row copyright">
            <p>© 2012-2020 Экосеть</p>
            <p>Website by
                <a href="http://paradigma.in.ua/"><img src="/images/paradigma.png" alt="paradigma"></a>
            </p>
        </div>
    </div>
</footer>
<div id="oneClick" class="popup-wrapper">
    <div class="popup-layout">
        <div class="popup">
            <div class="popup-cnt">
                <form action="/notifications" method="post">
                    @csrf
                    <input type="hidden" name="title" class="inp-title" value="Купить в 1 клик!">

                    <div class="popup-title">Купить в 1 клик <span>АСТРА 3</span></div>
                    <input type="text" placeholder="Ваше имя" class="field" name="name">
                    <input type="tel" placeholder="телефон* " class="field phone-mask" name="phone">
                    <textarea name="massege" placeholder="Коментарий"  class="field field-norequired"></textarea>
                    <input class="btn" type="submit" value="заказать">
                </form>
            </div>
            <div class="popup-close"><img src="/images/popup-close.svg" alt="icon-close"></div>
        </div>
    </div>
</div>
<div id="callbackPopup" class="popup-wrapper">
    <div class="popup-layout">
        <div class="popup">
            <div class="popup-cnt">
                <form action="/notifications" method="post">
                    @csrf
                    <input type="hidden" name="title" class="inp-title" value="Заказать бесплатный звонок!">
                    <input type="hidden" name="massege" value=" ">
                    <div class="popup-title">Заказать бесплатный звонок!</div>
                    <input type="text" placeholder="Ваше имя" class="field" name="name">
                    <input type="tel" placeholder="телефон* " class="field phone-mask" name="phone">
                    <input class="btn" type="submit" value="заказать">
                </form>
            </div>
            <div class="popup-close"><img src="/images/popup-close.svg" alt="icon-close"></div>
        </div>
    </div>
</div>
<div id="callbackPopupInstallation" class="popup-wrapper">
    <div class="popup-layout">
        <div class="popup">
            <div class="popup-cnt">
                <form action="/notifications" method="post">
                    @csrf
                    <input type="hidden" name="title" class="inp-title" value="Заказать монтаж!">
                    <input type="hidden" name="massege" value=" ">
                    <div class="popup-title">Заказать монтаж! <span></span></div>
                    <input type="text" placeholder="Ваше имя" class="field" name="name">
                    <input type="tel" placeholder="телефон* " class="field phone-mask" name="phone">
                    <input class="btn" type="submit" value="заказать">
                </form>
            </div>
            <div class="popup-close"><img src="/images/popup-close.svg" alt="icon-close"></div>
        </div>
    </div>
</div>
<a href="#" id="topBtn" class="top-btn">
    <svg width="35" height="35" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 99.2 99.2" style="enable-background:new 0 0 99.2 99.2;" xml:space="preserve">
            <style type="text/css">
                .st0{fill:#8DC63F;}
            </style>
        <g>
            <g>
                <g>
                    <path class="st0" d="M49.6,0C22.3,0,0,22.3,0,49.6s22.3,49.6,49.6,49.6S99.2,77,99.2,49.6S77,0,49.6,0z M49.6,95.1
                            c-25.1,0-45.5-20.4-45.5-45.5S24.5,4.1,49.6,4.1s45.5,20.4,45.5,45.5S74.7,95.1,49.6,95.1z"/>
                    <path class="st0" d="M51.1,21.3c-0.8-0.8-2.1-0.8-2.9,0L29.5,39.9c-0.8,0.8-0.8,2.1,0,2.9c0.8,0.8,2.1,0.8,2.9,0l15.1-15.1v48.8
                            c0,1.1,0.9,2.1,2.1,2.1s2.1-0.9,2.1-2.1V27.7l15.1,15.1c0.4,0.4,0.9,0.6,1.5,0.6c0.5,0,1.1-0.2,1.5-0.6c0.8-0.8,0.8-2.1,0-2.9
                            L51.1,21.3z"/>
                </g>
            </g>
        </g>
        </svg>
</a>

<div class="fix-triggers">
    <a href="/comparison" class="fix-trigger">
        <svg width="29" height="27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 85 82.2" style="enable-background:new 0 0 85 82.2;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill:#8DC63F;}
                </style>
            <g>
                <g>
                    <path class="st0" d="M84.9,41.8L84.9,41.8l-12.3-31h5.6c1,0,1.8-0.8,1.8-1.8s-0.8-1.8-1.8-1.8h-34V1.8c0-1-0.8-1.8-1.8-1.8
                            s-1.8,0.8-1.8,1.8v5.3h-34C5.6,7.2,4.8,8,4.8,9s0.8,1.8,1.8,1.8h5.8l-12.2,31C0.1,42,0,42.3,0,42.5C0,51,6.7,57.8,15,57.8
                            s15-6.9,15-15.3c0-0.2-0.1-0.5-0.1-0.7l-12.2-31h22.8v57c-8.6,0.7-15.4,6-15.4,12.5c0,1,0.8,1.8,1.8,1.8h30.7c1,0,1.8-0.8,1.8-1.8
                            c0-6.5-6.7-11.8-15.4-12.5v-57h23.1l-12.1,31C55,42,55,42.3,55,42.5c0,8.5,6.7,15.3,15,15.3S85,51,85,42.5
                            C85,42.3,85,42,84.9,41.8z M15,54.2c-5.6,0-10.4-4.2-11.3-9.8h22.4C25.3,50,20.6,54.1,15,54.2z M25.6,40.7h-21l10.5-26.8
                            L25.6,40.7z M55.6,78.5H29.1c1.3-4,6.9-7,13.2-7S54.3,74.5,55.6,78.5z M69.9,13.9l10.5,26.7h-21L69.9,13.9z M69.9,54.2L69.9,54.2
                            c-5.6,0-10.3-4.2-11.2-9.8h22.4C80.3,50,75.5,54.2,69.9,54.2z"/>
                </g>
            </g>
            </svg>
        <span class="comparison_count">{{ $comparison_user_count }}</span>
    </a>
    <a href="/cart" class="fix-trigger">
        <svg width="30" height="29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 82.2 76.5" style="enable-background:new 0 0 82.2 76.5;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill:#8DC63F;}
                </style>
            <g>
                <g>
                    <path class="st0" d="M81.9,11.1c-0.3-0.3-0.7-0.7-1.4-0.7H15.4l-1.7-9c0-0.7-1-1.4-1.7-1.4H1.7C0.7,0,0,0.7,0,1.7s0.7,1.7,1.7,1.7
                            h8.9l8.2,42.4c1,5.6,6.2,9.7,11.6,9.7h39.4c1,0,1.7-0.7,1.7-1.7s-0.7-1.7-1.7-1.7h-39c-2.7,0-5.5-1.4-6.9-3.8l50-7
                            c0.7,0,1.4-0.7,1.4-1.4l6.9-27.8C82.2,12.2,82.2,11.5,81.9,11.1z M72.3,38.3l-50,6.6l-6.2-31.3h62L72.3,38.3z"/>
                </g>
            </g>
            <g>
                <g>
                    <path class="st0" d="M29.1,59.1c-4.8,0-8.6,3.8-8.6,8.7c0,4.9,3.8,8.7,8.6,8.7c4.8,0,8.6-3.8,8.6-8.7C37.7,63,33.9,59.1,29.1,59.1
                            z M29.1,73.1c-2.7,0-5.1-2.4-5.1-5.2c0-2.8,2.4-5.2,5.1-5.2s5.1,2.4,5.1,5.2C34.3,70.6,31.9,73.1,29.1,73.1z"/>
                </g>
            </g>
            <g>
                <g>
                    <path class="st0" d="M63.4,59.1c-4.8,0-8.6,3.8-8.6,8.7c0,4.9,3.8,8.7,8.6,8.7c4.8,0,8.6-3.8,8.6-8.7C71.9,63,68.2,59.1,63.4,59.1
                            z M63.4,73.1c-2.7,0-5.1-2.4-5.1-5.2c0-2.8,2.4-5.2,5.1-5.2c2.7,0,5.1,2.4,5.1,5.2C68.5,70.6,66.1,73.1,63.4,73.1z"/>
                </g>
            </g>
            </svg>
        <span class="cart_count">{{ $cart_user_count }}</span>
    </a>
    <a href="/favorites" class="fix-trigger">
        <svg width="32" height="31" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 90.7 87.9" style="enable-background:new 0 0 90.7 87.9;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill:#8DC63F;}
                </style>
            <path class="st0" d="M88.7,39.8c1.8-1.8,2.4-4.3,1.6-6.7c-0.8-2.4-2.8-4.1-5.3-4.5l-22-3.2c-0.9-0.1-1.7-0.7-2.2-1.6L51.2,3.7
                    C50.1,1.4,47.8,0,45.4,0c-2.5,0-4.7,1.4-5.8,3.7l-9.8,20.1c-0.4,0.9-1.2,1.5-2.2,1.6l-22,3.2c-2.5,0.4-4.5,2.1-5.3,4.5
                    c-0.8,2.4-0.1,5,1.6,6.7l15.9,15.7c0.7,0.7,1,1.6,0.8,2.6l-3.8,22.1c-0.4,2.5,0.6,4.9,2.6,6.4c2,1.5,4.6,1.7,6.9,0.5L44,76.7
                    c0.8-0.4,1.8-0.4,2.7,0l19.6,10.4c1,0.5,2,0.8,3,0.8c1.3,0,2.7-0.4,3.8-1.3c2-1.5,3-3.9,2.6-6.4L72,58.1c-0.2-0.9,0.2-1.9,0.8-2.6
                    L88.7,39.8z M68.4,58.7l3.8,22.1c0.2,1.1-0.2,2.2-1.1,2.8c-0.9,0.7-2,0.7-3,0.2L48.4,73.4c-0.9-0.5-2-0.8-3-0.8s-2.1,0.3-3,0.8
                    L22.7,83.9c-1,0.5-2.1,0.4-3-0.2c-0.9-0.7-1.3-1.7-1.1-2.8l3.8-22.1c0.4-2.1-0.3-4.3-1.9-5.8L4.5,37.2c-0.8-0.8-1.1-1.9-0.7-3
                    c0.3-1.1,1.2-1.8,2.3-2l22-3.2c2.1-0.3,4-1.7,4.9-3.6l9.8-20.1c0.5-1,1.5-1.6,2.6-1.6c1.1,0,2.1,0.6,2.6,1.6l9.8,20.1
                    c0.9,1.9,2.8,3.3,4.9,3.6l22,3.2c1.1,0.2,2,0.9,2.3,2c0.3,1.1,0.1,2.2-0.7,3L70.3,52.9C68.8,54.4,68.1,56.5,68.4,58.7z"/>
            </svg>
        <span class="favorites_count">{{ $favorites_user_count }}</span>
    </a>
</div>

{{--<div class="caller">--}}
    {{--<div class="caller-img">--}}
        {{--<img class="caller-img-icon caller-open" src="/images/icon-logo.png" alt="logo">--}}
        {{--<img class="caller-img-icon caller-close" src="/images/icon-close.svg" alt="logo">--}}
    {{--</div>--}}
    {{--<div class="caller-hidden">--}}
        {{--<a href="#" class="caller-phone call-popup" data-popup="callbackPopup"><img src="/images/phone-i.svg" alt="phone-i"></a>--}}
        {{--<a href="#" class="caller-message"><img src="/images/message-i.svg" alt="phone-i"></a>--}}
    {{--</div>--}}
{{--</div>--}}

<!--Libs-->
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/libs/range/ion.rangeSlider.min.js"></script>
<script src="/js/libs/jquery.maskedinput.min.js"></script>
<script src="/js/libs/owlcarousel/owl.carousel.min.js"></script>
<script src="/js/libs/fancybox/jquery.fancybox.min.js"></script>
<script src="/js/libs/blazy/blazy.min.js"></script>
<script src="/js/libs/wow.min.js"></script>

<!--general-->
<script src="/js/common.js"></script>

<script>
    if($(window).width() < 993) {
        $('.menu-hidden-title').click(function(){
            $(this).closest('ul').toggleClass('open');
        });
        $('.nav-trigger').click(function(e){
            e.preventDefault();
            $(this).toggleClass('open');
            $('header').toggleClass('open');
            $('body').toggleClass('hidden');
        });
    }
    if($(window).width() > 992) {
        $('.menu-hidden-trigger').hover(function(){
            $(this).find('.menu-hidden-wrapper').fadeToggle('fast');
        });
        $('.caller').hover(function(){
            $(this).toggleClass('open')
        });
    }else {
        $('.caller').click(function(){
            $(this).toggleClass('open')
        });
        $('.more-btn').click(function(e){
            e.preventDefault()
            if($(this).hasClass('active') == false) {
                $(this).addClass('active');
                $(this).closest('.more-cnt').addClass('more-active');
                $(this).find('span').text('скрыть');
            }else {
                $(this).removeClass('active');
                $(this).closest('.more-cnt').removeClass('more-active');
                $(this).find('span').text('Показать еще');
            }
        });
    }
</script>


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(67339396, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/67339396" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
