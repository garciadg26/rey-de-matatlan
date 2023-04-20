<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Pagos - El Rey de Matatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
        include_once "Public/includes/conectar.php";
        date_default_timezone_set('America/Mexico_City');
    		$hoy=date("Y-m-d");
    		@$ip=$_SERVER["REMOTE_ADDR"];
        @$bandera_seccion='pagos';
        @$folio=$_GET['folio'];
        @$folio_pagado=$_GET['folio'];
        @$flag=$_GET['flag'];

        // INFORMACIÓN
        $sql8 = "select * from vin_pedidos where id_pedido=$folio";
    		$result8 = mysqli_query($conexion, $sql8);
    		@$row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
    		@$nombre=$row8['nombre_cliente'];
        @$apellidos=$row8['apellidos'];
        @$telefono=$row8['telefono'];
        @$correo=$row8['correo'];
        @$cp=$row8['cp'];
        @$direccion=$row8['direccion'];
        @$colonia=$row8['colonia'];
        @$municipio=$row8['municipio'];
        @$estado=$row8['estado'];

        // ACT
        if($flag=='si'){
            mysqli_query($conexion, "update vin_pedidos set finalizada='si', pagada='si' where id_pedido=$folio");
            //include 'enviar_aviso.php';
        }


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
    		@$total_general=$subtotal+$envio;
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
                  <div class="metodo_pago">
                      <h2 class="tit_general">Pedido pagado<br>Folio <?php echo $folio_pagado; ?><br><br></h2>
                  </div>
                  <div class="cont_datos_envio">
                      <h5 class="">Contacto:</h5>
                      <p class="txt_general"><?php echo $nombre.' '.$apellidos.'<br>Tel. '.$telefono.'<br>'.$correo; ?></p>
                  </div>
                  <div class="cont_datos_envio">
                      <h5 class="">Enviar a:</h5>
                      <p class="txt_general"><?php echo $direccion.'<br>COL. '.$colonia.'<br>'.$municipio.', '.$estado.'<br>CP '.$cp; ?></p>
                  </div>
                    <!--<div class="cont_btn cont_btn_datos_e">
                        <a class="btn_g btn_secundario" href="informacion-cuenta.php">Cambiar</a>
                    </div>-->
                </div>
                <!-- DATOS DE PRODUCTOS -->
                <div class="col-lg-6 col-md-12">
                    <?php
                        include_once "Public/includes/asideProducto_finish.php";
                    ?>
                    <!-- FILA BOTONES -->
                    <div class="row cont_btn_detalle">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="cont_btn">
                                <a class="btn_g btn_principal" href="index.php">Terminar
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
