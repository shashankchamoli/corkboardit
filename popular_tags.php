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
		<title>CorkBoardIT | Popular Tags</title>
	</head>
	<body>
    <img src="images/logo_small.png" alt="logo" />
		<br><br>
    <?php
	$tagquery= "SELECT Tag, COUNT(Link), COUNT(DISTINCT CorkboardTitle) From PushPin
GROUP BY Tag
ORDER BY COUNT(Link) DESC
 LIMIT 5";
	echo "<h3 align='center'>Popular Tags</h3>";
 	$result = mysql_query($tagquery); 

 	echo "<table border=1 align='center'><tr class='odd'><td>Tag</td><td>Pushpins</td><td>Unique Corkboards</td></tr>";
 	
 	while ($row = mysql_fetch_assoc($result)) {      
        echo "<tr>";
            echo "<td align='center'><a>".$row['Tag']."</a></td>";
            echo "<td align='center'>".$row['COUNT(Link)']."</td>";
            echo "<td align='center'>".$row['COUNT(DISTINCT CorkboardTitle)']."</td>";                     
	    echo "</tr>";
     } 
 	echo "</table>";
 	
 	
	?>
	</body>
</html>

