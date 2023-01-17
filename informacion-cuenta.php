<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Información cuenta - El Rey de Mazatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
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
    <section id="info_cuenta" class="cont_info_cuenta">
        <div class="container">
            <div class="row">
                <!-- FORMULARIO DE INFORMACIÓN -->
                <div class="col-lg-6 col-md-12">
                    <form id="form_cuenta" class="form_general" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Información de contacto</label><br>
                                <input type="email" name="email" id="emailI" placeholder="Correo Electrónico">
                            </div>
                        </div>
                        <div class="row fila_direccion_envio">
                            <div class="col-md-12">
                                <label for="nombreI">Dirección de envío</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="nombreI" id="nombreI" placeholder="Nombre">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nombreI" id="apellidoI" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="calleI" id="calleI" placeholder="Calle y número">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="coloniaI" id="coloniaI" placeholder="Colonia">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="ciudadI" id="ciudadI" placeholder="Ciudad">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="EstadoI" id="estado" placeholder="Estado">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="codigoPostalI" id="codigoPostalI" placeholder="C.P.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="tel" name="telI" id="telI" placeholder="Tel. / Cel.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>En caso de que tengamos que contactarte sobre tu pedido</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Enviar">
                            </div>
                        </div>
                    </form>
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
                                    <a class="btn_g btn_secundario" href="#">Seguir comprando</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="cont_btn">
                                    <a class="btn_g btn_principal" href="envios.php">Continuar 
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