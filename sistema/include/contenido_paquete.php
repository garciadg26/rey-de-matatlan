<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NATIONAL WINE</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
	height:370px;
	display:table;
}

#mensaje{
	width:90%;
	padding:30px 5%;
	text-align:center;
	font-size:17px;
	color:#333;
	min-height:300px;
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
	height:100px;
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
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:rgba(102,51,51,1);
	color:#F1F2F2;
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
	color:rgba(102,51,51,1);
}
#centrado{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:13px;
	color:rgba(102,51,51,1);
}
#listado_vinos{
	width:100%;
	height:auto;
	display:table;
	font-size:12px;
	background:rgba(102,51,51,0.1);
}
#listado_vinos_1{
	width:40%;
	padding:10px 5%;
	float:left;
	text-align:left;
}
#listado_vinos_2{
	width:20%;
	padding:10px 0;
	float:left;
	text-align:center;
}
#listado_vinos_3{
	width:30%;
	padding:0;
	float:left;
	text-align:center;
}
#listado_vinos_3 a{
	text-decoration:none;
	background:rgba(204,0,0,0.6);
	width:100%;
	color:#F1F2F2;
	display:block;
	padding:10px 0;
}
</style>
<script type="text/javascript" src="../js/functios.js"></script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left; position:fixed;"><img src="../imagenes/national-wines-imports-logo.svg" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; left:34%; position:absolute; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #273746;">
    	<?php
			include '../../include/conectar.php';
        	@$paquete=$_GET['paquete'];
			@$accion=$_GET['accion'];
			if($accion=='borrar'){
				@$vino=$_GET['vino'];
				mysqli_query($conexion,"delete from vin_detalle_paquetes where id_paquete=$paquete and id_vino=$vino");
			}
			@$bandera=$_POST['bandera'];
			if($bandera==1){
				@$vino=$_POST['vino'];
				@$cantidad=$_POST['cantidad'];
				@$precio=$_POST['precio'];
				
				mysqli_query($conexion, "insert into vin_detalle_paquetes(id_paquete, id_vino, cantidad) values($paquete, $vino, $cantidad)");
				echo '<div id="mensaje"><a href="../menu.php?opcion=paquetes" target="_parent"><img src="../imagenes/icon_ok.png"></a><br><br>Información registrada correctamente<br>clic en la imagen para cerrar ventana...</div>';
			} else {
		?>
    	<form method="post" action="contenido_paquete.php?paquete=<?php echo $paquete; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <?php
				echo '<select name="vino" id="vino" required class="combo">';
				echo '<option value="">Selecciona el vino</option>';
            	$datos=mysqli_query($conexion, "select * from vin_vinos order by id_vino asc");
					if(mysqli_num_rows($datos)>0){
						while ($datos2=mysqli_fetch_array($datos)){
							echo '<option value="'.$datos2['id_vino'].'">'.$datos2['nombre_vino'].' - '.$datos2['tamano'].'</option>';
						}
					}
				echo '</select>';
			?>
            <div class="clearer" style="height:5px"></div>
            <input type="number" type="text" name="cantidad" id="cantidad" placeholder="* Cantidad" class="texto" style="width:30%;" required="required" />
            <div class="clearer" style="height:10px"></div>
            <input type="submit" value="Agregar" class="enviar" />
        </form>
        <?php 
			echo '<div class="clearer" style="height:10px"></div>';
			echo '<div id="centrado">CONTENIDO DEL PAQUETE</div>';
			$datos=mysqli_query($conexion, "select id_vino, cantidad from vin_detalle_paquetes where id_paquete=$paquete");
				if(mysqli_num_rows($datos)>0){
					while ($datos2=mysqli_fetch_array($datos)){
						$sql3 = "select nombre_vino, tamano from vin_vinos where id_vino=".$datos2['id_vino']."";
						$result3 = mysqli_query($conexion, $sql3);
						@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
						@$nombre_vino=$row3['nombre_vino'];
						@$tamano=$row3['tamano'];
							
						echo '<div id="listado_vinos">';
							echo '<div id="listado_vinos_1">'.$nombre_vino.' - '.$tamano.'</div>';
							echo '<div id="listado_vinos_2">'.$datos2['cantidad'].'</div>';
							echo '<div id="listado_vinos_3"><a href="contenido_paquete.php?paquete='.$paquete.'&vino='.$datos2['id_vino'].'&accion=borrar">BORRAR</a></div>';
						echo '</div>';
						echo '<div class="clearer" style="height:1px"></div>';
					}
				}
			} 
			echo '<div class="clearer" style="height:20px"></div>';
			echo '<div id="centrado"><a href="../menu.php?opcion=paquetes" target="_parent" style="padding:10px 20px; border-radius:15px; background:#C00; color:#F1F2F2; text-decoration:none; font-size:12px;">CERRAR</a></div>';
		?>
    </div>
</div>
</body>
</html>
