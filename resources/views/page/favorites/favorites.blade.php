@extends('index')
@section('meta')
    <title>Избранное</title>
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
                <span>Избранное</span>
            </div>
        </div>
        <div class="favorites">
            <div class="wrapper-m wrapper">
                <div class="wrapper">
                    <h1 class="title title-s">Избранное</h1>
                </div>
                <div class="catalog-list {{ count($favorites) > 0 ? '' : 'no-cnt' }} ">
                    <div class="wrapper">
                        <p class="no-more-cnt">У вас нету избранных товаров</p>
                    </div>
                    @foreach($favorites as $favorite)
                        @php $product = App\Models\Product::find($favorite->id_product) @endphp
                    <div class="catalog-item">
                        <div class="stickers">
                            <div class="sticker sticker-green" {{ $product->top ? '' : 'style=display:none' }}>Топ</div>
                            <div class="sticker sticker-m sticker-green" {{ $product->new ? '' : 'style=display:none' }}>Новинка</div>
                            <div class="sticker sticker-orange" {{ $product->action ? '' : 'style=display:none' }}>Акция</div>
                            <div class="sticker sticker-s sticker-orange" {{ $product->advise ? '' : 'style=display:none' }}>Советуем</div>
                        </div>
                        <form method="POST" class="favorites-form">
                            @csrf
                            <input type="hidden" name="id_product" value="{{ $product->id }}">
                            <div class="item-triggers">
                                <svg class="item-trigger btn_comparison {{ $comparisons_user->contains($product->id) ? 'active' : '' }}" width="23" height="22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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


                                <svg class="item-trigger delete-favorite " width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs><style>.cls-1{fill:#d7d7d7;}</style></defs><g><g><path class="cls-1" d="M505.94,6.06a20.68,20.68,0,0,0-29.25,0L6.06,476.69a20.68,20.68,0,1,0,29.25,29.25L505.94,35.31A20.68,20.68,0,0,0,505.94,6.06Z"/><path class="cls-1" d="M505.94,476.69,35.31,6.06A20.68,20.68,0,0,0,6.06,35.31L476.69,505.94a20.68,20.68,0,1,0,29.25-29.25Z"/></g></g></svg>


                            </div>
                        </form>
                        <a href="{!! route('product', [$product->id]) !!}" class="catalog-item-img">
                            <img src="/images/{{ $product->img }}" alt="catalog">
                        </a>
                        <a href="{!! route('product', [$product->id]) !!}" class="catalog-item-title">{{ $product->title }}</a>
                        <p>дачная канализация</p>
                        <ul class="circle-list">
                            <li>Для 3х человек</li>
                            <li>Производительность {{ $product->performance }} л/сутки</li>
                            <li>Залповый сброс {{ $product->salvo_discharge }} л</li>
                        </ul>
                        <div class="catalog-item-price">
                            @if($product->action)
                                @if($stockToProducts->where('id_product', '=', $product->id)->count() > 0)
                                    <span class="old"><span>{{ $product->price }}</span> <span class="price-value">руб</span></span>
                                    <span class="new">{{ $product->price - ($product->price * ($stock->where('id', '=', $stockToProducts->where('id_product', '=', $product->id)->first()->id_stock)->first()->percent/100)) }} <span>руб</span></span>
                                @else
                                    <span class="new">{{ $product->price }} <span>руб</span></span>
                                @endif
                            @else
                                <span class="new">{{ $product->price }} <span>руб</span></span>
                            @endif
                        </div>
                        <div class="catalog-item-links">
                            <a href="{!! route('product', [$product->id]) !!}" class="btn">подробнее</a>
                            <a href="#" class="one-click-trigger link-text call-popup" data-popup="oneClick">купить <br> в 1 клик</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('.btn_comparison').click(function(e){
            e.preventDefault();
            var form = $(this).closest('.favorites-form').serialize();

            $.ajax({
                url: '/post-comparison',
                type: "POST",
                data: form,
                success: function (data) {
                    if (data == 'add') {
                        $('#comparison_count').html(Number($('#comparison_count').html()) + 1);
                    } else {
                        $('#comparison_count').html($('#comparison_count').html() - 1);
                    }
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
        });

    </script>
@endsection