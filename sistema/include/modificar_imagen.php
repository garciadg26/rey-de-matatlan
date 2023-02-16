<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MOOTT</title>
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
	width:90%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:rgba(255,255,255,0.3);
	color:#333;
	font-size:12px;
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
	width:30%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:#f7dc6f;
	color:#333;
	font-size:12px;
}
.enviar{
	width:100%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:#273746;
	color:#FFF;
	font-size:13px;
	cursor:pointer;
	text-transform:uppercase;
}
.clearer{
	clear:both;
	display:block;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left;"><img src="../imagenes/web--moott-05.svg" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #273746;">
    	<?php
			include '../../include/conectar.php';
        	@$bandera=$_POST['bandera'];
			@$imagen=$_GET['imagen'];
			if($bandera==1){
				@$titulo=$_POST['titulo'];
				$fecha=date("Y-m-d");
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../imagenes/$archivo";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update mot_inicio set imagen='$archivo' where id_imagen=$imagen");
				}

				mysqli_query($conexion, "update mot_inicio set titulo='$titulo', fecha='$fecha' where id_imagen=$imagen");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=inicio" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select * from mot_inicio where id_imagen=$imagen";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$titulo=$row['titulo'];
				@$imagen_actual=$row['imagen'];
		?>
    	<form method="post" action="modificar_imagen.php?imagen=<?php echo $imagen; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
						<input type="text" name="titulo" id="titulo" class="texto" value="<?php echo $titulo; ?>" placeholder="* Título del slide"  required="required"/>
            <div class="clearer" style="height:5px"></div>
            <?php
            	if($imagen_actual!=NULL){
					echo '<img src="../../imagenes/'.$imagen_actual.'" height="100px">';
					echo '<div class="clearer" style="height:10px"></div>';
				}
			?>
            <input type="file" name="imagen" id="imagen" class="texto" placeholder="Modificar slide" />
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
