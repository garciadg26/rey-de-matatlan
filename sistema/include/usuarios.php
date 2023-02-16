
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$usuario=$_GET['usuario'];
					mysqli_query($conexion, "delete from usuarios where id_usuario=$usuario");
				}
				
				
				echo '<div id="agregar"><a href="include/agregar_usuario.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '<div id="listado_clientes">';
				
							// LISTADO
							$datosp=mysqli_query($conexion, "select id_usuario, nombre, correo, telefono, usuario, tipo, activo from usuarios order by nombre asc");
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:21%; padding:10px 2%; float:left; text-align:left;">'.$datos2p['nombre'].' ('.$datos2p['tipo'].')</div>';
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:center;">'.$datos2p['correo'].'</div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">'.$datos2p['telefono'].'</div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">'.$datos2p['usuario'].'</div>';
											
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
											echo '<div id="bv_2_'.$datos2p['id_usuario'].'" style="display:none;">';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(255,128,0,0.7);"></div>';
											echo '</div>';
											// FIN BLOQUE
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:#FF9326;"><a href="include/permisos.php?usuario='.$datos2p['id_usuario'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">PERMISOS</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_usuario.php?usuario='.$datos2p['id_usuario'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											if($datos2p['id_usuario']!=1){
												echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_usuario.php?usuario='.$datos2p['id_usuario'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											}
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				
				echo '<div id="agregar"><a href="include/agregar_usuario.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>