
<?php include "../include/conectar.php"; ?>


<div class="clearer"></div>
<div id="acciones" style="padding:0; margin:0;">
	<?php
        switch (@$_GET['op'])
        {
            default:
				@$borrar=$_GET['borrar'];
				if($borrar=='si'){
					@$descuento=$_GET['descuento'];
					mysqli_query($conexion, "delete from imn_descuentos where id_descuento=$descuento");
				}
				
				// FILTRO
				echo '<div id="bloque_filtro">';
					@$filtro=$_POST['filtro'];
					if($filtro==1){
						@$inicio=$_POST['inicio'];
						@$final=$_POST['final'];
						@$estado=$_POST['estado'];
					}
					echo '<form method="post" action="menu.php?opcion=descuentos">';
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
								$datosp=mysqli_query($conexion, "select id_descuento, titulo_descuento, descuento, activo, fecha_inicio, fecha_termino, codigo, cantidad from imn_descuentos where fecha_inicio>='$inicio' and fecha_inicio<='$final' order by fecha_inicio asc");
							} else {
								$datosp=mysqli_query($conexion, "select id_descuento, titulo_descuento, descuento, activo, fecha_inicio, fecha_termino, codigo, cantidad from imn_descuentos order by fecha_inicio asc");
							}
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										echo '<div style="width:100%; height:auto; display:table; font-size:12px; background:rgba(255,255,255,0.7);">';
											echo '<div style="width:16%; padding:10px 2%; float:left; text-align:left;">'.$datos2p['titulo_descuento'].'</div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">'.$datos2p['codigo'].' ('.$datos2p['cantidad'].')</div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center;">'.$datos2p['descuento'].' %</div>';
											echo '<div style="width:30%; padding:10px 0; float:left; text-align:center;"><span style="color:#C00;">Del</span> '.f_fecha($datos2p['fecha_inicio']).' <span style="color:#C00;">al</span> '.f_fecha($datos2p['fecha_termino']).'</div>';
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
											echo '<div id="bv_2_'.$datos2p['id_descuento'].'" style="display:none;">';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(255,128,0,0.7);"></div>';
											echo '</div>';
											// FIN BLOQUE
											if($tipo_usuario=='administrador'){
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(0,50,105,0.8);"><a href="include/modificar_descuento.php?descuento='.$datos2p['id_descuento'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">MODIFICAR</a></div>';
											echo '<div style="width:10%; padding:10px 0; float:left; text-align:center; background:rgba(213,23,0,0.9);"><a href="include/eliminar_descuento.php?descuento='.$datos2p['id_descuento'].'" class="fancybox fancybox.iframe" style="text-decoration:none; color:#FFF;">ELIMINAR</a></div>';
											}
											
										echo '</div>';
										echo '<div class="clearer" style="height:1px;"></div>';
								}}
				if($tipo_usuario=='administrador'){
				echo '<div id="agregar"><a href="include/agregar_descuento.php" style="text-decoration:none; color:#FFF;" class="fancybox fancybox.iframe"><img src="imagenes/icono_mas.png" /></a></div>';
				}
				echo '</div>';
			break;
        }
    ?>
</div>