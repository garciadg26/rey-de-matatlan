<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NUBE NUTRITION</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
}
#mensaje{
	width:90%;
	padding:30px 5%;
	text-align:center;
	font-size:17px;
	color:rgba(0,51,102,1);
	min-height:270px;
}
.texto{
	width:40%;
	padding:15px 3%;
	border:none;
	border-radius:5px;
	background:rgba(255,255,255,0.3);
	color:#333;
	font-size:12px;
	float:left;
}
.texto2{
	width:90%;
	height:150px;
	padding:15px 5%;
	border:none;
	border-radius:10px;
	background:rgba(255,255,255,0.3);
	color:#666;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
.combo{
	width:40%;
	padding:15px 2%;
	border:none;
	border-radius:5px;
	background:rgba(0,51,204,0.9);
	color:#FFF;
	font-size:12px;
	float:left;
}
.combo_2{
	width:90%;
	padding:15px 2%;
	border:none;
	border-radius:5px;
	background:#FF9326;
	color:#333;
	font-size:12px;
	float:left;
}
.enviar{
	width:100%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:#03C;
	color:#FFF;
	font-size:13px;
	cursor:pointer;
	text-transform:uppercase;
}
.clearer{
	clear:both;
	display:block;
}
span{
	font-size:12px;
	color:#039;
	padding:15px 5px;
	float:left;
}
#titulo{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:20px;
	color:#039;
}
#bloque_ciudad{
	width:50%;
	float:left;
	padding:0 10px;
	display:none;
}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	function cargar_ciudades(estado){
		$.ajax({
			type: 'POST',
			url: 'ciudades.php',
			data: { estado2: estado },
			// Mostramos un mensaje con la respuesta de PHP
			success: function(data) {
			$('#bloque_ciudad').css('display','block');
			$('#bloque_ciudad').html(data);
			$('#bloque_ciudad').focus();
			}
		});
	}
</script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$laboratorio=$_GET['laboratorio'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$calle=$_POST['calle'];
				@$numero=$_POST['numero'];
				@$colonia=$_POST['colonia'];
				@$cp=$_POST['cp'];
				@$ciudad=$_POST['ciudad'];
				@$estado=$_POST['estado'];
				/*$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
				}*/
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "update imn_laboratorios set calle='$calle', numero='$numero', colonia='$colonia', cp='$cp', ciudad='$ciudad', estado='$estado' where id_laboratorio=$laboratorio");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=laboratorios" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select calle, numero, colonia, cp, ciudad, estado from imn_laboratorios where id_laboratorio=$laboratorio";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$calle=$row['calle'];
				@$numero=$row['numero'];
				@$colonia=$row['colonia'];
				@$cp=$row['cp'];
				@$ciudad=$row['ciudad'];
				@$estado=$row['estado'];
				
		?>
        <div id="titulo">Información de la dirección</div>
    	<form method="post" action="direccion_laboratorio.php?laboratorio=<?php echo $laboratorio; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="calle" id="calle" placeholder="* Calle" class="texto" required="required" value="<?php echo $calle; ?>" style="width:88%" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="numero" id="numero" placeholder="* Número" class="texto" required="required" value="<?php echo $numero; ?>"/>
            <input type="text" name="colonia" id="colonia" placeholder="* Colonia" class="texto" style="margin-left:10px" value="<?php echo $colonia; ?>"/>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="cp" id="cp" placeholder="* CP" class="texto" required="required" value="<?php echo $cp; ?>"/>
            <div class="clearer" style="height:10px"></div>
            <select name="estado" id="estado" class="combo" onchange="cargar_ciudades(this.value)" required>
            	<option value="">Selecciona el estado</option>
                <?php
                	$datosp=mysqli_query($conexion, "select d_estado from sepomex group by d_estado order by d_estado asc");
						if(mysqli_num_rows($datosp)>0){
							while ($datos2p=mysqli_fetch_array($datosp)){
								if($estado==$datos2p['d_estado']){
									echo '<option value="'.$datos2p['d_estado'].'" selected="selected">'.$datos2p['d_estado'].'</option>';
								} else {
									echo '<option value="'.$datos2p['d_estado'].'">'.$datos2p['d_estado'].'</option>';
								}
						}
					}
				?>
            </select>
            <?php
            	if($ciudad==NULL){
					echo '<div id="bloque_ciudad"></div>';		
				} else {
					echo '<div id="bloque_ciudad" style="display:block;">';
					echo '<select name="ciudad" id="ciudad" class="combo_2" required>';
						echo '<option value="">Selecciona la ciudad</option>';
							$datosp=mysqli_query($conexion, "select d_ciudad from sepomex where d_estado LIKE '%".$estado3."%' group by d_ciudad ");
								if(mysqli_num_rows($datosp)>0){
									while ($datos2p=mysqli_fetch_array($datosp)){
										if($ciudad==$datos2p['d_ciudad']){
											echo '<option value="'.$datos2p['d_ciudad'].'" selected="selected">'.$datos2p['d_ciudad'].'</option>';
										} else {
											echo '<option value="'.$datos2p['d_ciudad'].'">'.$datos2p['d_ciudad'].'</option>';
										}
									}
								}
					echo '</select>';
					echo '</div>';
				}
			?>
            <div class="clearer" style="height:5px"></div>
            
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>