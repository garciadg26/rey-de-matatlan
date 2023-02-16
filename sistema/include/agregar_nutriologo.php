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
				@$nombre=$_POST['nombre'];
				@$paterno=$_POST['paterno'];
				@$materno=$_POST['materno'];
				@$telefono=$_POST['telefono'];
				@$celular=$_POST['celular'];
				@$correo=$_POST['correo'];
				@$cedula=$_POST['cedula'];
				@$especialidad=$_POST['especialidad'];
				@$contrasena=$_POST['contrasena'];
				@$comision=$_POST['comision'];
				/*$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
				}*/
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "insert into imn_nutriologos(nombre, a_paterno, a_materno, telefono, celular, correo, cedula, imagen, especialidad, contrasena, comision, fecha, activo) values('$nombre', '$paterno', '$materno', '$telefono', '$celular', '$correo', '$cedula', '---', $especialidad, '$contrasena', '$comision', '$fecha', 'si')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="../menu.php?opcion=nutriologos" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_nutriologo.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="nombre" id="nombre" placeholder="* Nombre(s)" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="paterno" id="paterno" placeholder="* Apellido Paterno" class="texto" required="required" />
            <input type="text" name="materno" id="materno" placeholder="Apellido Materno" class="texto" style="margin-left:10px" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="telefono" id="telefono" placeholder="* Teléfono" class="texto" required="required" />
            <input type="text" name="celular" id="celular" placeholder="Celular (opcional)" class="texto" style="margin-left:10px" />
            <div class="clearer" style="height:5px"></div>
            <input type="email" name="correo" id="correo" placeholder="* E-mail (usuario)" style="width:88%" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="cedula" id="cedula" placeholder="Cédula" class="texto" />
            <div class="clearer" style="height:10px"></div>
            <select name="especialidad" id="especialidad" required class="combo">
            	<option value="">Selecciona una especialidad</option>
                <?php
					$datosp=mysqli_query($conexion, "select id_especialidad, especialidad, fecha from imn_especialidades order by especialidad asc");
						if(mysqli_num_rows($datosp)>0){
							while ($datos2p=mysqli_fetch_array($datosp)){
								echo '<option value="'.$datos2p['id_especialidad'].'">'.$datos2p['especialidad'].'</option>';
						}
					}
                ?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="password" name="contrasena" id="contrasena" placeholder="* Contraseña" class="texto" required="required" style="background:rgba(255,102,0,0.8);" />
            <span>* No dejar espacios, no usar signos, acentos.</span>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="comision" id="comision" placeholder="* Comisión" class="texto" required="required" style="background:rgba(0,153,204,0.5);" />
            <span>* Solo ingresar el valor numérico. Ej. para ingresar comisión del 10%, solo ingresar 10</span>
            <div class="clearer" style="height:5px"></div>
            
            
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>