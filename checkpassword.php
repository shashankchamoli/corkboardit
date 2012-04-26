<?php
session_start();
if(!session_is_registered(myusername)){
header("location:login/mainlogin.php");
}
$host="academic-mysql.cc.gatech.edu"; // Host name 
$username="cs4400_group29"; // Mysql username 
$password="56wVseal"; // Mysql password 
$db_name="cs4400_group29"; // Database name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$email=$_POST['email']; 
$title=$_POST['title'];
$corkpass=$_POST['cork_pass'];

echo $email."<br />";

echo $title."<br />";

echo $corkpass."<br />";

$sql=sprintf("
SELECT *
FROM Corkboard
WHERE Email = '%s'
AND Title = '%s'
AND Password = '%s'",
mysql_real_escape_string($email),
mysql_real_escape_string($title),
mysql_real_escape_string($corkpass)
);

$result=mysql_query($sql);

$count=mysql_num_rows($result);

while ($row = mysql_fetch_assoc($result)) {
	echo $row['Password']."<br />";
}

if($count==1){
	header("location:corkboard_view.php?email=".$email."&title=".$title);
}
else {
	header("location:home.php");
}
?>
</body>
</html>
