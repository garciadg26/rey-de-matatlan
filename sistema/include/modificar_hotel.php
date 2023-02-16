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
	width:30%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:rgba(153,51,51,0.5);
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
span{
	font-size:12px;
	color:#933;
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
        	@$bandera=$_POST['bandera'];
			@$hotel=$_GET['hotel'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$nombre=$_POST['nombre'];
				@$ciudad=$_POST['ciudad'];
				@$frase_1=$_POST['frase_1'];
				@$frase_2=$_POST['frase_2'];
				@$link_reservar=$_POST['link_reservar'];
				@$direccion=$_POST['direccion'];
				@$telefono=$_POST['telefono'];
				@$informacion=$_POST['informacion'];
				@$amenidades=$_POST['amenidades'];
				@$visible=$_POST['visible'];
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update hb_hoteles set logotipo='$archivo' where id_hotel=$hotel");
				}
				$archivo_2 = $_FILES['imagen_2']['name'];
				if ($archivo_2 != NULL)
					{ 
						$archTemp = $_FILES['imagen_2']['tmp_name'];
						$folder = "../../images/$archivo_2";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update hb_hoteles set imagen_amenidades='$archivo_2' where id_hotel=$hotel");
				}
				$archivo_3 = $_FILES['imagen_3']['name'];
				if ($archivo_3 != NULL)
					{ 
						$archTemp = $_FILES['imagen_3']['tmp_name'];
						$folder = "../../images/$archivo_3";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update hb_hoteles set portada='$archivo_3' where id_hotel=$hotel");
				}
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "update hb_hoteles set nombre='$nombre', ciudad='$ciudad', informacion='$informacion', amenidades='$amenidades', frase_1='$frase_1', frase_2='$frase_2', link_reservar='$link_reservar', direccion='$direccion', telefono='$telefono', fecha='$fecha', visible='$visible' where id_hotel=$hotel");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=hoteles" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select nombre, ciudad, logotipo, portada, informacion, amenidades, imagen_amenidades, frase_1, frase_2, link_reservar, direccion, telefono, visible from hb_hoteles where id_hotel=$hotel";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$nombre=$row['nombre'];
				@$ciudad=$row['ciudad'];
				@$imagen=$row['logotipo'];
				@$portada=$row['portada'];
				@$informacion=$row['informacion'];
				@$amenidades=$row['amenidades'];
				@$imagen_amenidades=$row['imagen_amenidades'];
				@$frase_1=$row['frase_1'];
				@$frase_2=$row['frase_2'];
				@$link_reservar=$row['link_reservar'];
				@$direccion=$row['direccion'];
				@$telefono=$row['telefono'];
				@$visible=$row['visible'];
		?>
    	<form method="post" action="modificar_hotel.php?hotel=<?php echo $hotel; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="visible" id="visible" class="combo">
            	<?php
                	if($visible=='si'){
						echo '<option value="no">VISIBLE - NO</option>';
						echo '<option value="si" selected="selected">VISIBLE - SI</option>';
					} else {
						echo '<option value="no" selected="selected">VISIBLE - NO</option>';
						echo '<option value="si">VISIBLE - SI</option>';
					}
				?>
            </select>
            <div class="clearer" style="height:10px"></div>
            <?php
            	echo '<img src="../../images/'.$portada.'" height="100px">';
				echo '<div class="clearer" style="height:10px"></div>';
			?>
            <input type="file" name="imagen_3" id="imagen_3" class="texto" placeholder="* Logotipo"/>
            <div class="clearer" style="height:10px"></div>
            <input type="text" name="nombre" id="nombre" class="texto" placeholder="* Nombre del hotel" value="<?php echo $nombre; ?>" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="ciudad" id="ciudad" class="texto" placeholder="* Ciudad" value="<?php echo $ciudad; ?>" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="frase_1" id="frase_1" class="texto" placeholder="* Frase de arriba" value="<?php echo $frase_1; ?>" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="frase_2" id="frase_2" class="texto" placeholder="* Frase de abajo" value="<?php echo $frase_2; ?>" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="link_reservar" id="link_reservar" class="texto" placeholder="* Link para botón RESERVAR" value="<?php echo $link_reservar; ?>"  style="color:#930;" />
            <div class="clearer" style="height:2px"></div>
            <textarea name="direccion" id="direccion" class="texto2" placeholder="* Dirección" required="required"><?php echo $direccion; ?></textarea>
            <div class="clearer" style="height:2px"></div>
            <textarea name="telefono" id="telefono" class="texto2" placeholder="* Teléfono" required="required"><?php echo $telefono; ?></textarea>
            <div class="clearer" style="height:5px"></div>
            <?php
            	echo '<img src="../../images/'.$imagen.'" height="100px">';
				echo '<div class="clearer" style="height:5px"></div>';
			?>
            <input type="file" name="imagen" id="imagen" class="texto" placeholder="* Logotipo"/>
            <div class="clearer" style="height:10px"></div>
            <span>NOTA: Modificar logotipo (Opcional)</span>
            <div class="clearer" style="height:10px"></div>
            <textarea name="informacion" id="informacion" class="texto2" placeholder="* Información" required="required"><?php echo $informacion; ?></textarea>
            <div class="clearer" style="height:2px"></div>
            <textarea name="amenidades" id="amenidades" class="texto2" placeholder="* Amenidades" required="required"><?php echo $amenidades; ?></textarea>
            <div class="clearer" style="height:10px"></div>
            <?php
            	echo '<img src="../../images/'.$imagen_amenidades.'" height="100px">';
				echo '<div class="clearer" style="height:10px"></div>';
			?>
            <input type="file" name="imagen_2" id="imagen_2" class="texto" placeholder="* Logotipo"/>
            <div class="clearer" style="height:10px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>