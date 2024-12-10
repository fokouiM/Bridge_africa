<!DOCTYPE html>
<html dir="ltr" lang="en-US">


<!-- Mirrored from demo.lion-coders.com/html/sarchholm-real-estate-template/home-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Sep 2020 10:20:58 GMT -->
<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="image/png" href="#" />
    <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="assetsone/css/plugin.css" rel="stylesheet" />
    <!-- style CSS -->
    <link href="assetsone/css/style.css" rel="stylesheet" />
    <!-- Document Title -->
    <title>Voyance Auracle</title>
</head>

<body>
    <!--Preloader starts-->
    <div class="preloader js-preloader">
        <img src="assetsone/images/preloader.gif" alt="...">
    </div>
    <!--Preloader ends-->
    <!--Page Wrapper starts-->
    <div class="page-wrapper">
        <!--header starts-->
        <header class="header transparent scroll-hide">
            <!--Main Menu starts-->
            <div class="site-navbar-wrap v2">
                <div class="container">
                    <div class="site-navbar">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-6 col-7">
                                <a class="navbar-brand" href="#"><img src="assets/media/logos/logo-default.png" style="width: 2em" alt="logo" class=""></a>
                            </div>
                            <div class="col-lg-6 col-md-1 col-1  order-2 order-lg-1 pl-xs-0">
                                <nav class="site-navigation text-right">
                                    <div class="container">
                                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                                            {{-- <li class="has-children">
                                                <a class="active" href="#">Home</a>
                                                <ul class="dropdown">
                                                    <li><a href="home-v1.html">Home Hero</a></li>
                                                    <li><a href="home-v2.html">Home Tab</a></li>
                                                    <li><a href="home-v3.html">Home Video</a></li>
                                                    <li><a href="home-v4.html">Home parallax</a></li>
                                                    <li><a href="home-v5.html">Home Slider</a></li>
                                                    <li><a href="home-v6.html">Home Map</a></li>
                                                    <li><a href="single-agency-home.html">Home Single Property</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-children">
                                                <a href="#">Listings</a>
                                                <ul class="dropdown">
                                                    <li class="has-children">
                                                        <a href="#">List Layout</a>
                                                        <ul class="dropdown sub-menu">
                                                            <li><a href="list-fullwidth.html">Full Width</a></li>
                                                            <li><a href="list-fullwidth-map.html">Fullwidth with google map</a></li>
                                                            <li><a href="list-fullwidth-leaflet-map.html">Fullwidth with Leaflet map</a></li>
                                                            <li><a href="list-left-sidebar.html">Left Sidebar</a></li>
                                                            <li><a href="list-right-sidebar.html">Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-children">
                                                        <a href="#">Grid Layout</a>
                                                        <ul class="dropdown sub-menu">
                                                            <li><a href="grid-fullwidth.html">Full Width</a></li>
                                                            <li><a href="grid-fullwidth-map.html">Fullwidth with google map</a></li>
                                                            <li><a href="grid-fullwidth-leaflet-map.html">Fullwidth with leaflet map</a></li>
                                                            <li><a href="grid-two-column.html">Grid two column</a></li>
                                                            <li><a href="grid-left-sidebar.html">Left Sidebar</a></li>
                                                            <li><a href="grid-right-sidebar.html">Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-children">
                                                        <a href="#">Map Layout - google</a>
                                                        <ul class="dropdown sub-menu">
                                                            <li><a href="list-left-sidemap.html">List Left sidemap</a></li>
                                                            <li><a href="list-right-sidemap.html">List Right sidemap</a></li>
                                                            <li><a href="grid-left-sidemap.html">Grid Left sidemap</a></li>
                                                            <li><a href="grid-right-sidemap.html">Grid Right sidemap</a></li>
                                                            <li><a href="grid-search-half-map.html">advanced search</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-children">
                                                        <a href="#">Tab Layout</a>
                                                        <ul class="dropdown sub-menu">
                                                            <li><a href="tab-fullwidth.html">Tab fullwidth</a></li>
                                                            <li><a href="tab-left-sidebar.html">Tab left sidebar</a></li>
                                                            <li><a href="tab-right-sidebar.html">Tab right sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-children">
                                                        <a href="#">Map Layout - Leaflet</a>
                                                        <ul class="dropdown sub-menu">
                                                            <li><a href="list-left-leaflet-sidemap.html">List Left sidemap</a></li>
                                                            <li><a href="list-right-leaflet-sidemap.html">List Right sidemap</a></li>
                                                            <li><a href="grid-left-leaflet-sidemap.html">Grid Left sidemap</a></li>
                                                            <li><a href="grid-right-leaflet-sidemap.html">Grid Right sidemap</a></li>
                                                            <li><a href="grid-search-half-leafletmap.html">advanced search</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-children">
                                                <a href="#">Property</a>
                                                <ul class="dropdown sub-menu">
                                                    <li><a href="single-listing-one.html">Single Property Hero Header </a></li>
                                                    <li><a href="single-listing-two.html">Single Property Video Header </a></li>
                                                    <li><a href="single-listing-three.html">Single Property Parallax Header </a></li>
                                                    <li><a href="single-listing-four.html">Single Property Slider Heade v1 </a></li>
                                                    <li><a href="single-listing-five.html">Single Property Slider Header v2 </a></li>
                                                </ul>
                                            </li>
                                            <li class="has-children">
                                                <a href="#">Pages</a>
                                                <ul class="dropdown">
                                                    <li class="has-children">
                                                        <a href="#">Agents</a>
                                                        <ul class="dropdown sub-menu">
                                                            <li><a href="agent-list.html">Agents List</a>
                                                            </li>
                                                            <li><a href="agent-grid.html">Agents Grid</a>
                                                            </li>
                                                            <li><a href="single-agent.html">Agent Profile</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-children">
                                                        <a href="#">Agency</a>
                                                        <ul class="dropdown sub-menu">
                                                            <li><a href="agency-list.html">Agency List</a>
                                                            </li>
                                                            <li><a href="agency-grid.html">Agency Grid</a>
                                                            </li>
                                                            <li><a href="single-agency.html">Agency Profile</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="db.html">Dashboard</a></li>
                                                    <li><a href="about.html">About us</a></li>
                                                    <li><a href="contact.html">Contact us</a></li>
                                                    <li><a href="membership-package.html">Membership Packages</a></li>
                                                    <li><a href="compare.html">Compare</a></li>
                                                    <li><a href="404-page.html">404 error</a></li>
                                                    <li><a href="add-listing.html">Add Listing</a></li>
                                                    <li><a href="faq.html">FAQ</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-children">
                                                <a href="#">News</a>
                                                <ul class="dropdown">
                                                    <li><a href="news-left-sidebar.html">News Left sidebar</a></li>
                                                    <li><a href="news-right-sidebar.html">News right sidebar</a></li>
                                                    <li><a href="news-without-sidebar.html">News without sidebar</a></li>
                                                    <li><a href="single-news-one.html">Single News one</a></li>
                                                    <li><a href="single-news-two.html">Single News two</a></li>
                                                    <li><a href="single-news-three.html">Single News three</a></li>
                                                </ul>
                                            </li> --}}
                                            <li class="d-lg-none"><a class="btn v3"  style="font-size: 1em;" href="welcome"><i class="lnr lnr-home"></i>COMMENCEZ GRATUITEMENT ICI</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="d-lg-none sm-right">
                                    <a href="#" class="mobile-bar js-menu-toggle">
                                        <span class="lnr lnr-menu"></span>
                                    </a>
                                </div>
                                <!--mobile-menu starts -->
                                <div class="site-mobile-menu">
                                    <div class="site-mobile-menu-header">
                                        <div class="site-mobile-menu-close  js-menu-toggle">
                                            <span class="lnr lnr-cross"></span> </div>
                                    </div>
                                    <div class="site-mobile-menu-body"></div>
                                </div>
                                <!--mobile-menu ends-->
                            </div>
                            <div class="col-lg-4 col-md-5 col-4 order-1 order-lg-2 text-right pr-xs-0">
                                <div class="menu-btn">
                                    <div class="add-list">
                                        <a class="btn v1" href="welcome" style="font-size: 1em;"><i class="lnr lnr-home"></i>COMMENCEZ GRATUITEMENT ICI</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Main Menu ends-->
        </header>
        <!--Header ends-->
        <!--Hero section starts-->
        <div class="hero v2 section-padding" style="background-image: url(assetsone/25602986_s.jpg); height: 600px;">
        </div>
        <!--Hero section ends-->
        <!--Popular City starts-->
        <div class="container pt-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title v1">
                        <p>Une équipe de voyants expérimentés et ayant des dons naturels vous accompagne au quotidien à travers une consultation tenue secrète et sécurisée. Au-delà de Leurs puissances divinatoires ils font usage de la cartomancie et de l'astrologie</p>
                        {{-- <h2>Find Properties in Your city</h2> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="property-place pb-60 hideme" style="background-image: url(assetsone/images/bg/map-bg-1.png)">
            <div class="container">
                <div class="row">
                    <div class="swiper-container popular-place-wrap v1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide single-place-wrap">
                                <div class="single-place-image">
                                    <a href="welcome"><img src="assetsone/b3.jpg" alt="place-image"></a>
                                </div>
                                <div class="single-place-content">
                                    <h3>COMMENCEZ GRATUITEMENT </h3>
                                    <a href="welcome"> ICI <i class="lnr lnr-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="swiper-slide single-place-wrap">
                                <div class="single-place-image">
                                    <a href="welcome"><img src="assetsone/b2.jpg" alt="place-image"></a>
                                </div>
                                <div class="single-place-content">
                                    <h3>COMMENCEZ GRATUITEMENT </h3>
                                    <a href="welcome">ICI <i class="lnr lnr-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="swiper-slide single-place-wrap">
                                <div class="single-place-image">
                                    <a href="welcome"><img src="assetsone/b1.jpg" alt="place-image"></a>
                                </div>
                                <div class="single-place-content">
                                    <h3>COMMENCEZ GRATUITEMENT </h3>
                                    <a href="welcome">ICI <i class="lnr lnr-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="slider-btn v2 popular-next"><i class="lnr lnr-arrow-right"></i></div>
                        <div class="slider-btn v2 popular-prev"><i class="lnr lnr-arrow-left"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!--Popular City ends-->
        <div class="promo-section mt-50 v2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="promo-desc">
                            <div class="section-title  " style="text-align: center;">
                                {{-- <p>Lorem ipsum dolor sit.</p> --}}
                                <h2 >Pourquoi nous choisir</h2>
                            </div>
                            <div class="promo-text">
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla quae alias tempora. Placeat voluptatem eum numquam quas distinctio obcaecati quaerat, repudiandae qui! Quia, omnis, doloribus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla quae alias tempora. </p> --}}
                            </div>
                            <div class="row pt-5">
                                <div class="col-sm-4 col-12">
                                    <div class="counter-text v2">
                                        <i class="lnr lnr-apartment"></i>
                                        <h6 class="counter-value" data-from="0" data-to="06" data-speed="1500">06</h6>
                                        <p>années d'expérience</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="counter-text v2">
                                        <i class="lnr lnr-thumbs-up"></i>
                                        <h6 class="counter-value" data-from="0" data-to="8585" data-speed="1000">8585</h6>
                                        <p> Clients heureux</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="counter-text v2">
                                        <i class="lnr lnr-user"></i>
                                        <h6 class="counter-value" data-from="0" data-to="238" data-speed="1500">238</h6>
                                        <p>visite par jour</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-client-section mt-140 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <div class="section-title v1">
                            <h2>Témoignage</h2>
                        </div>
                    </div>
                    <div class="col-md-12 mb-70">
                        <div class="testimonial-wrapper swiper-container swiper-container-fade swiper-container-horizontal">
                            <div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="2" style="width: 930px; transition-duration: 0ms; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                    <div class="single-testimonial-item">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="testimonial-video" style="background-image: url(assetsone/25602986_s.jpg)">
                                                    <div class="overlay op-3"></div>
                                                    <div class="testimonial-btn">
                                                        {{-- <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="testimonial-quote">
                                                <h4>Client anonyme</h4>
                                                <p>Cela m'a pris environ trois moi pour retrouver mon âme sœur grâce aux thérapies et conseils que Isabelle m'a donné. J'avoue que je n'ai pas commencé directement à mettre cela en pratique dès nos premières échanges. mais le temps passé, j'ai essayé et j'ai vu des indices comme elle me le disait durant nos séances cela m'a galvanisé et redonné espoir jusqu'au jour où je l'ai tenu dans mes bras. Nous sommes heureux actuellement. je vous remercie encore</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 930px; transition-duration: 0ms; opacity: 1; transform: translate3d(-930px, 0px, 0px);">
                                    <div class="single-testimonial-item">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="testimonial-video" style="background-image: url(assetsone/25602986_s.jpg)">
                                                    <div class="overlay op-2"></div>
                                                    <div class="testimonial-btn">
                                                        {{-- <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="testimonial-quote">
                                                <h4>Client Anonyme</h4>
                                                <p> Lorsque j'ai commencé mes séances de consultation je n'étais pas rassurée du résultat final. Je me disais que je causais juste avec une personne comme moi. Mais au fil du temps et des révélations au quotidien j'ai compris que les prédictions étaient vraies. J'ai manqué deux opportunités d'emploi qui m'avait été dit. Mais en prenant cela au sérieux j'ai décroché un poste dont j'avais des doutes. Je suis actuellement chef de projet grâce aux prédictions de JACQUEMIN</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 930px; transition-duration: 0ms; opacity: 0; transform: translate3d(-1860px, 0px, 0px);">
                                    <div class="single-testimonial-item">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="testimonial-video" style="background-image: url(assetsone/25602986_s.jpg)">
                                                </div>
                                            </div>
                                            <div class="testimonial-quote">
                                                <h4>Client Anonyme </h4>
                                                <p>Mon couple battait de l'aile je ne savais plus à quel sein se vouer. Mais en mettant en pratique une thérapie en quelques mois nous sommes heureux</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="2" style="width: 930px; transition-duration: 0ms; opacity: 0; transform: translate3d(-2790px, 0px, 0px);">
                                    <div class="single-testimonial-item">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="testimonial-video" style="background-image: url(assetsone/25602986_s.jpg)">
                                                    <div class="overlay op-3"></div>
                                                    <div class="testimonial-btn">
                                                        {{-- <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="testimonial-quote">
                                                <h4>Client Anonyme</h4>
                                                <p>Je n'arrivait pas à réaliser quoi que ce soit avec l'argent que je gagne. tout disparaissait au point où je pensais à une malédiction mais avec l'aide de Suzanne et Sabine je me suis retrouvé à réaliser et atteindre mes objectifs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 930px; transition-duration: 0ms; opacity: 0; transform: translate3d(-3720px, 0px, 0px);">
                                    <div class="single-testimonial-item">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="testimonial-video" style="background-image: url(assetsone/25602986_s.jpg)">
                                                    <div class="overlay op-2"></div>
                                                    <div class="testimonial-btn">
                                                        {{-- <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="testimonial-quote">
                                                <h4>Client Anonyme</h4>
                                                <p>Je n'ai pas de mots pour exprimer ma gratitude. je suis heureuse en ce moment</p>
                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        <!-- Add Arrows -->
                        <div class="client-btn-wrap">
                            <div class="client-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="lnr lnr-arrow-left"></i></div>
                            <div class="client-next" tabindex="0" role="button" aria-label="Next slide"><i class="lnr lnr-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scroll to top starts-->
        <span class="scrolltotop"><i class="lnr lnr-arrow-up"></i></span>
        <!-- Scroll to top ends-->
    </div>
    <!--Page Wrapper ends-->
    <!--Footer Starts-->
    <div class="footer-wrapper v1">
        <div class="footer-top-area">
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 offset-md-2">
                        <p>
                            2015©unevoyante-fr.fr tous droits réservés </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer ends-->

    <!--Scripts starts-->
    <!--plugin js-->
    <script src="assetsone/js/plugin.js"></script>

    <!--Main js-->
    <script src="assetsone/js/main.js"></script>
    <!--Scripts ends-->
</body>


</html>
