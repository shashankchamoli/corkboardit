<?php
session_start();
if(!session_is_registered(myusername)){
header("location:login/mainlogin.php");
}
$host="academic-mysql.cc.gatech.edu"; // Host name 
$username="cs4400_group29"; // Mysql username 
$password="56wVseal"; // Mysql password 
$db_name="cs4400_group29"; // Database name 
$tbl_name="User"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$email = $_POST['email'];
$title = $_GET['title'];
$url = $_POST['pushpin_url'];
$description = $_POST['pushpin_description'];
$tags = $_POST['pushpin_tags'];

$split = explode(',', $tags);

$checkquery = sprintf("
SELECT * 
FROM PushPin
WHERE Link = '%s' 
WHERE Email = '%s'
AND Title = '%s'
",
mysql_real_escape_string($url),
mysql_real_escape_string($email),
mysql_real_escape_string($title));
$result = mysql_query($checkquery);

if (mysql_num_rows($result) == 0) {

foreach ($split as &$tag) {
	$addquery = sprintf("
	INSERT INTO PushPin 
	VALUES ('%s', '%s', '%s', '%s', '%s', CURDATE())
	",
	mysql_real_escape_string($email),
	mysql_real_escape_string($url),
	mysql_real_escape_string($title),
	mysql_real_escape_string($tag),
	mysql_real_escape_string($description)
	);
	$result = mysql_query($addquery);
}
}
header("location:pushpin_view?email=".urlencode($email)."&title=".urlencode($title)."&link=".urlencode($url));

?>

