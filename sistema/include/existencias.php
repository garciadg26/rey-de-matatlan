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
#titulo{
	width:100%;
	padding:0 0 5px 0;
	font-size:13px;
	color:#039;
	text-align:center;
}
#subtitulo{
	width:100%;
	padding:0 0 20px 0;
	font-size:13px;
	color:rgba(255,0,0,0.9);
	text-align:center;
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
	width:70%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:rgba(255,0,0,0.9);
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
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left; background:rgba(255,255,255,0.9);"><img src="../imagenes/logo_forma.png" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #FF0000;">
    	<?php
			include '../../include/conectar.php';
			@$producto=$_GET['producto'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$cantidad=$_POST['cantidad'];
				
				mysqli_query($conexion, "insert into keep_inventario_productos(id_producto, cantidad, fecha) values($producto, $cantidad, '$fecha')");
				mysqli_query($conexion, "update keep_productos set existencia=existencia+$cantidad where id_producto=$producto");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><img src="../imagenes/icon_ok.png"><br><a href="../menu.php?opcion=productos" target="_parent" style="background: rgba(0,50,105,0.8);padding: 12px 20px;color: #fff;text-decoration: navajowhite;display: inline-block;margin-top: 20px;">CERRAR</a></div>';
				//echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=productos" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select nombre, existencia from keep_productos where id_producto=$producto";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$nombre=$row['nombre'];
				@$existencia=$row['existencia'];
				echo '<div id="titulo">'.$nombre.'</div>';
				echo '<div id="subtitulo">EXISTENCIA ACTUAL ('.$existencia.')</div>';
		?>
    	<form method="post" action="existencias.php?producto=<?php echo $producto; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="cantidad" id="cantidad" placeholder="* Añadir cantidad en numeros enteros" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Añadir" class="enviar" />
        </form>
        <div class="clearer" style="height:20px"></div>
        <a href="existencias_historico.php?producto=<?php echo $producto; ?>" style="font-size:12px; color:#999;">Ver historial de inventario añadido</a>
        <?php } ?>
    </div>
</div>
</body>
</html>