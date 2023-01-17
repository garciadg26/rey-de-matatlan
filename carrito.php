<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - El Rey de Mazatlán</title>
    <?php
        include_once "Public/includes/head.php";
    ?>
</head>
<body>
    <?php
        include_once "Public/includes/nav.php";
    ?>
    <div class="space_top"></div>
    <!-- TITULO PÁGINA -->
    <section>
        <div class="line_up"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center cont_tit_page">
                    <h1 class="tit_general">Tu carrito</h1>
                </div>
            </div>
        </div>
        <div class="line_down"></div>
    </section>

    <!-- DATOS CARRITO DE COMPRAS -->
    <section id="cont_carrito">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLA DE PRODUCTOS -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Producto</th>
                                <th scope="col"></th>
                                <th scope="col">Contenido Neto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                            <!-- PRIMERA FILA -->
                            <tr class="fila_carrito">
                                <!-- FOTO -->
                                <td>
                                    <img class="img-fluid" src="Public/images/El-rey-de-mezcal-matatlan-carrito-producto.jpg" alt="">
                                </td>
                                <!-- NOMBRE -->
                                <td class="tit_carrito">Joven espadín</td>
                                <td class="txt_carrito">150ML</td>
                                <td>
                                    <div class="cont_cout">
                                        <input type="button" value="-" class="qty-minus">
                                        <input type="number" value="0" class="qty" min="1">
                                        <input type="button" value="+" class="qty-plus">
                                    </div>
                                </td>
                                <td>$350</td>
                                <td>$700</td>
                                <td>
                                    <a href="#" class="cont_delet">
                                        <img src="Public/images/icon_delete.svg" alt="">
                                    </a>
                                </td>
                            </tr>
                            <!-- SEGUNDA FILA -->
                            <tr class="fila_carrito">
                                <!-- FOTO -->
                                <td>
                                    <img class="img-fluid" src="Public/images/El-rey-de-mezcal-matatlan-carrito-producto.jpg" alt="">
                                </td>
                                <!-- NOMBRE -->
                                <td class="tit_carrito">Joven espadín</td>
                                <td class="txt_carrito">150ML</td>
                                <td>
                                    <div class="cont_cout">
                                        <input type="button" value="-" class="qty-minus">
                                        <input type="number" value="0" class="qty">
                                        <input type="button" value="+" class="qty-plus">
                                    </div>
                                </td>
                                <td>$350</td>
                                <td>$700</td>
                                <td>
                                    <a href="#" class="cont_delet">
                                        <img src="Public/images/icon_delete.svg" alt="">
                                    </a>
                                </td>
                            </tr>
                            <!-- TERCERA FILA -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- SUBTOTAL -->
            <div class="row align-items-center content_delivery">
                <div class="col-lg-2 col-lg-2 col-md-2 col-sm-2 col-12">
                    <img class="icon_delivery" src="Public/images/icon_delivery.svg" alt="">
                </div>
                <div class="col-lg-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <p class="txt_general">El peso Máximo del paquete es de 30 kg.</p>
                </div>
                <div class="col-lg-6 col-lg-6 col-md-4 col-sm-4 col-12 cont_subtotal">
                    <div class="d-flex">
                        <h5>Subtotal</h5>
                        <p>$800</p>
                    </div>
                    <div class="d-flex">
                        <h5>Envío</h5>
                        <p>$500</p>
                    </div>
                </div>
            </div>
            <!-- TOTAL -->
            <div class="row cont_total">
                <div class="col-md-12">
                    <div class="d-flex">
                        <h5>TOTAL</h5>
                        <p class="precio_total">$1380</p>
                        <span class="mx_span">MX</span>
                    </div>
                </div>
            </div>
            <!-- BOTONES -->
            <div class="row cont_botones_carrito">
                <div class="col-md-6 cont_btn_secu_carrito">
                    <div class="cont_btn">
                        <a class="btn_g btn_secundario" href="#">Seguir comprando</a>
                    </div>
                </div>
                <div class="col-md-6 cont_btn_prin_carrito">
                    <div class="cont_btn">
                        <a class="btn_g btn_principal" href="informacion-cuenta.php">Continuar 
                            <img src="Public/images/vector_flecha_btn.svg" alt="">
                        </a>
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