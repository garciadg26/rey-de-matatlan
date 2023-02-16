<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MOOTT</title>
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
	background:#f7dc6f;
	color:#333;
	font-size:12px;
}
.enviar{
	width:100%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:#273746;
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
}
</style>
<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
function loadTinyMCE(){
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		// theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,|,fontsizeselect,hr,removeformat,|,sub,sup",
		// theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,blockquote,|,link,unlink,image,code,|,media,|,forecolor,backcolor",
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,|,fontsizeselect,hr,removeformat,|,sub,sup",
		theme_advanced_buttons2 : "bullist,numlist,|,blockquote,|,forecolor,backcolor,image,code",
		// theme_advanced_buttons3 : "tablecontrols",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/pan.css",

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
}
	loadTinyMCE();
</script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left;"><img src="../imagenes/web--moott-05.svg" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #273746;">
    	<?php
			include '../../include/conectar.php';
			@$categoria=$_GET['categoria'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$categoria=$_POST['categoria'];
				@$nombre=$_POST['nombre'];
				@$precio=$_POST['precio'];
				@$informacion=$_POST['informacion'];
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
				}
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "insert into mot_productos(categoria, nombre_producto, precio, imagen, descripcion, fecha, visible) values($categoria, '$nombre', '$precio', '$archivo', '$informacion', '$fecha', 'si')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="../menu.php?opcion=productos" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_producto.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="categoria" id="categoria" class="combo">
            	<?php
                	$datos=mysqli_query($conexion, "select id_categoria, categoria from mot_categorias order by id_categoria asc");
						if(mysqli_num_rows($datos)>0){
							while ($datos2=mysqli_fetch_array($datos)){
								if($categoria==$datos2['id_categoria']){
									echo '<option value="'.$datos2['id_categoria'].'" selected="selected">'.$datos2['categoria'].'</option>';
								} else {
									echo '<option value="'.$datos2['id_categoria'].'">'.$datos2['categoria'].'</option>';
								}
						}}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="nombre" id="nombre" placeholder="* Nombre del producto" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="precio" id="precio" placeholder="* Precio" style="width:20%" class="texto" />
            <div class="clearer" style="height:10px"></div>
            <span>NOTA: Para poner un precio de $450.00 MN, solo ingresa 450</span>
            <div class="clearer" style="height:20px"></div>
            <span>Información del producto</span>
            <div class="clearer" style="height:5px"></div>
            <textarea name="informacion" id="informacion" placeholder="* Descripción de producto" class="texto2"></textarea>
            <div class="clearer" style="height:10px"></div>
            <input type="file" name="imagen" id="imagen" class="texto" />
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>