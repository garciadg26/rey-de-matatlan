<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EL REY DE MAZATLÁN</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
	height:600px;
}

#mensaje{
	width:90%;
	padding:30px 5%;
	text-align:center;
	font-size:17px;
	color:#333;
	min-height:400px;
}

.texto{
	width:90%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:rgba(255,255,255,0.3);
	color:#333;
	font-size:12px;
}
.texto2{
	width:90%;
	height:100px;
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
	color:rgba(102,51,51,1);
}
#cuadros{
	width: 33%;
	margin:0 1px 1px 0;
	float: left;
}
#cuadros a{
	display: block;
	width: 100%;
	padding: 40px 0;
	text-align: center;
	text-decoration: none;
	font-size: 15px;
	color: #FFF;
}
#cerrar{
	width: 100%;
	padding: 20px 0;
	text-align: center;
	font-size: 13px;
}
#cerrar a{
	padding: 10px 20px;
	text-decoration: none;
	background:#C00;
	color:#F1F2F2;
	border-radius: 20px;
}
#titulo{
	width: 100%;
	padding: 0 0 20px 0;
	font-size:15px;
	color: #333;
	text-align: center;
}
.btn_precio{
	padding: 5px 10px;
	background:rgba(254,254,254,0.8);
	color:#333;
	font-size: 12px;
	border-radius: 15px;
}
#listado{
	width: 21%;
	padding:5px 2%;
	text-align: left;
	font-size: 12px;
	float: left;
}
</style>
<script type="text/javascript" src="../js/functios.js"></script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:100%; height:auto; padding:10px 0; text-align:center;"><img src="../imagenes/Logotipo-mezcal.svg" /></div>
    <div style="width:100%; padding:30px 0; border-top:solid 2px #273746; display:table;">
    	<?php
			include '../../Public/includes/conectar.php';
      	@$nombre=$_POST['nombre'];
				@$vino=$_GET['vino'];
				@$tamano=$_GET['tamano'];
				@$accion=$_GET['accion'];
				@$tipo=$_GET['tipo'];
				$fecha=date("Y-m-d");

				// QUERYS
				if($accion=='si'){
					mysqli_query($conexion, "insert into vin_detalle_tamano(id_vino, id_tamano, fecha) values($vino, $tamano, '$fecha')");
				} elseif($accion=='no'){
					mysqli_query($conexion, "delete from vin_detalle_tamano where id_vino=$vino and id_tamano=$tamano");
				}

				// TIPO
				$sql = "select * from vin_tipo where id_tipo=$tipo ";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$titulo_tipo=$row['tipo'];

				echo '<div id="titulo">TIPO '.$titulo_tipo.'</div>';
				$datos=mysqli_query($conexion, "select * from vin_detalle_tamano where id_vino=$vino ");
					if(mysqli_num_rows($datos)>0){
						while ($datos2=mysqli_fetch_array($datos)){

							// PRECIO
							/*$sql2 = "select * from vin_detalle_tamano where id_vino=$vino ";
							$result2 = mysqli_query($conexion, $sql2);
							@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
							@$tamano=$row2['id_tamano'];
							@$precio=$row2['precio'];*/

							echo '<div id="listado">'.$datos2['id_tamano'].'</div>';
							echo '<div id="listado">$'.number_format($datos2['precio'],2).' MN</div>';
							echo '<div id="listado_modificar"><a href="">MODIFICAR</a></div>';
							echo '<div id="listado_eliminar"><a href="">ELIMINAR</a></div>';

							/*if($existe==0){
									echo '<div id="cuadros" style="background:rgba(169,223,191,0.8);"><a href="tamanos_vinos.php?vino='.$vino.'&tamano='.$datos2['id_tamano'].'&tipo='.$tipo.'&accion=si" style="color:#333;">'.$datos2['tamano'].'<br>&nbsp;</a></div>';
							} else {
									echo '<div id="cuadros" style="background:rgba(192,57,43,0.5);"><a href="tamanos_vinos.php?vino='.$vino.'&tamano='.$datos2['id_tamano'].'&tipo='.$tipo.'&accion=no" style="color:#FFF;">'.$datos2['tamano'];
										if($precio>0.00){
											echo '<br>';
											echo '$ MN';
										} else {
											echo '<br>';
											echo '<a href="poner_precio.php">Poner precio</a>';
										}
									echo '</a></div>';
							}*/
						}
				}
		?>
    </div>
</div>
<div id="cerrar"><a href="../menu.php?opcion=vinos" target="_parent">CERRAR</a></div>
</body>
</html>
