<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EL REY DE MAZATLÁN</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
	height:600px;
}

#mensaje{
	width:90%;
	padding:30px 5%;
	text-align:center;
	font-size:17px;
	color:#333;
	min-height:250px;
}

.texto{
	width:80%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background: #e5e7e9;
	color:#333;
	font-size:12px;
	text-align:center;
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
	width:89%;
	padding:15px 5%;
	border:none;
	border-radius:15px;
	background:#999;
	color:#F1F2F2;
	font-size:12px;
	text-transform: uppercase;
}
.enviar{
	width:91%;
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
#cuadros{
	width: 33%;
	margin:0 1px 1px 0;
	float: left;
}
#cuadros a{
	display: block;
	width: 100%;
	padding: 40px 0;
	text-align: center;
	text-decoration: none;
	font-size: 15px;
	color: #FFF;
}
#cerrar{
	width: 100%;
	padding: 20px 0;
	text-align: center;
	font-size: 13px;
}
#titulo{
	width: 100%;
	padding: 0 0 20px 0;
	font-size:15px;
	color: #333;
	text-align: center;
	text-transform: uppercase;
}
.btn_precio{
	padding: 5px 10px;
	background:rgba(254,254,254,0.8);
	color:#333;
	font-size: 12px;
	border-radius: 15px;
}
#listado{
	width: 21%;
	padding:10px 2%;
	text-align: left;
	font-size: 13px;
	float: left;
	background: #f2f3f4 ;
	color: #333;
}
#listado_modificar{
	width: 25%;
	text-align: center;
	font-size: 13px;
	float: left;
	background:#aed6f1;
}
#listado_modificar a{
	text-decoration: none;
	display: block;
	padding: 10px 0;
	width: 100%;
	color: #333;
}
#listado_eliminar{
	width: 25%;
	text-align: center;
	font-size: 13px;
	float: left;
	background: #ec7063;
}
#listado_eliminar a{
	text-decoration: none;
	display: block;
	padding: 10px 0;
	width: 100%;
	color: #F1F2F2;
}
#forma{
	width: 60%;
	padding: 0 20%;
	height: auto;
	display: table;
	text-align: center;
}
#opcion{
	width: 25%;
	float: left;
	text-align: center;
	font-size: 15px;
	line-height: 20px;
	padding: 20px 0;
	background:#f8f9f9;
	display: table;
}
#opcion a{
	text-decoration: none;
	color: #333;
}
</style>
<script type="text/javascript" src="../js/functios.js"></script>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:100%; height:auto; padding:10px 0; text-align:center;"><img src="../imagenes/Logotipo-mezcal.svg" /></div>
    <div style="width:100%; padding:30px 0; border-top:solid 2px #273746; display:table;">
    	<?php
			include '../../Public/includes/conectar.php';
      	@$nombre=$_POST['nombre'];
				@$bandera=$_POST['bandera'];
				@$vino=$_GET['vino'];
				@$detalle=$_GET['detalle'];
				$fecha=date("Y-m-d");

				// TIPO
				$sql = "select * from vin_vinos where id_vino=$vino ";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$tipo=$row['tipo'];
				@$nombre_vino=$row['nombre_vino'];

				echo '<div id="titulo">VINO '.$nombre_vino.'</div>';

				if($bandera==1){
					@$tamano=$_POST['tamano'];
					@$precio=$_POST['precio'];
					mysqli_query($conexion,"update vin_detalle_tamano set id_tamano=$tamano, precio='$precio', fecha='$fecha' where id_detalle=$detalle");
					echo '<div id="mensaje">Información actualizada correctamente!<br><br><br>';
						echo '<div id="opcion">&nbsp;</div>';
						echo '<div id="opcion"><a href="agregar_precio.php?vino='.$vino.'">Añadir otro precio<br><img src="../imagenes/plus-icon.png" style="height:40px;"></a></div>';
						echo '<div id="opcion"><a href="tamanos_vinos.php?vino='.$vino.'">Regresar a listado<br><img src="../imagenes/icono_regresar.png" style="height:40px;"></a></div>';
						echo '<div id="opcion">&nbsp;</div>';
					echo '</div>';
				} else {
					$sql = "select * from vin_detalle_tamano where id_vino=$vino and id_detalle=$detalle ";
					$result = mysqli_query($conexion, $sql);
					@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					@$id_tamano=$row['id_tamano'];
					@$precio=$row['precio'];


				echo '<div id="forma">';
					echo '<form method="post" action="modificar_precio.php?vino='.$vino.'&detalle='.$detalle.'">';
						echo '<input type="hidden" name="bandera" value="1">';
						echo '<select name="tamano" id="tamano" class="combo" required>';
							echo '<option value="">Selecciona un tamaño</option>';
							$datos=mysqli_query($conexion, "select * from vin_tamanos  ");
								if(mysqli_num_rows($datos)>0){
									while ($datos2=mysqli_fetch_array($datos)){
										if($id_tamano==$datos2['id_tamano']){
											echo '<option value="'.$datos2['id_tamano'].'" selected>'.$datos2['tamano'].' - '.$datos2['peso'].'</option>';
										} else {
											echo '<option value="'.$datos2['id_tamano'].'">'.$datos2['tamano'].' - '.$datos2['peso'].'</option>';
										}
									}
								}
						echo '</select>';
						echo '<div class="clearer" style="height:5px;"></div>';
						echo '<input type="text" name="precio" id="precio" class="texto" value="'.$precio.'" placeholder="* Ingresa el precio del vino" required>';
						echo '<div class="clearer" style="height:5px;"></div>';
						echo '<span>* Para ingresar un precio de $450.00 MN, solo ingresar 450</span>';
						echo '<div class="clearer" style="height:15px;"></div>';
						echo '<input type="submit" value="Modificar" class="enviar">';
					echo '</form>';
				echo '</div>';
				}


		?>
    </div>
</div>
<div id="cerrar">
	<?php
		if($bandera==1){
		} else {
				echo '<a href="javascript: history.back()"><img src="../imagenes/icono_regresar.png" style="height:40px;"></a>';
		}
	?>
</div>
</body>
</html>
