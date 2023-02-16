
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
					} elseif($filtro==2){
						@$buscar=$_POST['buscar'];
					}
					// FECHAS
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
						if($filtro==1){
							echo '<a href="menu.php?opcion=clientes" style="background:#FFF; color:#C00; padding:10px 10px; border-radius:15px; text-decoration:none;">QUITAR FILTRO</a>';
						} else {
						}
					echo '</form>';
					
					echo '<div class="clearer" style="height:20px;"></div>';
					// NOMBRE
					echo '<form method="post" action="menu.php?opcion=clientes">';
						echo '<input type="hidden" name="filtro" value="2">';
						if($filtro==2){
							echo '<input type="text" name="buscar" id="buscar" value="'.$buscar.'" placeholder="* Ingresa el nombre del cliente" class="txt_forma" style="width:60%" required="required">';
						} else {
							echo '<input type="text" name="buscar" id="buscar" placeholder="* Ingresa el nombre del cliente" class="txt_forma" style="width:60%" required="required">';
						}
						echo '<input type="submit" value="BUSCAR" class="enviar_forma">';
						if($filtro==2){
							echo '<a href="menu.php?opcion=clientes" style="background:#FFF; color:#C00; padding:10px 10px; border-radius:15px; text-decoration:none;">QUITAR FILTRO</a>';
						} else {
						}
					echo '</form>';
				echo '</div>';
				
				echo '<div id="listado_clientes">';
				
							// LISTADO
							if($filtro==1){
								$datosp=mysqli_query($conexion, "select id_cliente, nombre, a_paterno, a_materno, sexo, correo, telefono, fecha, activo from imn_clientes where estado='$estado' and fecha>='$inicio' and fecha<='$final' order by nombre asc");
							} elseif($filtro==2){
								$datosp=mysqli_query($conexion, "select id_cliente, nombre, a_paterno, a_materno, sexo, correo, telefono, fecha, activo from imn_clientes where (nombre LIKE '%".$buscar."%' || a_paterno LIKE '%".$buscar."%' || a_materno LIKE '%".$buscar."%')");
							} else {
								$datosp=mysqli_query($conexion, "select id_cliente, nombre, a_paterno, a_materno, sexo, correo, telefono, fecha, activo from imn_clientes order by nombre asc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:18%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['nombre'].' '.$datos2p['a_paterno'].' '.$datos2p['a_materno'].'</div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:left;">'.$datos2p['sexo'].'</div>';
											echo '<div style="width:13%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['telefono'].'</div>';
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:left;">'.$datos2p['correo'].'</div>';
											// ACTIVO
											if($datos2p['activo']=='si'){
												$fondo='0,178,89,0.9';
												$color='#F1F2F2';
											} else {
												$fondo='217,0,0,0.9';
												$color='#F1F2F2';
											}
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba('.$fondo.'); color:'.$color.';">';
											if($datos2p['activo']=='no'){
												echo '<a href="" style="text-decoration:none; color:'.$color.';">VISIBLE / NO</a>';
											} else {
												echo '<a href="" style="text-decoration:none; color:'.$color.';">VISIBLE / SI</a>';
											}
											echo '</div>';
											echo '<div id="bv_2_'.$datos2p['id_cliente'].'" style="display:none;">';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(255,128,0,0.7);"></div>';
											echo '</div>';
											// FIN BLOQUE
											
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:#FF9326;"><a href="include/direccion_cliente.php?cliente='.$datos2p['id_cliente'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">DIRECCIÓN</a></div>';
											if($tipo_usuario=='administrador'){
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_cliente.php?cliente='.$datos2p['id_cliente'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_cliente.php?cliente='.$datos2p['id_cliente'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											}
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				
				echo '<div id="agregar"><a href="include/agregar_cliente.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>