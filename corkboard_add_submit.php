<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL=StyleSheet HREF="layout.css" TYPE="text/css" MEDIA=screen>
		<title>CorkBoartIT | Add CorkBoard</title>
	</head>
	<body>
		
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
		
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


if (!isset($_SESSION['myusername'])) 
{
	echo "Session variable expired. Please log in again.";
} elseif(empty($_POST['cork_title']))
{
	echo "Corkboard title is required. Please enter it.";
} elseif(($_POST['private']=='Y') and (empty($_POST['cork_pass']))) {
	echo "Please enter the required password field for a private corkboard. Or change to Public";
} else {
$user = $_SESSION['myusername'];
$title = $_POST['cork_title'];
$cat = $_POST['cork_catagory'];
$vis = $_POST['private'];

//Test data.. ignore.
//$user ='shashank@gt.edu';
//$title = 'TestBoard';
//$cat = 'Other';
//$vis = 'N';

$query = '';
	if($vis == 'Y')
	{
		$corkPass = $_POST['cork_pass'];
		$query = "INSERT INTO  Corkboard (Email, Title, CatName, LastUpdate, Visibility, Password) VALUES  (\"".$user."\", \"".$title."\", \"".$cat."\", CURDATE(), \"Private\", \"".$corkPass."\")";
	} else 
	{		
		$query = "INSERT INTO  Corkboard (Email, Title, CatName, LastUpdate, Visibility, Password) VALUES  (\"".$user."\", \"".$title."\", \"".$cat."\", CURDATE(), \"Public\", NULL)";		
	}
	echo $query;
	echo "<br><br>";
	$result= mysql_query($query);
	echo $result;
	
//	while ($row = mysql_fetch_assoc($result)) {      
//        print_r($row);
//        echo $row;
//    }
}
?>
		
		
	</body>
</html>

