<?php 
header("content-type:application/octet-stream");
header("Content-Disposition: attachment; filename=pedidos.xls");
header("Pragma: no-cache");
header("Expires: 0");

error_reporting(E_ALL);
ini_set('display_errors', '1');
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>EXCEL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
		function f_fecha_utilidad($fecha){
			$fechas = explode("-", $fecha);
				@$dia=$fechas[2];
				@$mes=$fechas[1];
				switch($mes){
					case 1: $mes_1='Ene'; break;
					case 2: $mes_1='Feb'; break;
					case 3: $mes_1='Mar'; break;
					case 4: $mes_1='Abr'; break;
					case 5: $mes_1='May'; break;
					case 6: $mes_1='Jun'; break;
					case 7: $mes_1='Jul'; break;
					case 8: $mes_1='Ago'; break;
					case 9: $mes_1='Sept'; break;
					case 10: $mes_1='Oct'; break;
					case 11: $mes_1='Nov'; break;
					case 12: $mes_1='Dic'; break;
				}
				@$ano=$fechas[0];
				return @$fecha=$dia.'-'.$mes_1.'-'.$ano;	
		}
	
		include "../include/conectar.php";
		echo '<table border="1" align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000000">';
		
        echo '<tr style="font-size:12px; padding:20px 0;">';
		echo '<td style="width:100px; background:#008C46; color:#FFF; text-align:center;">FOLIO</td>';
		echo '<td style="width:200px; background:#008C46; color:#FFF; text-align:center;">FECHA</td>';
        echo '<td style="width:350px; background:#008C46; color:#FFF; text-align:center;">ASOCIADO</td>';
		echo '<td style="width:350px; background:#008C46; color:#FFF; text-align:center;">CLIENTE</td>';
		echo '<td style="width:350px; background:#008C46; color:#FFF; text-align:center;">E-MAIL</td>';
		echo '<td style="width:200px; background:#008C46; color:#FFF; text-align:center;">TELÉFONO</td>';
        echo '<td style="width:200px; background:#008C46; color:#FFF; text-align:center;">ESTUDIO</td>';
		echo '<td style="width:200px; background:#008C46; color:#FFF; text-align:center;">PRECIO</td>';
		echo '<td style="width:200px; background:#008C46; color:#FFF; text-align:center;">FORMA DE PAGO</td>';
		echo '</tr>';
		
		
		$datos=mysqli_query($conexion,"select a.id_pedido as id_pedido, a.cliente as cliente, a.total as total, a.metodo_pago as metodo_pago, a.pagado as pagado, a.fecha as fecha, a.cancelar as cancelar, b.producto as producto, a.especial as especial, a.precio_especial as precio_especial, a.tipo_precio as tipo_precio, a.nutriologo as nutriologo from imn_pedidos a inner join imn_detalle_pedidos b on (a.id_pedido=b.id_venta) order by a.id_pedido desc");
			if(mysqli_num_rows($datos)>0){
				while ($datos2=mysqli_fetch_array($datos)){
					$sql = "select * from imn_clientes where id_cliente=".$datos2['cliente']."";
					$result = mysqli_query($conexion, $sql);
					@$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					@$nombre=$row['nombre'];
					@$a_paterno=$row['a_paterno'];
					@$a_materno=$row['a_materno'];
					@$correo=$row['correo'];
					@$telefono=$row['telefono'];
					
					$sql2 = "select titulo_estudio from imn_estudios where id_estudio=".$datos2['producto']."";
					$result2 = mysqli_query($conexion, $sql2);
					@$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
					@$titulo_estudio=$row2['titulo_estudio'];
					
					$sql3 = "select nombre, a_paterno from imn_nutriologos where id_nutriologo=".$datos2['nutriologo']."";
					$result3 = mysqli_query($conexion, $sql3);
					@$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
					@$nombre_nutriologo_1=$row3['nombre'];
					@$nombre_nutriologo_2=$row3['a_paterno'];
										
					echo '<tr style="padding-top:10px;">';
						echo '<td style="width:100px; background-color:#F1F2F2; color:#333; text-align:center;">'.$datos2['id_pedido'].'</td>';
						echo '<td style="width:200px; background-color:#F1F2F2; color:#333; text-align:center;">'.f_fecha_utilidad($datos2['fecha']).'</td>';
						echo '<td style="width:350px; background-color:#F1F2F2; color:#333; text-align:center;">'.$nombre_nutriologo_1.' '.$nombre_nutriologo_2.'</td>';
						echo '<td style="width:350px; background-color:#F1F2F2; color:#333; text-align:center;">'.$nombre.' '.$a_paterno.' '.$a_materno.'</td>';
						echo '<td style="width:350px; background-color:#F1F2F2; color:#333; text-align:center;">'.$correo.'</td>';
						echo '<td style="width:200px; background-color:#F1F2F2; color:#333; text-align:center;">'.$telefono.'</td>';
						echo '<td style="width:200px; background-color:#F1F2F2; color:#333; text-align:center;">'.$titulo_estudio.'</td>';
						echo '<td style="width:200px; background-color:#F1F2F2; color:#333; text-align:center;">$'.number_format($datos2['total'],2).' MN</td>';
						echo '<td style="width:200px; background-color:#F1F2F2; color:#333; text-align:center;">'.$datos2['metodo_pago'].'</td>';
						
					echo '</tr>';
			}}
			
			
			
		echo '</table>';
        ?>
    </body>
</html>