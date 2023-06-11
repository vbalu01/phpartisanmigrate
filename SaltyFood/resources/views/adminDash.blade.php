<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Salty Template">
    <meta name="keywords" content="salty, food,  html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

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
                            <a href="/">Főoldal</a>
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
            <div class="row">
                <div class="col-lg-1 col-md-1">
                    <div class="sidebar">
                        <div class="sidebar__item">
                        </div>
                        <div class="sidebar__item">
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                        </div>
                        <div class="sidebar__item">
                            
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <div class="latest-product__slider owl-carousel">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <div>
                                <h2>Kategóriák</h2>
                                <table id="categoriesTable" class="table table-striped restaurantsTable">
                                    <thead>
                                        <tr>
                                            <th>Kategória</th>
                                            <th>Státusz</th>
                                            <th>Módosítás</th>
                                        </tr>
                                    </thead>
                                    <tbody id="categoriesTableBody">
                                        @foreach ($data['categories'] as $category)
                                            <tr>
                                                <td><input type="text" id="categoryTb_{{ $category->id }}" value="{{ $category->c_name }}" /></td>
                                                <td>
                                                    <select id="categorySb_{{ $category->id }}">
                                                        <option value="0" @if (!$category->available)
                                                            selected
                                                        @endif>Nem elérhető</option>
                                                        <option value="1" @if ($category->available)
                                                            selected
                                                        @endif>
                                                            Elérhető</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success" onclick="updateCategory({{ $category->id }});">
                                                        Mentés
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row" style="padding-bottom:5%;">
                                    <h3 class="col-12" style="padding-bottom:2%;">Kategória felvétele</h3>
                                    <div class="col-1"></div>
                                    <input type="text" class="form-control col-6" id="newCategoryTb" />
                                    <div class="col-1"></div>
                                    <button class="btn btn-success col-3" onclick="addNewCategory()">Kategória hozzáadása</button>
                                    <div class="col-1"></div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <h2>Éttermek</h2>
                                <br>
                                <table id="restaurantsTable" class="table table-striped restaurantsTable">
                                    <thead>
                                        <tr>
                                            <th>Étterem</th>
                                            <th>Cím</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['restaurants'] as $restaurant)
                                            <tr>
                                                <td><a href="Admin/menuUpdate/{{ $restaurant->id }}" target=”_blank”>{{ $restaurant->r_name }}</a></td>
                                                <td>{{ $restaurant->city_postalcode }} {{ $restaurant->address }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row col-12">
                                <h2>Futárok</h2>
                                <table id="couriersTable" class="table table-striped restaurantsTable">
                                    <thead>
                                        <tr>
                                            <th>Futár</th>
                                            <th>Email</th>
                                            <th>Státusz</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['couriers'] as $courier)
                                            <tr>
                                                <td>{{ $courier->c_name }}</td>
                                                <td>{{ $courier->email }}</td>
                                                <td>
                                                    <button onclick="updateStatus({{ $courier->id }});" class="btn 
                                                        @if ($courier->available)btn-success @endif
                                                        @if (!$courier->available)btn-danger @endif
                                                        " id="courierStatusBtn_{{ $courier->id }}">
                                                        @if($courier->available)Elérhető (Módosít)@endif
                                                        @if(!$courier->available)Nem elérhető (Módosít)@endif
                                            </button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            $("#restaurantsTable").fancyTable({
                inputPlaceholder: 'Szűrés...',
                pagination: true,
                perPage: 5
             });
             
             $("#categoriesTable").fancyTable({
                pagination: true,
                perPage: 5,
                searchable: false
             });

             $("#couriersTable").fancyTable({
                pagination: true,
                perPage: 5,
                searchable: true
             });
         });

         function updateCategory(categoryId){
            $.ajax({
                type: "POST",
                url: '/api/updateCategory',
                async: false,
                data: {
                    'c_id' : categoryId,
                    'c_name' : $('#categoryTb_'+categoryId).val(),
                    'available' : $('#categorySb_'+categoryId).val()
                },
                //dataType: 'json',
                success: function(response){
                    alert(response);
                }
            });
         }

         function addNewCategory(){
            if($('#newCategoryTb').val() != ""){
                $.ajax({
                type: "POST",
                url: '/api/addNewCategory',
                async: false,
                data: {
                    'c_name' : $('#newCategoryTb').val()
                },
                success: function(response){
                    if(response.success){
                        $('#categoriesTableBody').append('<tr><td><input type="text" id="categoryTb_'+response.id+'" value="'+$('#newCategoryTb').val()+'" /></td>' +
                                                        '<td><select id="categorySb_'+response.id+'"><option value="0" selected>Nem elérhető</option>' +
                                                        '<option value="1" selected>Elérhető</option></select></td>' +
                                                        '<td><button class="btn btn-success" onclick="updateCategory('+response.id+');">Mentés' +
                                                        '</button></td></tr>');
                        $('#newCategoryTb').val("");
                    }
                    alert(response.message);
                }
            });
            }else{
                alert("A kategória mező nem lehet üres!");
            }
         }

         function updateStatus(id){
            $.ajax({
                type: "POST",
                url: '/api/updateCourierStatus',
                async: false,
                data: {
                    'id' : id
                },
                success: function(response){
                    if(response.Success){
                        $('#courierStatusBtn_'+ id).toggleClass('btn-success btn-danger');
                        if(!$('#courierStatusBtn_'+ id).text().includes("Nem")) {
                            
                            $('#courierStatusBtn_'+ id).text("Nem elérhető (Módosít)");
                            
                        }
                        else{
                            console.log($('#courierStatusBtn_'+ id).text());
                            $('#courierStatusBtn_'+ id).text("Elérhető (Módosít)");
                        }
                    }
                }
            });
         }
    </script>


</body>

</html>
