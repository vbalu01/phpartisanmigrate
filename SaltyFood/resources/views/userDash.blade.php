<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Salty Template">
    <meta name="keywords" content="salty, food,  html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

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

    <style>
        .collapsible {
          background-color: #777;
          color: white;
          cursor: pointer;
          padding: 18px;
          width: 100%;
          border: none;
          text-align: left;
          outline: none;
          font-size: 15px;
        }
        
        .active, .collapsible:hover {
          background-color: #555;
        }
        
        .content {
          padding: 0 18px;
          display: none;
          overflow: hidden;
          background-color: #f1f1f1;
        }
        </style>

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
                            <a href="/">Főoldal</a>
                            <span>User</span>
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
                <div class="col-lg-12 col-md-10">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <div>
                                <h2>Felhasználó</h2>
                                <div>
                                    <h3>Szállítási címek</h3>
                                    <table id="addressTable" class="table table-striped">
                                        <thead>
                                            <th>Név</th>
                                            <th>Irányítószám</th>
                                            <th>Cím</th>
                                            <th>Telefon</th>
                                            <th>Megjegyzés</th>
                                            <th>Státusz</th>
                                            <th>Módosítás</th>
                                        </thead>
                                        <tbody id="addressTableBody">
                                            @foreach ($data['addresses'] as $address)
                                                <tr>
                                                    <td>
                                                        <input type="text" id="addressName_{{ $address->id }}" value="{{ $address->a_name }}" />
                                                    </td>
                                                    <td>
                                                        <input type="number" id="addressCityCode_{{ $address->id }}" value="{{ $address->city_id }}" />
                                                    </td>
                                                    <td>
                                                        <input type="text" id="addressAddress_{{ $address->id }}" value="{{ $address->address }}" />
                                                    </td>
                                                    <td>
                                                        <input type="text" id="addressPhone_{{ $address->id }}" value="{{ $address->phone }}" />
                                                    </td>
                                                    <td>
                                                        <input type="text" id="addressOther_{{ $address->id }}" value="{{ $address->other }}" />
                                                    </td>
                                                    <td>
                                                        <select id="addressAvailable_{{ $address->id }}">
                                                            <option value="0" @if (!$address->available)
                                                                selected
                                                            @endif>Nem elérhető</option>
                                                            <option value="1" @if ($address->available)
                                                                selected
                                                            @endif>
                                                                Elérhető</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button onclick="saveAddress({{ $address->id }})" class="btn btn-success">Mentés</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        <h3>Új cím</h3>
                                        <input type="text" class="form-control" id="newAddressName" placeholder="Név" />
                                        <input type="number" class="form-control" id="newAddressCityId" placeholder="Irányítókód" />
                                        <input type="text" class="form-control" id="newAddressAddress" placeholder="Teljes cím" />
                                        <input type="text" class="form-control" id="newAddressPhone" placeholder="Telefon" />
                                        <input type="text" class="form-control" id="newAddressOther" placeholder="Egyéb" />
                                        <button class="btn btn-success" onclick="addNewAddress({{ $data['userId'] }});">Cím felvétele</button>
                                    </div>
                                </div>
                                <div>
                                    <h3>Korábbi rendelések</h3>
                                    @foreach ($data['orders'] as $order)
                                        <button type="button" class="collapsible">Rendelés {{ $order->o_date }} - 
                                            @if ($order->o_status == 0)Feldolgozás alatt @endif
                                            @if ($order->o_status == 1)Étel készítés alatt @endif
                                            @if ($order->o_status == 2)Kiszállítás alatt @endif
                                            @if ($order->o_status == 3)Rendelés lezárva @endif
                                        </button>
                                        <?php $tmpData = ""; ?>
                                        <div class="content">
                                            <h3>Tételek</h3>
                                            <table class="table">
                                                <thead>
                                                    <th>Étel</th>
                                                    <th>Mennyiség</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data['orderFoods'] as $ofoods)
                                                        @foreach ($ofoods as $food)
                                                            @if($food->o_id == $order->id)
                                                                @foreach ($data['foods'] as $f)
                                                                    @if ($f->id == $food->f_id)
                                                                        <tr>
                                                                            <td>
                                                                                <p>{{ $f->f_name }}</p>
                                                                                @if ($f->img_src != null && $f->img_src != "")
                                                                                    <br><img src="{{ $f->img_src }}" style="max-width: 7%; max-height:7%;">
                                                                                @endif                                                                      </td>
                                                                            <td>{{ $food->count }}</td>
                                                                            <?php $tmpData = $tmpData.$food->f_id.":".$food->count.";" ?>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <label>Végösszeg: {{ $order->full_price }} Ft. </label><button style="margin-left: 3%; margin-bottom:1%;" class="btn btn-warning"
                                            onclick="addAgainToBasket('{{ $tmpData }}');">Újra kosárba rakom</button><label style="font-size: 10px;"><i>(Az árak változhattak!)</i></label>
                                        </div>                                        
                                    @endforeach
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
    <script src="{{ asset('js/models.js') }}"></script>
    <script src="{{ asset('js/shoppingCart.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#addressTable").fancyTable({
                inputPlaceholder: 'Szűrés...',
                pagination: true,
                perPage: 5
             });
         });

         function saveAddress(addId){
            $.ajax({
                type: "POST",
                url: '/api/updateAddress',
                async: false,
                data: {
                    'a_name' : $('#addressName_'+addId).val(),
                    'city_id' : $('#addressCityCode_'+addId).val(),
                    'address' : $('#addressAddress_'+addId).val(),
                    'phone' : $('#addressPhone_'+addId).val(),
                    'other' : $('#addressOther_'+addId).val(),
                    'available' : $('#addressAvailable_'+addId).val(),
                    'a_id' : addId
                },
                //dataType: 'json',
                success: function(response){
                    alert(response.Message);
                }
            });
         }

         function addNewAddress(uId){
            if($('#newAddressName').val() == "" || $('#newAddressAddress').val() == "" || $('#newAddressPhone').val() == ""){
                alert('Hiányos beviteli adatok!');
                return;
            }
            $.ajax({
                type: "POST",
                url: '/api/addNewAddress',
                async: false,
                data: {
                    'u_id' : uId,
                    'a_name' : $('#newAddressName').val(),
                    'city_id' : $('#newAddressCityId').val(),
                    'address' : $('#newAddressAddress').val(),
                    'phone' : $('#newAddressPhone').val(),
                    'other' : $('#newAddressOther').val()
                },
                //dataType: 'json',
                success: function(response){
                    if(response.Success){
                        window.location.reload();
                    }
                    alert(response.Message);
                }
            });
         }

         function addAgainToBasket(data) {
            const splitted = data.split(';');
            for(const data of splitted){
                const tmp = data.split(':');
                let id = tmp[0];
                let count = tmp[1];
                shoppingCart.Add(id, count);
            }
            alert('A tételek kosárba kerültek!');
         }
    </script>
    
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
    </script>

</body>

</html>
