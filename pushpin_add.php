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
		<title>CorkboardIT | Add Pushpin</title>
	</head>
	<body>
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
		
		<h2 align="center"><?php echo "Add Pushpin to Corkboard ".$_POST['title'].": "; ?></h2>
		<?php 		
			echo "<form align='left' method='post' action='createpushpin.php?title=".$_POST['title']."'>";		
			echo "<input type='hidden' name='email' value=".$_POST['email']; 
		?>
		<table align="center">
			<tr>
				<td>
					URL:
				</td>
				<td>
					<input type="text" name="pushpin_url" class="textInput1"/>
				</td>
			</tr>
			<tr>
				<td>
					Description:
				</td>
				<td>
					<input type="text" name="pushpin_description" class="textInput1"/>
				</td>
			</tr>
			<tr>
				<td>
					Tags (Optional):
				</td>
				<td>
					<input type="text" name="pushpin_tags" class="textInput1" />
				</td>
			</tr>
			<tr>
			<td></td>
				<td>
					<input type="submit" name="Submit" value="Add" >
				</td>
				</tr>
		</table>
		</form>
	</body>
</html>

