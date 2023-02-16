
<?php include "../Public/includes/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$vino=$_GET['vino'];
					mysqli_query($conexion, "delete from vin_vinos where id_vino=$vino");
				}
				echo '<div id="agregar"><a href="include/agregar_vino.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '<div id="listado_clientes">';
				$datost=mysqli_query($conexion, "select * from vin_categorias order by categoria asc");
					if(mysqli_num_rows($datost)>0){
						while ($datos2t=mysqli_fetch_array($datost)){
							echo '<div style="width:100%; padding:10px 0; text-align:center; font-size:13px; background:#f1948a;">'.$datos2t['categoria'].'</div>';
							echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:#333; color:#F1F2F2;">';
								echo '<div style="width:5%; padding:0; float:left; text-align:left;">&nbsp;</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">TIPO</div>';
								echo '<div style="width:15%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">NOMBRE DEL VINO</div>';
								echo '<div style="width:13%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">PRECIO</div>';
								echo '<div style="width:11%; padding:10px 0; float:left; text-align:center;">ULT. MODIFICACIÓN</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">ESTATUS</div>';
								echo '<div style="width:13%; padding:10px 0; float:left; text-align:center;">&nbsp;</div>';
								echo '</div>';
							echo '<div class="clearer" style="height:1px;"></div>';

						$datos=mysqli_query($conexion, "select * from vin_vinos where tipo=".$datos2t['id_categoria']." order by id_vino asc");
							if(mysqli_num_rows($datos)>0){
								while ($datos2=mysqli_fetch_array($datos)){
									// REVISAR SI HAY RELACIÓN
									$sql = "select COUNT(*) as existe from vin_detalle_tamano where id_vino=".$datos2['id_vino']." ";
									$result = mysqli_query($conexion, $sql);
									@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
									@$existe=$row['existe'];

									// TIPO
									$sql = "select * from vin_categorias where id_categoria=".$datos2['tipo']." ";
									$result = mysqli_query($conexion, $sql);
									@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
									@$tipo=$row['categoria'];

									// PRECIO
									$sql3 = "select MIN(precio) as precio_menor from vin_detalle_tamano where id_vino=".$datos2['id_vino']." ";
									$result3 = mysqli_query($conexion, $sql3);
									@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
									@$precio_menor=$row3['precio_menor'];

									echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
										echo '<div style="width:5%; padding:0; float:left; text-align:left;"><img src="../Public/images/'.$datos2['imagen'].'" height="35px"></div>';
										echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">'.$tipo.'</div>';
										echo '<div style="width:15%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE; position:relative;">';
											echo $datos2['nombre_vino'];
											if($datos2['especial']=='si'){
													echo '<div style="position:absolute; left:20px; top:7px;"><img src="imagenes/estrella.png" style="height:22px;"></div>';
											}
										echo '</div>';
										echo '<div style="width:13%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">$'.number_format($precio_menor,2).' MN</div>';
										echo '<div style="width:11%; padding:10px 0; float:left; text-align:center;">'.f_fecha($datos2['fecha']).'</div>';
										echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,217,217,0.9);">VISIBLE - '.$datos2['visible'].'</div>';
										echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(244,208,63,0.9);"><a href="include/tamanos_vinos.php?vino='.$datos2['id_vino'].'&tipo='.$datos2['tipo'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">TAMAÑOS ('.$existe.')</a></div>';
										echo '<div style="width:13%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_vino.php?vino='.$datos2['id_vino'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
										echo '<div style="width:13%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_vino.php?vino='.$datos2['id_vino'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';

									echo '</div>';
									echo '<div class="clearer" style="height:1px;"></div>';
							}}
							echo '<div class="clearer" style="height:1px;"></div>';
				}}
				echo '<div id="agregar"><a href="include/agregar_vino.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>
