
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$condicion=$_GET['condicion'];
					mysqli_query($conexion, "delete from imn_condicion where id_condicion=$condicion");
				}
				
				echo '<div id="listado_clientes">';
				
							// LISTADO
							$datosp=mysqli_query($conexion, "select id_condicion, condicion from imn_condicion order by condicion asc");
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:60%; padding:10px 5%; float:left; text-align:left;">'.utf8_decode($datos2p['condicion']).'</div>';
											if($tipo_usuario=='administrador'){
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_condicion.php?condicion='.$datos2p['id_condicion'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_condicion.php?condicion='.$datos2p['id_condicion'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											}
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				
				echo '<div id="agregar"><a href="include/agregar_condicion.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>