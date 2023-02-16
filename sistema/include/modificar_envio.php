<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FOODKEEPERS</title>
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
	width:90%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:rgba(255,255,255,0.4);
	color:#333;
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
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left; background:rgba(255,255,255,0.9);"><img src="../imagenes/logo_forma.png" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #FF0000;">
    	<?php
			include '../../include/conectar.php';
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$costo=$_POST['costo'];
				@$rango_1=$_POST['rango_1'];
				@$rango_2=$_POST['rango_2'];
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
				}
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "insert into keep_envios(envio, rango_1, rango_2, fecha) values('$costo', '$rango_1', '$rango_2', '$fecha')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="../menu.php?opcion=envios" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_envio.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="costo" id="costo" placeholder="* Costo del envío" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="rango_1" id="rango_1" placeholder="* De" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="rango_2" id="rango_2" placeholder="* Hasta" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>