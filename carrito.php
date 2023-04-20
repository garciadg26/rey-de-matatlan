<!DOCTYPE html>
<html>
<head>


  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="Public/js/jquery-1.9.1.min.js"></script> -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <?php
        $title = "Carrito - El Rey de Matatlán";
        $description = "El Rey De Matatlán es una empresa 100% oaxaqueña en la producción artesanal de un mezcal único como nuestros productos";

        include_once "Public/includes/head.php";
        include_once "Public/includes/favicon.php";
        include_once "Public/includes/conectar.php";

        date_default_timezone_set('America/Mexico_City');
    		$hoy=date("Y-m-d");
    		@$ip=$_SERVER["REMOTE_ADDR"];
    		@$act=$_GET['act'];
        @$vino=$_POST['vino'];
        @$tamano=$_POST['tamano'];
        @$cantidad=$_POST['cantidad'];

        // BORRAR
        if($act=='borrar'){
          @$item=$_GET['item'];
          mysqli_query($conexion,"delete from vin_detalle_pedidos where id_detalle=$item");
        }

        // PRECIO
        $sql = "select * from vin_detalle_tamano where id_vino=$vino and id_tamano=$tamano";
    		$result = mysqli_query($conexion, $sql);
    		@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    		@$precio=$row['precio'];

        // REVISAR SI HAY PEDIDOS
    		$sql2 = "select COUNT(*) as existe from vin_pedidos where fecha='$hoy' and ip='$ip' and finalizada='no'";
    		$result2 = mysqli_query($conexion, $sql2);
    		@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
    		@$existe=$row2['existe'];
    		if($existe==0){
    			mysqli_query($conexion, "insert into vin_pedidos(nombre_cliente, telefono, correo, total, finalizada, pagada, forma_pago, fecha, ip) values('','','','0.00','no','no','','$hoy','$ip')");
    			$sql3 = "select id_pedido from vin_pedidos where fecha='$hoy' and ip='$ip' and finalizada='no' ";
    			$result3 = mysqli_query($conexion, $sql3);
    			@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
    			@$folio=$row3['id_pedido'];
    		} else {
    			$sql3 = "select id_pedido from vin_pedidos where fecha='$hoy' and ip='$ip' and finalizada='no' ";
    			$result3 = mysqli_query($conexion, $sql3);
    			@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
    			@$folio=$row3['id_pedido'];
    		}

        // INSERTAR EN DETALLE
    		$sql5 = "select COUNT(*) as existe from vin_detalle_pedidos where id_pedido=$folio and id_vino=$vino ";
    		$result5 = mysqli_query($conexion, $sql5);
    		@$row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
    		@$existe_paquete=$row5['existe'];
    		if($existe_paquete==0){
          @$subtotal=$cantidad*$precio;
    			mysqli_query($conexion, "insert into vin_detalle_pedidos(id_pedido, id_vino, id_tamano, cantidad, precio, subtotal) values($folio, $vino, $tamano, $cantidad, '$precio', '$subtotal')");
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
    		$total=$subtotal+$envio;
    ?>


    <script type="text/javascript">

    	function sumar(pedido, producto){
        $.ajax({
    			type: 'POST',
    			url: 'sumar.php',
    			data: { id: pedido , prod: producto },
    			// Mostramos un mensaje con la respuesta de PHP

    			success: function(data) {
      			$('#bp_1').css('display','none');
      			$('#bp_2').css('display','block');
      			$('#bp_2').html(data);
      			$('#bp_2').focus();
    			}
    		});
    	}

      function restar(pedido, producto){
        $.ajax({
    			type: 'POST',
    			url: 'restar.php',
    			data: { id: pedido , prod: producto },
    			// Mostramos un mensaje con la respuesta de PHP

    			success: function(data) {
      			$('#bp_1').css('display','none');
      			$('#bp_2').css('display','block');
      			$('#bp_2').html(data);
      			$('#bp_2').focus();
    			}
    		});
    	}
    </script>

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
          <div id="bp_1">
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
                            <?php
                                $datos=mysqli_query($conexion, "select * from vin_detalle_pedidos where id_pedido=$folio");
                                  if(mysqli_num_rows($datos)>0){
                                    while ($datos2=mysqli_fetch_array($datos)){
                                      // DATOS VINO
                                      $sql8 = "select * from vin_vinos where id_vino=".$datos2['id_vino']."";
                                  		$result8 = mysqli_query($conexion, $sql8);
                                  		@$row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                  		@$nombre_vino=$row8['nombre_vino'];
                                      @$imagen=$row8['imagen'];

                                      // TAMAÑO
                                      $sql8 = "select * from vin_tamanos where id_tamano=".$datos2['id_tamano']."";
                                  		$result8 = mysqli_query($conexion, $sql8);
                                  		@$row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                  		@$tamano=$row8['tamano'];


                                        echo '<tr class="fila_carrito">';
                                          echo '<td>';
                                            echo '<img class="img-fluid" src="Public/images/'.$imagen.'" alt="">';
                                          echo '</td>';
                                          echo '<td class="tit_carrito">'.$nombre_vino.'</td>';
                                          echo '<td class="txt_carrito">'.$tamano.'</td>';
                                          echo '<td>';
                                          echo '<div class="cont_cout">';
                                          echo '<a href="javascript: restar('.$folio.','.$datos2['id_vino'].');">-</a>';
                                          echo '<input class="qty text-center" pattern="[0-9]*" name="quantity" value="'.$datos2['cantidad'].'" type="text">';
                                          echo '<a class="qty-plus" href="javascript: sumar('.$folio.','.$datos2['id_vino'].');">+</a>';
                                          echo '</div>';
                                          //echo '<div class="cont_cout">';
                                            //echo '<input type="button" value="-" class="qty-minus">';
                                            //echo '<input type="number" value="'.$datos2['cantidad'].'" class="qty" min="1">';
                                            //echo '<input type="button" value="+" class="qty-plus">';
                                            //echo '<a href="javascript: sumar('.$folio.','.$datos2['id_vino'].');" class="qty-plus">+</a>';
                                          //echo '</div>';
                                          echo '</td>';
                                          echo '<td>$'.number_format($datos2['precio'],2).'</td>';
                                          echo '<td>$'.number_format($datos2['subtotal'],2).'</td>';
                                          echo '<td>';
                                            echo '<a href="carrito.php?act=borrar&item='.$datos2['id_detalle'].'&Store=MX&Key=Dev838s&Currency=MXN" class="cont_delet">';
                                              echo '<img src="Public/images/icon_delete.svg" alt="">';
                                            echo '</a>';
                                          echo '</td>';
                                        echo '</tr>';

                                    }
                                  }

                            ?>


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
                    <p class="txt_general">El peso Máximo del paquete es de 30 kg.<br>Peso al momento: </p>
                </div>
                <div class="col-lg-6 col-lg-6 col-md-4 col-sm-4 col-12 cont_subtotal">
                    <div class="d-flex">
                        <h5>Subtotal</h5>
                        <p>$<?php echo number_format($subtotal,2); ?> MXN</p>
                    </div>
                    <div class="d-flex">
                        <h5>Envío</h5>
                        <p>$<?php echo number_format($envio,2); ?> MXN</p>
                    </div>
                </div>
            </div>
            <!-- TOTAL -->
            <div class="row cont_total">
                <div class="col-md-12">
                    <div class="d-flex">
                        <h5>TOTAL</h5>
                        <p class="precio_total">$<?php echo number_format($total,2); ?></p>
                        <span class="mx_span">MXN</span>
                    </div>
                </div>
            </div>


          </div> <!-- CIERRA BLOQUE 1 -->
          <div id="bp_2"></div>

            <!-- BOTONES -->
            <div class="row cont_botones_carrito">
                <div class="col-md-6 cont_btn_secu_carrito">
                    <div class="cont_btn">
                        <a class="btn_g btn_secundario" href="productos.php">Seguir comprando</a>
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
    <script>
      $(document).ready(function(){
        menuActive()
      });
      function menuActive(){
        const header = document.getElementById("menu_principal");
        // INFORMACIÓN CARRITO
        if ( document.URL.includes("carrito.php") ) {
            $('.navbar-nav li, .menu_footer li').removeClass("active");
            $('.navbar-nav li:nth-child(4), .menu_footer li:nth-child(3)').addClass("active");
        }
      }
    </script>

    <?php
        //include_once "Public/includes/footer.php";
    ?>
</body>
</html>
