<?php
require '../config/database.php';
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

$sql = $con->prepare("select idcategoria, nombrecategoria from categorias where estado = 1;");
$sql->execute();
$categorias = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $con->prepare("select idsubcategoria, nombresubcategoria from subcategorias where estado = 1;");
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
    <?php include '../layout/css.php' ?>
</head>

<body class="preload-wrapper color-primary-3">
<!-- preload -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
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
    <?php include '../layout/header.php'?>
    <!-- /Header -->

    <!-- page-title -->
    <div class="tf-page-title">
        <div class="container-full">
            <div class="heading text-center">Categorias</div>
        </div>
    </div>
    <!-- /page-title -->
    <section class="flat-spacing-1">
        <div class="container">
            <div class="tf-grid-layout lg-col-3 tf-col-2">
                <div class="collection-item hover-img">
                    <div class="collection-inner">
                        <a href="shop-default.html" class="collection-image img-style">
                            <img class="lazyload" data-src="../assets/images/collections/collection-8.jpg" src="../assets/images/collections/collection-8.jpg"  alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-default.html" class="tf-btn collection-title hover-icon"><span>Women</span><i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="collection-item hover-img">
                    <div class="collection-inner">
                        <a href="shop-default.html" class="collection-image img-style">
                            <img class="lazyload" data-src="../assets/images/collections/collection-9.jpg" src="../assets/images/collections/collection-9.jpg" alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-default.html" class="tf-btn collection-title hover-icon"><span>Women</span><i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="collection-item hover-img">
                    <div class="collection-inner">
                        <a href="shop-default.html" class="collection-image img-style">
                            <img class="lazyload" data-src="../assets/images/collections/collection-10.jpg" src="../assets/images/collections/collection-10.jpg" alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-default.html" class="tf-btn collection-title hover-icon"><span>Women</span><i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="collection-item hover-img">
                    <div class="collection-inner">
                        <a href="shop-default.html" class="collection-image img-style">
                            <img class="lazyload" data-src="../assets/images/collections/collection-11.jpg" src="../assets/images/collections/collection-11.jpg" alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-default.html" class="tf-btn collection-title hover-icon"><span>Women</span><i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="collection-item hover-img">
                    <div class="collection-inner">
                        <a href="shop-default.html" class="collection-image img-style">
                            <img class="lazyload" data-src="../assets/images/collections/collection-12.jpg" src="../assets/images/collections/collection-12.jpg" alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-default.html" class="tf-btn collection-title hover-icon"><span>Women</span><i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="collection-item hover-img">
                    <div class="collection-inner">
                        <a href="shop-default.html" class="collection-image img-style">
                            <img class="lazyload" data-src="../assets/images/collections/collection-13.jpg" src="../assets/images/collections/collection-13.jpg" alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-default.html" class="tf-btn collection-title hover-icon"><span>Women</span><i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pagination -->
            <ul class="tf-pagination-wrap tf-pagination-list">
                <li class="active">
                    <a href="#" class="pagination-link">1</a>
                </li>
                <li>
                    <a href="#" class="pagination-link animate-hover-btn">2</a>
                </li>
                <li>
                    <a href="#" class="pagination-link animate-hover-btn">3</a>
                </li>
                <li>
                    <a href="#" class="pagination-link animate-hover-btn">4</a>
                </li>
                <li>
                    <a href="#" class="pagination-link animate-hover-btn">
                        <span class="icon icon-arrow-right"></span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../layout/footer.php' ?>
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
<?php include '../layout/toolbar-bottom.php'?>
<!-- /toolbar-bottom -->

<!-- mobile menu -->
<?php include '../layout/mobile-menu.php'?>
<!-- /mobile menu -->

<!-- canvasSearch -->
<?php include '../layout/canvasSearch.php'?>
<!-- /canvasSearch -->

<!-- toolbarShopmb -->
<?php include '../layout/toolbarShopmb.php'?>
<!-- /toolbarShopmb -->

<!-- modal login -->
<?php include '../layout/modalLogin.php'?>
<!-- /modal login -->

<!-- shoppingCart -->
<?php include '../layout/shoppingCart.php'?>
<!-- /shoppingCart -->

<!-- Javascript -->
<?php include '../layout/js.php' ?>

</body>