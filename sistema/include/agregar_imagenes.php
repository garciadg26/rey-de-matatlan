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
			@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				//$archivo = $_FILES['imagen']['name'];
				/*if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/hoteles/$archivo";
						@copy ($archTemp,$folder);
				}
				
				mysqli_query($conexion, "insert into hb_imagenes(id_hotel, imagen, fecha) values($hotel, '$archivo', '$fecha')");*/
				
				
				foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){
					//Validamos que el archivo exista
					if($_FILES["archivo"]["name"][$key]) {
						$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
						$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
						
						$directorio = '../../images/hoteles/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
						
						//Validamos si la ruta de destino existe, en caso de no existir la creamos
						//if(!file_exists($directorio)){
							//mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
						//}
						
						$dir=opendir($directorio); //Abrimos el directorio de destino
						$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
						
						//Movemos y validamos que el archivo se haya cargado correctamente
						//El primer campo es el origen y el segundo el destino
						if(move_uploaded_file($source, $target_path)) {	
							//echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
							} else {	
							//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
						}
						closedir($dir); //Cerramos el directorio de destino
						mysqli_query($conexion, "insert into hb_imagenes(id_hotel, imagen, fecha) values($hotel, '$filename', '$fecha')");
						//mysqli_query($conexion, "insert into hb_imagenes(id_hotel, imagen, fecha) values($hotel, '$archivo', '$fecha')");
					}
				}
				
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="agregar_imagenes.php?hotel='.$hotel.'"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_imagenes.php?hotel=<?php echo $hotel; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <!--<input type="file" name="imagen" id="imagen" class="texto" required="required" />-->
            <input type="file" name="archivo[]" id="archivo[]" class="texto" multiple="multiple" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php
			echo '<div class="clearer" style="height:10px;"></div>'; 
			// LISTADO DE HABITACIONES
			echo '<div id="titulo">LISTADO DE IMÁGENES</div>';
			$datosp=mysqli_query($conexion, "select id_imagen, id_hotel, imagen from hb_imagenes where id_hotel=$hotel order by id_imagen asc");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						echo '<div id="listado_imagenes">';
							echo '<div id="listado_imagenes_imagen"><img src="../../images/hoteles/'.$datos2p['imagen'].'"></div>';
							echo '<div id="listado_imagenes_btn"><a href="borrar_imagen.php?imagen='.$datos2p['id_imagen'].'&hotel='.$hotel.'">BORRAR</a></div>';
						echo '</div>';
						
				}}
			echo '<div class="clearer" style="height:10px"></div>';
			echo '<div id="cerrar"><a href="../menu.php?opcion=hoteles" target="_parent">CERRAR</a></div>';
			} 
		?>
    </div>
</div>
</body>
</html>