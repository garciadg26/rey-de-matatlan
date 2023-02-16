
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$news=$_GET['news'];
					mysqli_query($conexion, "delete from vin_news where id_news=$news");
				}
				echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(102,51,51,0.8); color:#F1F2F2;">';
					echo '<div style="width:16%; padding:10px 2%; float:left; text-align:center;">NOMBRE</div>';
					echo '<div style="width:26%; padding:10px 2%; float:left; text-align:center;">CORREO</div>';
					echo '<div style="width:16%; padding:10px 2%; float:left; text-align:center;">FECHA</div>';
					echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">&nbsp;</div>';
					echo '</div>';
				echo '<div class="clearer" style="height:1px;"></div>';
							
				echo '<div id="listado_clientes">';
				$datos=mysqli_query($conexion, "select * from vin_news order by id_news asc");
					if(mysqli_num_rows($datos)>0){
						while ($datos2=mysqli_fetch_array($datos)){
							echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
								echo '<div style="width:16%; padding:10px 2%; float:left; text-align:center;">'.$datos2['nombre'].'</div>';
								echo '<div style="width:26%; padding:10px 2%; float:left; text-align:center;">'.$datos2['correo'].'</div>';
								echo '<div style="width:16%; padding:10px 2%; float:left; text-align:center;">'.f_fecha($datos2['fecha']).'</div>';
								echo '<div style="width:30%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_news.php?news='.$datos2['id_news'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
							echo '</div>';
							echo '<div class="clearer" style="height:1px;"></div>';
					}}
				//echo '<div id="agregar"><a href="include/agregar_slide.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>
