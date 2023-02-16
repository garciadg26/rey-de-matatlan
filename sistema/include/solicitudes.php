
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$solicitud=$_GET['solicitud'];
					//mysqli_query($conexion, "delete from mot_solicituds where id_solicitud=$solicitud");
				}
				//echo '<div id="agregar"><a href="include/agregar_solicitud.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '<div id="listado_clientes">';
				echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:#f7dc6f;">';
					echo '<div style="width:20%; padding:10px 0; float:left; text-align:center;">NOMBRE</div>';
					echo '<div style="width:20%; padding:10px 0; float:left; text-align:center;">EMAIL</div>';
					echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">TELÉFONO</div>';
					echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">FOLIO</div>';
					echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">&nbsp;</div>';
				echo '</div>';
				echo '<div class="clearer" style="height:1px;"></div>';

				echo '<div id="listado_clientes">';
				$datos=mysqli_query($conexion, "select * from mot_solicitud order by id_solicitud desc");
					if(mysqli_num_rows($datos)>0){
						while ($datos2=mysqli_fetch_array($datos)){
							echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
								echo '<div style="width:16%; padding:10px 2%; float:left; text-align:left;">'.$datos2['nombre'].'</div>';
								echo '<div style="width:18%; padding:10px 1%; float:left; text-align:center;">'.$datos2['correo'].'</div>';
								echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">'.$datos2['telefono'].'</div>';
								echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">'.$datos2['id_solicitud'].'</div>';
								echo '<div style="width:15%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/ver_solicitud.php?solicitud='.$datos2['id_solicitud'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">VER INFORMACIÓN</a></div>';
								echo '<div style="width:15%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_solicitud.php?solicitud='.$datos2['id_solicitud'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';


							echo '</div>';
							echo '<div class="clearer" style="height:1px;"></div>';
					}}
				//echo '<div id="agregar"><a href="include/agregar_solicitud.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>
