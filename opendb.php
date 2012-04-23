<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Open Database</title>
</head>


<body>

<?php
//open database file
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error Connecting to Database');
mysql_select_db($dbname);
?> 
</body>
</html>
