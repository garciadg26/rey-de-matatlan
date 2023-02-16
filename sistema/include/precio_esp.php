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
.quitar_esp{
	text-decoration:none;
	font-size:13px;
	background:#C00;
	color:#FFF;
	padding:16px 15px;
	border-radius:5px;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$pedido=$_GET['pedido'];
			@$tipo=$_GET['tipo'];
			@$borrar_esp=$_GET['borrar_esp'];
			$fecha=date("Y-m-d");
			
			// ESPECIAL
			@$bandera_especial=$_POST['bandera'];
			if($bandera_especial==1){
				@$especial=$_POST['especial'];
				@$motivo=$_POST['motivo'];
				mysqli_query($conexion,"update imn_pedidos set especial='si', precio_especial='$especial', motivo='$motivo' where id_pedido=$pedido");
			}
			
			// BORRAR ESPECIAL
			if($borrar_esp=='si'){
				mysqli_query($conexion,"update imn_pedidos set especial='', precio_especial='', motivo='' where id_pedido=$pedido");
			}
			
			// ACCIONES
			@$accion=$_GET['accion'];
			switch($accion){
				case 'anadir':
					mysqli_query($conexion, "update imn_pedidos set metodo_pago='$tipo', pagado='si' where id_pedido=$pedido");
				break;
			}
			
			// INFORMACIÓN DE PAGO
			$sql = "select cliente, total, metodo_pago, fecha, nutriologo, especial, precio_especial, motivo from imn_pedidos where id_pedido=$pedido";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$cliente=$row['cliente'];
			@$total=$row['total'];
			@$metodo_pago=$row['metodo_pago'];
			@$fecha=$row['fecha'];
			@$nutriologo=$row['nutriologo'];
			@$especial=$row['especial'];
			@$precio_especial=$row['precio_especial'];
			@$motivo=$row['motivo'];
			
			// INFORMACIÓN CLIENTE
			$sql2 = "select * from imn_clientes where id_cliente=$cliente";
			$result2 = mysqli_query($conexion, $sql2);
			@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
			@$nombre=$row2['nombre'];
			@$a_paterno=$row2['a_paterno'];
			@$a_materno=$row2['a_materno'];
			@$sexo=$row2['sexo'];
			@$telefono=$row2['telefono'];
			@$edad=$row2['edad'];
			@$peso=$row2['peso'];
			
			// INFORMACIÓN NUTRIÓLOGO
			$sql3 = "select * from imn_nutriologos where id_nutriologo=$nutriologo";
			$result3 = mysqli_query($conexion, $sql3);
			@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
			@$nombre_dr=$row3['nombre'];
			@$paterno_dr=$row3['a_paterno'];
			@$materno_dr=$row3['a_materno'];
			@$telefono_dr=$row3['telefono'];
			@$correo_dr=$row3['correo'];
			@$especialidad=$row3['especialidad'];
			
			// ESPECIALIDAD
			$sql4 = "select especialidad from imn_especialidades where id_especialidad=$especialidad";
			$result4 = mysqli_query($conexion, $sql4);
			@$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
			@$especialidad=$row4['especialidad'];
			
			// LISTADO
			echo '<div id="mensaje">DETALLE DEL PEDIDO, FOLIO  "'.$pedido.'"</div>';
			echo '<div id="mitad_1">';
				echo '<div id="titulo_1">DATOS DEL CLIENTE</div>';
				echo '<div id="informacion">'.$nombre.' '.$a_paterno.' '.$a_materno.'<br>EDAD: '.$edad.'<br>PESO: '.$peso.'<br>TELÉFONO: '.$telefono.'</div>';
			echo '</div>';
			echo '<div id="mitad_2">';
				echo '<div id="titulo_2">ESP. DE LA SALUD</div>';
				echo '<div id="informacion">'.$nombre_dr.' '.$paterno_dr.' '.$materno_dr.'<br><span style="padding:0;">'.$especialidad.'</span><br>TELÉFONO: '.$telefono_dr.'<br>E-MAIL: '.$correo_dr.'</div>';
			echo '</div>';
			echo '<div class="clearer"></div>';
			echo '<div id="titulo_3">SERVICIOS CONTRATADOS</div>';
			$datosp=mysqli_query($conexion, "select tipo, producto, costo, codigo from imn_detalle_pedidos where id_venta=$pedido");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						// INFORMACIÓN PRODUCTO
						switch($datos2p['tipo']){
							case 'estudios': 
								$sql4 = "select titulo_estudio from imn_estudios where id_estudio=".$datos2p['producto']."";
								$result4 = mysqli_query($conexion, $sql4);
								@$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
								@$nombre_producto=$row4['titulo_estudio'];
							break;
							case 'servicios': 
								$sql4 = "select nombre_servicio from imn_servicios where id_servicio=".$datos2p['producto']."";
								$result4 = mysqli_query($conexion, $sql4);
								@$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
								@$nombre_producto=$row4['nombre_servicio'];
							break;
						}
						echo '<div id="listado">';
							echo '<div id="columna_1">'.$nombre_producto.' - '.$datos2p['codigo'].'</div>';
							echo '<div id="columna_2">$'.number_format($datos2p['costo'],2).' MN</div>';
						echo '</div>';
						echo '<div class="clearer" style="height:1px;"></div>';
				}
			}
			// TOTAL
			echo '<div id="total">TOTAL $'.number_format($total,2).' MN</div>';
			echo '<div class="clearer" style="height:1px;"></div>';
			if($especial=='si'){
				echo '<div id="total" style="background:rgba(250,0,0,0.2);">PRECIO ESPECIAL $'.number_format($precio_especial,2).' MN</div>';
				echo '<div class="clearer" style="height:1px;"></div>';
				echo '<div id="total" style="background:rgba(250,0,0,0.2);">MOTIVO: '.$motivo.'</div>';
				echo '<div class="clearer" style="height:1px;"></div>';
			}
			echo '<div id="total">FORMA DE PAGO '.$metodo_pago.'</div>';
			
			// PRECIO ESPECIAL
			if($bandera_especial==1){
			} else {
				echo '<div class="clearer" style="height:20px;"></div>';
				echo '<div id="mensaje" style="color:#C00;">PRECIO ESPECIAL</div>';
				echo '<form method="post" action="precio_esp.php?pedido='.$pedido.'">';
					echo '<input type="hidden" name="bandera" value="1">';
					if($especial=='si'){
						echo '<input type="text" name="especial" id="especial" placeholder="* Precio especial" value="'.$precio_especial.'" class="texto" required="required" style="width:20%"><span style="color:#C00;">* Para poner un precio de $5,500.00 solo poner 5500</span>';
					} else {
						echo '<input type="text" name="especial" id="especial" placeholder="* Precio especial" class="texto" required="required" style="width:20%"><span style="color:#C00;">* Para poner un precio de $5,500.00 solo poner 5500</span>';
					}
					echo '<div class="clearer" style="height:5px;"></div>';
					if($especial=='si'){
						echo '<input type="text" name="motivo" id="motivo" value="'.$motivo.'" placeholder="* Motivo (Breve descripción)" class="texto" style="width:90%" required="required">';
					} else {
						echo '<input type="text" name="motivo" id="motivo" placeholder="* Motivo (Breve descripción)" class="texto" style="width:90%" required="required">';
					}
					echo '<div class="clearer" style="height:5px;"></div>';
					if($especial=='si'){
						echo '<input type="submit" value="MODIFICAR" class="enviar" style="width:30%"> <a href="precio_esp.php?pedido='.$pedido.'&borrar_esp=si" class="quitar_esp">QUITAR PRECIO ESPECIAL</a>';
					} else {
						echo '<input type="submit" value="CONTINUAR" class="enviar" style="width:30%">';
					}
				echo '</form>';
			}
			echo '<div class="clearer" style="height:20px;"></div>';
			
			// BTN DE ABAJO
			if($bandera_especial==1){
				echo '<div id="btn_cerrar"><a href="../menu.php?opcion=pedidos" target="_parent" style="background:#C00;">CERRAR VENTANA</a></div>';
			} else {
				echo '<div id="btn_cerrar"><a href="../menu.php?opcion=pedidos" target="_parent" style="background:#C00;">CANCELAR Y CERRAR VENTANA</a></div>';
			}
		?>
        
    </div>
</div>
</body>
</html>