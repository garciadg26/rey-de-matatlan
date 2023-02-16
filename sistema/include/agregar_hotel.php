<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>
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
span{
	font-size:13px;
	color:#933;
}
</style>

</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left;"><img src="../imagenes/logo_forma.png" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #996633;">
    	<?php
			include '../../include/conectar.php';
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$nombre=$_POST['nombre'];
				@$frase_1=$_POST['frase_1'];
				@$frase_2=$_POST['frase_2'];
				@$direccion=$_POST['direccion'];
				@$telefono=$_POST['telefono'];
				@$informacion=$_POST['informacion'];
				@$amenidades=$_POST['amenidades'];
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
				}
				$archivo_2 = $_FILES['imagen_2']['name'];
				if ($archivo_2 != NULL)
					{ 
						$archTemp = $_FILES['imagen_2']['tmp_name'];
						$folder = "../../images/$archivo_2";
						@copy ($archTemp,$folder);
				}
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "insert into hb_hoteles(nombre, logotipo, informacion, amenidades, imagen_amenidades, frase_1, frase_2, direccion, telefono, fecha, visible) values('$nombre', '$archivo', '$informacion', '$amenidades', '$archivo_2', '$frase_1', '$frase_2', '$direccion', '$telefono', '$fecha', 'si')");
				echo '<div id="mensaje">Información registrada correctamente<br><br><a href="../menu.php?opcion=hoteles" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
		?>
    	<form method="post" action="agregar_hotel.php" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <input type="text" name="nombre" id="nombre" class="texto" placeholder="* Nombre del hotel" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="frase_1" id="frase_1" class="texto" placeholder="* Frase de arriba" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="frase_2" id="frase_2" class="texto" placeholder="* Frase de abajo" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="direccion" id="direccion" class="texto" placeholder="* Dirección" required="required" />
            <div class="clearer" style="height:2px"></div>
            <input type="text" name="telefono" id="telefono" class="texto" placeholder="* Teléfonos" required="required" />
            <div class="clearer" style="height:10px"></div>
            <span>Logotipo</span>
            <div class="clearer" style="height:10px"></div>
            <input type="file" name="imagen" id="imagen" class="texto" placeholder="* Logotipo" required="required" />
            <div class="clearer" style="height:2px"></div>
            <textarea name="informacion" id="informacion" class="texto2" placeholder="* Información" required="required"></textarea>
            <div class="clearer" style="height:2px"></div>
            <textarea name="amenidades" id="amenidades" class="texto2" placeholder="* Amenidades" required="required"></textarea>
            <div class="clearer" style="height:10px"></div>
            <span>Imagen amenidades</span>
            <div class="clearer" style="height:10px"></div>
            <input type="file" name="imagen_2" id="imagen_2" class="texto" placeholder="* Logotipo" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Registrar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>