<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Información cuenta - El Rey de Matatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
        include_once "Public/includes/conectar.php";
        date_default_timezone_set('America/Mexico_City');
    		$hoy=date("Y-m-d");
    		@$ip=$_SERVER["REMOTE_ADDR"];
        @$bandera_seccion='informacion';

        // FOLIO
        $sql3 = "select id_pedido from vin_pedidos where fecha='$hoy' and ip='$ip' and finalizada='no' ";
        $result3 = mysqli_query($conexion, $sql3);
        @$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
        @$folio=$row3['id_pedido'];

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
                    <form id="form_cuenta" method="post" class="form_general" action="envios.php">
                        <input type="hidden" name="folio" value="<?php echo $folio; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Información de contacto</label><br>
                                <input type="email" name="email" id="emailI" placeholder="* Correo Electrónico" value="<?php echo $correo; ?>" required>
                            </div>
                        </div>
                        <div class="row fila_direccion_envio">
                            <div class="col-md-12">
                                <label for="nombreI">Dirección de envío</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="nombre1" id="nombreI" placeholder="* Nombre" value="<?php echo $nombre; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nombre2" id="apellidoI" placeholder="* Apellido" value="<?php echo $apellidos; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="calle" id="calleI" placeholder="* Calle y número" value="<?php echo $direccion; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="colonia" id="coloniaI" placeholder="* Colonia" value="<?php echo $colonia; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="ciudad" id="ciudadI" placeholder="* Ciudad" value="<?php echo $municipio; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="Estado" id="estado" placeholder="* Estado" value="<?php echo $estado; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="codigoPostal" id="codigoPostalI" placeholder="* C.P." value="<?php echo $cp; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="tel" name="tel" id="telI" placeholder="* Tel. / Cel." value="<?php echo $telefono; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>En caso de que tengamos que contactarte sobre tu pedido</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="CONTINUAR">
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
                                    <!--<a class="btn_g btn_principal" href="envios.php">Continuar
                                        <img src="Public/images/vector_flecha_btn.svg" alt="">
                                    </a>-->
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
