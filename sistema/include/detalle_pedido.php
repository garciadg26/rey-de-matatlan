<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EL REY DE MATATLÁN</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
}
#mensaje{
	width:90%;
	padding:20px 5%;
	text-align:center;
	font-size:17px;
	color:rgba(102,51,51,1);
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
	background:#333;
	color:#F1F2F2;
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
	background:#666;
	color:#F1F2F2;
}
#titulo_2{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:12px;
	background:#999;
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
	background:#333;
	color:#F1F2F2;
}
#listado{
	width:100%;
	height:auto;
	display:table;
	background:rgba(204,204,204,0.3);
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
	background:rgba(204,204,204,1);
	font-size:12px;
	text-align:right;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/Logotipo-mezcal.svg" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #273746;">
    	<?php
			include '../../Public/includes/conectar.php';
			@$pedido=$_GET['pedido'];
			@$tipo=$_GET['tipo'];
			$fecha=date("Y-m-d");

			// ACCIONES
			@$accion=$_GET['accion'];
			switch($accion){
				case 'anadir':
					mysqli_query($conexion, "update vin_pedidos set metodo_pago='$tipo', pagado='si' where id_pedido=$pedido");
				break;
			}

			// INFORMACIÓN DE PAGO
			$sql = "select * from vin_pedidos where id_pedido=$pedido";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$cliente=$row['nombre_cliente'];
			@$apellidos=$row['apellidos'];
			@$telefono=$row['telefono'];
			@$correo=$row['correo'];
			@$cp=$row['cp'];
			@$direccion=$row['direccion'];
			@$colonia=$row['colonia'];
			@$localidad=$row['localidad'];
			@$municipio=$row['municipio'];
			@$estado=$row['estado'];
			@$total=$row['total'];
			@$forma_pago=$row['forma_pago'];
			@$factura=$row['factura'];
			@$rfc=$row['rfc'];
			@$razon_social=$row['razon_social'];
			@$direccion_fiscal=$row['direccion_fiscal'];
			@$cancelar=$row['cancelar'];
			if($cancelar=='si'){
				$titulo_cancelar='PEDIDO CANCELADO';
			}

			// LISTADO
			echo '<div id="mensaje">DETALLE DEL PEDIDO, FOLIO  "'.$pedido.'"';
				if($cancelar=='si'){
					echo '<br>';
					echo $titulo_cancelar;
				}
			echo '</div>';
			echo '<div id="mitad_1">';
				echo '<div id="titulo_1">DATOS DEL CLIENTE</div>';
				echo '<div id="informacion">'.$cliente.' '.$apellidos.'<br>TELÉFONO: '.$telefono.'<br><a href="mailto:'.$correo.'">'.$correo.'</a><br>';
				if($factura=='si'){
					echo '<br><br><strong>CON FACTURA</strong><br>RFC: '.$rfc.'<br>RAZÓN SOCIAL: '.$razon_social.'<br>DIRECCIÓN FISCAL: '.$direccion_fiscal.'<br>'.$ciudad_fiscal.', '.$estado_fiscal;
				}
				echo '</div>';
			echo '</div>';
			echo '<div id="mitad_2">';
				echo '<div id="titulo_2">DATOS DE ENVÍO</div>';
				echo '<div id="informacion">'.$direccion.'<br>COL. '.$colonia.'<br>CP '.$cp.'<br>'.$localidad.', '.$municipio.', '.$estado.'</div>';
			echo '</div>';
			echo '<div class="clearer"></div>';
			echo '<div id="titulo_3">PRODUCTOS COMPRADOS</div>';
			$datosp=mysqli_query($conexion, "select * from vin_detalle_pedidos where id_pedido=$pedido");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						// INFORMACIÓN PRODUCTO
						$sql4 = "select * from vin_vinos where id_vino=".$datos2p['id_vino']."";
						$result4 = mysqli_query($conexion, $sql4);
						@$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
						@$nombre_vino=$row4['nombre_vino'];

						$sql5 = "select envio from vin_envios where id_envio=1 ";
						$result5 = mysqli_query($conexion, $sql5);
						@$row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
						@$envio=$row5['envio'];

						// TAMAÑO
						$sql6 = "select * from vin_tamanos where id_tamano=".$datos2p['id_tamano']." ";
						$result6 = mysqli_query($conexion, $sql6);
						@$row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
						@$tamano=$row6['tamano'];

						echo '<div id="listado">';
							echo '<div id="columna_1">('.$datos2p['cantidad'].') '.$nombre_vino.' - '.$tamano.'</div>';
							echo '<div id="columna_2">$'.number_format($datos2p['subtotal'],2).' MN';
							echo '</div>';
						echo '</div>';
						echo '<div class="clearer" style="height:1px;"></div>';
				}
			}
			// TOTAL
			echo '<div id="total">ENVÍO $'.number_format($envio,2).' MN</div>';
			echo '<div class="clearer" style="height:1px;"></div>';
			echo '<div id="total">TOTAL $'.number_format($total,2).' MN</div>';
			echo '<div class="clearer" style="height:1px;"></div>';
			echo '<div id="total">FORMA DE PAGO '.$forma_pago.'</div>';
		?>
        <div id="btn_cerrar"><a href="../menu.php?opcion=pedidos" target="_parent">CERRAR VENTANA</a></div>
    </div>
</div>
</body>
</html>
