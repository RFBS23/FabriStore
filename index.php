<?php
    require 'config/database.php';
    $db = new Database();
    $con = $db->conectar();
    $sql = $con->prepare("select idbanner, titulo, subtitulo from banner where estado = 1");
    $sql->execute();
    $banner = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $con->prepare("select cp.idcatproductos, cp.nombre as catnombre, scp.idsubcatproductos, scp.nombre as subcatnombre from subcatproductos scp
                                inner join catproductos  cp on cp.idcatproductos = scp.idcatproductos");
    $sql->execute();
    $catproductos = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($catproductos as $item) {
        $catnombre = $item['catnombre'];
        $subcatnombre = $item['subcatnombre'];
        $idsubcat = $item['idsubcatproductos'];
        if (!isset($agrupado[$catnombre])) {
            $agrupado[$catnombre] = [];
        }
        $agrupado[$catnombre][] = [
            'id' => $idsubcat,
            'nombre' => $subcatnombre
        ];
    }

    $sql = $con->prepare("select idcategoria, nombrecategoria from categorias where estado = 1");
    $sql->execute();
    $categoriasheader = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $con->prepare("select idcategoria, nombrecategoria from categorias where estado = 1");
    $sql->execute();
    $categorias = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $con->prepare("select idsubcategoria, nombresubcategoria from subcategorias where estado = 1");
    $sql->execute();
    $subcategorias = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql = $con->prepare("select idcatdestacadas, nombrecatdestacada from categoriasdestacadas where estado = 1");
    $sql->execute();
    $catedestacada = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-ES" lang="es-ES">
<head>
    <meta charset="utf-8">
    <title>FabriStore</title>
    <?php include 'assets/layout/css.php' ?>
</head>

<body class="preload-wrapper color-primary-3">
<!-- preload -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- /preload -->
<div id="wrapper">
    <!-- Top bar -->
    <div class="tf-top-bar bg_dark line">
        <div class="px_15 lg-px_40">
            <div class="tf-top-bar_wrap grid-3 gap-30 align-items-center">
                <div class="tf-top-bar_left">
                    <div class="d-flex gap-30 text_white fw-5 ">
                        <span><a href="https://wa.me/51922289013?text=Hola%20Fabridev%20quiero%20información%20sobre%20sus%20sistemas" title="all collection" class="tf-btn btn-line text-white" target="_blank">(+51) 922-289-013<i class="icon icon-arrow1-top-left"></i></a></span>
                        <span>fabridevsofwaresolutions@gmail.com</span>
                    </div>
                </div>
                <div class="text-center overflow-hidden">
                    <div class="swiper tf-sw-top_bar" data-preview="1" data-space="0" data-loop="true" data-speed="1000" data-delay="2000">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <p class="top-bar-text fw-5 text_white">Impulsa tu negocio con un software a medida.</p>
                            </div>
                            <div class="swiper-slide">
                                <p class="top-bar-text fw-5 text_white">Soluciones tecnológicas para todas industria.</p>
                            </div>
                            <div class="swiper-slide">
                                <p class="top-bar-text fw-5 text_white">FabriDev: Innovación y tecnología para tu empresa.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-bar-language tf-cur justify-content-end">
                    <div class="tf-currencies">
                    </div>
                    <!--
                    <div class="tf-languages">
                        <select class="image-select center style-default type-languages color-white">
                            <option>Español</option>
                            <option>English</option>
                        </select>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- /Top bar -->
    <!-- Header -->
    <?php include 'assets/layout/header.php'?>
    <!-- /Header -->
    <!-- Slider -->
    <div class="tf-slideshow slider-home-2 slider-effect-fade position-relative">
        <div class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false" data-space="0" data-loop="true" data-auto-play="true" data-delay="2000" data-speed="1000">
            <div class="swiper-wrapper">
                <?php foreach($banner as $banner) { ?>
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-slider">
                            <?php
                                $id = $banner['idbanner'];
                                $imagen = "assets/images/slider/" . $id . "/principal.png";
                                if(!file_exists($imagen)){
                                    $imagen = "assets/images/notfound/error.jpg";
                                }
                            ?>
                            <img class="lazyload" data-src="<?php echo $imagen; ?>" src="<?php echo $imagen; ?>" alt="banner">
                            <div class="box-content">
                                <div class="container">
                                    <p class="fade-item fade-item-1"><?php echo $banner['titulo']; ?></p>
                                    <h1 class="fade-item fade-item-2"><?php echo $banner['subtitulo']; ?></h1>
                                    <a href="shop-default.html" class="fade-item fade-item-3 rounded-full tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Ver diseños</span><i class="icon icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--
                <div class="swiper-slide" lazy="true">
                    <div class="wrap-slider">
                        <img class="lazyload" data-src="assets/images/slider/Slideshow_Electronics2.jpg" src="assets/images/slider/Slideshow_Electronics2.jpg" alt="fashion-slideshow-01">
                        <div class="box-content">
                            <div class="container">
                                <p class="fade-item fade-item-1">SOPORTE Y MANTENIMIENTO DE EQUIPOS.</p>
                                <h1 class="fade-item fade-item-2">Servicio técnico<br> confiable y rápido</h1>
                                <a href="shop-default.html" class="fade-item fade-item-3 rounded-full tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Solicitar servicio</span><i class="icon icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" lazy="true">
                    <div class="wrap-slider">
                        <img class="lazyload" data-src="assets/images/slider/Slideshow_Electronics3.jpg" src="assets/images/slider/Slideshow_Electronics3.jpg" alt="fashion-slideshow-01">
                        <div class="box-content">
                            <div class="container">
                                <p class="fade-item fade-item-1">CREAMOS EXPERIENCIAS INOLVIDABLES.</p>
                                <h1 class="fade-item fade-item-2">Mockups & Diseño<br> UX/UI profesionales</h1>
                                <a href="shop-default.html" class="fade-item fade-item-3 rounded-full tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Explorar diseños</span><i class="icon icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="wrap-pagination sw-absolute-2">
            <div class="container">
                <div class="sw-dots sw-pagination-slider justify-content-center"></div>
            </div>
        </div>
    </div>
    <!-- /Slider -->
    <!-- Marquee -->
    <?php include 'assets/layout/marquee.php' ?>
    <!-- /Marquee -->
    <!-- category -->
    <section class="flat-spacing-11 pb-0">
        <div class="container">
            <div class="position-relative">
                <div class="flat-title flex-row justify-content-between px-0">
                    <span class="title wow fadeInUp" data-wow-delay="0s">Nuestras categorias</span>
                </div>
                <div class="sw-pagination-wrapper">
                    <div class="swiper tf-sw-collection" data-preview="4" data-tablet="3" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                        <div class="swiper-wrapper">
                            <?php foreach($categorias as $categorias) { ?>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item-v2 type-small hover-img">
                                    <a href="shop-collection-sub.html" class="collection-inner">
                                        <div class="collection-image img-style radius-10">
                                            <?php
                                                $id = $categorias['idcategoria'];
                                                $imagen = "assets/images/collections/" . $id . "/principal.jpg";
                                                if(!file_exists($imagen)){
                                                    $imagen = "assets/images/notfound/errorcat.gif";
                                                }
                                            ?>
                                            <img class="lazyload" data-src="<?php echo $imagen; ?>" src="<?php echo $imagen; ?>" alt="categorias-img">
                                        </div>
                                        <div class="collection-content">
                                            <div class="top">
                                                <h5 class="heading fw-5"><?php echo $categorias['nombrecategoria']; ?></h5>
                                                <p class="subheading">6 items</span></p>
                                            </div>
                                            <div class="bottom">
                                                <button class="tf-btn collection-title hover-icon btn-light rounded-full"><span>Ver más</span><i class="icon icon-arrow1-top-left"></i></button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="box-sw-navigation">
                        <div class="sw-dots style-2 medium sw-pagination-collection justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /category -->
    <!-- Banner Collection -->
    <section class="flat-spacing-8 pb_0">
        <div class="container">
            <div class="tf-banner-collection">
                <img class="lazyload" data-src="assets/images/collections/banner-collection-3.jpg" src="assets/images/collections/banner-collection-3.jpg" alt="img-banner" loading="lazy">
                <div class="box-content">
                    <div class="container wow fadeInUp" data-wow-delay="0s">
                        <div class="sub fw-7 text_white">OFERTA DESDE 30% DE DESCUENTO HOY</div>
                        <h2 class="heading fw-6 text_white">Las mejores ofertas y descuentos</h2>
                        <p class="text_white">Carga inalámbrica rápida en movimiento.</p>
                        <a href="shop-discounts.php" class="rounded-full tf-btn btn-primary-main style-3 fw-6 btn-light-icon animate-hover-btn"><span>Ver mas Descuentos</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Banner Collection -->
    <!-- Collection -->
    <section class="flat-spacing-8 pb_0">
        <div class="container">
            <div class="swiper tf-sw-recent" data-preview="2" data-tablet="2" data-mobile="1.3" data-space-lg="30" data-space-md="15" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-v4 lg hover-img">
                            <div class="collection-inner">
                                <a href="shop-collection-sub.html" class="radius-20 collection-image img-style">
                                    <img class="lazyload" data-src="assets/images/collections/electronic-6.jpg" src="assets/images/collections/electronic-6.jpg" alt="collection-img">
                                </a>
                                <div class="collection-content wow fadeInUp" data-wow-delay="0s">
                                    <p class="subheading">HOT ACCESSORIES</p>
                                    <h5 class="heading fw-6">Smart Assistant</h5>
                                    <a href="shop-collection-sub.html" class="rounded-full tf-btn btn-primary-main style-3 fw-6 btn-light-icon animate-hover-btn"><span>Shop now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item-v4 lg hover-img">
                            <div class="collection-inner">
                                <a href="shop-collection-sub.html" class="radius-20 collection-image img-style">
                                    <img class="lazyload" data-src="assets/images/collections/electronic-7.jpg" src="assets/images/collections/electronic-7.jpg" alt="collection-img">
                                </a>
                                <div class="collection-content wow fadeInUp" data-wow-delay="0s">
                                    <p class="subheading">FAST AND FREE SHIPPING</p>
                                    <h5 class="heading fw-6">True Earbuds</h5>
                                    <a href="shop-collection-sub.html" class="rounded-full tf-btn btn-primary-main style-3 fw-6 btn-light-icon animate-hover-btn"><span>Shop now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Collection -->
    <!-- Products -->
    <section class="flat-spacing-19">
        <div class="container">
            <div class="flat-title flex-row justify-content-between px-0">
                <span class="title wow fadeInUp" data-wow-delay="0s">Productos de tendencia</span>
                <div class="box-sw-navigation">
                    <div class="nav-sw square nav-next-slider nav-next-sell-1"><span class="icon icon-arrow1-left"></span></div>
                    <div class="nav-sw square nav-prev-slider nav-prev-sell-1"><span class="icon icon-arrow1-right"></span></div>
                </div>
            </div>
            <div class="hover-sw-nav hover-sw-2">
                <div class="swiper tf-sw-product-sell-1 wrap-sw-over" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3" data-pagination-lg="3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide height-auto" lazy="true">
                            <div class="card-product overflow-hidden bg_white radius-20 border-line h-100">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" src="assets/images/collections/electronic-8.png" data-src="assets/images/collections/electronic-8.png" alt="image-product">
                                        <img class="lazyload img-hover" data-src="assets/images/collections/electronic-9.jpg" src="assets/images/collections/electronic-9.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info has-padding">
                                    <a href="product-detail.html" class="title link">UltraGlass 2 Treated Screen Protector for iPhone 15 Pro</a>
                                    <span class="price">$39.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide height-auto" lazy="true">
                            <div class="card-product overflow-hidden bg_white radius-20 border-line h-100">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" src="assets/images/collections/electronic-10.png" data-src="assets/images/collections/electronic-10.png" alt="image-product">
                                        <img class="lazyload img-hover" data-src="assets/images/collections/electronic-11.png" src="assets/images/collections/electronic-11.png" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info has-padding">
                                    <a href="product-detail.html" class="title link">Smart Light Switch with Thread</a>
                                    <span class="price">$49.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Products -->

    <!-- Icon box -->
    <?php include 'assets/layout/iconbox.php' ?>
    <!-- /Icon box -->
    <!-- Footer -->
    <?php include 'assets/layout/footer.php' ?>
    <!-- /Footer -->
</div>

<!-- gotop -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
    </svg>
</div>
<!-- /gotop -->

<!-- toolbar-bottom -->
<?php include 'assets/layout/toolbar-bottom.php'?>
<!-- /toolbar-bottom -->

<!-- mobile menu -->
<?php include 'assets/layout/mobile-menu.php'?>
<!-- /mobile menu -->

<!-- canvasSearch -->
<?php include 'assets/layout/canvasSearch.php'?>
<!-- /canvasSearch -->

<!-- toolbarShopmb -->
<?php include 'assets/layout/toolbarShopmb.php'?>
<!-- /toolbarShopmb -->

<!-- modal login -->
<?php include 'assets/layout/modalLogin.php'?>
<!-- /modal login -->

<!-- shoppingCart -->
<?php include 'assets/layout/shoppingCart.php'?>
<!-- /shoppingCart -->

<!-- modal quick_add -->
<div class="modal fade modalDemo" id="quick_add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-product-info-item">
                    <div class="image">
                        <img src="assets/images/products/orange-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <a href="product-detail.html">Ribbed Tank Top</a>
                        <div class="tf-product-info-price">
                            <!-- <div class="price-on-sale">$8.00</div>
                                <div class="compare-at-price">$10.00</div>
                                <div class="badges-on-sale"><span>20</span>% OFF</div> -->
                            <div class="price">$18.00</div>
                        </div>
                    </div>
                </div>
                <div class="tf-product-info-variant-picker mb_15">
                    <div class="variant-picker-item">
                        <div class="variant-picker-label">
                            Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                        </div>
                        <div class="variant-picker-values">
                            <input id="values-orange" type="radio" name="color" checked>
                            <label class="hover-tooltip radius-60" for="values-orange" data-value="Orange">
                                <span class="btn-checkbox bg-color-orange"></span>
                                <span class="tooltip">Orange</span>
                            </label>
                            <input id="values-black" type="radio" name="color">
                            <label class=" hover-tooltip radius-60" for="values-black" data-value="Black">
                                <span class="btn-checkbox bg-color-black"></span>
                                <span class="tooltip">Black</span>
                            </label>
                            <input id="values-white" type="radio" name="color">
                            <label class="hover-tooltip radius-60" for="values-white" data-value="White">
                                <span class="btn-checkbox bg-color-white"></span>
                                <span class="tooltip">White</span>
                            </label>
                        </div>
                    </div>
                    <div class="variant-picker-item">
                        <div class="variant-picker-label">
                            Size: <span class="fw-6 variant-picker-label-value">S</span>
                        </div>
                        <div class="variant-picker-values">
                            <input type="radio" name="size" id="values-s" checked>
                            <label class="style-text" for="values-s" data-value="S">
                                <p>S</p>
                            </label>
                            <input type="radio" name="size" id="values-m">
                            <label class="style-text" for="values-m" data-value="M">
                                <p>M</p>
                            </label>
                            <input type="radio" name="size" id="values-l">
                            <label class="style-text" for="values-l" data-value="L">
                                <p>L</p>
                            </label>
                            <input type="radio" name="size" id="values-xl">
                            <label class="style-text" for="values-xl" data-value="XL">
                                <p>XL</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="tf-product-info-quantity mb_15">
                    <div class="quantity-title fw-6">Quantity</div>
                    <div class="wg-quantity">
                        <span class="btn-quantity minus-btn">-</span>
                        <input type="text" name="number" value="1">
                        <span class="btn-quantity plus-btn">+</span>
                    </div>
                </div>
                <div class="tf-product-info-buy-button">
                    <form class="">
                        <a href="#" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn "><span>Add to cart -&nbsp;</span><span class="tf-qty-price">$18.00</span></a>
                        <div class="tf-product-btn-wishlist btn-icon-action">
                            <i class="icon-heart"></i>
                            <i class="icon-delete"></i>
                        </div>
                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-product-btn-wishlist box-icon bg_white compare btn-icon-action">
                            <span class="icon icon-compare"></span>
                            <span class="icon icon-check"></span>
                        </a>
                        <div class="w-100">
                            <a href="#" class="btns-full">Buy with <img src="assets/images/payments/paypal.png" alt=""></a>
                            <a href="#" class="payment-more-option">More payment options</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal quick_add -->

<!-- modal quick_view -->
<div class="modal fade modalDemo" id="quick_view">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-product-media-wrap">
                    <div class="swiper tf-single-slide">
                        <div class="swiper-wrapper" >
                            <div class="swiper-slide">
                                <div class="item">
                                    <img src="assets/images/products/orange-1.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <img src="assets/images/products/pink-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next button-style-arrow single-slide-prev"></div>
                        <div class="swiper-button-prev button-style-arrow single-slide-next"></div>
                    </div>
                </div>
                <div class="tf-product-info-wrap position-relative">
                    <div class="tf-product-info-list">
                        <div class="tf-product-info-title">
                            <h5><a class="link" href="product-detail.html">Ribbed Tank Top</a></h5>
                        </div>
                        <div class="tf-product-info-badges">
                            <div class="badges text-uppercase">Best seller</div>
                            <div class="product-status-content">
                                <i class="icon-lightning"></i>
                                <p class="fw-6">Selling fast! 48 people have this in their carts.</p>
                            </div>
                        </div>
                        <div class="tf-product-info-price">
                            <div class="price">$18.00</div>
                        </div>
                        <div class="tf-product-description">
                            <p>Nunc arcu faucibus a et lorem eu a mauris adipiscing conubia ac aptent ligula facilisis a auctor habitant parturient a a.Interdum fermentum.</p>
                        </div>
                        <div class="tf-product-info-variant-picker">
                            <div class="variant-picker-item">
                                <div class="variant-picker-label">
                                    Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                                </div>
                                <div class="variant-picker-values">
                                    <input id="values-orange-1" type="radio" name="color-1" checked>
                                    <label class="hover-tooltip radius-60" for="values-orange-1" data-value="Orange">
                                        <span class="btn-checkbox bg-color-orange"></span>
                                        <span class="tooltip">Orange</span>
                                    </label>
                                    <input id="values-black-1" type="radio" name="color-1">
                                    <label class=" hover-tooltip radius-60" for="values-black-1" data-value="Black">
                                        <span class="btn-checkbox bg-color-black"></span>
                                        <span class="tooltip">Black</span>
                                    </label>
                                    <input id="values-white-1" type="radio" name="color-1">
                                    <label class="hover-tooltip radius-60" for="values-white-1" data-value="White">
                                        <span class="btn-checkbox bg-color-white"></span>
                                        <span class="tooltip">White</span>
                                    </label>
                                </div>
                            </div>
                            <div class="variant-picker-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="variant-picker-label">
                                        Size: <span class="fw-6 variant-picker-label-value">S</span>
                                    </div>
                                    <div class="find-size btn-choose-size fw-6">Find your size</div>
                                </div>
                                <div class="variant-picker-values">
                                    <input type="radio" name="size-1" id="values-s-1" checked>
                                    <label class="style-text" for="values-s-1" data-value="S">
                                        <p>S</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-m-1">
                                    <label class="style-text" for="values-m-1" data-value="M">
                                        <p>M</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-l-1">
                                    <label class="style-text" for="values-l-1" data-value="L">
                                        <p>L</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-xl-1">
                                    <label class="style-text" for="values-xl-1" data-value="XL">
                                        <p>XL</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="tf-product-info-quantity">
                            <div class="quantity-title fw-6">Quantity</div>
                            <div class="wg-quantity">
                                <span class="btn-quantity minus-btn">-</span>
                                <input type="text" name="number" value="1">
                                <span class="btn-quantity plus-btn">+</span>
                            </div>
                        </div>
                        <div class="tf-product-info-buy-button">
                            <form class="">
                                <a href="#" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn "><span>Add to cart -&nbsp;</span><span class="tf-qty-price">$8.00</span></a>
                                <a href="javascript:void(0);" class="tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-product-btn-wishlist hover-tooltip box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <div class="w-100">
                                    <a href="#" class="btns-full">Buy with <img src="assets/images/payments/paypal.png" alt=""></a>
                                    <a href="#" class="payment-more-option">More payment options</a>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="product-detail.html" class="tf-btn fw-6 btn-line">View full details<i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal quick_view -->

<!-- Javascript -->
<?php include 'assets/layout/js.php' ?>
</body>
</html>