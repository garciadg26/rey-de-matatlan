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
    <!-- TÍTULO PÁGINA -->
    <?php
        include_once "Public/includes/titInfoCuenta.php";
    ?>
    <!-- PASOS DE LA COMPRA -->
    <?php
        include_once "Public/includes/pasosCompra.php";
    ?>

    <!-- INFORMACIÓN DE LA CUENTA -->
    <section id="enviar" class="cont_info_cuenta">
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
                                    <a class="btn_g btn_principal" href="pagos.php">Continuar 
                                        <img src="Public/images/vector_flecha_btn.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>
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