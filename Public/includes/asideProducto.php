<aside id="datos_producto">
    <!-- FILA 1 PRODUCTO -->
    <?php
        include_once "Public/includes/conectar.php";
        date_default_timezone_set('America/Mexico_City');
        $hoy=date("Y-m-d");
        @$ip=$_SERVER["REMOTE_ADDR"];


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

              echo '<div class="row cont_producto_agregado align-items-center">
                  <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                      <img src="Public/images/'.$imagen.'" alt="">
                      <span class="tooltip_img">'.$datos2['cantidad'].'</span>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                      <h6 class="tit_producto_agregado">'.$nombre_vino.'</h6>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                      <h6 class="precio_producto_agregado">$'.number_format($datos2['precio'],2).'</h6>
                  </div>';
                  if($bandera_seccion!='pagos'){
                    echo '<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <a href="carrito.php?act=borrar&item='.$datos2['id_detalle'].'&Store=MX&Key=Dev838s&Currency=MXN" class="cont_delet">
                            <img src="Public/images/icon_delete.svg" alt="">
                        </a>
                    </div>';
                  }
                  echo '</div>';
            }
          }
    ?>


    <!-- FILA SUBTOTAL -->
    <div class="row">
        <div class="col-md-12 cont_subtotal_cuenta">
            <div class="w-100 d-flex">
                <h5>Subtotal</h5>
                <p>$<?php echo number_format($subtotal,2); ?> MXN</p>
            </div>
            <div class="w-100 d-flex">
                <h5>Envío</h5>
                <p>$<?php echo number_format($envio,2); ?> MXN</p>
            </div>
        </div>
    </div>
    <!-- FILA TOTAL -->
    <div class="row">
        <div class="col-md-12 cont_total_cuenta">
            <div class="w-100 d-flex">
                <div>
                    <h5>Subtotal</h5>
                </div>
                <div class="d-flex">
                    <p class="precio_total">$<?php echo number_format($total,2); ?></p>
                    <span class="mx_span_cuenta">MX</span>
                </div>
            </div>
        </div>
    </div>
