<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Nueve Arte Urbano</title>
<link rel="shortcut icon" href="images/favicon.png">
<style type="text/css">
body {
	width:100%;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family:Arial, Helvetica, sans-serif;
	height:auto;
	padding:20px 0;
	display:table;
}
.clearer{
    display:block;
    clear: both;
}
#titulo{
	width:100%;
	text-align:center;
	font-size:20px;
	color:#005A9A;
	line-height:30px;
	margin-bottom:20px;
}
</style>
</head>

<body>
<div style="width:50%; margin:0 auto; padding:10px;">
	<?php
		@$flag=$_GET['flag'];
		if($flag=='si'){
		@$bandera=$_POST['bandera'];
		include '../include/conectar.php';
		$usuario=$_SESSION['usuario'];
    	$id_usuario=mysql_result(mysql_query("select id_usuario from usuarios where usuario='$usuario' "),0);
		$usuario2=mysql_result(mysql_query("select usuario from usuarios where id_usuario='$id_usuario' "),0);
		if($bandera==1){
			@$contrasena=$_POST['contrasena'];
			mysql_query("update usuarios set contrasena='$contrasena' where id_usuario=$id_usuario");
			echo '<div id="titulo">Información actualizada</div>';
			echo '<div class="clearer" style="height:10px;"></div>';
			echo '<div style="width:100%; margin:0 auto; text-align:center;"><a href="javascript: parent.jQuery.fancybox.close()" style="text-decoration:none; color:#666; border:solid 2px #666666; padding:10px 50px;">Ok</a></div>';
		} else {
	?>
    <div id="titulo">Cambiar contraseña</div>
    <div class="clearer" style="height:5px;"></div>
	<form method="post" action="cambiar_pwd.php?flag=si">
    	<input type="hidden" name="bandera" value="1" />
    	<input type="text" name="usuario" id="usuario" readonly="readonly" value="<?php echo $usuario2; ?>" style="width:100%; padding:10px; border:none; background:rgba(0,88,156,0.2); font-size:15px; border-radius:10px;"/>
        <div class="clearer" style="height:1px;"></div>
        <input type="password" name="contrasena" id="contrasena" maxlength="10" placeholder="Contraseña nueva" style="width:100%; padding:10px; border:none; background:rgba(0,88,156,0.2); font-size:15px; border-radius:10px;"/>
        <div class="clearer" style="height:1px;"></div>
        <div style="font-size:12px; color:#666;">* Contraseña no mayor a 10 caracteres</div>
        <div class="clearer" style="height:10px;"></div>
        <div style="padding:10px 30px; float:left; text-align:center; border:solid 2px #005A9A; margin-right:5px;"><input type="submit" value="CAMBIAR CONTRASEÑA" style="text-decoration:none; color:#005A9A; display:block; border:none; cursor:pointer; font-size:13px; background:none;"/></div>
        <div style="padding:10px 30px; float:left; text-align:center; font-size:13px; border:solid 2px #666666; margin-right:5px;"><a href="javascript: parent.jQuery.fancybox.close()" style="text-decoration:none; color:#666; display:block;">CANCELAR</a></div>
    </form>
    <?php } } ?>
</div>

<!--<div style="width:29%; padding:30px 10%; float:left; text-align:center; font-size:13px; border:solid 2px #666666; margin-right:5px;"><a href="javascript: parent.jQuery.fancybox.close()" style="text-decoration:none; color:#666; display:block;">CANCELAR</a></div>
<div style="width:29%; padding:30px 10%; float:left; text-align:center; font-size:13px; border:solid 2px #621C5E;"><a href="index.php?s=logout" target="_parent" style="text-decoration:none; color:#621C5E; display:block;">CONFIRMO SALIR DEL SISTEMA</a></div>-->
</body>
</html>