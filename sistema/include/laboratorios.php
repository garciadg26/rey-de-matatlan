
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$laboratorio=$_GET['laboratorio'];
					mysqli_query($conexion, "delete from imn_laboratorios where id_laboratorio=$laboratorio");
				}
				
				// FILTRO
				echo '<div id="bloque_filtro">';
					@$filtro=$_POST['filtro'];
					if($filtro==1){
						@$inicio=$_POST['inicio'];
						@$final=$_POST['final'];
						@$estado=$_POST['estado'];
					}
					echo '<form method="post" action="menu.php?opcion=laboratorios">';
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
						echo '<select name="estado" id="estado" class="combo_forma" onchange="cargar_ciudades(this.value)" required>';
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
							echo '</select>';
						echo '<input type="submit" value="FILTRAR" class="enviar_forma">';
					echo '</form>';
				echo '</div>';
				
				echo '<div id="listado_clientes">';
				
							// LISTADO
							if($filtro==1){
								$datosp=mysqli_query($conexion, "select id_laboratorio, nombre, correo, telefono, fecha, activo from imn_laboratorios where estado='$estado' and fecha>='$inicio' and fecha<='$final' order by nombre asc");
							} else {
								$datosp=mysqli_query($conexion, "select id_laboratorio, nombre, correo, telefono, fecha, activo from imn_laboratorios order by nombre asc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:18%; padding:10px 1%; float:left; text-align:left;">'.utf8_decode($datos2p['nombre']).'</div>';
											echo '<div style="width:13%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['telefono'].'</div>';
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:left;">'.$datos2p['correo'].'</div>';
											// ACTIVO
											/*if($datos2p['activo']=='si'){
												$fondo='0,178,89,0.9';
												$color='#F1F2F2';
											} else {
												$fondo='217,0,0,0.9';
												$color='#F1F2F2';
											}
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba('.$fondo.'); color:'.$color.';">';
											if($datos2p['activo']=='no'){
												echo '<a href="" style="text-decoration:none; color:'.$color.';">ACTIVO / NO</a>';
											} else {
												echo '<a href="" style="text-decoration:none; color:'.$color.';">ACTIVO / SI</a>';
											}
											echo '</div>';
											echo '<div id="bv_2_'.$datos2p['id_laboratorio'].'" style="display:none;">';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(255,128,0,0.7);"></div>';
											echo '</div>';*/
											// FIN BLOQUE
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,178,89,0.9);"><a href="include/comisiones_laboratorio.php?laboratorio='.$datos2p['id_laboratorio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#F1F2F2;">COMISIONES</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:#FF9326;"><a href="include/direccion_laboratorio.php?laboratorio='.$datos2p['id_laboratorio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">DIRECCIÓN</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:#99FFFF;"><a href="include/contactos_laboratorio.php?laboratorio='.$datos2p['id_laboratorio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">CONTACTOS</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_laboratorio.php?laboratorio='.$datos2p['id_laboratorio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_laboratorio.php?laboratorio='.$datos2p['id_laboratorio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				
				echo '<div id="agregar"><a href="include/agregar_laboratorio.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>