<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CorkBoardIT | Popular Tags</title>
	</head>
	<body>
    
    <?php
	$tagquery= "SELECT Tag, COUNT(Link), COUNT(DISTINCT CorkboardTitle) From PushPin
GROUP BY Tag
ORDER BY COUNT(Link) DESC
 LIMIT 5";
 	echo $tagquery; 
	

	?>
	</body>
</html>

