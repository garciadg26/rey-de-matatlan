
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$paquete=$_GET['paquete'];
					mysqli_query($conexion, "delete from vin_paquetes where id_paquete=$paquete");
				}
				echo '<div id="agregar"><a href="include/agregar_paquete.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '<div id="listado_clientes">';
				echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(102,51,51,0.8); color:#F1F2F2;">';
					echo '<div style="width:5%; padding:0; float:left; text-align:left;">&nbsp;</div>';
					echo '<div style="width:20%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">NOMBRE DEL PAQUETE</div>';
					echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">PRECIO</div>';
					echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">CANTIDAD</div>';
					echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">ULT. MODIFICACIÓN</div>';
					echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">ESTATUS</div>';
					echo '<div style="width:13%; padding:10px 0; float:left; text-align:center;">&nbsp;</div>';
					echo '</div>';
				echo '<div class="clearer" style="height:1px;"></div>';
							
				$datos=mysqli_query($conexion, "select * from vin_paquetes order by id_paquete asc");
					if(mysqli_num_rows($datos)>0){
						while ($datos2=mysqli_fetch_array($datos)){
							$sql = "select MAX(id_vino) as id_vino from vin_detalle_paquetes where id_paquete=".$datos2['id_paquete']."";
							$result = mysqli_query($conexion, $sql);
							@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
							@$id_vino=$row['id_vino'];
							
							$sql3 = "select imagen from vin_vinos where id_vino=".$id_vino."";
							$result3 = mysqli_query($conexion, $sql3);
							@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
							@$imagen=$row3['imagen'];
							
							$sql2 = "select SUM(cantidad) as cantidad from vin_detalle_paquetes where id_paquete=".$datos2['id_paquete']."";
							$result2 = mysqli_query($conexion, $sql2);
							@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
							@$cantidad=$row2['cantidad'];
				
							echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
								echo '<div style="width:5%; padding:0; float:left; text-align:left;"><img src="../images/'.$imagen.'" height="35px"></div>';
								echo '<div style="width:20%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">'.$datos2['nombre'].'</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">$'.number_format($datos2['precio'],2).' MN</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; text-transform:UPPERCASE;">'.$cantidad.'</div>';
								echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">'.f_fecha($datos2['fecha']).'</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,217,217,0.9);">VISIBLE - '.$datos2['visible'].'</div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(255,128,0,0.5);"><a href="include/contenido_paquete.php?paquete='.$datos2['id_paquete'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">CONTENIDO</a></div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_paquete.php?paquete='.$datos2['id_paquete'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
								echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_paquete.php?paquete='.$datos2['id_paquete'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
								
							echo '</div>';
							echo '<div class="clearer" style="height:1px;"></div>';
					}}
				echo '<div id="agregar"><a href="include/agregar_paquete.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>
