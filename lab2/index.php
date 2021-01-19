<html>
 <head>
	<meta charset="utf-8" />
	<meta name="author" content="Федченко Алексей">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css">
  <title>HTML5</title>
 </head>
 <body>
  <form action="index.php" method="POST">
 <p>Количество строк: <input type="text" name="kolvo" /></p>
  <p><input type="submit" /></p>
 <aside>
 <?php

if (is_numeric ($_POST['kolvo'])){
	$rows = $_POST['kolvo']; 
	$table = '<table border="1">';
	$color = 0;
	for ($tr=1; $tr<=$rows; $tr++){
		$table .= '<tr>';
	if ($tr % 5 == 0){
		$table .= '<td style="color:white;background-color:green;">Это строка под номером '. $tr .'</td>';
	}else {
		$table .= '<td style="color:white;background-color:hsl(0, 0%, '.$color.'%);">Это строка под номером '. $tr .'</td>';
		$color+=1;
	}
    $table .= '</tr>';
}
$table .= '</table>';
echo $table; 
}else echo "Неверный ввод";

 ?>
 </aside>
 </body>