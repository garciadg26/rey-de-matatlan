<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joven Espadín - El Rey de Mazatlán</title>
    <!-- FONTS -->
    <?php
        include_once "Public/includes/head.php";
    ?>
</head>
<body>
    <?php
        include_once "Public/includes/nav.php";
    ?>
    <div class="space_top"></div>
    <!-- BREADCRUMB -->
    <section>
        <div class="line_up"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="icon_homepage" href="index.php">
                                <img src="Public/images/icon_homepage.svg" alt="">
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="productos.php">Productos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Más vendidos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="line_down"></div>
    </section>
    <!-- PRODUCTO INDIVIDUAL -->
    <section id="producto_detalle">
        <div class="container">
            <div class="row row_product">
                <!-- FOTO DEL PRODUCTO -->
                <div class="col-xl-6 col-lg-6 col-md-12 text-center">
                    <img class="mask img-fluid" src="Public/images/producto-joven-espadin.jpg" alt="Producto joven espadín">
                </div>
                <!-- DETALLE DEL PRODUCTO -->
                <div class="col-xl-6 col-lg-6 col-md-12 cont_detalle_product d-flex align-items-center">
                    <!-- NOMBRE DEL PRODUCTO -->
                    <div class="cont">
                        <h4 class="tit_product">Jovén espadín</h4>
                        <!-- DESCRIPCIÓN DEL PRODUCTO -->
                        <p class="descp_product">El mezcal joven es un bi-destilado, incoloro, con un aroma ahumado típico en un mezcal artesanal donde se utiliza un horno de piedra par cocinar los agaves, tiene notas que a el exhalar predomina un aroma petricor. <br><br>
                            Este mezcal es producido en nuestros cultivos de agave espadín (Angustin folia how), con una graduación de 38-40% Alc. Vol. (dependiendo del cliente).</p>
                        <!-- FILA DESCRIPTIVO -->
                        <div class="row cont_contenido">
                            <!-- CONTENIDO NETO -->
                            <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6 col-12">
                                <h6 class="tit_detalle_descrip">Contenido neto</h6>
                                <select name="select_contenido" id="contenido_value">
                                    <option value="1l">1L</option>
                                    <option value="700ml">700ML</option>
                                    <option value="500ml">500ML</option>
                                    <option value="250ml">250ML</option>
                                    <option value="50ml">50ML</option>
                                </select>
                            </div>
                            <!-- CANTIDAD -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <h6 class="tit_detalle_descrip">Cantidad</h6>
                                <div class="cont_cout">
                                    <input type="button" value="-" class="qty-minus">
                                    <input id="cantidad_p" type="number" value="0" class="qty" min="1">
                                    <input type="button" value="+" class="qty-plus">
                                </div>
                            </div>
                            <!-- PRECIO -->
                            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-2 col-12">
                                <p class="item_precio">$350</p>
                            </div>
                        </div>
                        <!-- FILA BOTONES -->
                        <div class="row cont_btn_detalle">
                            <div class="col-md-6">
                                <div class="cont_btn">
                                    <a class="btn_g btn_secundario" href="productos.php">Seguir comprando</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cont_btn">
                                    <a class="btn_g btn_principal" href="carrito.php">Agregar al carrito 
                                        <img src="Public/images/vector_flecha_btn.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="pleca_dividir_relacionados"></div>

    <!-- PRODUCTOS RELACIONADOS -->
    <section id="productos_relacionados">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-md-12">
                    <h4 class="tit_general">Productos que te pueden gustar</h4>
                </div>
                <!-- PRODUCTO RELACIONADO 01 -->
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="cont_p_indv">
                        <img class="mask" src="Public/images/El-rey-matatlan-producto-indv.jpg" alt="">
                        <h6 class="nom_producto">Joven espadín</h6>
                        <ul class="lista_ml_producto">
                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                            <li class="item_ml_producto">700ML</li>
                            <li class="item_ml_producto">250ML</li>
                            <li class="item_ml_producto">50ML</li>
                        </ul>
                        <div class="cont_btn">
                            <a class="btn_g btn_principal" href="detalle.html">Ver más 
                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- PRODUCTO 01 -->
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="cont_p_indv">
                        <img class="mask" src="Public/images/El-rey-matatlan-producto-indv.jpg" alt="">
                        <h6 class="nom_producto">Añejo</h6>
                        <ul class="lista_ml_producto">
                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                            <li class="item_ml_producto">700ML</li>
                            <li class="item_ml_producto">500ML</li>
                            <li class="item_ml_producto">250ML</li>
                            <li class="item_ml_producto">50ML</li>
                        </ul>
                        <div class="cont_btn">
                            <a class="btn_g btn_principal" href="detalle.html">Ver más 
                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- PRODUCTO 01 -->
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="cont_p_indv">
                        <img class="mask" src="Public/images/El-rey-matatlan-producto-indv.jpg" alt="">
                        <h6 class="nom_producto">Reposado con gusano</h6>
                        <ul class="lista_ml_producto">
                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                            <li class="item_ml_producto">700ML</li>
                            <li class="item_ml_producto">500ML</li>
                            <li class="item_ml_producto">250ML</li>
                            <li class="item_ml_producto">50ML</li>
                        </ul>
                        <div class="cont_btn">
                            <a class="btn_g btn_principal" href="detalle.html">Ver más 
                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- PRODUCTO 01 -->
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="cont_p_indv">
                        <img class="mask" src="Public/images/El-rey-matatlan-producto-indv.jpg" alt="">
                        <h6 class="nom_producto">Gran reserva</h6>
                        <ul class="lista_ml_producto">
                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                            <li class="item_ml_producto">1L</li>
                            <li class="item_ml_producto">700ML</li>
                            <li class="item_ml_producto">500ML</li>
                            <li class="item_ml_producto">250ML</li>
                            <li class="item_ml_producto">50ML</li>
                        </ul>
                        <div class="cont_btn">
                            <a class="btn_g btn_principal" href="detalle.html">Ver más 
                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        include_once "Public/includes/btnWhatsapp.php";
    ?>
    <!-- FOOTER -->
    <?php
        include_once "Public/includes/footer.php";
    ?>
</body>
</html>