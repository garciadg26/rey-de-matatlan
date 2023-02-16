<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $title = "Pagos - El Rey de Mazatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
        include_once "Public/includes/conectar.php";
        date_default_timezone_set('America/Mexico_City');
    		$hoy=date("Y-m-d");
    		@$ip=$_SERVER["REMOTE_ADDR"];
        @$bandera_seccion='pagos';

        // FOLIO
        $sql3 = "select id_pedido from vin_pedidos where fecha='$hoy' and ip='$ip' and finalizada='no' ";
        $result3 = mysqli_query($conexion, $sql3);
        @$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
        @$folio=$row3['id_pedido'];

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

    <!--BOTONES PAYPAL-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AblPOZ8GCDfy2CMZ4Gyk_rddjWrmqrm5LeqHpIpPIDuzWTd-uWBXvgVxTeUpcISOjxppPejZ7jFtWnEL&currency=MXN" data-sdk-integration-source="button-factory"></script>
    <script>
      paypal.Buttons({

          style: {
              shape: 'pill',
              color: 'blue',
              layout: 'vertical',
              label: 'pay',

          },
          createOrder: function(data, actions) {
              return actions.order.create({
                  purchase_units: [{
                      amount: {
                          value: '<?php echo $total_general; ?>',
    					  					folio: <?php echo $folio; ?>
                      }
                  }]
              });
          },
          onApprove: function(data, actions) {
    		  $('#bloque_pagado').css('display','block');
              return actions.order.capture().then(function(details) {
    			  $('#bloque_pagado').css('display','block');
                  //alert('Pago completado ' + details.payer.name.given_name + '!');
    			  window.location = 'gracias.php?folio=<?php echo $folio; ?>&date=true&flag=si&fecha=<?php echo $hoy; ?>';
              });
          }
      }).render('#paypal-button-container');
    </script>


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
                      <p class="txt_general"><?php echo $nombre.' '.$apellidos.'<br>Tel. '.$telefono.'<br>'.$correo; ?></p>
                  </div>
                  <div class="cont_datos_envio">
                      <h5 class="">Enviar a:</h5>
                      <p class="txt_general"><?php echo $direccion.'<br>COL. '.$colonia.'<br>'.$municipio.', '.$estado.'<br>CP '.$cp; ?></p>
                  </div>
                    <!--<div class="cont_btn cont_btn_datos_e">
                        <a class="btn_g btn_secundario" href="informacion-cuenta.php">Cambiar</a>
                    </div>-->



                    <div class="metodo_pago">
                        <h2 class="tit_general">Método de pago</h2>
                        <div id="paypal-button-container"></div>
                        <!--<form action="">
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
                        </form>-->
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
