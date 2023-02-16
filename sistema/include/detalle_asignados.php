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
	width:50%;
	padding:0;
	float:left;
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
	width:30%;
	padding:10px 0;
	text-align:center;
	float:left;
}
#columna_2{
	width:30%;
	padding:10px 0;
	text-align:center;
	float:left;
}
#columna_3{
	width:40%;
	padding:10px 0;
	text-align:center;
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
			include 'funciones.php';
			@$folio=$_GET['folio'];
			@$especialista=$_GET['especialista'];
			$fecha=date("Y-m-d");
			
			// ACCIONES
			@$accion=$_GET['accion'];
			switch($accion){
				case 'anadir':
					mysqli_query($conexion, "update imn_pedidos set metodo_pago='$tipo', pagado='si' where id_pedido=$pedido");
				break;
			}
			
			
			// LISTADO
			echo '<div id="titulo_3">CÓDIGOS ASIGNADOS</div>';
			$datosp=mysqli_query($conexion, "select codigo, fecha, estatus from imn_asignar_codigos where folio_asignado=$folio");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						echo '<div id="listado">';
							echo '<div id="columna_1">'.$datos2p['codigo'].'</div>';
							echo '<div id="columna_2">'.f_fecha($datos2p['fecha']).'</div>';
							echo '<div id="columna_3">'.$datos2p['estatus'].'</div>';
						echo '</div>';
						echo '<div class="clearer" style="height:1px;"></div>';
				}
			}
		?>
        <!--<div id="btn_cerrar"><a href="../menu.php?opcion=pedidos" target="_parent">CERRAR VENTANA</a></div>-->
    </div>
</div>
</body>
</html>