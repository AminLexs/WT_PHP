<?php
$masstr=explode('?',$_SERVER['HTTP_REFERER']);
if (!empty($_POST['name'])&&!italreadythere($_POST['name'])){
	
	$name = test_input($_POST["name"]);
	$address = test_input($_POST["address"]);
	$phone = test_input($_POST["phone"]);
	$email = test_input($_POST["email"]);
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
																																																									if (preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $phone)){
	$fp = fopen('companies.csv','a+');
	fwrite($fp,$name.','.$address.','.$phone.','.$email."\r\n");
	fclose($fp);
	echo "Добавлено";
	echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$masstr[0].'?do=add'."'>
  </head>
</html>";
	}else {
		echo "Неверный номер телефона";
		echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$masstr[0].'?do=error2&'.'name='.$_POST['name'].'&'.
   'address='.$_POST['address'].'&'.'phone='.$_POST['phone'].'&'.'email='.$_POST['email']."'>
  </head>
</html>";
	}
}else{
	echo "Неверный email";
		echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$masstr[0].'?do=error3&'.'name='.$_POST['name'].'&'.
   'address='.$_POST['address'].'&'.'phone='.$_POST['phone'].'&'.'email='.$_POST['email']."'>
  </head>
</html>";
}
}
else {
	echo "Не введено название или уже есть такая компания";
	
	echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$masstr[0].'?do=error1&'.'name='.$_POST['name'].'&'.
   'address='.$_POST['address'].'&'.'phone='.$_POST['phone'].'&'.'email='.$_POST['email']."'>
  </head>
</html>";
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
function italreadythere($n){	
	$flag=false;
	$fp = fopen('companies.csv','r');
while(!$flag && !feof($fp)){
	$str=fgets($fp,999);
	$masstr=explode(',',$str);
if (strcasecmp($masstr[0],$n)==0){
	$flag=true;
}
}
fclose($fp);
return $flag;
}
?>