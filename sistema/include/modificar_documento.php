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
	padding:30px 5%;
	text-align:center;
	font-size:17px;
	color:rgba(0,51,102,1);
	min-height:270px;
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
	width:45%;
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
</style>
</head>
<body>
<div style="width:100%; padding:10px 0; display:table;">
	<div style="width:21%; height:auto; min-height:200px; padding:30px 2%; float:left;"><img src="../imagenes/logo_forma.png" width="100%" /></div>
    <div style="width:72%; padding:30px 1%; min-height:200px; margin-left:1px; float:left; background:rgba(51,51,51,0.1); border-left:solid 2px #0071BC;">
    	<?php
			include '../../include/conectar.php';
			@$documento=$_GET['documento'];
        	@$bandera=$_POST['bandera'];
			if($bandera==1){
				$fecha=date("Y-m-d");
				@$nombre=$_POST['nombre'];
				@$activo=$_POST['activo'];
				
				$archivo = $_FILES['imagen']['name'];
				if ($archivo != NULL)
					{ 
						$archTemp = $_FILES['imagen']['tmp_name'];
						$folder = "../documentos/$archivo";
						@copy ($archTemp,$folder);
						mysqli_query($conexion, "update imn_documentos set archivo='$archivo' where id_documento=$documento");
				}
				
				mysqli_query($conexion, "update imn_documentos set titulo='$nombre', fecha='$fecha', activo='$activo' where id_documento=$documento");
				echo '<div id="mensaje">Información actualizada correctamente<br><br><a href="../menu.php?opcion=documentos" target="_parent"><img src="../imagenes/icon_ok.png"></a></div>';
			} else {
				$sql = "select * from imn_documentos where id_documento=$documento";
				$result = mysqli_query($conexion, $sql);
				@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				@$titulo=$row['titulo'];
				@$archivo=$row['archivo'];
				@$activo=$row['activo'];
		?>
    	<form method="post" action="modificar_documento.php?documento=<?php echo $documento; ?>" enctype="multipart/form-data">
        	<input type="hidden" name="bandera" value="1" />
            <select name="activo" id="activo" class="combo">
            	<?php
                	if($activo=='si'){
						echo '<option value="si" selected="selected">ACTIVO - SI</option>';
						echo '<option value="no">ACTIVO - NO</option>';
					} else {
						echo '<option value="si">ACTIVO - SI</option>';
						echo '<option value="no" selected="selected">ACTIVO - NO</option>';
					}
				?>
            </select>
            <div class="clearer" style="height:5px"></div>
            <input type="text" name="nombre" id="nombre" placeholder="* Título del archivo" value="<?php echo $titulo; ?>" class="texto" required="required" style="width:80%"/>
            <div class="clearer" style="height:10px"></div>
            <?php
            	if($archivo!=NULL){
					echo '<a href="../documentos/'.$archivo.'" target="_blank">'.$archivo.'</a>';
					echo '<div class="clearer" style="height:5px"></div>';
				}
			?>
            <input type="file" name="imagen" id="imagen" placeholder="* Selecciona el documento" class="texto" />
            <div class="clearer" style="height:1px"></div>
            <span>* Formatos admitidos, word, xls, pdf. El nombre del archivo no debe de contener acentos, signos, espacios, ñ.</span>
            <div class="clearer" style="height:5px"></div>
            <input type="submit" value="Modificar" class="enviar" />
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>