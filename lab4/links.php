
<?php

	$htmltext='';
	$regexp1 = "/<[h][0-6]/ui";
	$regexp2 = "/<i|<em/ui";
	$regexp3 = "/<b|<strong/ui";
	$regexp3_1 = "/<body.*?>?/ui";
	$fp = fopen('html.txt','r');
	while(!feof($fp)){
		$bufstr=fgets($fp,999);
		if (preg_match($regexp1, $bufstr, $match)) 
			$bufstr=preg_replace($regexp1,"$match[0] style=\"color:blue\"",$bufstr);
		if (preg_match($regexp2, $bufstr, $match)) 
			$bufstr=preg_replace($regexp2,"$match[0] style=\"color:green\"",$bufstr);
		if (!preg_match($regexp3_1,$bufstr,$matchbuf))
		{	
		if (preg_match($regexp3, $bufstr, $match))
		{	
																																																																		//	$str=substr($match[0], 0, -1);
				$bufstr=preg_replace($regexp3,"$match[0]  style=\"color:red\"",$bufstr);
		}
		}                                               	
	$htmltext.= $bufstr;
	}
echo $htmltext;

fclose($fp);

?>

 </body>
</html>