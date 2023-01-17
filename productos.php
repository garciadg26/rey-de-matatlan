<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Productos - El Rey de Mazatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
    ?> 
</head>
<body>
    <?php
        include_once "Public/includes/nav.php";
    ?>
    <!-- ENCABEZADO -->
    <section id="encabezado_productos" class="encabezado">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="tit_secundario_bn">Amor sincero, <br> el de un mezcalero.</h1>
                    <img src="Public/images/vector-orgullo-oaxaquenio.svg" alt="">
                </div>
            </div>
        </div>
        <img class="pleca_bn img-fluid" src="Public/images/pleca_blanca_footer.svg" alt="">
    </section>
    <!-- PRODUCTOS -->
    <section id="productos_filter">
        <div class="container">
            <div class="row cont_buscador">
                <div class="col-md-12 ">
                    <div id="buscadorProducto" class="buscador">
                        <form id="search_products" class="form_search" action="">
                            <input id="input_search" class="" type="search" placeholder="BUSCAR PRODUCTO" aria-label="Search">
                            <button class="btn_search" type="submit"><img src="Public/images/icon_search.svg" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 cont_iqz">
                    <!-- MENÚ IZQUIERDO -->
                    <div id="menu_izq" class="cont_menu_izq">
                        <h1 class="tit_general tit_menu_izq">NUESTRA SELECCIÓN</h1>
                        <div id="list-example" class="list-group">
                            <a class="list-group-item list-group-item-action" href="#list-item-1">Más vendido</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-2">Artesanal</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-3">Ancestral</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-4">Cremas</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-5">Derivados</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 cont_productos_der">
                    <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">

                        <!-- MÁS VENDIDOS -->
                        <article id="list-item-1" class="cont_list_product">
                            <h4 >LOS MÁS VENDIDOS</h4>
                            <div class="row">
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv.jpg" alt="">
                                        <h6 class="nom_producto">Joven espadín</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="detalle.php">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv.jpg" alt="">
                                        <h6 class="nom_producto">Reposado con gusano</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv.jpg" alt="">
                                        <h6 class="nom_producto">Añejo</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv.jpg" alt="">
                                        <h6 class="nom_producto">Gran reserva</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!-- ARTESANAL -->
                        <article id="list-item-2" class="cont_list_product">
                            <h4 >ARTESANAL</h4>
                            <div class="row">
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Punta espadín</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Reposado con gusano</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Añejo</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Gran reserva</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- ANCESTRAL -->
                        <article id="list-item-3" class="cont_list_product">
                            <h4 >ANCESTRAL</h4>
                            <div class="row">
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Punta espadín</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Reposado con gusano</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Añejo</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Gran reserva</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        
                        <!-- CREMAS -->
                        <article id="list-item-4" class="cont_list_product">
                            <h4 >CREMAS</h4>
                            <div class="row">
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Punta espadín</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Reposado con gusano</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Añejo</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Gran reserva</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- DERIVADOS -->
                        <article id="list-item-5" class="cont_list_product">
                            <h4 >DERIVADOS</h4>
                            <div class="row">
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Punta espadín</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Reposado con gusano</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Añejo</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                            <li class="item_ml_producto">250ML</li>
                                            <li class="item_ml_producto">50ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- PRODUCTOS INDIV -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-6">
                                    <div class="cont_p_indv">
                                        <img class="mask img-fluid" src="Public/images/El-rey-matatlan-producto-indv-vendidos.jpg" alt="">
                                        <h6 class="nom_producto">Gran reserva</h6>
                                        <ul class="lista_ml_producto">
                                            <!-- COLOCAR CICLO - REGISTRO LITROS -->
                                            <li class="item_ml_producto">1LT</li>
                                            <li class="item_ml_producto">700ML</li>
                                            <li class="item_ml_producto">500ML</li>
                                        </ul>
                                        <div class="cont_btn">
                                            <a class="btn_g btn_principal" href="#">Ver más 
                                                <img src="Public/images/vector_flecha_btn.svg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        include_once "Public/includes/btnWhatsapp.php";
    ?>
    <?php
        include_once "Public/includes/footer.php";
    ?>
    <!-- SCROLL REVEAL -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script type="text/javascript" src="Public/js/menuScroll.js"></script>
</body>
</html>