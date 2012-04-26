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

echo $_SESSION['myusername'];
echo "<br />";
echo $_POST['email'];

$followquery = sprintf("
INSERT INTO Follow
VALUES ('%s', '%s')
",
mysql_real_escape_string($_SESSION['myusername']),
mysql_real_escape_string($_POST['email'])
);
mysql_query($followquery);

header("location:".$_POST['back']);

?>

