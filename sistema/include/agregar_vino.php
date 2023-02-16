<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EL REY DE MAZATLÁN</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
	height:550px;
}

#mensaje{
	width:90%;
	padding:30px 5%;
	text-align:center;
	font-size:17px;
	color:#333;
	min-height:400px;
}

.texto{
	width:90%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:rgba(255,255,255,0.3);
	color:#333;
	font-size:12px;
}
.texto2{
	width:90%;
	height:100px;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:rgba(255,255,255,0.3);
	color:#666;
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
.combo{
	width:50%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:rgba(102,51,51,1);
	color:#F1F2F2;
	font-size:12px;
}
.combo_2{
	width:50%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:#333;
	color:#F1F2F2;
	font-size:12px;
}
.enviar{
	width:100%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:#333;
	color:#F1F2F2;
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
	color:rgba(102,51,51,1);
}
</style>
<script type="text/javascript" src="../js/functios.js"></script>
<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,|,fontsizeselect,hr,removeformat,|,sub,sup",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,blockquote,|,link,unlink,image,code,|,media,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols",
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
</script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left; position:fixed;"><img src="../imagenes/Logotipo-mezcal.svg" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; left:34%; position:absolute; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #273746;">
    	<?php
			include '../../Public/includes/conectar.php';
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				@$nombre=$_POST['nombre'];
				@$precio=$_POST['precio'];
				@$sabor=$_POST['sabor'];
				@$tipo=$_POST['tipo'];

				$fecha=date("Y-m-d");
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../Public/images/$archivo";
						@copy ($archTemp,$folder);
				}

				mysqli_query($conexion, "insert into vin_vinos(nombre_vino, imagen, tipo, sabor, fecha, visible) values('$nombre', '$archivo', $tipo, '$sabor', '$fecha', 'si')");
				echo '<div id="mensaje"><a href="../menu.php?opcion=vinos" target="_parent"><img src="../imagenes/icon_ok.png"></a><br><br>Información registrada correctamente<br>clic en la imagen para cerrar ventana...</div>';
			} else {
		?>
    	<form method="post" action="agregar_vino.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
						<select name="tipo" id="tipo" class="combo_2" required>
							<option value="">Selecciona el tipo de vino</option>
							<?php
									$datos=mysqli_query($conexion, "select * from vin_categorias order by categoria asc");
										if(mysqli_num_rows($datos)>0){
											while ($datos2=mysqli_fetch_array($datos)){
												echo '<option value="'.$datos2['id_categoria'].'">'.$datos2['categoria'].'</option>';
											}
										}
							?>
						</select>
						<div class="clearer" style="height:5px"></div>
						<input type="text" name="nombre" id="nombre" placeholder="* Nombre del vino" class="combo" required="required" style="width:42%; float:left;" />
            <div class="clearer" style="height:15px"></div>
            <span>IMAGEN (PORTADA)</span>
            <div class="clearer" style="height:10px"></div>
            <input type="file" name="imagen" id="imagen" class="texto" required="required" />
            <div class="clearer" style="height:15px"></div>
            <span>INFORMACIÓN</span>
            <div class="clearer" style="height:10px"></div>
            <textarea name="sabor" id="sabor" class="texto2" placeholder="* Sabor"></textarea>
            <div class="clearer" style="height:20px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
