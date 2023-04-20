<?php
	include_once "Public/includes/conectar.php";
	date_default_timezone_set('America/Mexico_City');
	$hoy=date("Y-m-d");
	@$producto_2=$_POST['prod'];
	@$folio_2=$_POST['id'];

	// CANTIDAD
	$sql1 = "select cantidad from vin_detalle_pedidos where id_pedido=$folio_2 and id_vino=$producto_2";
	$result1 = mysqli_query($conexion, $sql1);
	@$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
	@$cantidad=$row1['cantidad'];

	// ACCIÓN
	if($cantidad==1){
			mysqli_query($conexion,"delete from vin_detalle_pedidos where id_pedido=$folio_2 and id_vino=$producto_2");
	} else {
			mysqli_query($conexion,"update vin_detalle_pedidos set cantidad=cantidad-1, subtotal=precio*cantidad where id_pedido=$folio_2 and id_vino=$producto_2");
	}


	// ENVIO
	$sql6 = "select envio from vin_envios where id_envio=1 ";
	$result6 = mysqli_query($conexion, $sql6);
	@$row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
	@$envio=$row6['envio'];

	// SUBTOTAL
	$sql7 = "select SUM(subtotal) as subtotal from vin_detalle_pedidos where id_pedido=$folio_2";
	$result7 = mysqli_query($conexion, $sql7);
	@$row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
	@$subtotal=$row7['subtotal'];
	$total=$subtotal+$envio;

	// LISTADO
	echo '<div class="row">
					<div class="col-md-12">
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
									<tbody>';
	$datos=mysqli_query($conexion, "select * from vin_detalle_pedidos where id_pedido=$folio_2");
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
							echo '<img class="img-fluid" src="Public/images/El-rey-de-mezcal-matatlan-carrito-producto.jpg" alt="">';
						echo '</td>';
						echo '<td class="tit_carrito">'.$nombre_vino.'</td>';
						echo '<td class="txt_carrito">'.$tamano.'</td>';
						echo '<td>';
						echo '<div class="cont_cout">';
							echo '<a href="javascript: restar('.$folio_2.','.$datos2['id_vino'].');">-</a>';
							echo '<input class="qty text-center" pattern="[0-9]*" name="quantity" value="'.$datos2['cantidad'].'" type="text">';
							echo '<a class="qty-plus" href="javascript: sumar('.$folio_2.','.$datos2['id_vino'].');">+</a>';
						echo '</div>';
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
		echo '</tbody>
					</table>
				</div>
			</div>
		</div>';

		// SUBTOTAL
		echo '<div class="row align-items-center content_delivery">
				<div class="col-lg-2 col-lg-2 col-md-2 col-sm-2 col-12">
						<img class="icon_delivery" src="Public/images/icon_delivery.svg" alt="">
				</div>
				<div class="col-lg-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<p class="txt_general">El peso Máximo del paquete es de 30 kg.</p>
				</div>
				<div class="col-lg-6 col-lg-6 col-md-4 col-sm-4 col-12 cont_subtotal">
						<div class="d-flex">
								<h5>Subtotal</h5>
								<p>$'.number_format($subtotal,2).' MXN</p>
						</div>
						<div class="d-flex">
								<h5>Envío</h5>
								<p>$'.number_format($envio,2).' MXN</p>
						</div>
				</div>
		</div>';

		// TOTAL
		echo '<div class="row cont_total">
				<div class="col-md-12">
						<div class="d-flex">
								<h5>TOTAL</h5>
								<p class="precio_total">$'.number_format($total,2).'</p>
								<span class="mx_span">MXN</span>
						</div>
				</div>
		</div>';
?>
