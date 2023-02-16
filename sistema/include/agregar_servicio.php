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
	width:60%;
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
	width:30%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:rgba(0,51,204,0.9);
	color:#FFF;
	font-size:12px;
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
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$categoria=$_GET['categoria'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$titulo=$_POST['titulo'];
				@$precio=$_POST['precio'];
				@$informacion=$_POST['informacion'];
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../imagenes/$archivo";
						@copy ($archTemp,$folder);
				}
				
				mysqli_query($conexion, "insert into imn_servicios(nombre_servicio, imagen, informacion, fecha, activo, precio) values('$titulo', '$archivo', '$informacion', '$fecha', 'si', '$precio')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="../menu.php?opcion=servicios" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_servicio.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="titulo" id="titulo" placeholder="* Nombre del Servicio" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="precio" id="precio" placeholder="* Precio del Servicio" class="texto" required="required" style="width:30%" />
            <div class="clearer" style="height:5px"></div>
            <span>* Para ingresar un precio de $1,500.00, solo ingresar 1500</span>
            <div class="clearer" style="height:5px"></div>
            <textarea name="informacion" id="informacion" class="texto2" required="required" placeholder="* Descripción del servicio"></textarea>
            <div class="clearer" style="height:5px"></div>
            <input type="file" name="imagen" id="imagen" class="texto" />
            <div class="clearer" style="height:5px"></div>
            <span>* Nombre de la imagen sin acentos, espacio ó símbolos. Tamaño recomendado de la imagen de 900 x 600 píxeles.</span>
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>