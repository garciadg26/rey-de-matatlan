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
	width:46%;
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
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
	function cargar_codigo(id){
		if(id==3){
			$.ajax({
				type: 'POST',
				url: 'codigos.php',
				data: { id2: id },
				// Mostramos un mensaje con la respuesta de PHP
				success: function(data) {
				$('#bloque_codigo').css('display','block');
				$('#bloque_codigo').html(data);
				$('#bloque_codigo').focus();
				}
			});
		} else {
			$('#bloque_codigo').css('display','none');
		}
	}
</script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$categoria=$_GET['categoria'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$cliente=$_POST['cliente'];
				@$nutriologo=$_POST['nutriologo'];
				if($nutriologo==NULL){
					$nutriologo=0;
				}
				@$estudio=$_POST['estudio'];
				@$forma_pago=$_POST['forma_pago'];
				@$codigo=$_POST['codigo'];
				if($codigo==NULL){
					$codigo='';
				}
				
				$sql = "select costo from imn_estudios where id_estudio=$estudio";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$precio=$row['costo'];
				
				// INSERTAR COMPRA
				mysqli_query($conexion, "insert into imn_pedidos(cliente, total,metodo_pago, pagado, fecha, nutriologo, cancelar) values($cliente, '$precio', '$forma_pago', 'si', '$fecha', $nutriologo, 'no')");
				// INSERTAR DETALLE
				$sql2 = "select MAX(id_pedido) as venta from imn_pedidos where cliente=$cliente and fecha='$fecha'";
				$result2 = mysqli_query($conexion, $sql2);
				@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
				@$venta=$row2['venta'];
				mysqli_query($conexion, "insert into imn_detalle_pedidos(id_venta, tipo, producto, costo, fecha, codigo) values($venta, 'estudios', $estudio, '$precio', '$fecha', '$codigo')");
				
				echo '<div id="mensaje">Compra registrada correctamente<br><br><a href="../menu.php?opcion=pedidos" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_pedido.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="cliente" id="cliente" required class="combo">
            	<option value="">Selecciona un Cliente</option>
                <?php
					$datosp=mysqli_query($conexion, "select id_cliente, nombre, a_paterno, a_materno from imn_clientes order by nombre asc");
						if(mysqli_num_rows($datosp)>0){
							while ($datos2p=mysqli_fetch_array($datosp)){
								echo '<option value="'.$datos2p['id_cliente'].'">'.$datos2p['nombre'].' '.$datos2p['a_paterno'].' '.$datos2p['a_materno'].'</option>';
						}
					}
                ?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <span>¿FUÉ REFERENCIADO POR ALGÚN ESP. DE LA SALUD?</span>
            <div class="clearer" style="height:5px"></div>
            <select name="nutriologo" id="nutriologo" class="combo" style="background:rgba(0,153,204,0.5); color:#333;">
            	<option value="">Especialista de la Salud</option>
                <?php
					$datosp=mysqli_query($conexion, "select id_nutriologo, nombre, a_paterno, a_materno from imn_nutriologos order by nombre asc");
						if(mysqli_num_rows($datosp)>0){
							while ($datos2p=mysqli_fetch_array($datosp)){
								echo '<option value="'.$datos2p['id_nutriologo'].'">'.$datos2p['nombre'].' '.$datos2p['a_paterno'].'</option>';
						}
					}
                ?>
            </select>
            <select name="estudio" id="estudio" required class="combo" style="background:rgba(0,153,204,0.5); color:#333;" onchange="cargar_codigo(this.value);">
            	<option value="">Selecciona el Servicio-Estudio</option>
                <?php
					$datosp=mysqli_query($conexion, "select id_estudio, titulo_estudio, costo from imn_estudios order by costo asc");
						if(mysqli_num_rows($datosp)>0){
							while ($datos2p=mysqli_fetch_array($datosp)){
								echo '<option value="'.$datos2p['id_estudio'].'">'.$datos2p['titulo_estudio'].' $'.number_format($datos2p['costo'],2).' MN</option>';
						}
					}
                ?>
            </select>
            <div class="clearer" style="height:5px"></div>
            
            <div id="bloque_codigo"></div>
            
            <div class="clearer" style="height:5px"></div>
            <select name="forma_pago" id="forma_pago" required class="combo" style="background:rgba(255,102,0,0.8); color:#333;">
            	<option value="">Selecciona la forma de pago</option>
                <?php
					$datosp=mysqli_query($conexion, "select id_tipo, tipo from imn_tipo_pago order by tipo asc");
						if(mysqli_num_rows($datosp)>0){
							while ($datos2p=mysqli_fetch_array($datosp)){
								echo '<option value="'.$datos2p['tipo'].'">'.$datos2p['tipo'].'</option>';
						}
					}
                ?>
            </select>
            <div class="clearer" style="height:10px"></div>
            <input type="submit" value="Registrar Compra" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>