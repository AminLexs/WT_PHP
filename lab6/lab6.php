<?php
  $colors = array('зеленый' => '#090', 'синий' => '#009', 'красный' => '#900');
  $sizes = array('10pt'=>'10pt','12pt'=>'12pt','14pt'=>'14pt','16pt'=>'16pt','18pt'=>'18pt','24pt'=>'24pt','32pt'=>'32pt');
  $bgcolor = '#fff';//цвета по умолчанию
  $colorzag = '#000';
  $colortext= '#000';
  $sizezag = '24pt';
  $sizetext = '10pt';
//ФОН
  if ( isset($_COOKIE['bgcolor']) && in_array($_COOKIE['bgcolor'], $colors) )
  {
      $bgcolor = $_COOKIE['bgcolor'];
  }
  if ( isset($_GET['bgcolor']) && in_array($_GET['bgcolor'], $colors) )
  {
     $bgcolor = $_GET['bgcolor']; 
     setcookie('bgcolor', $bgcolor); 
  }
  
//ЗАГОЛОВОК  
    if ( isset($_COOKIE['colorzag']) && in_array($_COOKIE['colorzag'], $colors) )
  {
      $colorzag = $_COOKIE['colorzag'];
  }
  if ( isset($_GET['colorzag']) && in_array($_GET['colorzag'], $colors) )
  {
     $colorzag = $_GET['colorzag']; 
     setcookie('colorzag', $colorzag); 
  }
  
    if ( isset($_COOKIE['sizezag']) && in_array($_COOKIE['sizezag'], $sizes) )
  {
      $sizezag = $_COOKIE['sizezag'];
  }
  if ( isset($_GET['sizezag']) && in_array($_GET['sizezag'], $sizes) )
  {
     $sizezag = $_GET['sizezag']; 
     setcookie('sizezag', $sizezag); 
  }  
  
//ОСНОВНОЙ ТЕКСТ  
      if ( isset($_COOKIE['colortext']) && in_array($_COOKIE['colortext'], $colors) )
  {
      $colortext = $_COOKIE['colortext'];
  }
  if ( isset($_GET['colortext']) && in_array($_GET['colortext'], $colors) )
  {
     $colortext = $_GET['colortext']; 
     setcookie('colortext', $colortext); 
  }
  
      if ( isset($_COOKIE['sizetext']) && in_array($_COOKIE['sizetext'], $sizes) )
  {
      $sizetext = $_COOKIE['sizetext'];
  }
  if ( isset($_GET['sizetext']) && in_array($_GET['sizetext'], $sizes) )
  {
     $sizetext = $_GET['sizetext']; 
     setcookie('sizetext', $sizetext); 
  }
?>
 
<html>  
  <head> 
    <title>MyCookie</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      body { background: <?php echo $bgcolor; ?>; }
	  h1 {
		font-size: <?php echo $sizezag; ?>;
			color:<?php echo $colorzag; ?>;
	} 
		p {
		color:<?php echo $colortext; ?>;
		font-size: <?php echo $sizetext; ?>;
	}
    </style>
  </head>  
  <body>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <table>
        <tr>
          <td>Желаемый цвет фона:</td>
          <td>
            <select name="bgcolor">
<?php
 
  foreach($colors as $key => $value)
  {
    $selected_attr = ($bgcolor == $value) ? ' selected="selected"' : '';
    echo '              <option value="' . $value . '"' . $selected_attr .'>' . $key . '</option>'. "\n";
  }
 
?>
            </select>
          </td>
          <td>Желаемый цвет заголовка:</td>
          <td>
            <select name="colorzag">
<?php
 
  foreach($colors as $key => $value)
  {
    $selected_attr = ($colorzag == $value) ? ' selected="selected"' : '';
    echo '              <option value="' . $value . '"' . $selected_attr .'>' . $key . '</option>'. "\n";
  }
 
?>
            </select>
          </td>		 
          <td>Желаемый цвет основного текста:</td>
          <td>
            <select name="colortext">
<?php
 
  foreach($colors as $key => $value)
  {
    $selected_attr = ($colortext == $value) ? ' selected="selected"' : '';
    echo '              <option value="' . $value . '"' . $selected_attr .'>' . $key . '</option>'. "\n";
  }
 
?>
            </select>
          </td>				  
        </tr>
		<tr>
		  <td>Желаемый размер заголовка:</td>
          <td>
            <select name="sizezag">
<?php
 
  foreach($sizes as $key => $value)
  {
    $selected_attr = ($sizezag == $value) ? ' selected="selected"' : '';
    echo '              <option value="' . $value . '"' . $selected_attr .'>' . $key . '</option>'. "\n";
  }
 
?>
            </select>
          </td>		 
          <td>Желаемый размер основного текста:</td>
          <td>
            <select name="sizetext">
<?php
 
  foreach($sizes as $key => $value)
  {
    $selected_attr = ($sizetext == $value) ? ' selected="selected"' : '';
    echo '              <option value="' . $value . '"' . $selected_attr .'>' . $key . '</option>'. "\n";
  }
 
?>
            </select>
          </td>				  
        </tr>

	
      </table>
      <input type="submit" value="Выбрать" />
    </form>
	<h1>Заголовок</h1>
	<p>Это основной текст</p>
  </body>
</html>