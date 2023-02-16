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
#listado{
	width:100%;
	height:auto;
	display:table;
	background:rgba(204,204,204,0.1);
	margin-bottom:1px;
	font-size:12px;
	color:#333;
}
#columna{
	width:40%;
	float:left;
	padding:7px 0;
}
#columna_imagen{
	width:10%;
	float:left;
	padding:0;
	text-align:center;
}
#columna_imagen img{
	height:30px;
}
#cabecera{
	width:100%;
	padding:0 0 20px 0;
	text-align:center;
}
#cabecera img{
	height:50px;
}
#izq{
	width:50%;
	height:150px;
	float:left;
	padding:30px 0;
	background:rgba(0,153,204,0.1);
	font-size:25px;
	text-align:center;
	color:rgba(204,51,102,0.9);
}
#der{
	width:40%;
	height:150px;
	float:left;
	padding:30px 5%;
	background:rgba(0,153,204,0.2);
	font-size:13px;
	text-align:left;
	color:#333;
}
#subtotal{
	width:100%;
	height:auto;
	display:table;
	font-size:12px;
	text-align:right;
	color:rgba(204,51,102,0.9);
}
#linea{
	width:90%;
	padding:10px 5%;
	background:rgba(0,153,204,0.1);
	color:#333;
}
#total{
	width:90%;
	padding:10px 5%;
	background:rgba(0,153,204,0.1);
	color:#333;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div id="cabecera"><img src="../../images/food-keepers--logo.svg" /></div>
		<?php
			
			include '../../include/conectar.php';
			include 'funciones.php';
        	@$bandera=$_POST['bandera'];
			@$venta=$_GET['venta'];
			//$envio=50;
			
			$sql2 = "select correo, fecha, estatus, total, nombre, apellidos, direccion, colonia, ciudad, estado, cp, celular, pagada, factura, razon_social, rfc, direccion_fiscal, tipo_pago, envio from keep_ventas where id_venta=$venta";
			$result2 = mysqli_query($conexion, $sql2);
			@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
			@$correo=$row2['correo'];
			@$fecha=$row2['fecha'];
			@$estatus=$row2['estatus'];
			@$total=$row2['total'];
			@$nombre=$row2['nombre'];
			@$apellidos=$row2['apellidos'];
			@$direccion=$row2['direccion'];
			@$colonia=$row2['colonia'];
			@$ciudad=$row2['ciudad'];
			@$estado=$row2['estado'];
			@$cp=$row2['cp'];
			@$celular=$row2['celular'];
			@$pagada=$row2['pagada'];
			if($pagada=='si'){
				$titulo_pagada='(PAGADA)';
			} else {
				$titulo_pagada='(POR PAGAR)';
			}
			@$factura=$row2['factura'];
			@$razon_social=$row2['razon_social'];
			@$rfc=$row2['rfc'];
			@$direccion_fiscal=$row2['direccion_fiscal'];
			@$tipo_pago=$row2['tipo_pago'];
			@$envio=$row2['envio'];
			if($factura=='si'){
				$datos_facturacion=$rfc.'<br>'.$razon_social.'<br>'.$direccion_fiscal;
			} else {
				$datos_facturacion='NA';
			}
			
			switch($tipo_pago){
				case 'f_paypal': 
					$imagen_pagos='paypal.svg';
					$texto_banco='';
				break;
				case 'f_oxxo': 
					$imagen_pagos='oxxo.svg';
					$texto_banco='No. Tarjeta:<br>0000 0000 0000 0000';
				break;
				case 'f_banco':
					$imagen_pagos='bancos.svg';
					$texto_banco='Sucursal: 025<br>No. Cuenta: 1126097<br>CLABE: 002680002511260975';
				break;
			}
			
			echo '<div id="izq">FOLIO '.$venta.'<br>'.$titulo_pagada.'<br><br><img src="http://ferroplasticas.com/nueva/images/'.$imagen_pagos.'" height="30px"></div>';
			echo '<div id="der">FECHA DE COMPRA: '.f_fecha($fecha).'<br><br>'.$nombre.' '.$apellidos.'<br>'.$direccion.', Col. '.$colonia.'<br>CP.P '.$cp.', '.$ciudad.', '.$estado.'<br>T. '.$celular.'<br><br>DATOS DE FACTURACIÓN<br>'.$datos_facturacion.'</div>';
			echo '<div class="clearer" style="height:1px;"></div>';
			$datos=mysqli_query($conexion, "select id_producto, precio, cantidad, subtotal from keep_detalle_ventas where id_folio=$venta");
				if(mysqli_num_rows($datos)>0){
					while ($datos2=mysqli_fetch_array($datos)){
						$sql = "select nombre, codigo from keep_productos where id_producto=".$datos2['id_producto']."";
						$result = mysqli_query($conexion, $sql);
						@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
						@$nombre=$row['nombre'];
						@$codigo=$row['codigo'];
						echo '<div id="listado">';
							echo '<div id="columna_imagen"><img src="../../images/'.$codigo.'.png"></div>';
							echo '<div id="columna">'.utf8_encode($nombre).'</div>';
							echo '<div id="columna" style="width:20%;">'.$codigo.'</div>';
							echo '<div id="columna" style="width:10%;">'.$datos2['cantidad'].'</div>';
							echo '<div id="columna" style="width:10%;">$'.$datos2['precio'].' MN</div>';
							echo '<div id="columna" style="width:10%;">$'.$datos2['subtotal'].' MN</div>';
						echo '</div>';
				}}
			echo '<div class="clearer" style="height:1px;"></div>';
			$subtotal=$total-$envio;
			
			echo '<div id="subtotal">';
				echo '<div id="linea">SUBTOTAL $'.number_format($subtotal,2).'MN</div>';
				echo '<div class="clearer" style="height:1px;"></div>';
				echo '<div id="linea">ENVIO $'.number_format($envio,2).'MN</div>';
				echo '<div class="clearer" style="height:1px;"></div>';
				echo '<div id="total">TOTAL $'.number_format($total,2).'MN</div>';
			echo '</div>';
							
		?>
</div>
</body>
</html>