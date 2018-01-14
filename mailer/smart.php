<?php 

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$text = $_POST['user_textarea'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'zzaaf@mail.ru';                 // Наш логин
$mail->Password = 'aDD1roX90Zma';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('zzaaf@mail.ru', 'Юрий Плисковский');   // От кого письмо 
$mail->addAddress('zzaafamania@gmail.com');     // Add a recipient
$mail->addAddress($email);     					// Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Это тема сообщения';
$mail->Body    = '
	Вы оставили заявку на сайте "Добрый Картон".<br><br>
	Ваши данные: <br> 
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . '<br>
	Адрес электронной почты: ' . $email . '<br>
	Ваше сообщение: <br>' . $text . '<br>

	Спасибо за обращение к нам. Мы Вам презвоним.';
	
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>