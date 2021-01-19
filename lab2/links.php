<html>
 <head>
	<meta charset="utf-8" />
	<meta name="author" content="Федченко Алексей">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="style.css" rel="stylesheet" type="text/css">
  <title>HTML5</title>
 </head>
 <body>
 <nav>
	<?php
		$navs = array('О компании', 'Услуги', 'Прайс', 'Контакты');
		if(isset($_GET['id']))
			$id = $_GET['id'];
		else 
		$id = 0;
	?>    
<nav>
                    
	<?php
		foreach($navs as $key => $nav):
	?>                           
		<a href="links.php?id=<?=$key?>"  <?php if($key == $id) echo 'class="col__nav2"'; else echo 'class="col__nav"'?>><?=$nav?></a>
                            
	<?php        
		endforeach;
	?>
</nav>
  <form action="index.php" method="POST">
 <p>Количество строк: <input type="text" name="kolvo" /></p>
 <p><input type="submit" /></p>
</form>
 </body>
</html>