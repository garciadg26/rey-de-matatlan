
<?php include "../include/conectar.php"; ?>
<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$asociado=$_GET['asociado'];
					mysqli_query($conexion, "delete from imn_aspirantes where id_aspirante=$asociado");
				}
				
				// FILTRO
				echo '<div id="bloque_filtro">';
					@$filtro=$_POST['filtro'];
					if($filtro==1){
						@$inicio=$_POST['inicio'];
						@$final=$_POST['final'];
						@$estado=$_POST['estado'];
						@$especialidad=$_POST['especialidad'];
					}
					echo '<form method="post" action="menu.php?opcion=asociados">';
						echo '<input type="hidden" name="filtro" value="1">';
						echo '<span>Fecha inicio</span>';
						if($filtro==1){
							echo '<input type="date" name="inicio" placeholder="Fecha inicio" value="'.$inicio.'" class="txt_forma" required="required">';
						} else {
							echo '<input type="date" name="inicio" placeholder="Fecha inicio" class="txt_forma" required="required">';
						}
						echo '<span>Fecha termino</span>';
						if($filtro==1){
							echo '<input type="date" name="final" placeholder="Fecha final" value="'.$final.'" class="txt_forma" required="required">';
						} else {
							echo '<input type="date" name="final" placeholder="Fecha final" class="txt_forma" required="required">';
						}
						echo '<input type="submit" value="FILTRAR" class="enviar_forma">';
					echo '</form>';
				echo '</div>';
				
				echo '<div id="listado_clientes">';
							// LISTADO
							if($filtro==1){
								$datosp=mysqli_query($conexion, "select id_aspirante, nombre, a_paterno, a_materno, correo, telefono, imagen, especialidad, fecha, activo from imn_aspirantes where estado='$estado' and especialidad=$especialidad and fecha>='$inicio' and fecha<='$final' order by nombre asc");
								} else {
								$datosp=mysqli_query($conexion, "select id_aspirante, nombre, titulo, especialidad, fecha from imn_aspirantes order by nombre asc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:18%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['nombre'].'</div>';
											echo '<div style="width:18%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['titulo'].'</div>';
											echo '<div style="width:23%; padding:10px 1%; float:left; text-align:left;">'.$datos2p['especialidad'].'</div>';
											echo '<div style="width:15%; padding:10px 0; float:left; text-align:left;">'.$datos2p['fecha'].'</div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/detalle_asociados.php?asociado='.$datos2p['id_aspirante'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">VER INFORMACIÓN</a></div>';
											if($tipo_usuario=='administrador'){
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_asociado.php?asociado='.$datos2p['id_aspirante'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											}
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				echo '</div>';
			break;
        }
    ?>
</div>