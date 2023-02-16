<?php include "../include/conectar.php"; ?>
<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$hotel=$_GET['hotel'];
					mysqli_query($conexion, "delete from hb_hoteles where id_hotel=$hotel");
				}
				echo '<div id="agregar"><a href="include/agregar_hotel.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '<div id="listado_clientes">';
				// PRODUCTOS
				$datosp=mysqli_query($conexion, "select id_hotel, nombre, logotipo, fecha, visible from hb_hoteles order by id_hotel desc");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							$sql = "select COUNT(*) as cantidad from hb_recamaras where id_hotel=".$datos2p['id_hotel']."";
							$result = mysqli_query($conexion, $sql);
							@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
							@$cantidad_recamaras=$row['cantidad'];
							
							$sql2 = "select COUNT(*) as cantidad from hb_imagenes where id_hotel=".$datos2p['id_hotel']."";
							$result2 = mysqli_query($conexion, $sql2);
							@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
							@$cantidad_imagenes=$row2['cantidad'];
							
							$sql3 = "select COUNT(*) as cantidad from hb_slides where id_hotel=".$datos2p['id_hotel']."";
							$result3 = mysqli_query($conexion, $sql3);
							@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
							@$cantidad_slides=$row3['cantidad'];
					
							echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
								if($datos2p['logotipo']==NULL){
									echo '<div style="width:5%; padding:0; float:left; text-align:left;"><img src="../images/imagen_instagram.jpg" height="35px"></div>';
								} else {
									echo '<div style="width:5%; padding:0; float:left; text-align:left;"><img src="../images/'.$datos2p['logotipo'].'" height="35px"></div>';			
								}
								echo '<div style="width:18%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['nombre'].'</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">'.f_fecha($datos2p['fecha']).'</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,217,217,0.9);">VISIBLE - '.$datos2p['visible'].'</div>';
								echo '<div style="width:11%; padding:10px 0; float:left; text-align:center; background:rgba(178,45,0,0.8);"><a href="include/agregar_slides.php?hotel='.$datos2p['id_hotel'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">SLIDES ('.$cantidad_slides.')</a></div>';
								echo '<div style="width:11%; padding:10px 0; float:left; text-align:center; background:rgba(59,134,75,0.8);"><a href="include/agregar_imagenes.php?hotel='.$datos2p['id_hotel'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">IMÁGENES ('.$cantidad_imagenes.')</a></div>';
								echo '<div style="width:11%; padding:10px 0; float:left; text-align:center; background:rgba(239,200,196,1);"><a href="include/agregar_habitaciones.php?hotel='.$datos2p['id_hotel'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">HABS. ('.$cantidad_recamaras.')</a></div>';
								echo '<div style="width:11%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_hotel.php?hotel='.$datos2p['id_hotel'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
								echo '<div style="width:11%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_hotel.php?hotel='.$datos2p['id_hotel'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
							echo '</div>';
							echo '<div class="clearer" style="height:1px;"></div>';
							}}
						echo '<div id="agregar"><a href="include/agregar_hotel.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>