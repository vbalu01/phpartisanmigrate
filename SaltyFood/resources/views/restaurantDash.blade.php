<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Salty Template">
    <meta name="keywords" content="salty, food,  html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Étterem</title>

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
    <div id="preloder">
        <div class="loader"></div>
    </div>


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

        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ asset('img/hu-ncf.jpg') }}" alt="">
                <div>Magyar</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            @if ($data['loggedIn'])
                <div class="header__top__right__auth">
                    <a href="#"><i class="fa fa-user"></i> Fiók</a>
                </div>
            @else
                <div class="header__top__right__auth">
                    <a href="/login"><i class="fa fa-user"></i> Bejelentkezés</a>
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
                <li><a href="/shoppingCart">Kosár</a>

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
                <li><i class="fa fa-envelope"></i> salty@incidens.com</li>
                <li>Ingyenes kiszállítás 30000 Ft felett!</li>
            </ul>
        </div>
    </div>

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
                                    <a href="/login"><i class="fa fa-user"></i> Bejelentkezés</a>
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

                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Étlapok</span>
                            
                        </div>
                        
                        <ul>
                        @foreach ($data['restaurants'] as $da => $e)
                                <li>
                                    <form id="r_form_{{$e->r_name}}"
                                        action="
                                            @if ($data['loggedIn'])
                                                {{ route('User_store_filter_vendor') }}
                                            @else
                                                {{ route('store_filter_vendor') }}
                                            @endif"
                                        method="POST">
                                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                        <input hidden type="text" id="rid" name="rid" value="{{$e->id}}">
                                        <a onclick="document.getElementById('r_form_{{$e->r_name}}').submit();"><b>{{$e->r_name}}</b></a>
                                        
                                    </form>
                                    
                                </li>
                                <li> <a href="/Dashboard/Restaurant/updateMenu/{{$e->id}}"><button class="btn btn-dark btn-md">Módosítás</button></li></a> <li>
                                <hr>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">

                             <button class="btn btn-dark btn-lg"><a href="/Dashboard/Restaurant/insertMenu"><span class="badge badge-dark">Étel felvétele</span></a></button>

                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+36 20 560 32 37</h5>
                                <span>24/7 Ügyfélszolgálat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Salty Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Főoldal</a>
                            <span>Étterem</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    
                </div>
                <div class="col-lg-9 col-md-7 ">
                    <div class="product__discount">
                        <div class="section-title product__discount__title ">
                            <h2>Összes rendelés</h2>
                        </div>
                        @if( count($data['orders'])  == 0) 
                            <h6>Nincs</h6>
                         @else 

                        <div class="row ">
                       <div class="col-lg-8 ">
                            <div class="product__discount__slider owl-carousel ">
                          
                            
                                        </div>
                                        @foreach ($data['orders'] as $e)
                                        <div class=" p-3">
                                             <span>Rendelés ideje: <b>{{$e -> o_date}}</b></span>
                                             <br>
                                             <span>Rendelés állapota:</span>
                                        @switch($e -> o_status)
                                                     @case(0)
                                                    <b>Rendelés leadva, megerősítésre vár</b>
                                                    @break
                                                @case(1)
                                                    <b>Visszaigazolva, elkészítés alatt</b>
                                                    @break
                                            
                                                @case(2)
                                                <b> Átadva futárnak</b>
                                                    @break

                                                    @case(3)
                                                    <b> Kiszállítva</b>
                                                    @break
                                            
                                                @default
                                                <b> Nem ismert</b>
                                            @endswitch
                                            <div>Fizetés típusa:  @switch($e -> payment_method)
                                                @case(0)
                                                    <b>KP fizetés futárnál</b>
                                                    @break
                                            
                                                @case(1)
                                                <b> Kártyás fizetés futárnál</b>
                                                    @break

                                                    @case(2)
                                                    <b> SZÉP kártyás fizetés futárnál</b>
                                                    @break
                                                    @case(3)
                                                    <b> Átutalás</b>
                                                    @break
                                            
                                                @default
                                                    <b> Nem ismert</b>
                                            @endswitch
                                        </div>
                                        
                                    </div>
                                    <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                    @endforeach
                                    
                                    
                                </div>
                            </div>
                            </div>
                        </div>

                        @endif
                    </div>
                    <div class="filter__item">
                        <div class="row">
                       
                            <div class="col-lg-4 col-md-5">
                                
                            </div>
                            
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span><b>{{ count($data['orders']) }}</b></span>Rendelés folyamatban</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    @if( count($data['orders'])  != 0) 
                           
                        
                        @foreach ($data['orders'] as $da => $e)
                            <div class="col-lg-4 col-md-6 col-sm-6 border-left border-3">
                                <div class="product__item ">
                                    <div>
                                        <ul class="product__item__pic__hover">
                                            
                                        <a href="/Dashboard/Restaurant/updateOrder/{{$e->id}}"> <button class="mb-5 btn btn-dark btn-md">Módosítás</button></a>
                                            
                                        </ul>
                                        <hr>
                                        
                                    </div>

                                    <div class="product__item__text ">
                                    <h6>Rendelés ideje: <b>{{$e -> o_date}}</b></h6>
                                    <span>Rendelés állapota:<span>
                                        @switch($e -> o_status)

                                            @case(0)
                                            <b>Rendelés leadva, megerősítésre vár</b>
                                                    @break
                                                @case(1)
                                                <b>Visszaigazolva, elkészítés alatt</b>
                                                    @break
                                            
                                                @case(2)
                                                <b> Átadva futárnak</b>
                                                    @break

                                                    @case(3)
                                                    <b> Kiszállítva</b>
                                                    @break
                                            
                                                @default
                                                <b> Nem ismert</b>
                                            @endswitch
                                            <br>

                                            <span>Fizetés típusa:<span>@switch($e -> payment_method)
                                                @case(0)
                                                    <b>KP fizetés futárnál</b>
                                                    @break
                                            
                                                @case(1)
                                                 <b>Kártyás fizetés futárnál</b>
                                                    @break

                                                    @case(2)
                                                    <b> SZÉP kártyás fizetés futárnál</b>
                                                    @break
                                                    @case(3)
                                                    <b> Átutalás</b>
                                                    @break
                                            
                                                @default
                                                <b> Nem ismert</b>
                                            @endswitch
                                            </br>
                                            
                                        Fizetendő: <b>{{$e -> full_price}} HUF</b>
                                       
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif


                    </div>
                     <!--
                        <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    -->

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Minden jog fenntartva | A templatet saltyval csináltuk <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">php partisan migrante</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="{{ asset('img/payment-item.png') }}" alt=""></div>
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




</body>

</html>
