<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información cuenta - El Rey de Mazatlán</title>
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
    <?php
        include_once "Public/includes/titInfoCuenta.php";
    ?>
    <!-- PASOS DE LA COMPRA -->
    <?php
        include_once "Public/includes/pasosCompra.php";
    ?>

    <!-- INFORMACIÓN DE LA CUENTA -->
    <section id="pagos" class="cont_info_cuenta">
        <div class="container">
            <div class="row">
                <!-- FORMULARIO DE INFORMACIÓN -->
                <div class="col-lg-6 col-md-12">
                    <div class="cont_datos_envio">
                        <h5 class="">Contacto:</h5>
                        <p class="txt_general">alan@tiposlibres.com</p>
                    </div>
                    <div class="cont_datos_envio">
                        <h5 class="">Enviar a:</h5>
                        <p class="txt_general">Senda del Amanecer, No. 151, Col. Milenio, Querétaro, CP 76060</p>
                    </div>
                    <div class="cont_btn cont_btn_datos_e">
                        <a class="btn_g btn_secundario" href="informacion-cuenta.php">Cambiar</a>
                    </div>
                    <div class="metodo_pago">
                        <h2 class="tit_general">Método de pago</h2>
                        <form action="">
                            <label class="cont_pago cont_paypal" for="paypal">
                                <input type="radio" name="paypal" id="paypal">
                                <img src="Public/images/pay-pal.jpg" alt="">
                            </label>
                            <br>
                            <label class="cont_pago cont_deposito" for="deposito">
                                <input type="radio" name="paypal" id="deposito">
                                <h6>Depósito en tiendas o en bancos</h6>
                                <img class="img_oxxo" src="Public/images/oxxo.jpg" alt="">
                                <img class="img_banamex" src="Public/images/banamex.jpg" alt="">
                            </label>
                        </form>
                    </div>
                </div>
                <!-- DATOS DE PRODUCTOS -->
                <div class="col-lg-6 col-md-12">
                    <?php
                        include_once "Public/includes/asideProducto.php";
                    ?>
                    <!-- FILA BOTONES -->
                    <div class="row cont_btn_detalle">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="cont_btn">
                                <a class="btn_g btn_secundario" href="productos.php">Seguir comprando</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="cont_btn">
                                <a class="btn_g btn_principal" href="#">Terminar
                                    <img src="Public/images/vector_flecha_btn.svg" alt="">
                                </a>
                            </div>
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