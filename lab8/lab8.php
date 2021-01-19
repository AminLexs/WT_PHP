	<html>
 <head>
	<meta charset="utf-8" />
	<meta name="author" content="Федченко Алексей">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css">
  <title>LAB8</title>
 </head>
 <body>


<?php

$operating_systems = array(    
	'Windows'     => '0',
	'Linux'      => '0',
    'Android'  => '0',
    'OS X'    => '0',
    'iOS'     => '0'
    );
	$operating_system = '';
    $os_version = '';
	$fd = fopen("stat.txt", 'r') or die("не удалось открыть файл");
while(!feof($fd))
{		
	$keywords = preg_split("/[=]+/", fgets($fd));
	$operating_systems[$keywords[0]]=$keywords[1];
	
}
fclose($fd);

	foreach ($operating_systems as $key => $val) {	
        if (preg_match("|".preg_quote($key).".*?([a-zA-Z]?[0-9\.]+)|i", $_SERVER['HTTP_USER_AGENT'], $match)) {
           $operating_system = $key;
           $os_version = $match[1];
        }
    }

echo 'Ваша операционная система: '.$operating_system.' '.$os_version;
if(!isset($_GET['do'])||empty($_GET['do'])||$_GET['do']<>'GetStat'){
$count=intval($operating_systems[$operating_system])+1;
$operating_systems[$operating_system]="$count".PHP_EOL;
	$fd = fopen("stat.txt", 'w') or die("не удалось открыть файл");
	$str='';
	foreach ($operating_systems as $key => $val) {
		$str.=$key.'='.$val;
	}
	fwrite($fd, $str);	
	fclose($fd);
}else {
	arsort($operating_systems);
	$table='<table>';
	foreach ($operating_systems as $key => $val) {
	$table.='<tr><td>'.$key.'</td>'.'<td>'.$val.'</td></tr>';
	}
	$table.='</table>';
	echo $table;
}
?>
<form action="lab8.php?do=GetStat" method="POST">
	<p><input type="submit" value="Показать статистику" /></p>
 </body>
 </html>