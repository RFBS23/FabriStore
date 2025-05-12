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

    <!-- blog-detail -->
    <div class="blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-detail-main">
                        <div class="blog-detail-main-heading">
                            <div class="title">Something About This Style Of Jeans</div>
                            <div class="meta">by <span>admin</span> on <span>Oct 02</span></div>
                            <div class="image">
                                <img class="lazyload" data-src="../assets/images/blog/blog-detail.jpg" src="../assets/images/blog/blog-detail.jpg" alt="">
                            </div>
                        </div>
                        <blockquote>
                            <div class="icon">
                                <img src="../assets/images/item/quote.svg" alt="">
                            </div>
                            <div class="text">
                                Typography is the work of typesetters, compositors, typographers, graphic designers, art directors, manga artists, comic book artists, graffiti artists, and now—anyone who arranges words, letters, numbers, and symbols for publication, display, or distribution—from clerical workers and newsletter writers to anyone self-publishing materials.
                            </div>
                        </blockquote>
                        <div class="grid-image">
                            <div>
                                <img class="lazyload" data-src="../assets/images/blog/blog-detail-1.jpg" src="../assets/images/blog/blog-detail-1.jpg" alt="">
                            </div>
                            <div>
                                <img class="lazyload" data-src="../assets/images/blog/blog-detail-2.jpg" src="../assets/images/blog/blog-detail-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="desc">
                            Pellentesque dapibus hendrerit tortor. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Sed libero. Phasellus tempus. Etiam feugiat lorem non metus Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Pellentesque commodo eros a enim. Etiam sit amet orci eget eros faucibus tincidunt. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus.In hac habitasse platea dictumst. Etiam ultricies nisi vel augue. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Quisque rutrum. Duis leo. <br> <br> <br>
                            Pellentesque dapibus hendrerit tortor. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Sed libero. Phasellus tempus. Etiam feugiat lorem non metus. Morbi mattis ullamcorper velit. Donec sodales sagittis magna. Curabitur a felis in nunc fringilla tristique. Quisque malesuada placerat nisl. Phasellus gravida semper nisi. <br> <br> <br>
                            Curabitur blandit mollis lacus. Phasellus nec sem in justo pellentesque facilisis. Mauris turpis nunc, blandit et, volutpat molestie, porta ut, ligula. Fusce ac felis sit amet ligula pharetra condimentum. Integer tincidunt. <br> <br> <br>
                            Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Pellentesque commodo eros a enim. Etiam sit amet orci eget eros faucibus tincidunt. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus.In hac habitasse platea dictumst. Etiam ultricies nisi vel augue. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Quisque rutrum. Duis leo.
                        </div>
                        <div class="bot d-flex justify-content-between flex-wrap align-items-center">
                            <ul class="tags-lists">
                                <li>
                                    <a href="#" class="tags-item"><span>Accessories</span></a>
                                </li>
                            </ul>
                            <div class="d-flex align-items-center gap-20">
                                <p>Share:</p>
                                <ul class="tf-social-icon d-flex style-default">
                                    <li><a href="#" class="box-icon round social-facebook border-line-black"><i class="icon fs-14 icon-fb"></i></a></li>
                                    <li><a href="#" class="box-icon round social-twiter border-line-black"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                                    <li><a href="#" class="box-icon round social-instagram border-line-black"><i class="icon fs-14 icon-instagram"></i></a></li>
                                    <li><a href="#" class="box-icon round social-tiktok border-line-black"><i class="icon fs-14 icon-tiktok"></i></a></li>
                                    <li><a href="#" class="box-icon round social-pinterest border-line-black"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tf-article-navigation">
                            <div class="item position-relative d-flex w-100 prev">
                                <a href="#" class="icon">
                                    <i class="icon-arrow-left"></i>
                                </a>
                                <div class="inner">
                                    <a href="#">PREVIOUS</a>
                                    <h6>
                                        <a href="#">Fashionista editors reveal their designer</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="item position-relative d-flex w-100 justify-content-end next">
                                <div class="inner text-end">
                                    <a href="#">NEXT</a>
                                    <h6>
                                        <a href="#">The next generation of leather alternatives</a>
                                    </h6>
                                </div>
                                <a href="#" class="icon">
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /blog-detail -->

    <!-- Related Articles -->
    <section class="mb_30">
        <div class="container">
            <div class="flat-title">
                <h5 class="">Artículos Relacionados</h5>
            </div>
            <div class="hover-sw-nav view-default hover-sw-5">
                <div class="swiper tf-sw-recent" data-preview="3" data-tablet="2" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" lazy="true">
                            <div class="blog-article-item">
                                <div class="article-thumb radius-10">
                                    <a href="blog-detail.html">
                                        <img class="lazyload" data-src="../assets/images/blog/blog-1.jpg" src="../assets/images/blog/blog-1.jpg" alt="img-blog">
                                    </a>
                                    <div class="article-label">
                                        <a href="shop-collection-list.html" class="tf-btn style-2 btn-fill radius-3 animate-hover-btn">Shop collection</a>
                                    </div>
                                </div>
                                <div class="article-content">
                                    <div class="article-title">
                                        <a href="blog-detail.html" class="">Pop-punk is back in fashion</a>
                                    </div>
                                    <div class="article-btn">
                                        <a href="blog-detail.html" class="tf-btn btn-line fw-6">Read more<i class="icon icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="blog-article-item">
                                <div class="article-thumb radius-10">
                                    <a href="blog-detail.html">
                                        <img class="lazyload" data-src="../assets/images/blog/blog-2.jpg" src="../assets/images/blog/blog-2.jpg" alt="img-blog">
                                    </a>
                                    <div class="article-label">
                                        <a href="shop-collection-list.html" class="tf-btn style-2 btn-fill radius-3 animate-hover-btn">Shop collection</a>
                                    </div>
                                </div>
                                <div class="article-content">
                                    <div class="article-title">
                                        <a href="blog-detail.html" class="">The next generation of leather alternatives</a>
                                    </div>
                                    <div class="article-btn">
                                        <a href="blog-detail.html" class="tf-btn btn-line fw-6">Read more<i class="icon icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="blog-article-item">
                                <div class="article-thumb radius-10">
                                    <a href="blog-detail.html">
                                        <img class="lazyload" data-src="../assets/images/blog/blog-3.jpg" src="../assets/images/blog/blog-3.jpg" alt="img-blog">
                                    </a>
                                    <div class="article-label">
                                        <a href="shop-collection-list.html" class="tf-btn style-2 btn-fill radius-3 animate-hover-btn">Shop collection</a>
                                    </div>
                                </div>
                                <div class="article-content">
                                    <div class="article-title">
                                        <a href="blog-detail.html" class="">An Exclusive Clothing Collaboration</a>
                                    </div>
                                    <div class="article-btn">
                                        <a href="blog-detail.html" class="tf-btn btn-line fw-6">Read more<i class="icon icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="blog-article-item">
                                <div class="article-thumb radius-10">
                                    <a href="blog-detail.html">
                                        <img class="lazyload" data-src="../assets/images/blog/blog-4.jpg" src="../assets/images/blog/blog-4.jpg" alt="img-blog">
                                    </a>
                                    <div class="article-label">
                                        <a href="shop-collection-list.html" class="tf-btn style-2 btn-fill radius-3 animate-hover-btn">Shop collection</a>
                                    </div>
                                </div>
                                <div class="article-content">
                                    <div class="article-title">
                                        <a href="blog-detail.html" class="">The next generation of leather alternatives</a>
                                    </div>
                                    <div class="article-btn">
                                        <a href="blog-detail.html" class="tf-btn btn-line fw-6">Read more<i class="icon icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="blog-article-item">
                                <div class="article-thumb radius-10">
                                    <a href="blog-detail.html">
                                        <img class="lazyload" data-src="../assets/images/blog/blog-5.jpg" src="../assets/images/blog/blog-5.jpg" alt="img-blog">
                                    </a>
                                    <div class="article-label">
                                        <a href="shop-collection-list.html" class="tf-btn style-2 btn-fill radius-3 animate-hover-btn">Shop collection</a>
                                    </div>
                                </div>
                                <div class="article-content">
                                    <div class="article-title">
                                        <a href="blog-detail.html" class="">The next generation of leather alternatives</a>
                                    </div>
                                    <div class="article-btn">
                                        <a href="blog-detail.html" class="tf-btn btn-line fw-6">Read more<i class="icon icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="blog-article-item">
                                <div class="article-thumb radius-10">
                                    <a href="blog-detail.html">
                                        <img class="lazyload" data-src="../assets/images/blog/blog-6.jpg" src="../assets/images/blog/blog-6.jpg" alt="img-blog">
                                    </a>
                                    <div class="article-label">
                                        <a href="shop-collection-list.html" class="tf-btn style-2 btn-fill radius-3 animate-hover-btn">Shop collection</a>
                                    </div>
                                </div>
                                <div class="article-content">
                                    <div class="article-title">
                                        <a href="blog-detail.html" class="">The next generation of leather alternatives</a>
                                    </div>
                                    <div class="article-btn">
                                        <a href="blog-detail.html" class="tf-btn btn-line fw-6">Read more<i class="icon icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-recent box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-recent box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
                <div class="sw-dots d-flex style-2 sw-pagination-recent justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Related Articles -->

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