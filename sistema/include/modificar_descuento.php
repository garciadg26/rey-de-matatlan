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
	width:45%;
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
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$descuento=$_GET['descuento'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$nombre=$_POST['nombre'];
				@$descuento_nuevo=$_POST['descuento'];
				@$inicio=$_POST['inicio'];
				@$termino=$_POST['termino'];
				@$activo=$_POST['activo'];
				@$codigo=$_POST['codigo'];
				@$cantidad=$_POST['cantidad'];
				
				mysqli_query($conexion, "update imn_descuentos set titulo_descuento='$nombre', descuento='$descuento_nuevo', activo='$activo', fecha_inicio='$inicio', fecha_termino='$termino', codigo='$codigo', cantidad=$cantidad where id_descuento=$descuento");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=descuentos" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select * from imn_descuentos where id_descuento=$descuento";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$titulo=$row['titulo_descuento'];
				@$descuento_actual=$row['descuento'];
				@$descuento_actual=$row['descuento'];
				@$activo=$row['activo'];
				@$inicio=$row['fecha_inicio'];
				@$termino=$row['fecha_termino'];
				@$codigo=$row['codigo'];
				@$cantidad=$row['cantidad'];
		?>
    	<form method="post" action="modificar_descuento.php?descuento=<?php echo $descuento; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="activo" id="activo" class="combo">
            	<?php
                	if($activo=='si'){
						echo '<option value="si" selected="selected">ACTIVO - SI</option>';
						echo '<option value="no">ACTIVO - NO</option>';
					} else {
						echo '<option value="si">ACTIVO - SI</option>';
						echo '<option value="no" selected="selected">ACTIVO - NO</option>';
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="nombre" id="nombre" placeholder="* Título de la promoción" class="texto" value="<?php echo $titulo; ?>" required="required" style="width:80%"/>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="descuento" id="descuento" placeholder="* Descuento en %" class="texto" value="<?php echo $descuento_actual; ?>" required="required" />
            <div class="clearer" style="height:1px"></div>
            <span>* Para insertar un descuento del 10%, solo ingresar el 10.</span>
            <div class="clearer" style="height:5px"></div>
            <input type="number" name="cantidad" id="cantidad" placeholder="* Cantidad de descuentos" value="<?php echo $cantidad; ?>" class="texto" required="required" style="width:10%" />
            <span>* Cantidad de descuentos</span>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="codigo" id="codigo" placeholder="* Código del descuento" class="texto" value="<?php echo $codigo; ?>" required="required" style="background:rgba(0,51,204,0.9); color:#f1f2f2;" />
            <div class="clearer" style="height:5px"></div>
            <input type="date" name="inicio" id="inicio" placeholder="* Fecha inicio" class="texto" required="required" value="<?php echo $inicio; ?>"/>
            <input type="date" name="termino" id="termino" placeholder="* Fecha termino" class="texto" style="margin-left:10px" required="required" value="<?php echo $termino; ?>"/>
            
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>