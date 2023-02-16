<?php
	@$correo_1='emmanuel@tiposlibres.com';
	$folio=4853;


	//echo '<div style="width:100%; height:auto; padding:10px 0; text-align:center; font-size:14px; color:#666; font-family:\'Roboto-Light\';"><br><img src="../images/correoo.png" style="height:50px;"><br><br>NOTA: Hemos enviado un correo de confirmación a<br>'.$correo_1.'</div>';
	echo '<div style="display:none;">';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	$mail = new PHPMailer(true);

	try {
    $mail->SMTPDebug = 2;  // Sacar esta línea para no mostrar salida debug
    $mail->isSMTP();
    $mail->Host = 's77m-gqnv.accessdomain.com';  // Host de conexión SMTP
    $mail->SMTPAuth = false;
    $mail->Username = 'envios@tiposlibres.com';                 // Usuario SMTP
    $mail->Password = 'Dev29*mx9z';                           // Password SMTP
    $mail->SMTPSecure = 'ssl';                            // Activar seguridad TLS
    $mail->Port = 465;                                    // Puerto SMTP
	$mail->setFrom('envios@tiposlibres.com');		// Mail del remitente
	$mail->FromName = 'REY DE MATATLAN';
	$mail->addAddress($correo_1);
	//$mail->addBCC('it@botica44.com');
	$mail->isHTML(true);
    $mail->Subject = 'COMPRA ONLINE EL REY DE MATATLAN';  // Asunto del mensaje

	$mail->Body .='<div style="width:100%; height:auto; display:table; background:#FFF; font-size:12px; color:#333; padding:0; text-align:center;">';

	$mail->Body .= '<div style="display:block; clear: both; height:1px;"></div>';
	$mail->Body .= '<div style="width:100%; height:auto; display:table; background:#FFF; "><img src="http://tiposlibres.com/test/matatlan/images/fondomail.jpg"></div>';
	$mail->Body .= '<div style="display:block; clear: both; height:1px;"></div>';
	$mail->Body .= '<div style="width:100%; padding:30px 0; text-align:center; font-size:14px; background:#FFF; color:#333; font-family:Arial;">HOLA <span style="font-weight:700; text-transform:UPPERCASE; font-weight:700;">'.$nombre_cliente.'</span><br>Gracias por tu compra, en breve recibiras otro correo para darle seguimiento a tu pedido con FOLIO: <span style="font-weight:700;">'.$folio.'</span><br><br><br><a href="https://tiposlibres.com/test/matatlan/detalle_pedido.php?folio='.$folio.'&usuario='.$correo_1.'&currency=MX&flag_store=validtrx&country=MX&token=BIMX19QRO'.$folio.'&navic=COD7EKSS83&order=true1944Qr" style="padding:10px 20px; text-decoration:none; border-radius:15px; color:#F1F2F2; background:#333; font-size:13px;">VER DETALLE DE TU COMPRA</a></div>';
	$mail->Body .= '<div style="width:100%;"><img src="http://tiposlibres.com/test/matatlan/images/img_registro.jpg" style="width:100%;"></div>';




	$mail->Body .='</div>';
	$mail->Body .= '<div style="width:100%; padding:10px 0; font-size:12px; color:#666; text-align:center;">Para cualquier duda o comentario acerca de tu pedido, escr&iacute;benos a contacto@mezcal.com | Cel. (442) 230 1341<br>No responder a este correo, ya que se genera autom&aacute;ticamente.</div>';
	$mail->send();
    	//echo 'El mensaje ha sido enviado';
	} catch (Exception $e){
		//echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
		echo $e->getMessage();
		die();
	}

	echo '</div>';



?>
