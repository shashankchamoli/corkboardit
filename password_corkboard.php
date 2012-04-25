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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL=StyleSheet HREF="layout.css" TYPE="text/css" MEDIA=screen>
		<title>Viewing Private Corkboard</title>
	</head>
	<body>
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
		
		<h2 align="center">Private Corkboard Password</h2>
		<p align="center">The Corkboard you wish to open is private.
		Please enter password for Corkboard: <?php echo $_GET['title'] ?></p>
		<form align="left" method="post" action="checkpassword.php">
		<?php
			echo "<input type='hidden' name='email' value=".$_GET['email']." />";
			echo "<input type='hidden' name='title' value=".$_GET['title']." />";
		?>		
		<table align="center">
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type="password" name="cork_pass" />
				</td>
			</tr>
			<td></td>
				<td>
					<button>Cancel</button>	<input type="submit" name="Submit" value="Submit" >
				</td>
		</table>		
	</body>
</html>

