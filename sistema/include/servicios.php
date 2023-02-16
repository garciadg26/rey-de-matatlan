
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$servicio=$_GET['servicio'];
					mysqli_query($conexion, "delete from imn_servicios where id_servicio=$servicio");
				}
				echo '<div id="agregar"><a href="include/agregar_servicio.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '<div id="listado_clientes">';
				
							// LISTADO
							$datosp=mysqli_query($conexion, "select id_servicio, nombre_servicio, imagen, fecha, activo, precio from imn_servicios order by nombre_servicio asc");
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:10%; padding:0; float:left; text-align:left;"><a href="include/imagen_nutriologo.php?nutriologo='.$datos2p['id_servicio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;"><img src="imagenes/'.$datos2p['imagen'].'" height="35px"></a></div>';
											echo '<div style="width:24%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['nombre_servicio'].'</div>';
											echo '<div style="width:12%; padding:10px 0; float:left; text-align:left;">$'.number_format($datos2p['precio'],2).' MN</div>';
											echo '<div style="width:12%; padding:10px 0; float:left; text-align:left;">'.f_fecha($datos2p['fecha']).'</div>';
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
											echo '<div id="bv_2_'.$datos2p['id_servicio'].'" style="display:none;">';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(255,128,0,0.7);"></div>';
											echo '</div>';
											// FIN BLOQUE
											
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:#FF9326;"><a href="include/rendimiento.php?nutriologo='.$datos2p['id_servicio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">RENDIMIENTO</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_servicio.php?servicio='.$datos2p['id_servicio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_servicio.php?servicio='.$datos2p['id_servicio'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				
				echo '<div id="agregar"><a href="include/agregar_servicio.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>