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
			@$usuario=$_GET['usuario'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$nombre=$_POST['nombre'];
				@$correo=$_POST['correo'];
				@$telefono=$_POST['telefono'];
				@$nombre_usuario=$_POST['usuario'];
				@$contrasena=$_POST['contrasena'];
				@$activo=$_POST['activo'];
				@$tipo=$_POST['tipo'];
				
				mysqli_query($conexion, "update usuarios set nombre='$nombre', correo='$correo', telefono='$telefono', usuario='$nombre_usuario', contrasena='$contrasena', tipo='$tipo', fecha='$fecha', activo='$activo' where id_usuario=$usuario");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=usuarios" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select * from usuarios where id_usuario=$usuario";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$nombre=$row['nombre'];
				@$correo=$row['correo'];
				@$telefono=$row['telefono'];
				@$nombre_usuario=$row['usuario'];
				@$contrasena=$row['contrasena'];
				@$activo=$row['activo'];
				@$tipo=$row['tipo'];
		?>
    	<form method="post" action="modificar_usuario.php?usuario=<?php echo $usuario; ?>" enctype="multipart/form-data">
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
            <select name="tipo" id="tipo" class="combo">
            	<?php
                	if($tipo=='administrador'){
						echo '<option value="administrador" selected="selected">TIPO - ADMINISTRADOR</option>';
						echo '<option value="consulta">TIPO - CONSULTA</option>';
					} else {
						echo '<option value="administrador">TIPO - ADMINISTRADOR</option>';
						echo '<option value="consulta" selected="selected">TIPO - CONSULTA</option>';
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="nombre" id="nombre" placeholder="* Nombre del personal" value="<?php echo $nombre; ?>" class="texto" required="required" style="width:80%"/>
            <div class="clearer" style="height:5px"></div>
            <input type="email" name="correo" id="correo" placeholder="* E-mail" class="texto" value="<?php echo $correo; ?>" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="telefono" id="telefono" placeholder="* Teléfono" class="texto" value="<?php echo $telefono; ?>" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="usuario" id="usuario" placeholder="* Usuario (Max. 20 caracteres)" maxlength="20" value="<?php echo $nombre_usuario; ?>" class="texto" required="required" style="background:rgba(0,153,204,0.5);" />
            <div class="clearer" style="height:5px"></div>
            <input type="password" name="contrasena" id="contrasena" placeholder="* Contraseña (Max. 10 caracteres)" maxlength="10" value="<?php echo $contrasena; ?>" class="texto" required="required" style="background:rgba(255,102,0,0.8);" />
            <div class="clearer" style="height:1px"></div>
            <span>* No dejar espacios, no usar signos, acentos.</span>
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>