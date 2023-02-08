<?php
	include_once "Public/includes/conectar.php";
	date_default_timezone_set('America/Mexico_City');
	$hoy=date("Y-m-d");
	echo @$producto_2=$_POST['prod'];
	echo @$folio_2=$_POST['id'];

	// ACCIÓN
	//mysqli_query($conexion,"update vin_detalle_pedidos set cantidad=cantidad+1, subtotal=precio*cantidad where id_pedido=$folio_2 and id_vino=$producto_2");

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
							echo '<input type="button" value="-" class="qty-minus">';
							echo '<input type="number" value="'.$datos2['cantidad'].'" class="qty" min="1">';
							//echo '<input type="button" value="+" class="qty-plus">';
							echo '<a href="javascript: sumar('.$folio_2.','.$datos2['id_vino'].')" class="qty-plus">+</a>';
						echo '</div>';
						echo '</td>';
						echo '<td>$'.$datos2['precio'].'</td>';
						echo '<td>$'.$datos2['subtotal'].'</td>';
						echo '<td>';
							echo '<a href="carrito.php?act=borrar&item='.$datos2['id_detalle'].'&Store=MX&Key=Dev838s&Currency=MXN" class="cont_delet">';
								echo '<img src="Public/images/icon_delete.svg" alt="">';
							echo '</a>';
						echo '</td>';
					echo '</tr>';
?>
