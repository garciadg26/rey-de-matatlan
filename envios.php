<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Envios - El Rey de Matatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
        include_once "Public/includes/conectar.php";
        date_default_timezone_set('America/Mexico_City');
    		$hoy=date("Y-m-d");
    		@$ip=$_SERVER["REMOTE_ADDR"];
        @$bandera_seccion='envios';

        // INFORMACIÓN
        @$folio=$_POST['folio'];
        @$email=$_POST['email'];
        @$nombre1=$_POST['nombre1'];
        @$nombre2=$_POST['nombre2'];
        @$calle=$_POST['calle'];
        @$colonia=$_POST['colonia'];
        @$ciudad=$_POST['ciudad'];
        @$estado=$_POST['Estado'];
        @$cp=$_POST['codigoPostal'];
        @$tel=$_POST['tel'];

        // ENVIO
    		$sql6 = "select envio from vin_envios where id_envio=1 ";
    		$result6 = mysqli_query($conexion, $sql6);
    		@$row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
    		@$envio=$row6['envio'];

    		// SUBTOTAL
    		$sql7 = "select SUM(subtotal) as subtotal from vin_detalle_pedidos where id_pedido=$folio";
    		$result7 = mysqli_query($conexion, $sql7);
    		@$row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
    		@$subtotal=$row7['subtotal'];
    		$total=$subtotal+$envio;

        // ACT
        mysqli_query($conexion,"update vin_pedidos set nombre_cliente='$nombre1', apellidos='$nombre2', telefono='$tel', correo='$email', cp='$cp', direccion='$calle', colonia='$colonia', municipio='$ciudad', estado='$estado', total='$total' where id_pedido=$folio");

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
                        <p class="txt_general"><?php echo $nombre1.' '.$nombre2.'<br>Tel. '.$tel.'<br>'.$email; ?></p>
                    </div>
                    <div class="cont_datos_envio">
                        <h5 class="">Enviar a:</h5>
                        <p class="txt_general"><?php echo $calle.'<br>COL. '.$colonia.'<br>'.$ciudad.', '.$estado.'<br>CP '.$cp; ?></p>
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
