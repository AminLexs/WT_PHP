<html>
 <head>
	<meta charset="utf-8" />
	<meta name="author" content="Федченко Алексей">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css">
  <title>HTML5</title>
 </head>
 <body>
 <section>
 <form action="database.php" method="POST">
 <?php
 if(isset($_GET['do'])&& strcasecmp($_GET['do'],'add')!=0){
	 if(strcasecmp($_GET['do'],'error1')==0)
	echo'<p>Название компании: <input type="text" name="name" value="'.$_GET['name'].'" style="background-color:red" /></p> 
<p style="color:red">Компания уже существует или не заполнено поле</p>
	<p>Адрес: <input type="text" name="address" value="'.$_GET['address'].'" /></p>
	<p>Телефон: <input type="text" name="phone" value="'.$_GET['phone'].'" /></p>
	<p>Электронная почта: <input type="text" name="email" value="'.$_GET['email'].'" /></p>';
	else
		if(strcasecmp($_GET['do'],'error2')==0)
		echo'<p>Название компании: <input type="text" name="name" value="'.$_GET['name'].'"  /></p> 
	<p>Адрес: <input type="text" name="address" value="'.$_GET['address'].'" /></p>
	<p>Телефон: <input type="text" name="phone" value="'.$_GET['phone'].'" style="background-color:red"/></p>
	<p style="color:red">Неверный номер</p>
	<p>Электронная почта: <input type="text" name="email" value="'.$_GET['email'].'" /></p>';
	
	else if(strcasecmp($_GET['do'],'error3')==0)
		echo'<p>Название компании: <input type="text" name="name" value="'.$_GET['name'].'"  /></p> 
	<p>Адрес: <input type="text" name="address" value="'.$_GET['address'].'" /></p>
	<p>Телефон: <input type="text" name="phone" value="'.$_GET['phone'].'" /></p>
	<p>Электронная почта: <input type="text" name="email" value="'.$_GET['email'].'" style="background-color:red"/></p>
	<p style="color:red">Неверный email</p>';
 }else echo '<p>Название компании: <input type="text" name="name" /></p>
	<p>Адрес: <input type="text" name="address" /></p>
	<p>Телефон: <input type="text" name="phone" /></p>
	<p>Электронная почта: <input type="text" name="email" /></p>'
 ?>
 <p><input type="submit" value="Добавить"/></p>
 </form>
 <?php
 if (isset($_GET['do'])){
	if (strcasecmp($_GET['do'],'add')==0)
	 echo "<div>Добавлено</div>";
	else echo  '<div style="color:red">При добавлении допущены ошибки</div>';
 }
?>
 <form action="links.php" method="POST">
 <p>Введите название компании: <input type="text" name="nameforsearch" /></p>
 <p><input type="submit" value="Поиск"/></p>
</form>
<?php
	if(isset($_POST['nameforsearch'])&&!empty($_POST['nameforsearch']))
	{
		$data = trim($_POST['nameforsearch']);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$flag=false;
		$fp = fopen('companies.csv','r');
		while(!$flag && !feof($fp)){
			$str=fgets($fp,999);
			$masstr=explode(',',$str);
		if (strcasecmp($masstr[0],$data)==0)
			$flag=true;
		}
		if($flag) echo '<table border="1"><tr><td style="color:white;background-color:green;">Название: '.
			$masstr[0].'  Адрес: '.$masstr[1].'  Телефон: '.$masstr[2].'  Электронная почта: '.$masstr[3].'</td></tr>';
		fclose($fp);
	}
	
?>
 </section>
 <aside>
 <?php
 $table = '<table border="1">';
 $fp = fopen('companies.csv','r');
while(!feof($fp)){
	$table .= '<tr>';
	$str=fgets($fp,999);
	$masstr=explode(',',$str);
	if (strcasecmp($masstr[0],"")!=0)
	$table .= '<td style="color:black;background-color:white;">Название: '.$masstr[0].'  Адрес: '.$masstr[1].'  Телефон: '.$masstr[2].'  Электронная почта: '.$masstr[3].'</td>';
$table .= '</tr>';
}
fclose($fp);
echo $table;	
 ?>
 </aside>
 
 </body>
</html>