
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$especialidad=$_GET['especialidad'];
					mysqli_query($conexion, "delete from imn_especialidades where id_especialidad=$especialidad");
				}
				
				// FILTRO
				echo '<div id="bloque_filtro">';
					@$filtro=$_POST['filtro'];
					if($filtro==1){
						@$inicio=$_POST['inicio'];
						@$final=$_POST['final'];
						@$estado=$_POST['estado'];
					}
					echo '<form method="post" action="menu.php?opcion=especialidades">';
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
								$datosp=mysqli_query($conexion, "select id_especialidad, especialidad, fecha from imn_especialidades where fecha>='$inicio' and fecha<='$final' order by especialidad asc");
							} else {
								$datosp=mysqli_query($conexion, "select id_especialidad, especialidad, fecha from imn_especialidades order by especialidad asc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										$sql = "select COUNT(*) as cantidad from imn_nutriologos where especialidad=".$datos2p['id_especialidad']."";
										$result = mysqli_query($conexion, $sql);
										@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
										@$cantidad=$row['cantidad'];
				
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:34%; padding:10px 3%; float:left; text-align:left;">'.$datos2p['especialidad'].'</div>';
											echo '<div style="width:20%; padding:10px 0; float:left; text-align:center;">'.f_fecha($datos2p['fecha']).'</div>';
											echo '<div style="width:20%; padding:10px 0; float:left; text-align:center; background:#99FFFF;"><a href="include/cantidad_especialistas.php?especialidad='.$datos2p['id_especialidad'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#333;">CANTIDAD ESPECIALISTAS('.$cantidad.')</a></div>';
											if($tipo_usuario=='administrador'){
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_especialidad.php?especialidad='.$datos2p['id_especialidad'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_especialidad.php?especialidad='.$datos2p['id_especialidad'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											}
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				
				echo '<div id="agregar"><a href="include/agregar_especialidad.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				echo '</div>';
			break;
        }
    ?>
</div>