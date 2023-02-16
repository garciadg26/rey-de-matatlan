<?php session_start();
if(!$_SESSION["logued"])
		header('Location:index.php');
		error_reporting(0);

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SISTEMA ADMINISTRADOR</title>
<link href="css/sistema.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.png">



<!--FANCYBOX-->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox({
			//afterClose: function () { parent.location.reload(true); }
		});

	});
	/*$(".ejemplo_4").fancybox({
	"autoScale" : false,
	"transitionIn" : "none",
	"transitionOut" : "none",
	"width" : 500,
	"height" : 400,
	"type" : "iframe",
	afterClose: function () { parent.location.reload(true); }

	});*/
	/*function cantidad_menos(venta,producto){
		alert(venta);
	}*/
	function cantidad_mas(venta,producto){
		$.ajax({
			type: 'POST',
			url: 'sumar.php',
			data: { id: venta , prod: producto },
			// Mostramos un mensaje con la respuesta de PHP
			success: function(data) {
			$('#bloque_listado_1').css('display','none');
			$('#bloque_listado_2').css('display','block');
			$('#bloque_listado_2').html(data);
			$('#bloque_listado_2').focus();
			}
		});
	}


</script>
<!--FIN DEL BLOQUE-->

</head>
<body>
<?php
	include "include/funciones.php";
  include "../Public/includes/conectar.php";
	$usuario=$_SESSION['usuario'];
	//@$tipo_usuario=mysql_result(mysql_query("select tipo from usuarios where usuario='$usuario'"),0);
	/*$id_usuario=mysql_result(mysql_query("select id_usuario from usuarios where usuario='$usuario' "),0);
	$tipo_usuario=mysql_result(mysql_query("select tipo from usuarios where id_usuario='$id_usuario' "),0);*/
	$sql = "select id_usuario, tipo from usuarios where usuario='$usuario'";
	$result = mysqli_query($conexion, $sql);
	@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	@$id_usuario=$row['id_usuario'];
	@$tipo_usuario=$row['tipo'];
?>
<div id="wrapper">
	<div id="izquierda" style="position:fixed;">
		<div id="logo" style="width:80%; padding:50px 10% 50px 10%;"><img src="imagenes/Logotipo-mezcal.svg" style="width:100%;" /></div>
        <div class="clearer"></div>
        <div id="menu" style="height:100%;">
        	<ul style="height:75%; overflow-y:scroll;">
            	<?php
					@$opcion=$_GET['opcion'];
							if($opcion==NULL){
								echo '<li><a href="menu.php" class="seleccionado" style="color:#FFF;">Inicio</a></li>';
								} else {
									echo '<li><a href="menu.php">Inicio</a></li>';
							}
							if($opcion=="slides"){
							 	echo '<li><a href="menu.php?opcion=slides" class="seleccionado" style="color:#FFF;">Slides</a></li>';
							 	} else {
							 		echo '<li><a href="menu.php?opcion=slides">Slides</a></li>';
							}
							if($opcion=="vinos"){
								echo '<li><a href="menu.php?opcion=vinos" class="seleccionado" style="color:#FFF;">Vinos</a></li>';
								} else {
									echo '<li><a href="menu.php?opcion=vinos">Vinos</a></li>';
							}
							if($opcion=="categorias"){
								echo '<li><a href="menu.php?opcion=categorias" class="seleccionado" style="color:#FFF;">Categorías</a></li>';
								} else {
									echo '<li><a href="menu.php?opcion=categorias">Categorías</a></li>';
							}
							if($opcion=="tamanos"){
								echo '<li><a href="menu.php?opcion=tamanos" class="seleccionado" style="color:#FFF;">Tamaños</a></li>';
								} else {
									echo '<li><a href="menu.php?opcion=tamanos">Tamaños</a></li>';
							}
							if($opcion=="pedidos"){
								echo '<li><a href="menu.php?opcion=pedidos" class="seleccionado" style="color:#FFF;">Pedidos</a></li>';
								} else {
									echo '<li><a href="menu.php?opcion=pedidos">Pedidos</a></li>';
							}

				?>
            </ul>
        </div>
        <div class="clearer"></div>
        <div id="datos">
        	<!--<div id="cambiar"><a href="cambiar_pwd.php?flag=si" class="fancybox fancybox.iframe"><img src="imagenes/i_engrane.png" /></a></div>-->
            <div id="usuario"><?php echo $usuario; ?></div>
            <div id="salir"><a href="salir.php" class="fancybox fancybox.iframe"><img src="imagenes/cerrar.png"/></a></div>
        </div>

	</div>
    <div id="derecha" style="left:15%; position:absolute;">
    	<?php
        	@$opcion=$_GET['opcion'];
					switch($opcion){
				case "inicio": include "include/home.php"; break;
				case "categorias": include "include/categorias.php"; break;
				case "productos": include "include/productos.php"; break;
				case "laboratorios": include "include/laboratorios.php"; break;
				case "productos": include "include/productos.php"; break;
				case "tamanos": include "include/tamanos.php"; break;
				case "especialidades": include "include/especialidades.php"; break;
				case "catalogo": include "include/catalogo.php"; break;
				case "documentos": include "include/documentos.php"; break;
				case "pedidos": include "include/pedidos.php"; break;
				case "cobrar": include "include/cobrar.php"; break;
				case "asociados": include "include/asociados.php"; break;
				case "paquetes": include "include/paquetes.php"; break;
				case "vinos": include "include/vinos.php"; break;




				case "slides": include "include/slides.php"; break;
				case "slides_categorias": include "include/slides_categorias.php"; break;
				case "pedidos": include "include/pedidos.php"; break;
				case "usuarios": include "include/usuarios.php"; break;
				//default: echo '<img src="imagenes/nube-sistema.svg" width="60%" style="margin: 10% 0 0 0">';
				default: include 'include/inicio.php'; break;
			}
		?>
    </div>
</div>
</body>
</html>
