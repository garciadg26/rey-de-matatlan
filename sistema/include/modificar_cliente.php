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
			@$cliente=$_GET['cliente'];
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

				mysqli_query($conexion, "update imn_clientes set nombre='$nombre', a_paterno='$paterno', a_materno='$materno', fecha_nacimiento='$fecha_nacimiento', sexo='$sexo', telefono='$telefono', correo='$correo', medico_tratante=$nutriologo, contrasena='$contrasena', edad=$edad, peso='$peso', estatura='$estatura', condicion_medica=$condicion, fecha='$fecha', cliente_directo='$directo' where id_cliente=$cliente");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=clientes" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select nombre, a_paterno, a_materno, fecha_nacimiento, sexo, telefono, correo, medico_tratante, contrasena, edad, peso, estatura, condicion_medica, cliente_directo from imn_clientes where id_cliente=$cliente";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$nombre=$row['nombre'];
				@$a_paterno=$row['a_paterno'];
				@$a_materno=$row['a_materno'];
				@$fecha_nacimiento=$row['fecha_nacimiento'];
				@$sexo=$row['sexo'];
				@$telefono=$row['telefono'];
				@$correo=$row['correo'];
				@$medico_tratante=$row['medico_tratante'];
				@$contrasena=$row['contrasena'];
				@$edad=$row['edad'];
				@$peso=$row['peso'];
				@$estatura=$row['estatura'];
				@$condicion_medica=$row['condicion_medica'];
				@$cliente_directo=$row['cliente_directo'];

				@$fecha_nacimiento_2=explode('-',$fecha_nacimiento);
				@$ano=$fecha_nacimiento_2[0];
				@$mes=$fecha_nacimiento_2[1];
				@$dia=$fecha_nacimiento_2[2];
		?>
    	<form method="post" action="modificar_cliente.php?cliente=<?php echo $cliente; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="nombre" id="nombre" placeholder="* Nombre(s)" class="texto" required="required" value="<?php echo $nombre; ?>" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="paterno" id="paterno" placeholder="* Apellido Paterno" class="texto" required="required" value="<?php echo $a_paterno; ?>"/>
            <input type="text" name="materno" id="materno" placeholder="Apellido Materno" class="texto" style="margin-left:10px" value="<?php echo $a_materno; ?>"/>

            <div class="clearer" style="height:5px"></div>
            <span>FECHA DE NACIMIENTO</span>
            <div class="clearer" style="height:5px"></div>
            <select name="fn_dia" class="combo" required style="width:20%; background:rgba(255,102,0,0.6); color:#333;">
            	<option value="">Día</option>
                <?php
                	for($i=1; $i<32; $i++){
						if($dia==$i){
							echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
						} else {
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
				?>
            </select>
            <select name="fn_mes" class="combo" required style="width:40%; background:rgba(255,102,0,0.7); color:#333;">
            	<option value="">Mes</option>
                <?php
                	$datosp=mysqli_query($conexion, "select id_mes, mes from imn_meses order by id_mes asc");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							if($mes==$datos2p['id_mes']){
								echo '<option value="'.$datos2p['id_mes'].'" selected="selected">'.$datos2p['mes'].'</option>';
							} else {
								echo '<option value="'.$datos2p['id_mes'].'">'.$datos2p['mes'].'</option>';
							}
					}}
				?>
            </select>
            <select name="fn_ano" class="combo" required style="width:20%; background:rgba(255,102,0,0.6); color:#333;">
            	<option value="">Año</option>
                <?php
                	for($i=1930; $i<2021; $i++){
						if($ano==$i){
							echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
						} else {
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <!--<input type="text" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="* Fecha nacimiento" class="texto" required="required" value="<?php echo $fecha_nacimiento; ?>" />-->
            <!--<div class="clearer" style="height:5px"></div>-->
            <select name="sexo" class="combo" required style="float:left;">
            	<?php
                	if($sexo=='Hombre'){
						echo '<option value="Hombre" selected="selected">Hombre</option>';
						echo '<option value="Mujer">Mujer</option>';
					} else {
						echo '<option value="Hombre">Hombre</option>';
						echo '<option value="Mujer" selected="selected">Mujer</option>';
					}
				?>

            </select>
            <input type="text" name="telefono" id="telefono" placeholder="* Teléfono" class="texto" required="required" value="<?php echo $telefono; ?>" style="margin-left:15px;"/>
            <div class="clearer" style="height:5px"></div>
            <input type="email" name="correo" id="correo" placeholder="* E-mail (usuario)" style="width:88%" class="texto" required="required" value="<?php echo $correo; ?>"/>
            <div class="clearer" style="height:5px"></div>

            <input type="password" name="contrasena" id="contrasena" placeholder="* Contraseña" class="texto" required="required" style="background:rgba(255,102,0,0.8);" value="<?php echo $contrasena; ?>"/>
            <span>* No dejar espacios, no usar signos, acentos.</span>
            <div class="clearer" style="height:5px"></div>
            <span>Edad: </span> <input type="text" name="edad" id="edad" placeholder="Edad" class="texto" value="<?php echo $edad; ?>" style="width:20%;"/>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peso: </span><input type="text" name="peso" id="peso" placeholder="Peso" class="texto" style="margin-left:10px; width:20%;" value="<?php echo $peso; ?>"/>
            <div class="clearer" style="height:5px"></div>
            <span>Altura: </span><input type="text" name="estatura" id="estatura" placeholder="Estatura" class="texto" value="<?php echo $estatura; ?>" style="width:20%;"/>
            <div class="clearer" style="height:10px"></div>
            <?php
				$imc=$peso/($estatura*$estatura);
			?>
            <span style="font-size:20px; border:solid 1px #0033CC; padding:5px 15px;">IMC: <?php echo number_format($imc,2); ?></span>
            <div class="clearer"></div>
            <span>¿ES CLIENTE DIRECTO?</span>
            <div class="clearer"></div>
            <select name="directo" class="combo" required style="background:rgba(255,102,0,0.8); color:#333;" >
            	<?php
                	if($cliente_directo=='no'){
						echo '<option value="no" selected="selected">NO</option>';
						echo '<option value="si">SI</option>';
					} else {
						echo '<option value="no">NO</option>';
						echo '<option value="si" selected="selected">SI</option>';
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>

            <select name="nutriologo" class="combo">
            	<option value="0">Médico tratante</option>
                <?php
                $datosp=mysqli_query($conexion, "select id_nutriologo, nombre, a_paterno from imn_nutriologos order by nombre asc");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							if($medico_tratante==$datos2p['id_nutriologo']){
								echo '<option value="'.$datos2p['id_nutriologo'].'" selected="selected">'.$datos2p['nombre'].' '.$datos2p['a_paterno'].'</option>';
							} else {
								echo '<option value="'.$datos2p['id_nutriologo'].'">'.$datos2p['nombre'].' '.$datos2p['a_paterno'].'</option>';
							}
					}}
				?>

            </select>
            <select name="condicion" class="combo" style="margin-left:10px;">
            	<option value="0">Condición médica</option>
                <?php
                $datosp=mysqli_query($conexion, "select id_condicion, condicion from imn_condicion");
					if(mysqli_num_rows($datosp)>0){
						while ($datos2p=mysqli_fetch_array($datosp)){
							if($condicion_medica==$datos2p['id_condicion']){
								echo '<option value="'.$datos2p['id_condicion'].'" selected="selected">'.$datos2p['condicion'].'</option>';
							} else {
								echo '<option value="'.$datos2p['id_condicion'].'">'.$datos2p['condicion'].'</option>';
							}
					}}
				?>

            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
