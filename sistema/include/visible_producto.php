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
span{
	font-size:12px;
	color:#039;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:25%; height:auto; min-height:200px; padding:30px 5%; float:left; background:rgba(255,255,255,0.9);"><img src="../imagenes/logo_forma.png" /></div>
    <div style="width:62%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #FF0000;">
    	<?php
			include '../../include/conectar.php';
			@$categoria=$_GET['categoria'];
			@$producto=$_GET['producto'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$categoria=$_POST['categoria'];
				@$nombre=$_POST['nombre'];
				@$precio=$_POST['precio'];
				@$codigo=$_POST['codigo'];
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../../images/$archivo";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update keep_productos set imagen='$archivo' where id_producto=$producto");
				}
				$fecha=date("Y-m-d");
				
				mysqli_query($conexion, "update keep_productos set id_categoria=$categoria, nombre='$nombre', precio='$precio', codigo='$codigo', fecha='$fecha' where id_producto=$producto");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><img src="../imagenes/icon_ok.png"><br><a href="../menu.php?opcion=productos" target="_parent" style="background: rgba(0,50,105,0.8);padding: 12px 20px;color: #fff;text-decoration: navajowhite;display: inline-block;margin-top: 20px;">CERRAR</a></div>';
				//echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=productos" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select nombre, imagen, precio, codigo from keep_productos where id_producto=$producto";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$nombre=$row['nombre'];
				@$imagen_actual=$row['imagen'];
				@$precio=$row['precio'];
				@$codigo=$row['codigo'];
		?>
    	<form method="post" action="modificar_producto.php?producto=<?php echo $producto; ?>&categoria=<?php echo $categoria; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="categoria" id="categoria" class="combo">
            	<?php
                	$datos=mysqli_query($conexion, "select id_categoria, categoria from keep_categorias order by id_categoria asc");
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
            <input type="text" name="nombre" id="nombre" placeholder="* Nombre del producto" value="<?php echo $nombre; ?>" class="texto" required="required" />
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="precio" id="precio" placeholder="* Precio" style="width:20%" value="<?php echo $precio; ?>" class="texto" required="required" />
            <div class="clearer" style="height:10px"></div>
            <span>NOTA: Para poner un precio de $450.00 MN, solo ingresa 450</span>
            <div class="clearer" style="height:10px"></div>
            <input type="text" name="codigo" id="codigo" placeholder="* Código" style="width:20%" value="<?php echo $codigo; ?>" class="texto" required="required" />
            <div class="clearer" style="height:10px"></div>
            <?php
            	if($imagen_actual!=NULL){
					echo '<img src="../../images/'.$imagen_actual.'" height="100px">';
					echo '<div class="clearer" style="height:10px"></div>';
				}
			?>
            <input type="file" name="imagen" id="imagen" class="texto" />
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>