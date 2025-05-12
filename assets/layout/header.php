<header id="header" class="header-default">
    <div class="px_15 lg-px_40">
        <div class="row wrapper-header align-items-center">
            <div class="col-md-4 col-3 tf-lg-hidden">
                <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                        <path d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z" fill="currentColor"></path>
                    </svg>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="index.php" class="logo-header">
                    <img src="assets/images/logo/Recurso.svg" alt="logo" class="logo">
                </a>
            </div>
            <div class="col-xl-6 tf-md-hidden">
                <nav class="box-navigation text-center">

                    <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                        <li class="menu-item">
                            <a href="index.php" class="item-link">Inicio</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-link">Productos<i class="icon icon-arrow-down"></i></a>
                            <div class="sub-menu mega-menu">
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        $contador = 0;
                                        foreach ($agrupado as $categoria => $subcatproductos) {
                                            if ($contador >= 5) break;
                                            ?>
                                            <div class="col-lg-2">
                                                <div class="mega-menu-item">
                                                    <div class="menu-heading"><?php echo $categoria; ?></div>
                                                    <ul class="menu-listh">
                                                        <?php
                                                        // Iterar sobre las subcategorías de cada categoría
                                                        foreach ($subcatproductos as $subcat) {
                                                            ?>
                                                            <li><a href="product-detail.html" class="menu-link-text link"><?php echo $subcat['nombre']; ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php
                                            $contador++;
                                        }
                                        ?>
                                        <!--
                                        <div class="col-lg-2">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Diseño de interfaces</div>
                                                <ul class="menu-listh">
                                                    <li><a href="product-inner-zoom.html" class="menu-link-text link">Product inner zoom</a></li>
                                                    <li><a href="product-zoom-magnifier.html" class="menu-link-text link">Product zoom magnifier</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Diseño Web</div>
                                                <ul class="menu-listh">
                                                    <li><a href="product-color-swatch.html" class="menu-link-text link">Product color swatch</a></li>
                                                    <li><a href="product-rectangle.html" class="menu-link-text link">Product rectangle</a></li>
                                                    <li><a href="product-rectangle-color.html" class="menu-link-text link">Product rectangle color</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Sistemas de Escritorio</div>
                                                <ul class="menu-listh">
                                                    <li><a href="product-frequently-bought-together.html" class="menu-link-text link">Frequently bought together</a></li>
                                                    <li><a href="product-frequently-bought-together-2.html" class="menu-link-text link">Frequently bought together 2</a></li>
                                                    <li><a href="product-upsell-features.html" class="menu-link-text link">Product upsell features</a></li>
                                                    <li><a href="product-pre-orders.html" class="menu-link-text link">Product pre-orders</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Sistemas Web</div>
                                                <ul class="menu-listh">
                                                    <li><a href="product-frequently-bought-together.html" class="menu-link-text link">Frequently bought together</a></li>
                                                    <li><a href="product-frequently-bought-together-2.html" class="menu-link-text link">Frequently bought together 2</a></li>
                                                </ul>
                                            </div>
                                        </div>-->
                                        <div class="col-xl-2 col-lg-4 col-md-4">
                                            <div class="discovery-new-item">
                                                <h5>Explora nuestras categorías</h5>
                                                <a href="menus.php"><i class="icon-arrow1-top-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-link">Templates</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-link">Programas<i class="icon icon-arrow-down"></i></a>
                            <div class="sub-menu mega-menu">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Categorías</div>

                                                <ul class="menu-listh">
                                                    <?php foreach ($categorias as $categorias) { ?>
                                                    <li>
                                                        <a href="product-detail.html" class="menu-link-text link">
                                                            <?php echo $categorias['nombrecategoria']; ?>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Sub-Categorías</div>
                                                <ul class="menu-listh">
                                                    <?php foreach ($subcategorias as $subcategorias) { ?>
                                                    <li>
                                                        <a href="product-inner-zoom.html" class="menu-link-text link">
                                                            <?php echo $subcategorias['nombresubcategoria']; ?>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mega-menu-item">
                                                <div class="menu-heading">Categorías Destacadas</div>
                                                <ul class="menu-listh">
                                                    <?php foreach ($catedestacada as $catedestacada) { ?>
                                                        <li>
                                                            <a href="product-inner-zoom.html" class="menu-link-text link">
                                                                <?php echo $catedestacada['nombrecatdestacada']; ?>
                                                            </a>
                                                        </li>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="menu-heading">Licencias de Antivirus</div>
                                            <div class="hover-sw-nav hover-sw-2">
                                                <div class="swiper tf-product-header wrap-sw-over">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide" lazy="true">
                                                            <div class="card-product">
                                                                <div class="card-product-wrapper">
                                                                    <a href="#" class="product-img">
                                                                        <img class="lazyload img-product" data-src="assets/images/antivirus/eset.png" src="assets/images/antivirus/eset.png" alt="image-product">
                                                                        <img class="lazyload img-hover" data-src="assets/images/antivirus/eset.png" src="assets/images/antivirus/eset.png" alt="image-product">
                                                                    </a>
                                                                    <div class="list-product-btn">
                                                                        <a href="#" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                                            <span class="icon icon-view"></span>
                                                                            <span class="tooltip">Ver Licencias</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="card-product-info">
                                                                    <a href="#" class="title link">ESET NOD32</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nav-sw nav-next-slider nav-next-product-header box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
                                                <div class="nav-sw nav-prev-slider nav-prev-product-header box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a href="views/blog.php" class="item-link">Blog</a>
                        </li>
                        <li class="menu-item"><a href="https://fabridev.vercel.app/es" class="item-link">Servicios</a></li>
                        <li class="menu-item"><a href="https://portafolio-fabridev.vercel.app" class="item-link">Portafolio</a></li>
                    </ul>

                </nav>
            </div>
            <div class="col-xl-3 col-md-4 col-3">
                <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                    <li class="nav-search"><a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="nav-icon-item"><i class="icon icon-search"></i></a></li>
                    <li class="nav-account"><a href="#login" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-account"></i></a></li>
                    <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-bag"></i><span class="count-box text-black">0</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>