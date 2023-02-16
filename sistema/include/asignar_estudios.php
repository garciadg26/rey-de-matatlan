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
	width:50%;
	padding:15px 2%;
	border:none;
	border-radius:5px;
	background:rgba(0,51,204,0.9);
	color:#FFF;
	font-size:12px;
	float:left;
}
.combo_2{
	width:90%;
	padding:15px 2%;
	border:none;
	border-radius:5px;
	background:#FF9326;
	color:#333;
	font-size:12px;
	float:left;
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
#titulo{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:20px;
	color:#039;
}
#bloque_ciudad{
	width:50%;
	float:left;
	padding:0 10px;
	display:none;
}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	function calcular_monto(cantidad){
		$.ajax({
			type: 'POST',
			url: 'calcular_monto.php',
			data: { cantidad2: cantidad },
			// Mostramos un mensaje con la respuesta de PHP
			success: function(data) {
			$('#bloque_monto').css('display','block');
			$('#bloque_monto').html(data);
			$('#bloque_monto').focus();
			}
		});
	}
</script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			error_reporting(E_ALL);
			ini_set('display_errors', '1');
			include '../../include/conectar.php';
			@$nutriologo=$_GET['nutriologo'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$estudio=$_POST['estudio'];
				@$cantidad=$_POST['cantidad'];
				
				// PRECIO
				$sql = "select costo from imn_estudios where id_estudio=$estudio";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$costo=$row['costo'];
				@$subtotal=$cantidad*$costo;
				
				mysqli_query($conexion, "insert into imn_asignar_estudios(id_nutriologo, fecha, cantidad, precio, subtotal) values($nutriologo, '$fecha', $cantidad, '$costo', '$subtotal')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="../menu.php?opcion=nutriologos" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
				
				$sql5 = "select MAX(id_asignar) as folio from imn_asignar_estudios where id_nutriologo=$nutriologo";
				$result5 = mysqli_query($conexion, $sql5);
				@$row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
				@$folio=$row5['folio'];
				
				///// INSERTAR INFORMACIÓN EN TABLA ASIGNAR CÓDIGOS /////
				$sql = "select MAX(id_detalle) as maximo from imn_detalle_pedidos where (codigo!=NULL or codigo!='')";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$maximo=$row['maximo'];
				
				$sql2 = "select codigo from imn_detalle_pedidos where id_detalle=$maximo";
				$result2 = mysqli_query($conexion, $sql2);
				@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
				@$codigo=$row2['codigo'];
				
				$sql3 = "select id_codigo from imn_codigos where codigo='$codigo'";
				$result3 = mysqli_query($conexion, $sql3);
				@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
				@$id_codigo=$row3['id_codigo'];
				$ultimo_codigo=$id_codigo+1;
				$ultimo_codigo_2=$id_codigo+$cantidad;
				
				for($i=$ultimo_codigo; $i<=$ultimo_codigo_2; $i++){
					$sql4 = "select codigo from imn_codigos where id_codigo=$i";
					$result4 = mysqli_query($conexion, $sql4);
					@$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
					@$codigo_nuevo=$row4['codigo'];
					
					// INSERTAR CÓDIGOS
					mysqli_query($conexion, "insert into imn_asignar_codigos(folio_asignado, codigo, fecha, estatus) values($folio, '$codigo_nuevo', '$fecha', 'SIN ASIGNAR')");
					
					// ACTUALZIAR BANDERA EN TABLA CÓDIGOS
					mysqli_query($conexion, "update imn_codigos set asignado='si' where codigo='$codigo_nuevo' ");
				}
	
			} else {
		?>
        <div id="titulo">Asignar Estudios METACHECK</div>
    	<form method="post" action="asignar_estudios.php?nutriologo=<?php echo $nutriologo; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="estudio" id="estudio" class="combo" required>
            	<?php
                	$datosp=mysqli_query($conexion, "select id_estudio, titulo_estudio, costo from imn_estudios where id_estudio=3");
						if(mysqli_num_rows($datosp)>0){
							while ($datos2p=mysqli_fetch_array($datosp)){
								echo '<option value="'.$datos2p['id_estudio'].'" selected="selected">'.$datos2p['titulo_estudio'].' $'.number_format($datos2p['costo'],2).' MN</option>';
						}
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <select name="cantidad" id="cantidad" class="combo" onchange="calcular_monto(this.value)" style="background:rgba(255,102,0,0.6); color:#333;" required>
            	<option value="">CANTIDAD DE ESTUDIOS</option>
                <?php
                	for($i=1; $i<=30; $i++){
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <div id="bloque_monto"></div>
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Asignar Estudios" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>