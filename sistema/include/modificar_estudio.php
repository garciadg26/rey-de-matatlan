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
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$estudio=$_GET['estudio'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$titulo=$_POST['titulo'];
				@$informacion=$_POST['informacion'];
				@$activo=$_POST['activo'];
				@$costo=$_POST['costo'];
				@$costo_2=$_POST['costo_2'];
				@$costo_3=$_POST['costo_3'];
				@$costo_4=$_POST['costo_4'];
				@$precio_fijado=$_POST['precio_fijado'];
				@$orden=$_POST['orden'];
				
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update imn_estudios set imagen='$archivo' where id_estudio=$estudio");
				}
				
				mysqli_query($conexion, "update imn_estudios set titulo_estudio='$titulo', informacion='$informacion', fecha='$fecha', activo='$activo', costo='$costo', costo_2='$costo_2', costo_3='$costo_3', costo_4='$costo_4', precio_activo=$precio_fijado, orden=$orden where id_estudio=$estudio");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=estudios" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select * from imn_estudios where id_estudio=$estudio";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$titulo=$row['titulo_estudio'];
				@$informacion=$row['informacion'];
				@$activo=$row['activo'];
				@$imagen=$row['imagen'];
				@$costo=$row['costo'];
				@$costo_2=$row['costo_2'];
				@$costo_3=$row['costo_3'];
				@$costo_4=$row['costo_4'];
				@$precio_activo=$row['precio_activo'];
				@$orden=$row['orden'];
		?>
    	<form method="post" action="modificar_estudio.php?estudio=<?php echo $estudio;?>" enctype="multipart/form-data">
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
            <input type="text" name="orden" id="orden" placeholder="* Orden" class="texto" required="required" value="<?php echo $orden; ?>" style="width:15%; background:rgba(0,51,204,0.9); color:#FFF;" />
            <span>* Orden</span>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="titulo" id="titulo" placeholder="* Nombre del Estudio" class="texto" required="required" value="<?php echo $titulo; ?>" />
            <div class="clearer" style="height:10px"></div>
            
            
           <div style="width:100%; float:left;">
				<span>PRECIO 1: </span>
				<input type="text" name="costo" id="costo" placeholder="* Costo del Estudio" class="texto" required="required" style="width:25%" value="<?php echo $costo; ?>"/>
				<span>PRECIO 2: </span>
				<input type="text" name="costo_2" id="costo_2" placeholder="* Costo del Estudio" class="texto" required="required" style="width:25%" value="<?php echo $costo_2; ?>"/>
			</div>
			<div class="clearer" style="height:5px"></div>
			<div style="width:100%; float:left;">
				<span>PRECIO 3: </span>
				<input type="text" name="costo_3" id="costo_3" placeholder="* Costo del Estudio" class="texto" required="required" style="width:25%" value="<?php echo $costo_3; ?>"/>
				<span style="color:#C00;">PRECIO 4: </span>
			
            	<input type="text" name="costo_4" id="costo_4" placeholder="* Costo del Estudio" class="texto" required="required" checked="checked" style="width:25%" value="<?php echo $costo_4; ?>"/>
			</div>
			<div class="clearer" style="height:5px"></div>
            <span>* Para ingresar un costo de $1,500.00, solo ingresar 1500</span>
            <div class="clearer"></div>
            
            
            
            <div style="width:100%; text-align:center; font-size:12px; color:#C00; padding-top:10px;">SELECCIONA EL PRECIO A MOSTRAR</div>
            <div class="clearer" style="height:5px;"></div>
            <?php
            	switch($precio_activo){
					case 1:
						echo '<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="1" checked required="required" /></div><span style="float:left; padding-right:20px;">PRECIO 1</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="2" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 2</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="3" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 3</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="4" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 4</span></div>';
					break;
					case 2:
						echo '<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="1" required="required" /></div><span style="float:left; padding-right:20px;">PRECIO 1</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="2" checked required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 2</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="3" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 3</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="4" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 4</span></div>';
					break;
					case 3:
						echo '<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="1" required="required" /></div><span style="float:left; padding-right:20px;">PRECIO 1</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="2" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 2</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="3" checked required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 3</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="4" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 4</span></div>';
					break;
					case 4:
						echo '<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="1" required="required" /></div><span style="float:left; padding-right:20px;">PRECIO 1</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="2" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 2</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="3" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 3</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="4" checked required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 4</span></div>';
					break;
					default:
						echo '<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="1" required="required" /></div><span style="float:left; padding-right:20px;">PRECIO 1</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="2" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 2</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="3" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 3</span></div>
						<div style="width:24%; float:left; background:rgba(0,102,153,0.2); margin-right:1px;"><div style="float:left; padding-top:10px;"><input type="radio" name="precio_fijado" id="precio_fijado" value="4" required="required"/></div><span style="float:left; padding-right:20px;">PRECIO 4</span></div>';
					break;
				}
			?>
            
            <div class="clearer" style="height:10px"></div>
            <textarea name="informacion" id="informacion" class="texto2" required="required" placeholder="* Descripción del estudio"><?php echo $informacion; ?></textarea>
            <div class="clearer" style="height:5px"></div>
            <?php
            	if($imagen!=NULL){
					echo '<img src="../../images/'.$imagen.'" height="150px">';
					echo '<div class="clearer" style="height:10px"></div>';
				}
			?>
            <input type="file" name="imagen" id="imagen" class="texto" />
            <div class="clearer" style="height:5px"></div>
            <span>* Nombre de la imagen sin acentos, espacio ó símbolos. Tamaño recomendado de la imagen de 900 x 600 píxeles.</span>
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>