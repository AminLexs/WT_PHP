<html>
 <head>
	<meta charset="utf-8" />
	<meta name="author" content="Федченко Алексей">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css">
  <title>HTML5</title>
 </head>
 <body>
	<form action="lab5.php" method="POST">
	<p>Введите год: <input type="text" name="year" /></p>
	<p><input type="submit" /></p>
<?php
if(isset($_POST['year']))
{
	if(is_numeric($_POST['year']))
{
$Link = mysqli_connect('localhost', 'root', '12345','','34678');
if(!$Link) echo "Не удалось подключится к серверу";
else
{
    mysqli_select_db($Link,'mybd');
	$Link->set_charset("utf8");

	$query ="SELECT * FROM years_china";
	$result = mysqli_query($Link, $query) or die("Ошибка " . mysqli_error($Link)); 
	if ($result == false) {
		print("Произошла ошибка при выполнении запроса");
	}else
	{
		$rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table><tr><th>Id</th><th>Знак по календарю</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
	$i=9;
	while($i<14){
		$query='SELECT * FROM `years_china` WHERE `ID` = '. (intval($_POST['year'])+$i)%12;	
		$result = mysqli_query($Link, $query) or die("Ошибка " . mysqli_error($Link)); 
	
		while($row = mysqli_fetch_array($result))
		{	
			echo ("Знак года ".(intval($_POST['year'])+$i-8).": ".$row[1]."<br>\n");
		}
		$i++;
		mysqli_free_result($result);
	}
	}
}
}else{
	echo "Ошибка ввода года.";
}
}
?>
 </body>
 </html>