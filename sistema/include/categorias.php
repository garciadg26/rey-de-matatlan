
<?php include "../Public/includes/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$categoria=$_GET['categoria'];
					mysqli_query($conexion, "delete from vin_categorias where id_categoria=$categoria");
				}
				echo '<div id="agregar"><a href="include/agregar_categoria.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '<div id="listado_clientes">';
				$datos=mysqli_query($conexion, "select * from vin_categorias order by id_categoria asc");
					if(mysqli_num_rows($datos)>0){
						while ($datos2=mysqli_fetch_array($datos)){
							echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
								echo '<div style="width:30%; padding:10px 0; float:left; text-align:center;">'.$datos2['categoria'].'</div>';
								echo '<div style="width:30%; padding:10px 0; float:left; text-align:center;">'.f_fecha($datos2['fecha']).'</div>';
								//echo '<div style="width:20%; padding:10px 0; float:left; text-align:center; background:rgba(0,217,217,0.9);">VISIBLE - '.$datos2['visible'].'</div>';
								if($tipo_usuario=='administrador'){
								echo '<div style="width:20%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_categoria.php?categoria='.$datos2['id_categoria'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
								echo '<div style="width:20%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_categoria.php?categoria='.$datos2['id_categoria'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
								}

							echo '</div>';
							echo '<div class="clearer" style="height:1px;"></div>';
					}}
				echo '<div id="agregar"><a href="include/agregar_categoria.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>
