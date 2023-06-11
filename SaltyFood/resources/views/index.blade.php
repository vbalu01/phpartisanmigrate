<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Salty Template">
    <meta name="keywords" content="Salty, food, eat, enjoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ételrendelés</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('img/logo.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                @if ($data['allowedToOrder'])
                    <li><a href="/shoppingCart"><i class="fa fa-shopping-bag"></i> <span class="cartcount"> </span></a></li>
                @endif

            </ul>
            <!-- <div class="header__cart__price">item: <span>$150.00</span></div>-->
        </div>
        <div class="humberger__menu__widget">
            <!--<div class="header__top__right__language">
                <img src="{{ asset('img/hu-ncf.jpg') }}" alt="">
                <div>Magyar</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                </ul>
            </div>-->
            @if ($data['loggedIn'])
                <div class="header__top__right__auth">
                    <a href="#"><i class="fa fa-user"></i> Fiók</a>
                </div>
            @else
                <div class="header__top__right__auth">
                    <a href="/login"><i class="fa fa-user"></i> Bejelentkezés/Regisztráció</a>
                </div>
          
            @endif
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active">
                    <a href="
                        @if ($data['loggedIn']) /User
                        @else /
                        @endif
                    ">Főoldal</a>
                </li>

                <li><a href="#">Rólunk</a>

                </li>
                @if ($data['allowedToOrder'])
                    <li><a href="/shoppingCart">Kosár</a>
                @endif


                </li>


                </li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> {{ $data['usermail'] }}</li>
                @if (!$data['allowedToOrder'])
                    <li class="HeaderMessage">Nem felhasználó mód! Kosár letiltva.</li>
                @endif
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        @if ($data['usermail'] != '')
                            <div class="header__top__left">
                                <ul>

                                    <li><i class="fa fa-envelope"></i> {{ $data['usermail'] }}</li>
                                    @if (!$data['allowedToOrder'])
                                        <li class="HeaderMessage">Nem felhasználó mód! Kosár letiltva.</li>
                                    @endif

                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                   
                           <!-- <div class="header__top__right__language">
                                <img src="{{ asset('img/hu-ncf.jpg') }}" alt="">
                                <div>Magyar</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>-->

                            @if ($data['loggedIn'])
                                <div class="header__top__right__auth">
                                    <div class="header__top__right__language">
                                        <a><i class="fa fa-user"></i> Fiók</a>
                                        <ul>
                                            @if (!$data['allowedToOrder'])
                                                <li><a href="/Dashboard">Partner Kezelőfelület</a></li>
                                            @endif
                                            <li><a href="/logout">Profil</a></li>
                                            <li><a href="/logout">Kijelentkés</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="header__top__right__auth">
                                    <a href="/login"><i class="fa fa-user"></i> Bejelentkezés/Regisztráció</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a
                            href="
                        @if ($data['loggedIn']) /User
                        @else
                            / @endif
                        ">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active">
                                <a href="
                                    @if ($data['loggedIn']) /User
                                    @else /
                                     @endif
                                ">Főoldal</a>
                            </li>
                            <li><a href="#">Kategóriák</a>
                                <ul class="header__menu__dropdown">
                                    @foreach ($data['categories'] as $da => $e)
                                        <li><a href="#">{{ $e->c_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @if ($data['allowedToOrder'])
                                <li><a href="./shoppingCart">Kosár</a> </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            @if ($data['allowedToOrder'])
                                <li><a href="/shoppingCart"><i class="fa fa-shopping-bag"></i> <span class="cartcount"></span></a></li>
                            @endif
                        </ul>
                        <!--  <div class="header__cart__price">Ár: <span>$150.00</span></div> -->
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Ajánlott éttermek</span>
                        </div>
                        <ul>
                            @foreach ($data['restaurants'] as $da => $e)
                                <li>
                                    <form id="r_form_{{ $e->r_name }}"
                                        action="
                                            @if ($data['loggedIn']) {{ route('User_store_filter_vendor') }}
                                            @else {{ route('store_filter_vendor') }}
                                            @endif"
                                        method="POST">
                                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                        <input hidden type="text" id="rid" name="rid"
                                            value="{{ $e->id }}">
                                        <a onclick="document.getElementById('r_form_{{ $e->r_name }}').submit();">{{ $e->r_name }}</a>
                                    </form>
                                </li>
                            @endforeach

                            <!---<li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>-->
                        </ul>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="Mit keres?">
                                <button type="submit" class="site-btn">Keresés</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+36 20 560 2138</h5>
                                <span>24/7 Ügyfélszolgálat</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($data['foods'] as $da => $e)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <div class="categories__item set-bg"
                                    data-setbg="{{ $e->img_src != '' ? $e->img_src : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7Wc-pDXUXO2V-KQh_5sQ9g5MGrAmvo3pTLA&usqp=CAU' }}">
                                    <h5><a  class="food_name">{{ $e->f_name }}</a></h5>
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa  fa-info"></i></a></li>
                                        @if ($data['allowedToOrder'])
                                            <li><a onclick="shoppingCart.Add({{ $e->id }},1);"><i class="fa fa-shopping-cart"></i></a></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!--<div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->






    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container" id="filterable">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Kiemelt termékeink</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li
                            @if ($data['selected_categ']=="all")
                                class="active"
                            @endif
                            onclick="document.getElementById('cat_form_all').submit()"
                            >
                            Összes
                                <form id="cat_form_all"
                                    action="
                                    @if ($data['loggedIn']) {{ route('User_main_filter_cat') }}#filterable
                                    @else
                                        {{ route('main_filter_cat') }}#filterable @endif"
                                    method="POST">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <input hidden type="text" id="fname" name="fname" value="all">
                                </form>
                            </li>
                            @foreach ($data['categories'] as $da => $e)
                                <li
                                @if ($data['selected_categ']==$e->c_name)
                                    class="active"
                                @endif
                                onclick="document.getElementById('cat_form_{{ $e->c_name }}').submit()">
                                    {{ $e->c_name }}
                                    <form id="cat_form_{{ $e->c_name }}"
                                        action="
                                        @if ($data['loggedIn']) {{ route('User_main_filter_cat') }}#filterable
                                        @else
                                            {{ route('main_filter_cat') }}#filterable @endif"
                                        method="POST">
                                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                        <input hidden type="text" id="fname" name="fname"
                                            value="{{ $e->c_name }}">
                                    </form>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>





            <div class="row featured__filter">
                @foreach ($data['allfoods'] as $da => $e)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ $e->img_src != '' ? $e->img_src : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7Wc-pDXUXO2V-KQh_5sQ9g5MGrAmvo3pTLA&usqp=CAU' }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa  fa-info"></i></a></li>
                                    @if ($data['allowedToOrder'])
                                    <li><a onclick="shoppingCart.Add({{ $e->id }},1);"><i class="fa fa-shopping-cart"></i></a></li>
                                    @endif

                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{ $e->f_name }}</a></h6>
                                <h5>{{ $e->price }} HUF</h5>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </section>
    <!-- Featured Section End -->



 <!-- Latest Product Section Begin
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Új SaltyFoodok</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($data['foods']->shuffle() as $da => $e)
                                <div class="latest-prdouct__slider__item">
                                    <div class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $e->img_src != '' ? $e->img_src : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7Wc-pDXUXO2V-KQh_5sQ9g5MGrAmvo3pTLA&usqp=CAU' }}""
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $e->f_name }}</h6>
                                            <span>{{ $e->price }} HUF</span>
                                            <a href="#"><i class="fa  fa-info"></i></a>
                                            <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Legjobbak</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($data['foods']->shuffle() as $da => $e)
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $e->img_src != '' ? $e->img_src : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7Wc-pDXUXO2V-KQh_5sQ9g5MGrAmvo3pTLA&usqp=CAU' }}""
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $e->f_name }}</h6>
                                            <span>{{ $e->price }} HUF</span>
                                            <a href="#"><i class="fa  fa-info"></i></a>
                                            <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </a>


                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Salty Értékelés</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($data['foods']->shuffle() as $da => $e)
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $e->img_src != '' ? $e->img_src : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7Wc-pDXUXO2V-KQh_5sQ9g5MGrAmvo3pTLA&usqp=CAU' }}""
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $e->f_name }}</h6>
                                            <span>{{ $e->price }} HUF</span>
                                            <a href="#"><i class="fa  fa-info"></i></a>
                                            <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </a>


                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 Latest Product Section End -->

    <!-- Blog Section Begin
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-1.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-2.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('img/blog/blog-3.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">

                        <ul>
                            <li>Cím: 9769 Salty Incidens utca 2</li>
                            <li>Telefon: +36 20 560 21 38</li>
                            <li>Email: saltyfoods@incidens.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Hasznos Linkek</h6>
                        <ul>
                            <li><a href="#">Rólunk</a></li>
                            <li><a href="#">Szállítási információk</a></li>
                            <li><a href="#">Szerzői jog</a></li>

                        </ul>
                        <ul>
                            <li><a href="#">Kapcsolat</a></li>
                            <li><a href="#">Értékelések</a></li>
                            <li><a href="#">Szolgáltatások</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Iratkozz fel hírvelelünkre</h6>
                        <p>Kapj értesítéseket emailben kedvezményeinkről, ajánlatainkról.</p>
                        <form action="#">
                            <input type="text" placeholder="Írd be email címedet">
                            <button type="submit" class="site-btn">Feliratkozás</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> Minden jog fenntartva | A templatet saltyval csináltuk <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">php partisan migrante</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="{{ asset('img/payment-item.png') }}"
                                alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/models.js') }}"></script>
    <script src="{{ asset('js/shoppingCart.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $(".cartcount").text(shoppingCart.GetCount());
    });
    </script>


</body>

</html>
