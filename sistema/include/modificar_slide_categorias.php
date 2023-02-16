<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FOODKEEPERS</title>
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
	background:rgba(0,51,204,0.9);
	color:#FFF;
	font-size:12px;
}
.enviar{
	width:100%;
	padding:15px 5%;
	border:none;
	border-radius:5px;
	background:#03C;
	color:#FFF;
	font-size:13px;
	cursor:pointer;
	text-transform:uppercase;
}
.clearer{
	clear:both;
	display:block;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left; background:rgba(255,255,255,0.9);"><img src="../imagenes/logo_forma.png" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #FF0000;">
    	<?php
			include '../../include/conectar.php';
        	@$bandera=$_POST['bandera'];
			@$categoria=$_GET['categoria'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update keep_categorias set slide='$archivo' where id_categoria=$categoria");
				}
				
				mysqli_query($conexion, "update keep_categorias set fecha='$fecha' where id_categoria=$categoria");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><img src="../imagenes/icon_ok.png"><br><a href="../menu.php?opcion=slides_categorias" target="_parent" style="background: rgba(0,50,105,0.8);padding: 12px 20px;color: #fff;text-decoration: navajowhite;display: inline-block;margin-top: 20px;">CERRAR</a></div>';
				// echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=slides_categorias" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select slide from keep_categorias where id_categoria=$categoria";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$slide=$row['slide'];
							
				//@$categoria_actual=mysql_result(mysql_query("select slide from keep_categorias where id_categoria=$categoria"),0);
				//@$visible=mysql_result(mysql_query("select visible from keep_categorias where id_categoria=$categoria"),0);
		?>
    	<form method="post" action="modificar_slide_categorias.php?categoria=<?php echo $categoria; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <div class="clearer" style="height:5px"></div>
            <?php
            	if($slide!=NULL){
					echo '<img src="../../images/'.$slide.'" height="100px">';
					echo '<div class="clearer" style="height:10px"></div>';
				}
			?>
            <input type="file" name="imagen" id="imagen" class="texto" placeholder="Modificar slide" />
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>