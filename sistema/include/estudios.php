
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$estudio=$_GET['estudio'];
					mysqli_query($conexion, "delete from imn_estudios where id_estudio=$estudio");
				}
				
				// FILTRO
				echo '<div id="bloque_filtro">';
					@$filtro=$_POST['filtro'];
					if($filtro==1){
						@$inicio=$_POST['inicio'];
						@$final=$_POST['final'];
						@$estado=$_POST['estado'];
					}
					echo '<form method="post" action="menu.php?opcion=estudios">';
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
						echo '<input type="submit" value="FILTRAR" class="enviar_forma">';
					echo '</form>';
				echo '</div>';
				
				echo '<div id="listado_clientes">';
							echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7); color:#369;">';
								echo '<div style="width:26%; padding:10px 2%; float:left; text-align:left;">ESTUDIO</div>';
								echo '<div style="width:18%; padding:10px 1%; float:left; text-align:center;">COSTO</div>';
								echo '<div style="width:18%; padding:10px 1%; float:left; text-align:center;">FECHA</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">ACTIVO</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">&nbsp;</div>';
							echo '</div>';
							echo '<div class="clearer" style="height:1px;"></div>';
										
							// LISTADO
							if($filtro==1){
								$datosp=mysqli_query($conexion, "select id_estudio, titulo_estudio, costo, fecha, activo, precio_activo, orden from imn_estudios where fecha>='$inicio' and fecha<='$final' order by titulo_estudio asc");
							} else {
								$datosp=mysqli_query($conexion, "select id_estudio, titulo_estudio, costo, fecha, activo, precio_activo, orden from imn_estudios order by titulo_estudio asc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										// PRECIO
										switch($datos2p['precio_activo']){
											case 1:
												$sql = "select costo from imn_estudios where id_estudio=".$datos2p['id_estudio']."";
												$result = mysqli_query($conexion, $sql);
												@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
												@$precio_mostrar=$row['costo'];
											break;
											case 2:
												$sql = "select costo_2 from imn_estudios where id_estudio=".$datos2p['id_estudio']."";
												$result = mysqli_query($conexion, $sql);
												@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
												@$precio_mostrar=$row['costo_2'];
											break;
											case 3:
												$sql = "select costo_3 from imn_estudios where id_estudio=".$datos2p['id_estudio']."";
												$result = mysqli_query($conexion, $sql);
												@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
												@$precio_mostrar=$row['costo_3'];
											break;
											case 4:
												$sql = "select costo_4 from imn_estudios where id_estudio=".$datos2p['id_estudio']."";
												$result = mysqli_query($conexion, $sql);
												@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
												@$precio_mostrar=$row['costo_4'];
											break;
										}
										
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:26%; padding:10px 2%; float:left; text-align:left;"><span style="color:#C00;">('.$datos2p['orden'].')</span> '.$datos2p['titulo_estudio'].'</div>';
											echo '<div style="width:18%; padding:10px 1%; float:left; text-align:center;">$'.number_format($precio_mostrar,2).' MN (P-'.$datos2p['precio_activo'].')</div>';
											echo '<div style="width:18%; padding:10px 1%; float:left; text-align:center;">'.f_fecha($datos2p['fecha']).'</div>';
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
												echo '<a href="" style="text-decoration:none; color:'.$color.';">ACTIVO / NO</a>';
											} else {
												echo '<a href="" style="text-decoration:none; color:'.$color.';">ACTIVO / SI</a>';
											}
											echo '</div>';
											echo '<div id="bv_2_'.$datos2p['id_estudio'].'" style="display:none;">';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(255,128,0,0.7);"></div>';
											echo '</div>';
											// FIN BLOQUE
											if($tipo_usuario=='administrador'){
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_estudio.php?estudio='.$datos2p['id_estudio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_estudio.php?estudio='.$datos2p['id_estudio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											}
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				
				echo '<div id="agregar"><a href="include/agregar_estudio.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>