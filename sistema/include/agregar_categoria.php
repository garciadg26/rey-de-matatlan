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
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				@$titulo=$_POST['titulo'];
				$fecha=date("Y-m-d");

				mysqli_query($conexion, "insert into vin_categorias(categoria, fecha) values('$titulo', '$fecha')");
				echo '<div id="mensaje"><a href="../menu.php?opcion=categorias" target="_parent"><img src="../imagenes/icon_ok.png"></a><br><br>Información registrada correctamente<br>clic en la imagen para cerrar ventana...</div>';
			} else {
		?>
    	<form method="post" action="agregar_categoria.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
						<input type="text" name="titulo" id="titulo" class="texto" placeholder="* Título de la categoría" required/>
						<div class="clearer" style="height:20px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
