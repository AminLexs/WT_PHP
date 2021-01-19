<html>
 <head>
	<meta charset="utf-8" />
	<meta name="author" content="Федченко Алексей">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css">
  <title>LAB7</title>
 </head>
 <body>
	<form action="lab7.php" method="POST">
	<p>Введите имя: <input type="text" name="name" <?php if(isset($_POST['name'])){echo 'value='.$_POST['name'];} ?> /></p>
	<p>Телефон: <input type="text" name="number"<?php if(isset($_POST['number'])){echo 'value='.$_POST['number'];} ?> /></p>
	<p>Email: <input type="text" name="email"<?php if(isset($_POST['email'])){echo 'value='.$_POST['email'];} ?> /></p>
	<p>Тема: <input type="text" name="subject"<?php if(isset($_POST['subject'])){echo 'value='.$_POST['subject'];} ?> /></p>
	<p>Текст сообщения: <input type="text" name="text"<?php if(isset($_POST['text'])){echo 'value='.$_POST['text'];} ?> /></p>
	<p><input type="submit" /></p>

<?php
if(isset($_POST['name'])&&isset($_POST['number'])&&isset($_POST['email'])&&isset($_POST['subject'])&&isset($_POST['text']))
{
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		if (preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $_POST['number'])){
$to  = $_POST['email'] ; 

$subject = $_POST['subject'] ; 
$subject = '=?utf-8?B?'.base64_encode($subject).'?=';
$message = $_POST['name'].', благодарим за отправленное сообщение. Ваш вопрос будет расcмотрен в скором времени.';

$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: From perfect site <leha.testirovshchik.99@mail.ru> \r\n"; 
$headers .= "Reply-To: noreply-to@example.com\r\n"; 
 $headers .= "MIME-Version: 1.0\r\n";
if (mail($to, $subject, $message,$headers))
{
	echo '<meta http-equiv="refresh" content="1; URL=lab7.php">'; 
	echo 'Успешно отправлено.';
} else
{
	echo 'Не отправлено.';
} 
}else {echo "Неверный номер.";}
}else {echo "Неверный Email.";}
}else {echo "Заполните все поля.";	}
?>
 </body>
 </html>