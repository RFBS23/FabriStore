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
                </div>
            </div>
        </div>
    </div>
    <!-- /Top bar -->
    <!-- Header -->
    <?php include '../layout/header.php'?>
    <!-- /Header -->

    <!-- blog-grid-main -->
    <div class="blog-grid-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog-article-item">
                        <div class="article-thumb">
                            <a href="blog-detail.php">
                                <img class="lazyload" data-src="../assets/images/blog/blog-2.jpg" src="../assets/images/blog/blog-2.jpg" alt="img-blog">
                            </a>
                            <div class="article-label">
                                <a href="blog-detail.php" class="tf-btn btn-sm radius-3 btn-fill animate-hover-btn">Accessories</a>
                            </div>
                        </div>
                        <div class="article-content">
                            <div class="article-title">
                                <a href="blog-detail.php" class="">The next generation of leather alternatives</a>
                            </div>
                            <div class="article-btn">
                                <a href="blog-detail.php" class="tf-btn btn-line fw-6">Leer Más<i class="icon icon-arrow1-top-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /blog-grid-main -->
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
</html>