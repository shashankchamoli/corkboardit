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


$user = $_SESSION['myusername'];
$link = $_GET['Link'];
$text = $_GET['pushpin_comment'];
$cork_title = $_GET['CorkboardTitle'];
$owner = $_GET['Owner'];

$sql="INSERT INTO Comment (Username, DateAndTime, PushpinLink, Text, CorkboardTitle, OwnerEmail)
						VALUES(\"".$user."\", CURDATE(), \"".$link."\", \"".$text."\", \"".$cork_title."\", \"".$owner."\"";
echo $sql;						

$result = mysql_query($sql);
echo $result;
$row = mysql_fetch_array($result);
print_r($row);



?>
