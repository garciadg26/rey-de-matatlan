
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				//echo '<div id="agregar"><a href="include/agregar_slide.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '<div id="listado_clientes">';
				echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:#f7dc6f;">';
					echo '<div style="width:10%; padding:0; float:left; text-align:left;">&nbsp;</div>';
					echo '<div style="width:46%; padding:10px 2%; float:left; text-align:center;">SECCIÓN</div>';
					echo '<div style="width:21%; padding:10px 2%; float:left; text-align:center;">ULT. MODIFICACIÓN</div>';
					echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">&nbsp;</div>';
				echo '</div>';
				echo '<div class="clearer" style="height:1px;"></div>';

				$datos=mysqli_query($conexion, "select * from mot_inicio order by id_imagen asc");
					if(mysqli_num_rows($datos)>0){
						while ($datos2=mysqli_fetch_array($datos)){
							echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
								echo '<div style="width:10%; padding:0; float:left; text-align:left;"><img src="../imagenes/'.$datos2['imagen'].'" height="35px"></div>';
								echo '<div style="width:46%; padding:10px 2%; float:left; text-align:center;">'.$datos2['titulo'].'</div>';
								echo '<div style="width:21%; padding:10px 2%; float:left; text-align:center;">'.f_fecha($datos2['fecha']).'</div>';
								echo '<div style="width:15%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_imagen.php?imagen='.$datos2['id_imagen'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
							echo '</div>';
							echo '<div class="clearer" style="height:1px;"></div>';
					}}
				//echo '<div id="agregar"><a href="include/agregar_slide.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>
