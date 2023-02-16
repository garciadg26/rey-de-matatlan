<?php
	include '../../include/conectar.php';
	$tipo3=$_POST['tipo2'];
	switch($tipo3){
		case 1: 
			echo '<select name="producto" id="producto" required class="combo_2">';
				echo '<option value="">Selecciona el servicio</option>';
				$datosp=mysqli_query($conexion, "select id_servicio, nombre_servicio, precio from imn_servicios order by nombre_servicio asc");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							echo '<option value="'.$datos2p['id_servicio'].'">'.$datos2p['nombre_servicio'].' $'.number_format($datos2p['precio'],2).' MN</option>';
					}
				}
			echo '</select>';
			
		break;
		case 2: 
			echo '<select name="producto" id="producto" required class="combo_2">';
				echo '<option value="">Selecciona el estudio</option>';
				$datosp=mysqli_query($conexion, "select id_estudio, titulo_estudio, costo from imn_estudios order by titulo_estudio asc");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							echo '<option value="'.$datos2p['id_estudio'].'">'.$datos2p['titulo_estudio'].' $'.number_format($datos2p['costo'],2).' MN</option>';
					}
				}
			echo '</select>';
			
		break;
	}
	echo '<div class="clearer" style="height:5px"></div>';
?>