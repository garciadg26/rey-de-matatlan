<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	include '../../include/conectar.php';
	@$estado3=$_POST['estado2'];
	
	echo '<select name="ciudad" id="ciudad" class="combo_2" required>';
		echo '<option value="">Selecciona la ciudad</option>';
        	$datosp=mysqli_query($conexion, "select d_ciudad from sepomex where d_estado='$estado3' group by d_ciudad ");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						echo '<option value="'.$datos2p['d_ciudad'].'">'.$datos2p['d_ciudad'].'</option>';
					}
				}
	echo '</select>';
?>