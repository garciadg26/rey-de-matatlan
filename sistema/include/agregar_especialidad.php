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
	width:90%;
	padding:15px 3%;
	border:none;
	border-radius:5px;
	background:rgba(255,255,255,0.3);
	color:#333;
	font-size:12px;
	text-align:center;
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
			date_default_timezone_set('America/Mexico_City');
			include '../../include/conectar.php';
			@$categoria=$_GET['categoria'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$titulo=$_POST['titulo'];
				
				mysqli_query($conexion, "insert into imn_especialidades(especialidad, fecha) values('$titulo', '$fecha')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="../menu.php?opcion=especialidades" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_especialidad.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="titulo" id="titulo" placeholder="* Nombre de la especialidad" class="texto" required="required" />
            <div class="clearer" style="height:10px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>