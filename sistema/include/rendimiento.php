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
	padding:15px 5px;
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
#listado{
	width:100%;
	height:auto;
	display:table;
	padding:10px 0;
	background:rgba(255,255,255,0.6);
	color:#333;
	font-size:12px;
	border-bottom:solid 1px rgba(51,51,51,0.2);
}
#listado_1{
	width:36%;
	padding:0 2%;
	float:left;
	text-align:left;
}
#listado_2{
	width:36%;
	padding:0 2%;
	float:left;
	text-align:left;
}
#listado_3{
	width:20%;
	float:left;
	text-align:center;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$servicio=$_GET['servicio'];
			
			// LISTADO
			echo '<div id="mensaje">Rendimiento del servicio</div>';
			echo '<div id="listado_titulos">';
				echo '<div id="listado_1" style="text-align:center;">NUTRIÓLOGO</div>';
				echo '<div id="listado_2" style="text-align:center;">CLIENTE</div>';
				echo '<div id="listado_3" style="text-align:center;">FECHA</div>';
			echo '</div>';
			echo '<div id="listado">';
				echo '<div id="listado_1">NOMBRE DEL NUTRIÓLOGO</div>';
				echo '<div id="listado_2">NOMBRE DEL CLIENTE</div>';
				echo '<div id="listado_3">5-OCT-2020</div>';
			echo '</div>';
			echo '<div id="listado">';
				echo '<div id="listado_1">NOMBRE DEL NUTRIÓLOGO</div>';
				echo '<div id="listado_2">NOMBRE DEL CLIENTE</div>';
				echo '<div id="listado_3">5-OCT-2020</div>';
			echo '</div>';
			echo '<div id="listado">';
				echo '<div id="listado_1">NOMBRE DEL NUTRIÓLOGO</div>';
				echo '<div id="listado_2">NOMBRE DEL CLIENTE</div>';
				echo '<div id="listado_3">5-OCT-2020</div>';
			echo '</div>';
			echo '<div id="listado">';
				echo '<div id="listado_1">NOMBRE DEL NUTRIÓLOGO</div>';
				echo '<div id="listado_2">NOMBRE DEL CLIENTE</div>';
				echo '<div id="listado_3">5-OCT-2020</div>';
			echo '</div>';
		?>
    </div>
</div>
</body>
</html>