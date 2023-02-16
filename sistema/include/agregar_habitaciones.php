<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>HOTELES BOUTIQUE</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
}

#mensaje{
	width:90%;
	padding:30px 5%;
	text-align:center;
	font-size:17px;
	color:rgba(51,51,51,1);
	min-height:270px;
}

.texto{
	width:90%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:rgba(255,255,255,0.3);
	color:#333;
	font-size:12px;
}
.texto2{
	width:90%;
	height:100px;
	padding:15px 5%;
	border:none;
	border-radius:10px;
	background:rgba(255,255,255,0.3);
	color:#666;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
.combo{
	width:90%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:rgba(255,255,255,0.4);
	color:#333;
	font-size:12px;
}
.enviar{
	width:100%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:#333;
	color:#FFF;
	font-size:13px;
	cursor:pointer;
	text-transform:uppercase;
}
.clearer{
	clear:both;
	display:block;
}
#listado_recamaras{
	width:100%;
	height:auto;
	display:table;
	font-size:12px;
}
#listado_recamaras_1{
	width:54%;
	padding:10px 3%;
	text-align:left;
	background:rgba(153,51,51,0.1);
	color:#333;
	float:left;
}
#listado_recamaras_2{
	width:20%;
	background:rgba(0,102,153,0.8);
	text-align:center;
	float:left;
}
#listado_recamaras_3{
	width:20%;
	background:rgba(204,0,0,0.8);
	text-align:center;
	float:left;
}
#listado_recamaras_2 a, #listado_recamaras_3 a{
	text-decoration:none;
	padding:10px 0;
	display:block;
	color:#FFF;
}
#cerrar{
	width:100%;
	padding:10px 0;
	text-align:center;
}
#cerrar a{
	text-decoration:none;
	padding:10px 20px;
	background:rgba(51,51,51,0.9);
	color:#FFF;
	font-size:11px;
	border-radius:15px;
}
#titulo{
	width:100%;
	padding:10px 0;
	text-align:center;
	font-size:12px;
	text-transform:uppercase;
	background:rgba(153,51,51,0.7);
	color:#FFF;
}
</style>
<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontsizeselect,hr,removeformat,|,forecolor,backcolor,sub,sup,bullist",
		theme_advanced_buttons2 : "numlist,|,blockquote,|,link,unlink,code",
		//theme_advanced_buttons3 : "tablecontrols",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left;"><img src="../imagenes/logo_forma.png" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #996633;">
    	<?php
			include '../../include/conectar.php';
        	@$hotel=$_GET['hotel'];
			@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$nombre=$_POST['nombre'];
				@$informacion=$_POST['informacion'];
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "insert into hb_recamaras(id_hotel, nombre, informacion, fecha) values($hotel, '$nombre', '$informacion', '$fecha')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="agregar_habitaciones.php"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_habitaciones.php?hotel=<?php echo $hotel; ?>">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="nombre" id="nombre" class="texto" placeholder="* Nombre de la habitación" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="informacion" id="informacion" class="texto" placeholder="* Breve descripción de la habitación" required="required" />
            <div class="clearer" style="height:2px"></div>
            <!--<textarea name="informacion" id="informacion" class="texto2" placeholder="* Información" required="required"></textarea>-->
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php
			echo '<div class="clearer" style="height:10px;"></div>'; 
			// LISTADO DE HABITACIONES
			echo '<div id="titulo">LISTADO DE HABITACIONES</div>';
			$datosp=mysqli_query($conexion, "select id_recamara, id_hotel, nombre from hb_recamaras where id_hotel=$hotel order by id_recamara asc");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						echo '<div id="listado_recamaras">';
							echo '<div id="listado_recamaras_1">'.utf8_decode($datos2p['nombre']).'</div>';
							echo '<div id="listado_recamaras_2"><a href="modificar_recamara.php?recamara='.$datos2p['id_recamara'].'&hotel='.$hotel.'">MODIFICAR</a></div>';
							echo '<div id="listado_recamaras_3"><a href="eliminar_recamara.php?recamara='.$datos2p['id_recamara'].'&hotel='.$hotel.'">ELIMINAR</a></div>';
						echo '</div>';
						echo '<div class="clearer" style="height:1px"></div>';
				}}
			echo '<div class="clearer" style="height:10px"></div>';
			echo '<div id="cerrar"><a href="../menu.php?opcion=hoteles" target="_parent">CERRAR</a></div>';
			} 
		?>
    </div>
</div>
</body>
</html>