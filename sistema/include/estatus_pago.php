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
			$fecha=date("Y-m-d");
			
			// ACCIONES
			@$accion=$_GET['accion'];
			switch($accion){
				case 'anadir':
					mysqli_query($conexion, "update imn_pedidos set metodo_pago='$tipo', pagado='si' where id_pedido=$pedido");
				break;
			}
			
			// MÉTODO DE PAGO ACTUAL
			$sql = "select metodo_pago from imn_pedidos where id_pedido=$pedido";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$metodo_pago=$row['metodo_pago'];
			
			// LISTADO
			echo '<div id="mensaje">FORMA DE PAGO, FOLIO  "'.$pedido.'"</div>';
			$datosp=mysqli_query($conexion, "select id_tipo, tipo from imn_tipo_pago order by tipo asc");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						if($metodo_pago==$datos2p['tipo']){
							echo '<div id="cuadro" style="background:rgba(0,178,89,0.9);"><a href="estatus_pago.php?pedido='.$pedido.'&accion=anadir" style="color:#FFF;">'.$datos2p['tipo'].'<br>SELECCIONADO</a></div>';
						} else {
							echo '<div id="cuadro" style=""><a href="estatus_pago.php?pedido='.$pedido.'&tipo='.$datos2p['tipo'].'&accion=anadir">'.$datos2p['tipo'].'<br>SELECCIONAR</a></div>';
						}
				}
			}
		?>
        <div id="btn_cerrar"><a href="../menu.php?opcion=pedidos" target="_parent">CERRAR VENTANA</a></div>
    </div>
</div>
</body>
</html>