<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EL REY DE MAZATLÁN</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
}

#mensaje{
	width:90%;
	padding:30px 5%;
	text-align:center;
	font-size:17px;
	color:#333;
	min-height:270px;
}

.texto{
	width:90%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:rgba(255,255,255,0.3);
	color:#333;
	font-size:12px;
	text-align: center;
}
.texto2{
	width:90%;
	height:150px;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:rgba(255,255,255,0.3);
	color:#666;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
.combo{
	width:50%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:rgba(102,51,51,1);
	color:#F1F2F2;
	font-size:12px;
}
.combo_2{
	width:50%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:#333;
	color:#F1F2F2;
	font-size:12px;
}
.enviar{
	width:100%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:#333;
	color:#F1F2F2;
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
	color:#666;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left;"><img src="../imagenes/Logotipo-mezcal.svg" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #273746;">
    	<?php
			include '../../Public/includes/conectar.php';
      @$tamano=$_GET['tamano'];
			@$bandera=$_POST['bandera'];
			if($bandera==1){
				@$titulo=$_POST['titulo'];
				@$peso=$_POST['peso'];
				@$tipo=$_POST['tipo'];
				$fecha=date("Y-m-d");

				mysqli_query($conexion, "update vin_tamanos set tamano='$titulo', tipo=$tipo, peso='$peso', fecha='$fecha' where id_tamano=$tamano");
				echo '<div id="mensaje"><a href="../menu.php?opcion=tamanos" target="_parent"><img src="../imagenes/icon_ok.png"></a><br><br>Información registrada correctamente<br>clic en la imagen para cerrar ventana...</div>';
			} else {
				$sql = "select * from vin_tamanos where id_tamano=$tamano";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$titulo=$row['tamano'];
				@$peso=$row['peso'];
				@$tipo=$row['tipo'];
		?>
    	<form method="post" action="modificar_tamano.php?tamano=<?php echo $tamano; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
						<select name="tipo" id="tipo" class="combo_2" required>
							<option value="">Selecciona el tipo de vino</option>
							<?php
									$datos=mysqli_query($conexion, "select * from vin_tipo order by id_tipo asc");
										if(mysqli_num_rows($datos)>0){
											while ($datos2=mysqli_fetch_array($datos)){
												if($tipo==$datos2['id_tipo']){
														echo '<option value="'.$datos2['id_tipo'].'" selected>'.$datos2['tipo'].'</option>';
												} else {
														echo '<option value="'.$datos2['id_tipo'].'">'.$datos2['tipo'].'</option>';
												}
											}
										}
							?>
						</select>
						<div class="clearer" style="height:5px"></div>
						<input type="text" name="titulo" id="titulo" class="texto" placeholder="* Título del tamaño" value="<?php echo $titulo; ?>" required/>
						<div class="clearer" style="height:5px"></div>
						<input type="text" name="peso" id="peso" class="texto" placeholder="* Peso de la botella" value="<?php echo $peso; ?>" required/>
						<div class="clearer" style="height:20px"></div>
            <input type="submit" value="Actualizar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
