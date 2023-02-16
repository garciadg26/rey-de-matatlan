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
#listado_imagenes{
	width:24.5%;
	height:auto;
	display:table;
	margin-right:1px;
	float:left;
	margin-bottom:1px;
	position:relative;
}
#listado_imagenes_imagen{
	width:100%;
	height:100px;
	overflow:hidden;
}
#listado_imagenes_imagen img{
	width:100%;
}
#listado_imagenes_btn{
	width:100%;
	position:absolute;
	bottom:0;
	padding:5px 0;
	text-align:center;
	background:rgba(204,0,0,0.9);
	font-size:11px;
}
#listado_imagenes_btn a{
	text-decoration:none;
	color:#FFF;
	display:block;
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
			@$imagen=$_GET['imagen'];
				
			mysqli_query($conexion, "delete from hb_slides where id_slide=$imagen");
				echo '<div id="mensaje">Información eliminada correctamente<br><br><a href="agregar_slides.php?hotel='.$hotel.'"><img src="../imagenes/icon_ok.png"></a></div>';
			
		?>
    </div>
</div>
</body>
</html>