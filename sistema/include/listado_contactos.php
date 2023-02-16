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
#titulo{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:20px;
	color:#039;
}
#btn_listado{
	width:100%;
	padding:20px 0;
	text-align:center;
}
#btn_listado a{
	font-size:12px;
	text-decoration:none;
	padding:10px 20px;
	background:rgba(255,102,0,1);
	color:#FFF;
	border-radius:15px;
	text-transform:uppercase;
}
#listado{
	width:100%;
	height:auto;
	display:table;
	background:rgba(255,255,255,0.5);
	color:#333;
	font-size:12px;
	margin-bottom:1px;
}
#listado_1{
	width:16%;
	padding:10px 2%;
	float:left;
	text-align:left;
}
#listado_2{
	width:31%;
	padding:10px 2%;
	float:left;
	text-align:left;
}
#listado_3{
	width:31%;
	padding:10px 2%;
	float:left;
	text-align:left;
}
#listado_4{
	width:10%;
	float:left;
	text-align:center;
	background:rgba(204,0,0,0.9);
}
#listado_4 a{
	text-decoration:none;
	padding:10px 0;
	display:block;
	color:#FFF;
}
</style>
</head>
<body>
<?php @$laboratorio=$_GET['laboratorio']; ?>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;">
    	<img src="../imagenes/logo_forma.png" width="100%" />
    	
    </div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$laboratorio=$_GET['laboratorio'];
			@$contacto=$_GET['contacto'];
			@$borrar=$_GET['borrar'];
        	
			$sql = "select nombre, calle, numero, colonia, cp, ciudad, estado from imn_laboratorios where id_laboratorio=$laboratorio";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$nombre=$row['nombre'];
			
			if($borrar=='si'){
				mysqli_query($conexion, "delete from imn_contactos where id_contacto=$contacto");
			}
				
		?>
        <div id="titulo">Lista de Contactos del Laboratorio<br><?php echo $nombre; ?></div>
        <div class="clearer" style="height:10px"></div>
    	<?php
        	// LISTADO
			$datosp=mysqli_query($conexion, "select id_contacto, area, nombre, correo from imn_contactos where laboratorio=$laboratorio");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						echo '<div id="listado">';
							echo '<div id="listado_4"><a href="listado_contactos.php?laboratorio='.$laboratorio.'&contacto='.$datos2p['id_contacto'].'&borrar=si">X</a></div>';
							echo '<div id="listado_1">'.$datos2p['area'].'</div>';
							echo '<div id="listado_2">'.$datos2p['nombre'].'</div>';
							echo '<div id="listado_3">'.$datos2p['correo'].'</div>';
						echo '</div>';
				}
			}
		?>
        <div class="clearer" style="height:20px"></div>
        <div id="btn_listado"><a href="contactos_laboratorio.php?laboratorio=<?php echo $laboratorio; ?>">REGRESAR</a></div>
    </div>
</div>
</body>
</html>