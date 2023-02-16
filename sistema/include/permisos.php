<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NUBE NUTRITION</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
}
#mensaje{
	width:90%;
	padding:20px 5%;
	text-align:center;
	font-size:17px;
	color:rgba(0,51,153,1);
}
.texto{
	width:60%;
	padding:15px 3%;
	border:none;
	border-radius:5px;
	background:rgba(255,255,255,0.3);
	color:#333;
	font-size:12px;
	float:left;
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
	padding:15px 5px;
	float:left;
}
#listado_titulos{
	width:100%;
	height:auto;
	display:table;
	padding:10px 0;
	background:rgba(0,51,153,1);
	color:#FFF;
	font-size:12px;
}
#cuadro{
	width:33%;
	height:auto;
	display:table;
	background:rgba(255,255,255,0.6);
	font-size:12px;
	margin:0 1px 1px 0;
	text-align:center;
	float:left;
}
#cuadro a{
	width:90%;
	text-decoration:none;
	display:block;
	padding:30px 5%;
	color:#333;
}
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$usuario=$_GET['usuario'];
			@$seccion=$_GET['seccion'];
			@$detalle=$_GET['detalle'];
			$fecha=date("Y-m-d");
			
			$sql = "select nombre from usuarios where id_usuario=$usuario";
			$result = mysqli_query($conexion, $sql);
			@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			@$nombre=$row['nombre'];
			
			// ACCIONES
			@$accion=$_GET['accion'];
			switch($accion){
				case 'anadir':
					mysqli_query($conexion, "insert into imn_permisos_secciones(id_usuario, id_seccion, fecha) values($usuario, $seccion, '$fecha')");
				break;
				case 'borrar':
					mysqli_query($conexion, "delete from imn_permisos_secciones where id_detalle=$detalle");
				break;
			}
			
			
			// LISTADO
			echo '<div id="mensaje">Permisos para "'.$nombre.'"</div>';
			$datosp=mysqli_query($conexion, "select id_seccion, seccion from imn_secciones order by seccion asc");
				if(mysqli_num_rows($datosp)>0){
					while ($datos2p=mysqli_fetch_array($datosp)){
						$sql2 = "select COUNT(*) as existe from imn_permisos_secciones where id_usuario=$usuario and id_seccion=".$datos2p['id_seccion']."";
						$result2 = mysqli_query($conexion, $sql2);
						@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
						@$existe=$row2['existe'];
						
						$sql3 = "select id_detalle from imn_permisos_secciones where id_usuario=$usuario and id_seccion=".$datos2p['id_seccion']."";
						$result3 = mysqli_query($conexion, $sql3);
						@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
						@$detalle=$row3['id_detalle'];
						
						if($existe==0){
							$titulo='AGREGAR';
							$fondo='rgba(102,153,51,0.4)';
							$color='#333';
							echo '<div id="cuadro" style="background:'.$fondo.';"><a href="permisos.php?usuario='.$usuario.'&seccion='.$datos2p['id_seccion'].'&accion=anadir" style="color:'.$color.';">'.$datos2p['seccion'].'<br>'.$titulo.'</a></div>';
						} else {
							$titulo='QUITAR';
							$fondo='rgba(204,0,0,0.7)';
							$color='#F1F2F2';
							echo '<div id="cuadro" style="background:'.$fondo.'; color:'.$color.';"><a href="permisos.php?usuario='.$usuario.'&seccion='.$datos2p['id_seccion'].'&accion=borrar&detalle='.$detalle.'" style="color:'.$color.';">'.$datos2p['seccion'].'<br>'.$titulo.'</a></div>';
						}
				}
			}
		?>
    </div>
</div>
</body>
</html>