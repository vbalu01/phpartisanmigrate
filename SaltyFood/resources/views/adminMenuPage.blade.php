<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Salty Template">
    <meta name="keywords" content="salty, food,  html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Étlap módosítás</title>

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
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
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
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Étlapok</span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">

                                <input type="text" placeholder="Mit keres">
                                <button type="submit" class="site-btn">Keresés</button>
                            </form>
                        </div>
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
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Salty Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Étlapkezelés</a>
                            <span>Admin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
                <div class="col-lg-12 col-md-12">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <div class="row col-12">
                                <h2>Menü kezelés - {{ $data['r_name'] }}</h2>
                                <div class="row col-12">
                                    <h3>Étlap módosítás</h3>
                                    <table id="foodsTable" class="table table-striped restaurantsTable">
                                        <thead>
                                            <tr>
                                                <th>Étel</th>
                                                <th>Kategória</th>
                                                <th>Leírás</th>
                                                <th>Ár</th>
                                                <th>Státusz</th>
                                                <th>Kép</th>
                                                <th>Művelet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['foods'] as $food)
                                                <tr>
                                                    <td><input type="text" id="food_name_{{ $food->id }}" value="{{ $food->f_name }}"></td>
                                                    <td>
                                                        <select id="food_category_{{ $food->id }}">
                                                            @foreach ($data['categories'] as $category)
                                                                <option value="{{ $category->id }}" @if ($food->c_id == $category->id)
                                                                    selected
                                                                @endif>
                                                                    {{ $category->c_name }}
                                                                </option>
                                                            @endforeach
                                                        <select>
                                                    </td>
                                                    <td><input type="text" id="food_description_{{ $food->id }}" value="{{ $food->description }}"></td>
                                                    <td><input type="number" id="food_price_{{ $food->id }}" value="{{ $food->price }}"></td>
                                                    <td>
                                                        <select id="food_available_{{ $food->id }}">
                                                            <option value="0" @if (!$food->available)
                                                                selected
                                                            @endif>Nem elérhető</option>
                                                            <option value="1"  @if ($food->available)
                                                                selected
                                                            @endif>Elérhető</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" id="food_img_{{ $food->id }}" value="{{ $food->img_src }}"></td>
                                                    <td><button class="btn btn-success" onclick="updateFood({{ $food->id }});">Módosít</button></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="row col-12" style="padding-top:5%;">
                                    <div class="row offset-3 col-9" style="padding-bottom:2%;">
                                        <h3>Étel rögzítés</h3>
                                    </div>
                                    <div class="offset-3"></div>
                                    <div class="row col-6">
                                        <input type="text" class="form-control" id="addFood_name" placeholder="Étel neve"><br>
                                        <select id="addFood_category" class="form-control"><br>
                                            @foreach ($data['categories'] as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->c_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="form-control" id="addFood_description" placeholder="Leírás"><br>
                                        <input type="number" class="form-control" id="addFood_price" placeholder="Ár"><br>
                                        <select id="addFood_available" class="form-control"><br>
                                            <option value="0">Nem elérhető</option>
                                            <option value="1" selected>Elérhető</option>
                                        </select>
                                        <input type="text" class="form-control" id="addFood_imgSrc" placeholder="Kép URL"><br>
                                        <button class="btn btn-lg btn-success" onclick="addFood({{ $data['r_id'] }});">Étel felvétele</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Rendezés</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    
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
    <script src="{{ asset('js/fancyTable.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#foodsTable").fancyTable({
                inputPlaceholder: 'Szűrés...'
            });		
        });

        function updateFood(id){
            $.ajax({
                type: "POST",
                url: '/api/updateFood',
                async: false,
                data: {
                    'food_id' : id,
                    'f_name' : $('#food_name_' + id).val(),
                    'c_id' : $('#food_category_'+ id).val(),
                    'description' : $('#food_description_'+ id).val(),
                    'price' : $('#food_price_'+ id).val(),
                    'available' : $('#food_available_'+ id).val(),
                    'img_src' : $('#food_img_'+ id).val()
                },
                success: function(response){
                    alert(response);
                }
            });
        }

        function addFood(r_id){
            if($('#addFood_name').val() == "" || $('#addFood_description').val() == "" || $('#addFood_price').val() < 1){
                alert("Hibás beviteli mezők!");
            }
            $.ajax({
                type: "POST",
                url: '/api/addFood',
                async: false,
                data: {
                    'f_name' : ,
                    'r_id' : ,
                    'c_id' : $('#food_category_'+ id).val(),
                    'description' : $('#food_description_'+ id).val(),
                    'price' : $('#food_price_'+ id).val(),
                    'available' : $('#food_available_'+ id).val(),
                    'img_src' : $('#food_img_'+ id).val()
                },
                success: function(response){
                    alert(response);
                }
            });
        }
    </script>


</body>

</html>
