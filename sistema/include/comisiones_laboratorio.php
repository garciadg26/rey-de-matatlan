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
#titulo{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:20px;
	color:#039;
}
#btn_listado{
	width:100%;
	padding:20px 0;
	text-align:center;
}
#btn_listado a{
	font-size:12px;
	text-decoration:none;
	padding:10px 20px;
	background:rgba(255,102,0,1);
	color:#FFF;
	border-radius:15px;
	text-transform:uppercase;
}
</style>
</head>
<body>
<?php @$laboratorio=$_GET['laboratorio']; ?>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;">
    	<img src="../imagenes/logo_forma.png" width="100%" />
    	<div id="btn_listado"><a href="listado_comisiones.php?laboratorio=<?php echo $laboratorio; ?>">Ver listado</a></div>
    </div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$laboratorio=$_GET['laboratorio'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$servicio=$_POST['servicio'];
				@$comision=$_POST['comision'];
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "insert into imn_comisiones(laboratorio, servicio, comision, fecha) values($laboratorio, $servicio, '$comision', '$fecha')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="comisiones_laboratorio.php?laboratorio='.$laboratorio.'"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select nombre, calle, numero, colonia, cp, ciudad, estado from imn_laboratorios where id_laboratorio=$laboratorio";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$nombre=$row['nombre'];
				
		?>
        <div id="titulo">Comisiones del Laboratorio<br><?php echo $nombre; ?></div>
        <div class="clearer" style="height:10px"></div>
    	<form method="post" action="comisiones_laboratorio.php?laboratorio=<?php echo $laboratorio; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="servicio" id="servicio" class="combo" required>
            	<?php
					echo '<option value="">Selecciona el servicio</option>';
                	$datosp=mysqli_query($conexion, "select id_servicio, nombre_servicio from imn_servicios order by nombre_servicio asc");
						if(mysqli_num_rows($datosp)>0){
							while ($datos2p=mysqli_fetch_array($datosp)){
								echo '<option value="'.$datos2p['id_servicio'].'">'.$datos2p['nombre_servicio'].'</option>';
						}
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="comision" id="comision" placeholder="* Comisión" class="texto" required="required"/>
            <div class="clearer" style="height:5px"></div>
            <span>* Para ingresar una comisión del 10%, solo ingresar el 10</span>
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <div class="clearer" style="height:10px"></div>
        
        <?php } ?>
    </div>
</div>
</body>
</html>