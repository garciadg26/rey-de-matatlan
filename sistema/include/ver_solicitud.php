<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MOOTT</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
}

#completa{
	width:89.5%;
	padding:10px 5%;
	text-align:center;
	font-size:15px;
	background:rgba(0,51,102,0.2);
	color:rgba(0,51,102,1);
	height:auto;
	display:table;
	margin-bottom:1px;
	border-left:solid 2px #003399;
}
#completa_2{
	width:89.5%;
	padding:10px 5%;
	text-align:center;
	font-size:15px;
	background:rgba(255,204,51,0.5);
	color:rgba(0,51,102,1);
	height:auto;
	display:table;
	margin-bottom:1px;
	border-left:solid 2px #FF9933;
}
#completa_3{
	width:89.5%;
	padding:10px 5%;
	text-align:left;
	font-size:13px;
	background:rgba(102,204,255,0.2);
	color:rgba(0,51,102,1);
	height:auto;
	display:table;
	margin-bottom:1px;
	border-left:solid 2px #66CCFF;
}
#mitad{
	width:39.5%;
	padding:10px 5%;
	text-align:left;
	font-size:12px;
	background:rgba(255,255,255,0.6);
	color:#333;
	height:auto;
	display:table;
	margin-bottom:1px;
	float:left;
	border-left:solid 2px #003399;
}
#mitad_2{
	width:39.5%;
	height:50px;
	padding:10px 5%;
	text-align:left;
	font-size:12px;
	background:rgba(255,204,51,0.2);
	color:#333;
	display:table;
	margin-bottom:1px;
	float:left;
	border-left:solid 2px #FF9933;
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
span{
	color:#003399;
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
			@$solicitud=$_GET['solicitud'];

			$sql = "select * from mot_solicitud where id_solicitud=$solicitud";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$folio=$row['id_solicitud'];
			@$fecha=$row['fecha'];
			@$nombre=$row['nombre'];
			@$correo=$row['correo'];
			@$telefono=$row['telefono'];
			@$nombre_equipo=$row['nombre_equipo'];
			@$top=$row['top'];
			@$bottom=$row['bottom'];
			@$sets=$row['sets'];
			@$accesorios=$row['accesorios'];
			@$archivo_adjunto=$row['archivo_adjunto'];
			if($archivo_adjunto==NULL){
				$archivo_adjunto='sin_imagen.png';
			}
			@$descripcion=$row['descripcion'];
			@$logotipo=$row['logotipo'];
			if($logotipo==NULL){
				$logotipo='sin_imagen.png';
			}
			@$slogan=$row['slogan'];
			@$comentarios=$row['comentarios'];

			// TOP
			$sql = "select top from mot_tops where id_top=$top";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$nombre_top=$row['top'];
			if($nombre_top==NULL){
				$nombre_top='---';
			}

			// BUTTOM
			$sql = "select bottom from mot_bottoms where id_bottom=$bottom";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$nombre_bottom=$row['bottom'];
			if($nombre_bottom==NULL){
				$nombre_bottom='---';
			}

			// SETS
			$sql = "select sets from mot_sets where id_set=$sets";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$nombre_sets=$row['sets'];
			if($nombre_sets==NULL){
				$nombre_sets='---';
			}

			// ACCESORIOS
			$sql = "select accesorio from mot_accesorios where id_accesorio=$accesorios";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$nombre_accesorios=$row['accesorio'];
			if($nombre_accesorios==NULL){
				$nombre_accesorios='---';
			}

			echo '<div id="completa">FOLIO '.$folio.'</div>';
			echo '<div id="mitad"><span>FECHA</span><br>'.$fecha.'</div>';
			echo '<div id="mitad"><span>NOMBRE</span><br>'.$nombre.'</div>';
			echo '<div id="mitad"><span>EMAIL</span><br><a href="mailto:'.$correo.'">'.$correo.'</a></div>';
			echo '<div id="mitad"><span>TELÉFONO</span><br>'.$telefono.'</div>';
			echo '<div id="completa_2">NOMBRE EQUIPO '.$nombre_equipo.'</div>';
			echo '<div id="mitad_2"><span>TOP</span><br>'.$nombre_top.'</div>';
			echo '<div id="mitad_2"><span>BUTTOMS</span><br>'.$nombre_bottom.'</div>';
			echo '<div id="mitad_2"><span>SETS</span><br>'.$nombre_sets.'</div>';
			echo '<div id="mitad_2"><span>ACCESORIOS</span><br>'.$nombre_accesorios.'</div>';
			echo '<div id="mitad_2"><span>ARCHIVO ADJUNTO</span><br><img src="../../imagenes/'.$archivo_adjunto.'" height="100px"></div>';
			echo '<div id="mitad_2"><span>LOGOTIPO</span><br><img src="../../imagenes/'.$logotipo.'" height="100px"></div>';
			echo '<div id="completa_3">DESCRIPCIÓN<br>'.$descripcion.'</div>';
			echo '<div id="completa_3">SLOGAN<br>'.$slogan.'</div>';
			echo '<div id="completa_3">COMENTARIOS<br>'.$comentarios.'</div>';



		?>
    </div>
</div>
</body>
</html>
