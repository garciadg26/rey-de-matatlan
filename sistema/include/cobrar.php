
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$cliente=$_GET['cliente'];
					mysqli_query($conexion, "delete from imn_clientes where id_cliente=$cliente");
				}
				
				// FILTRO
				echo '<div id="bloque_filtro">';
					@$filtro=$_POST['filtro'];
					if($filtro==1){
						@$inicio=$_POST['inicio'];
						@$final=$_POST['final'];
						@$estado=$_POST['estado'];
					}
					echo '<form method="post" action="menu.php?opcion=clientes">';
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
						echo '<input type="submit" value="FILTRAR" class="enviar_forma">';
					echo '</form>';
				echo '</div>';
				
				echo '<div id="listado_clientes">';
				
							// LISTADO
							if($filtro==1){
								$datosp=mysqli_query($conexion, "select id_asignar, id_nutriologo, fecha, cantidad, precio, subtotal from imn_asignar_estudios where and fecha>='$inicio' and fecha<='$final' order by fecha asc");
							} else {
								$datosp=mysqli_query($conexion, "select id_asignar, id_nutriologo, fecha, cantidad, precio, subtotal from imn_asignar_estudios order by fecha desc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										$sql = "select nombre, a_paterno, a_materno from imn_nutriologos where id_nutriologo=".$datos2p['id_nutriologo']."";
										$result = mysqli_query($conexion, $sql);
										@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
										@$nombre=$row['nombre'];
										@$paterno=$row['a_paterno'];
										@$materno=$row['a_materno'];
										@$subtotal=$datos2p['cantidad']*$datos2p['precio'];
				
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:18%; padding:10px 1%; float:left; text-align:left;">'.$nombre.' '.$paterno.' '.$materno.'</div>';
											echo '<div style="width:20%; padding:10px 0; float:left; text-align:center;">'.f_fecha($datos2p['fecha']).'</div>';
											echo '<div style="width:5%; padding:10px 0; float:left; text-align:center;">'.$datos2p['cantidad'].'</div>';
											echo '<div style="width:20%; padding:10px 0; float:left; text-align:center;">$'.number_format($datos2p['precio'],2).' MN</div>';
											echo '<div style="width:20%; padding:10px 0; float:left; text-align:center;">$'.number_format($subtotal,2).' MN</div>';
											
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:center; background:#FF9326;"><a href="include/detalle_asignados.php?folio='.$datos2p['id_asignar'].'&especialista='.$datos2p['id_nutriologo'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">VER DETALLE</a></div>';
											//echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_cliente.php?cliente='.$datos2p['id_cliente'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											//echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_cliente.php?cliente='.$datos2p['id_cliente'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				
				echo '<div id="agregar"><a href="include/agregar_cliente.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>