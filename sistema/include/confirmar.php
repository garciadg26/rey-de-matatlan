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
	padding:20px 5%;
	text-align:center;
	font-size:17px;
	color:rgba(0,51,153,1);
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
	float:left;
}
#listado_titulos{
	width:100%;
	height:auto;
	display:table;
	padding:10px 0;
	background:rgba(0,51,153,1);
	color:#FFF;
	font-size:12px;
}
#cuadro{
	width:24.8%;
	height:auto;
	display:table;
	background:rgba(255,255,255,0.6);
	font-size:12px;
	margin:0 1px 1px 0;
	text-align:center;
	float:left;
}
#cuadro a{
	width:100%;
	text-decoration:none;
	display:block;
	padding:30px 0;
	color:#333;
}
#btn_cerrar{
	width:100%;
	padding:30px 0;
	text-align:center;
	height:auto;
	display:table;
}
#btn_cerrar a{
	text-decoration:none;
	font-size:12px;
	padding:10px 20px;
	background:#039;
	color:#FFF;
	border-radius:15px;
}
#mitad_1{
	width:100%;
	padding:0;
	background:rgba(255,255,255,0.5);
	height:140px;
	display:table;
}
#mitad_2{
	width:50%;
	padding:0;
	float:left;
	background:rgba(255,255,255,0.7);
	height:140px;
	display:table;
}
#titulo_1{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:12px;
	background:#039;
	color:#F1F2F2;
}
#titulo_2{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:12px;
	background:#F60;
	color:#F1F2F2;
}
#informacion{
	width:80%;
	padding:5px 10%;
	text-align:left;
	font-size:12px;
	color:#333;
	line-height:20px;
}
#titulo_3{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:12px;
	background:rgba(0,204,255,0.5);
	color:#333;
}
#listado{
	width:100%;
	height:auto;
	display:table;
	background:rgba(0,204,255,0.1);
	font-size:12px;
}
#columna_1{
	width:60%;
	padding:10px 5%;
	text-align:left;
	float:left;
}
#columna_2{
	width:26%;
	padding:10px 2%;
	text-align:right;
	float:left;
}
#total{
	width:90%;
	padding:10px 5%;
	height:auto;
	display:table;
	background:rgba(0,204,255,0.3);
	font-size:12px;
	text-align:right;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$asociado=$_GET['asociado'];
			$fecha=date("Y-m-d");
			
			// INFORMACIÓN DE PAGO
			$sql = "select * from imn_aspirantes where id_aspirante=$asociado";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$nombre=$row['nombre'];
			@$paterno=$row['a_paterno'];
			@$materno=$row['a_materno'];
			@$titulo=$row['titulo'];
			@$especialidad=$row['especialidad'];
			@$tiempo_experiencia=$row['tiempo_experiencia'];
			@$perfil_pacientes=$row['perfil_pacientes'];
			@$direccion_consultorio=$row['direccion_consultorio'];
			@$sitio_web=$row['sitio_web'];
			@$redes_sociales=$row['redes_sociales'];
			@$fecha=$row['fecha'];
			@$telefono=$row['telefono'];
			@$correo=$row['correo'];
			
			mysqli_query($conexion,"insert into imn_nutriologos(nombre, a_paterno, a_materno, telefono, correo, fecha, activo) values('$nombre', '$paterno', '$materno', '$telefono', '$correo', '$fecha', 'si')");
			mysqli_query($conexion,"update imn_aspirantes set pasado='si' where id_aspirante=$asociado");
			
			// LISTADO
			echo '<div id="mensaje">INFORMACIÓN CONFIRMADA</div>';
			echo '<div id="mitad_1">';
				echo '<div id="titulo_1">DATOS DEL ASOCIADO SOLICITANTE</div>';
				echo '<div id="informacion">'.$nombre.' '.$paterno.' '.$materno.'<br><span>TÍTULO:</span> '.$titulo.'<br><span>ESPECIALIDAD: </span> '.$especialidad.'<br><span>EXPERIENCIA: </span>'.$tiempo_experiencia.'<br><span>PERFIL DE PACIENTES: </span>'.$perfil_pacientes.'<br><span>DIRECCIÓN CONSULTORIO: </span>'.$direccion_consultorio.'<br><span>TELÉFONO: </span> '.$telefono.'<br><span>E-MAIL:  </span> <a href="mailto:'.$correo.'">'.$correo.'</a><br><span>SITIO WEB: </span>'.$sitio_web.'<br><span>REDES SOCIALES: </span>'.$redes_sociales.'<br><span>FECHA: </span>'.$fecha.'</div>';
			echo '</div>';
			echo '<div class="clearer"></div>';
			
			
		?>
        <div id="btn_cerrar">
        	<a href="../menu.php?opcion=asociados" target="_parent">CONFIRMAR Y CERRAR VENTANA</a>&nbsp;&nbsp;&nbsp;
        </div>
    </div>
</div>
</body>
</html>