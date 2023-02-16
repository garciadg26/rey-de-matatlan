<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NATIONAL WINE</title>
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
}
.combo{
	width:40%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:#f7dc6f;
	color:#333;
	font-size:12px;
}
.combo_2{
	width:40%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:rgba(102,51,51,1);
	color:#F1F2F2;
	font-size:12px;
}
.enviar{
	width:100%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:#333;
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
        	@$bandera=$_POST['bandera'];
			@$slide=$_GET['slide'];
			if($bandera==1){
				@$visible=$_POST['visible'];
				@$titulo=$_POST['titulo'];
				@$titulo_2=$_POST['titulo_2'];
				$fecha=date("Y-m-d");
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update vin_slides set imagen='$archivo' where id_slide=$slide");
				}

				mysqli_query($conexion, "update vin_slides set titulo='$titulo', titulo_2='$titulo_2', visible='$visible', fecha='$fecha' where id_slide=$slide");
				echo '<div id="mensaje"><a href="../menu.php?opcion=slides" target="_parent"><img src="../imagenes/icon_ok.png"></a><br><br>Información registrada correctamente<br>clic en la imagen para cerrar ventana...</div>';
			} else {
				$sql = "select * from vin_slides where id_slide=$slide";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$titulo=$row['titulo'];
				@$titulo_2=$row['titulo_2'];
				@$imagen=$row['imagen'];
				@$visible=$row['visible'];

		?>
    	<form method="post" action="modificar_slide.php?slide=<?php echo $slide; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="visible" id="visible" class="combo">
            	<?php
                	if($visible=='si'){
										echo '<option value="si" selected="selected">Visible / Si</option>';
										echo '<option value="no">Visible / No</option>';
									} else {
										echo '<option value="si">Visible / Si</option>';
										echo '<option value="no" selected="selected">Visible / No</option>';
									}
						?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="titulo" id="titulo" class="texto" placeholder="* Título" value="<?php echo $titulo; ?>" />
						<div class="clearer" style="height:5px"></div>
            <input type="text" name="titulo_2" id="titulo_2" class="texto" placeholder="* Título" value="<?php echo $titulo_2; ?>" />
            <div class="clearer" style="height:10px"></div>
            <?php
            	if($imagen!=NULL){
								echo '<img src="../../Public/images/'.$imagen.'" height="100px">';
								echo '<div class="clearer" style="height:10px"></div>';
							}
						?>
            <input type="file" name="imagen" id="imagen" class="texto" placeholder="Modificar slide" />
            <div class="clearer" style="height:10px"></div>
            <span>* Tamaño recomendado 2000 x 900 pixeles.<br>* Para el nombre de la imagen no usar espacios, signos, acentos.</span>
            <div class="clearer" style="height:20px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
