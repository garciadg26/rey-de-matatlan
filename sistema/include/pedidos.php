<?php
	include '../Public/includes/conectar.php';
?>
<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='cancelar'){
					@$pedido=$_GET['pedido'];
					mysqli_query($conexion, "update vin_pedidos set cancelar='si' where id_pedido=$pedido");
				} elseif($borrar=='si'){
					@$pedido=$_GET['pedido'];
					mysqli_query($conexion, "delete from vin_pedidos where id_pedido=$pedido");
				}

				// FILTRO
				echo '<div id="bloque_filtro">';
					@$filtro=$_POST['filtro'];
					if($filtro==1){
						@$inicio=$_POST['inicio'];
						@$final=$_POST['final'];
						@$paquete=$_POST['paquete'];
					}
					echo '<form method="post" action="menu.php?opcion=pedidos">';
						echo '<input type="hidden" name="filtro" value="1">';
						echo '<span>Fecha inicio</span>';
						if($filtro==1){
							echo '<input type="date" name="inicio" placeholder="Fecha inicio" value="'.$inicio.'" class="txt_forma" style="background:rgba(102,51,51,0.8); color:#F1F2F2;" required="required">';
						} else {
							echo '<input type="date" name="inicio" placeholder="Fecha inicio" class="txt_forma" required="required" style="background:rgba(102,51,51,0.8); color:#F1F2F2;">';
						}
						echo '<span>Fecha termino</span>';
						if($filtro==1){
							echo '<input type="date" name="final" placeholder="Fecha final" value="'.$final.'" class="txt_forma" required="required" style="background:rgba(102,51,51,0.8); color:#F1F2F2;">';
						} else {
							echo '<input type="date" name="final" placeholder="Fecha final" class="txt_forma" required="required" style="background:rgba(102,51,51,0.8); color:#F1F2F2;">';
						}
						echo '<input type="submit" value="FILTRAR" class="enviar_forma">';
					echo '</form>';
					echo '<div class="clearer" style="height:20px;"></div>';
				echo '</div>';
				echo '<div id="listado_clientes">';
							// LISTADO
							if($filtro==1){
								$datosp=mysqli_query($conexion, "select id_pedido, nombre_cliente, apellidos, telefono, pagada, forma_pago, total, cancelar, fecha from vin_pedidos where fecha>='$inicio' and fecha<='$final' order by id_pedido desc");
							} else {
								$datosp=mysqli_query($conexion, "select id_pedido, nombre_cliente, apellidos, telefono, pagada, forma_pago, total, cancelar, fecha from vin_pedidos where nombre_cliente!='' order by id_pedido desc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){

										if(@$datos2p['pagada']=='si'){
											$titulo_pagado='PAGADO';
											$fondo='0,178,89,0.9';
										} else {
											$titulo_pagado='SIN PAGAR';
											$fondo='213,23,0,0.9';
										}

										// FONDO GENERAL
										if(@$datos2p['cancelar']=='si'){
											$fondo_general='213,23,0,0.2';
										} else {
											$fondo_general='255,255,255,0.7';
										}

										echo '<div style="width:100%; height:auto; display:table; font-size:11px; background:rgba('.$fondo_general.');">';
											echo '<div style="width:5%; padding:10px 0; float:left; text-align:center;">'.$datos2p['id_pedido'].'</div>';
											echo '<div style="width:18%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['nombre_cliente'].' '.$datos2p['apellidos'].'</div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">$'.number_format($datos2p['total'],2).' MN</div>';

											echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">'.$datos2p['forma_pago'].'</div>';
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">'.f_fecha($datos2p['fecha']).'</div>';
											echo '<div style="width:8%; padding:10px 0; float:left; text-align:center; background:rgba('.$fondo.');"><a href="javascript:void(0);" style="text-decoration:none; color:#FFF;">'.$titulo_pagado.'</a></div>';
											echo '<div style="width:9%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/detalle_pedido.php?pedido='.$datos2p['id_pedido'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">VER DETALLE</a></div>';
											if($tipo_usuario=='administrador'){
												echo '<div style="width:9%; padding:10px 0; float:left; text-align:center; background:#99FFFF;"><a href="include/cancelar_pedido.php?pedido='.$datos2p['id_pedido'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">CANCELAR</a></div>';
												echo '<div style="width:9%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_pedido.php?pedido='.$datos2p['id_pedido'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											}
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				echo '<div id="agregar">';

				echo '</div>';
				echo '</div>';
			break;
        }
    ?>
</div>
