<?php include "../include/conectar.php"; ?>
<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				// FILTRO
				echo '<div id="bloque_filtro">';
					@$filtro=$_POST['filtro'];
					if($filtro==1){
						@$inicio=$_POST['inicio'];
						@$final=$_POST['final'];
						@$estudio=$_POST['estudio'];
					}
					echo '<form method="post" action="menu.php?opcion=cortes">';
						echo '<input type="hidden" name="filtro" value="1">';
						echo '<span>Fecha inicio</span>';
						if($filtro==1){
							echo '<input type="date" name="inicio" placeholder="Fecha inicio" value="'.$inicio.'" class="txt_forma" required="required">';
						} else {
							echo '<input type="date" name="inicio" placeholder="Fecha inicio" class="txt_forma" required="required">';
						}
						echo '<span>Fecha termino</span>';
						if($filtro==1){
							echo '<input type="date" name="final" placeholder="Fecha final" value="'.$final.'" class="txt_forma" required="required">';
						} else {
							echo '<input type="date" name="final" placeholder="Fecha final" class="txt_forma" required="required">';
						}
						/*echo '<select name="estado" id="estado" class="combo_forma" onchange="cargar_ciudades(this.value)" required>';
							echo '<option value="">Selecciona el estado</option>';
								$datosp=mysqli_query($conexion, "select d_estado from sepomex group by d_estado order by d_estado asc");
									if(mysqli_num_rows($datosp)>0){
										while ($datos2p=mysqli_fetch_array($datosp)){
											if($estado==$datos2p['d_estado']){
												echo '<option value="'.$datos2p['d_estado'].'" selected="selected">'.$datos2p['d_estado'].'</option>';
											} else {
												echo '<option value="'.$datos2p['d_estado'].'">'.$datos2p['d_estado'].'</option>';
											}
									}
								}
							echo '</select>';*/
						echo '<select name="estudio" id="estudio" class="combo_forma" onchange="cargar_ciudades(this.value)" required>';
							echo '<option value="">Selecciona el estudio</option>';
								$datosp=mysqli_query($conexion, "select id_estudio, titulo_estudio from imn_estudios order by titulo_estudio asc");
									if(mysqli_num_rows($datosp)>0){
										while ($datos2p=mysqli_fetch_array($datosp)){
											if($estudio==$datos2p['id_estudio']){
												echo '<option value="'.$datos2p['id_estudio'].'" selected="selected">'.$datos2p['titulo_estudio'].'</option>';
											} else {
												echo '<option value="'.$datos2p['id_estudio'].'">'.$datos2p['titulo_estudio'].'</option>';
											}
									}
								}
								if($estudio==500){
									echo '<option value="500" selected="selected">TODOS</option>';
								} else {
									echo '<option value="500">TODOS</option>';
								}
						echo '</select>';
							
						echo '<input type="submit" value="FILTRAR" class="enviar_forma">';
					echo '</form>';
				echo '</div>';
				
				echo '<div id="listado_clientes">';
				
							// LISTADO
							if($filtro==1){
								if($estudio==500){
									$datosp=mysqli_query($conexion, "select a.id_pedido as id_pedido, a.cliente as cliente, a.total as total, a.metodo_pago as metodo_pago, a.pagado as pagado, a.fecha as fecha, a.cancelar as cancelar, b.producto as producto, a.especial as especial, a.precio_especial as precio_especial, a.tipo_precio as tipo_precio from imn_pedidos a inner join imn_detalle_pedidos b on (a.id_pedido=b.id_venta) where a.fecha>='$inicio' and a.fecha<='$final' order by a.id_pedido desc");
								} else {
									$datosp=mysqli_query($conexion, "select a.id_pedido as id_pedido, a.cliente as cliente, a.total as total, a.metodo_pago as metodo_pago, a.pagado as pagado, a.fecha as fecha, a.cancelar as cancelar, b.producto as producto, a.especial as especial, a.precio_especial as precio_especial, a.tipo_precio as tipo_precio from imn_pedidos a inner join imn_detalle_pedidos b on (a.id_pedido=b.id_venta) where a.fecha>='$inicio' and a.fecha<='$final' and b.producto=$estudio order by a.id_pedido desc");
								}
							} else {
								$datosp=mysqli_query($conexion, "select a.id_pedido as id_pedido, a.cliente as cliente, a.total as total, a.metodo_pago as metodo_pago, a.pagado as pagado, a.fecha as fecha, a.cancelar as cancelar, b.producto as producto, a.especial as especial, a.precio_especial as precio_especial, a.tipo_precio as tipo_precio from imn_pedidos a inner join imn_detalle_pedidos b on (a.id_pedido=b.id_venta) order by a.id_pedido desc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										$sql = "select * from imn_clientes where id_cliente=".$datos2p['cliente']."";
										$result = mysqli_query($conexion, $sql);
										@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
										@$nombre=$row['nombre'];
										@$a_paterno=$row['a_paterno'];
										@$a_materno=$row['a_materno'];
										
										$nombre_cliente=$nombre.' '.$a_paterno.' '.$a_materno;
										if($datos2p['pagado']=='si'){
											$titulo_pagado='PAGADO';
											$fondo='0,178,89,0.9';
										} else {
											$titulo_pagado='SIN PAGAR';
											$fondo='213,23,0,0.9';
										}
										
										// FONDO GENERAL
										if($datos2p['cancelar']=='si'){
											$fondo_general='213,23,0,0.2';
										} else {
											$fondo_general='255,255,255,0.7';
										}
										
										// NOMBRE ESTUDIO
										$sql2 = "select titulo_estudio from imn_estudios where id_estudio=".$datos2p['producto']."";
										$result2 = mysqli_query($conexion, $sql2);
										@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
										@$titulo_estudio=$row2['titulo_estudio'];
										
										echo '<div style="width:100%; height:auto; display:table; font-size:11px; background:rgba('.$fondo_general.');">';
											echo '<div style="width:23%; padding:10px 2%; float:left; text-align:left;">'.$nombre_cliente.'</div>';
											//echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">'.$datos2p['tipo'].'</div>';
											if($datos2p['especial']==NULL){
												echo '<div style="width:23%; padding:10px 0; float:left; text-align:center;"><a href="include/precio_esp.php?pedido='.$datos2p['id_pedido'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">'.$titulo_estudio.' / $'.number_format($datos2p['total'],2).' MN - P('.$datos2p['tipo_precio'].')</a></div>';
											} else {
												echo '<div style="width:23%; padding:10px 0; float:left; text-align:center;"><a href="include/precio_esp.php?pedido='.$datos2p['id_pedido'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#C00;">** '.$titulo_estudio.' / $'.number_format($datos2p['precio_especial'],2).' MN - P('.$datos2p['tipo_precio'].')**</a></div>';
											}
											echo '<div style="width:25%; padding:10px 0; float:left; text-align:center;">'.$datos2p['metodo_pago'].'</div>';
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">'.f_fecha($datos2p['fecha']).'</div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba('.$fondo.');"><a href="#" style="text-decoration:none; color:#FFF;">'.$titulo_pagado.'</a></div>';
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
								// TOTALES
								if($filtro==NULL){
									echo '<div style="width:100%; padding:10px 0; text-align:center; font-size:13px; color:#333; background:#FF9326; color:#FFF;">SELECCIONA EL RANGO DE FECHAS</div>';
								} else {
									if($estudio==500){
										$sql3 = "select SUM(total) as total from imn_pedidos where fecha>='$inicio' and fecha<='$final' and pagado='si'";
										$result3 = mysqli_query($conexion, $sql3);
										@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
										@$total=$row3['total'];
									} else {
										$sql3 = "select SUM(a.total) as total from imn_pedidos a inner join imn_detalle_pedidos b on (a.id_pedido=b.id_venta) where a.fecha>='$inicio' and a.fecha<='$final' and a.pagado='si' and b.producto=$estudio";
										$result3 = mysqli_query($conexion, $sql3);
										@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
										@$total=$row3['total'];
									}
									echo '<div style="width:100%; padding:10px 0; text-align:center; font-size:13px; color:#333; background:#FF9326; color:#FFF;">TOTAL $'.number_format($total,2).' MN</div>';
								}
				echo '</div>';
			break;
        }
    ?>
</div>