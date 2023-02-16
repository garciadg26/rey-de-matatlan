<?php
session_start();
if (@$_GET['s'] == "logout") {
    $_SESSION['loguedfront'] = false;
    $_SESSION['usuario'] = '';
    $_SESSION = array();
    session_destroy();
}
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ACCESO SISTEMA</title>
<style type="text/css">
body{
	width:100%;
	height:100%;
}
html{
	width:100%;
	height:100%;
}
#acceso{
	width:15%; height:100%; background:rgba(255,255,255,1); border-right:solid 2px #333333; display:table;
}

#logo{
	width:90%;
	padding:0px 5%;
	border-bottom:thin dotted #333;
}
#logo img{
	width:100%;
}

#forma{
	width:90%;
	height:auto;
	padding:40px 5%;
	text-align:left;
}

#mensaje{
	font-family:Arial, Helvetica, sans-serif;
	width:90%;
	height:auto;
	padding:40px 5%;
	font-size:13px;
	color:#036;
	text-align:center;
}

#instrucciones{
	width:500px;
	height:160px;
	float:left;
	padding-left:10px;
	color:#999;
	font-size:16px;
	text-align:left;
}

.clearer{
	display:block;
	clear:both;
	height:5px;
}
.txt{
	width:90%;
	font-size:14px;
	color:#F1F2F2;
	padding:10px;
	border:none;
	background:#333;
	border-radius:15px;
}
.enviar{
	width:auto;
	padding:10px 50px;
	background:#333;
	color:#FFF;
	text-align:center;
	font-size:15px;
	border:none;
	border-radius:20px;
	cursor:pointer;
	text-transform:uppercase;
}

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script LANGUAGE="JavaScript">
	function validar(){
		var p1 = document.getElementById("usuario").value;
		var p2 = document.getElementById("contrasena").value;

		if (p1.length == null || p1.length == 0) {
			alert("Ingresa el nombre de Usuario");
			usuario.focus();
			return false;
		}

		if (p2.length == null || p2.length == 0) {
			alert("La contraseña no puede quedar vacia");
			contrasena.focus();
			return false;
		}
	}
</script>
</head>

<body style="background-color:#CCC; margin:0; background-image:url(imagenes/Slider-homepage.jpg); background-position:fixed center; background-size:cover;">
    <!--ACCESO-->
    <div id="acceso">
    	<div id="logo" style="padding:40px 5%; text-align:center;"><img src="imagenes/Logotipo-mezcal.svg" style="width:70%" /></div>
        <div class="clearer"></div>
        <div id="forma">
        	<?php
            	@$bandera=$_POST['bandera'];
				if($bandera==1){
					include "../Public/includes/conectar.php";
					@$username=$_POST['usuario'];
					@$password=$_POST['contrasena'];
					echo '<div id="mensaje">Buscando información...</div>';

					/*VALIDANDO USUARIO*/
					$sql = "select COUNT(*) as existe from usuarios where usuario='$username' and contrasena='$password'";
					$result = mysqli_query($conexion, $sql);
					@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					@$existe=$row['existe'];
					if($existe==0){
						$_SESSION["logued"]=false;
						echo '<div style="padding:20px 0; color:#FFF; font-size:15px;">Alguno de los datos no es correcto.<br><br><a href="index.php" style="padding:10px; background:#FFF; text-decoration:none; color:#333;">Intentar nuevamente</a></div>';
					} else {
						$sql = "select id_cliente, nombre, usuario, contrasena from usuarios where usuario='$username'";
						$result = mysqli_query($conexion, $sql);
						@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
						$nombre=$row['nombre'];
						$id_usuario=$row['id_cliente'];
						$contrasena=$row['contrasena'];

						$_SESSION["logued"]=true;
						$_SESSION['usuario']=$username;
						echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"1; URL=menu.php\">";
					}
					/*FIN DEL BLOQUE*/

				} else {
			?>
        	<form method="post" action="index.php">
            	<input type="hidden" name="bandera" value="1" />
                <input type="text" name="usuario" id="usuario" placeholder="Usuario" class="txt" required="required" />
                <div class="clearer" style="height:5px;"></div>
                <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="txt" required="required">
                <div class="clearer" style="height:10px;"></div>
                <input type="submit" value="Entrar" class="enviar" />
            </form>
            <?php } ?>
        </div>
    </div>
    <!--FIN DEL BLOQUE-->
</body>
</html>
