<?php
	include '../../include/conectar.php';
	$id3=$_POST['id2'];
	
	// SACAR ÚLTIMO CÓDIGO
	$sql = "select MAX(id_detalle) as maximo from imn_detalle_pedidos where (codigo!=NULL or codigo!='')";
	$result = mysqli_query($conexion, $sql);
	@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	@$maximo=$row['maximo'];
	
	$sql2 = "select codigo from imn_detalle_pedidos where id_detalle=$maximo";
	$result2 = mysqli_query($conexion, $sql2);
	@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
	@$codigo=$row2['codigo'];
	
	$sql3 = "select id_codigo from imn_codigos where codigo='$codigo'";
	$result3 = mysqli_query($conexion, $sql3);
	@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
	@$id_codigo=$row3['id_codigo'];
	$ultimo_codigo=$id_codigo+1;
	
	$sql4 = "select codigo from imn_codigos where id_codigo=$ultimo_codigo";
	$result4 = mysqli_query($conexion, $sql4);
	@$row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
	@$codigo_nuevo=$row4['codigo'];
	
	echo '<input type="hidden" name="codigo" id="codigo" value="'.$codigo_nuevo.'">';
	echo '<span style="font-weight:700; font-size:15px;">CÓDIGO PARA EL ESTUDIO: '.$codigo_nuevo.'</span>';
?>