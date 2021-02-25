<header>
    <div class="header-mob">
        <a href="/" class="logo"><img src="/images/logo.svg" alt="logo"></a>
        <div class="header-mob-triggers">
            <a href="/cart" class="cart-trigger fix-trigger">
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
            <a href="#" class="nav-trigger">
                <img class="nav-close" src="/images/menu-icon.svg" alt="menu">
                <img class="nav-open" src="/images/popup-close.svg" alt="menu">
            </a>
        </div>
    </div>
    <div class="header-nav-wrap">
        <div class="header-triggers">
            <div class="wrapper">
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
                <form action="/search">
                    <div class="search-field">
                        <input type="search" name="search" placeholder="поиск">
                        <button type="submit"><img src="/images/search-icon.svg" alt="search"></button>
                    </div>
                </form>
                <div class="call-triggers">
                    <a href="https://api.whatsapp.com/send?phone={{ $contacts->whatsapp }}"><img src="/images/callback-icon.svg" alt="whatsapp">{{ $contacts->whatsapp }}</a>
                    <a href="#" class="callback-trigger call-popup" data-popup="callbackPopup">заказать звонок</a>
                </div>
            </div>
        </div>
        <div class="header-navigation">
            <div class="wrapper">
                <a href="/" class="logo"><img src="/images/logo.svg" alt="logo"></a>
                <nav>
                    <ul>
                        <li class="menu-hidden-trigger">
                            <a href="/catalog/1" class="menu-hidden-trigger-hidden">Каталог</a>
                            <ul class="menu-hidden-wrapper">
                                <li>
                                    <ul class="menu-hidden">
                                        <li class="menu-hidden-column">
                                            <ul>
                                                <li class="menu-hidden-title"><a href="/catalog/septic">Септики</a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.01 277.34"><defs><style>.cls-1{fill:#4c4c4c;}</style></defs><g  data-name="Слой 2"><g data-name="Layer 1"><path class="cls-1" d="M505.75,6.26a21.31,21.31,0,0,0-30.17,0L256,225.84,36.42,6.26A21.33,21.33,0,0,0,6.26,36.42L240.92,271.09a21.32,21.32,0,0,0,30.17,0L505.76,36.42A21.31,21.31,0,0,0,505.75,6.26Z"/></g></g></svg></li>
                                                @foreach($categories as $category)
                                                    @if($category->type == 1)
                                                        <li><a href="/catalog/mod/{{ $category->id }}">{{ $category->title }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-hidden-column">
                                            <ul>
                                                <li class="menu-hidden-title"><a href="/catalog/cellars">Погреба</a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.01 277.34"><defs><style>.cls-1{fill:#4c4c4c;}</style></defs><g  data-name="Слой 2"><g data-name="Layer 1"><path class="cls-1" d="M505.75,6.26a21.31,21.31,0,0,0-30.17,0L256,225.84,36.42,6.26A21.33,21.33,0,0,0,6.26,36.42L240.92,271.09a21.32,21.32,0,0,0,30.17,0L505.76,36.42A21.31,21.31,0,0,0,505.75,6.26Z"/></g></g></svg></li>
                                                @foreach($categories as $category)
                                                    @if($category->type == 2)
                                                        <li><a href="/catalog/mod/{{ $category->id }}">{{ $category->title }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-hidden-column" style="max-width: 220px;">
                                            <ul>
                                                <li class="menu-hidden-title"><a href="/waters">Водоснабжение</a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.01 277.34"><defs><style>.cls-1{fill:#4c4c4c;}</style></defs><g  data-name="Слой 2"><g data-name="Layer 1"><path class="cls-1" d="M505.75,6.26a21.31,21.31,0,0,0-30.17,0L256,225.84,36.42,6.26A21.33,21.33,0,0,0,6.26,36.42L240.92,271.09a21.32,21.32,0,0,0,30.17,0L505.76,36.42A21.31,21.31,0,0,0,505.75,6.26Z"/></g></g></svg></li>
                                                @foreach($waters as $water)
                                                    <li><a href="/water/{{ $water->id }}">{{ $water->title }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-hidden-column">
                                            <ul>
                                                <li class="menu-hidden-title"><a href="/catalog/accessories">Комплектующие</a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.01 277.34"><defs><style>.cls-1{fill:#4c4c4c;}</style></defs><g  data-name="Слой 2"><g data-name="Layer 1"><path class="cls-1" d="M505.75,6.26a21.31,21.31,0,0,0-30.17,0L256,225.84,36.42,6.26A21.33,21.33,0,0,0,6.26,36.42L240.92,271.09a21.32,21.32,0,0,0,30.17,0L505.76,36.42A21.31,21.31,0,0,0,505.75,6.26Z"/></g></g></svg></li>
                                                @foreach($categories as $category)
                                                    @if($category->type == 4)
                                                        <li><a href="/catalog/mod/{{ $category->id }}">{{ $category->title }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/stocks">Акции</a></li>
                        <li><a href="/services">Услуги</a></li>
                        <li><a href="/ourWorks">Наши работы</a></li>
                        <li><a href="/reviews">Отзывы</a></li>
                        <li><a href="/howToBuy">Как купить</a></li>
                        <li><a href="/about">Компания</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
