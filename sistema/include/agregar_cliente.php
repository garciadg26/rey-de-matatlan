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
			@$categoria=$_GET['categoria'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$nombre=$_POST['nombre'];
				@$paterno=$_POST['paterno'];
				@$materno=$_POST['materno'];
				@$fecha_nacimiento=$_POST['fn_ano'].'-'.$_POST['fn_mes'].'-'.$_POST['fn_dia'];
				@$sexo=$_POST['sexo'];
				@$telefono=$_POST['telefono'];
				@$correo=$_POST['correo'];
				@$nutriologo=$_POST['nutriologo'];
				@$contrasena=$_POST['contrasena'];
				@$edad=$_POST['edad'];
				@$peso=$_POST['peso'];
				@$estatura=$_POST['estatura'];
				@$condicion=$_POST['condicion'];
				@$directo=$_POST['directo'];

				mysqli_query($conexion, "insert into imn_clientes(nombre, a_paterno, a_materno, fecha_nacimiento, sexo, telefono, correo, medico_tratante, contrasena, edad, peso, estatura, condicion_medica, fecha, activo, cliente_directo) values('$nombre', '$paterno', '$materno', '$fecha_nacimiento', '$sexo', '$telefono', '$correo', $nutriologo, '$contrasena', '$edad', '$peso', '$estatura', $condicion, '$fecha', 'si', '$directo')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="../menu.php?opcion=clientes" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_cliente.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="nombre" id="nombre" placeholder="* Nombre(s)" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="paterno" id="paterno" placeholder="* Apellido Paterno" class="texto" required="required" />
            <input type="text" name="materno" id="materno" placeholder="Apellido Materno" class="texto" style="margin-left:10px" />

            <div class="clearer" style="height:5px"></div>
            <span>FECHA DE NACIMIENTO</span>
            <div class="clearer" style="height:5px"></div>
            <select name="fn_dia" class="combo" required style="width:20%; background:rgba(255,102,0,0.6); color:#333;">
            	<option value="">Día</option>
                <?php
                	for($i=1; $i<32; $i++){
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
				?>
            </select>
            <select name="fn_mes" class="combo" required style="width:40%; background:rgba(255,102,0,0.7); color:#333;">
            	<option value="">Mes</option>
                <?php
                	$datosp=mysqli_query($conexion, "select id_mes, mes from imn_meses order by id_mes asc");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							echo '<option value="'.$datos2p['id_mes'].'">'.$datos2p['mes'].'</option>';
					}}
				?>
            </select>
            <select name="fn_ano" class="combo" required style="width:20%; background:rgba(255,102,0,0.6); color:#333;">
            	<option value="">Año</option>
                <?php
                	for($i=1930; $i<2021; $i++){
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <!--<input type="text" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="* Fecha nacimiento" class="texto" required="required" />-->
            <!--<div class="clearer" style="height:5px"></div>-->
            <select name="sexo" class="combo" required style="float:left;">
            	<option value="">Sexo</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
            <input type="text" name="telefono" id="telefono" placeholder="* Teléfono" class="texto" required="required" style="margin-left:15px;" />
            <div class="clearer" style="height:5px"></div>
            <input type="email" name="correo" id="correo" placeholder="* E-mail (usuario)" style="width:88%" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>

            <input type="password" name="contrasena" id="contrasena" placeholder="* Contraseña" class="texto" required="required" style="background:rgba(255,102,0,0.8);" />
            <span>* No dejar espacios, no usar signos, acentos.</span>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="edad" id="edad" placeholder="Edad" class="texto" />
            <input type="text" name="peso" id="peso" placeholder="Peso" class="texto" style="margin-left:10px" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="estatura" id="estatura" placeholder="Estatura" class="texto" />
            <div class="clearer" style="height:10px"></div>

            <select name="directo" class="combo" required style="background:rgba(255,102,0,0.8); color:#333;" >
            	<option value="">¿Es cliente directo?</option>
                <option value="no">NO</option>
                <option value="si">SI</option>
            </select>

            <div class="clearer" style="height:5px"></div>
            <select name="nutriologo" class="combo">
            	<option value="0">Médico tratante</option>
                <?php
                $datosp=mysqli_query($conexion, "select id_nutriologo, nombre, a_paterno from imn_nutriologos order by nombre asc");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							echo '<option value="'.$datos2p['id_nutriologo'].'">'.$datos2p['nombre'].' '.$datos2p['a_paterno'].'</option>';
					}}
				?>

            </select>
            <select name="condicion" class="combo" style="margin-left:10px;">
            	<option value="0">Condición médica</option>
                <?php
                $datosp=mysqli_query($conexion, "select id_condicion, condicion from imn_condicion");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							echo '<option value="'.$datos2p['id_condicion'].'">'.$datos2p['condicion'].'</option>';
					}}
				?>

            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
