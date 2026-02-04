<?php 
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

if(isset($_POST)) {
	$name = ($_POST['name']!= "") ? htmlspecialchars(trim($_POST['name'])) : "Имя не указано";
	$email = ($_POST['email']!= "") ? htmlspecialchars(trim($_POST['email'])) : "Email не указан";
	$text = ($_POST['text']!= "") ? htmlspecialchars(trim($_POST['text'])) : "Сообщение не указано";
    $phone = ($_POST['phone']!= "") ? htmlspecialchars(trim($_POST['phone'])) : "Телефон не указан";
	
    $to = 'info@muraveynik.su'; 
    $subject = 'Заявка с сайта Muraveynik.su'; 
	 
	$caption = 'Контактные данные отправителя';
		
		$message = '
				<html>
				<head>
					<title>'.$subject.'</title>
				</head>
				<body style=" font-size: 16px; color=#181818;">
					<h2 style="font-size: 20px;">' .$caption. '</h2>   
					<br><br>
					<table cellspacing=0 cellpadding=0 border=1 bgcolor="white">
						
						<tr>
							<td align="left" style="padding: 10px;">Имя:</td>
							<td align="right" style="padding: 10px;">' .$name. '</td>
						</tr>
						<tr>
							<td align="left" style="padding: 10px;">Телефон:</td>
							<td align="right" style="padding: 10px;">' .$phone. '</td>
						</tr>
						<tr>
							<td align="left" style="padding: 10px;">Email:</td>
							<td align="right" style="padding: 10px;">' .$email. '</td>
						</tr>
						<tr>
							<td align="left" style="padding: 10px;">Сообщение:</td>
							<td align="right" style="padding: 10px;">' .$text. '</td>
						</tr>
					</table>
					<br><br><br>
					<center>
						<img src="https://muraveynik.su/wp-content/themes/muraveinik/assets/images/logo.png" width="500" height="67" />
					</center>                    
				</body>
				</html>';
	
	$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
	//$headers .= "From: Отправитель <Muraveynik.su>\r\n"; 
	//mail($to, $subject, $message, $headers); 
	wp_mail($to, $subject, $message, $headers); 
	echo "Письмо отправлено"; 

} else echo '<p>Заполните, пожалуйста, поля <a href="./index.html">формы</a></p>'; 
