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

$cbquery = sprintf("
	SELECT u.UserName, c.CatName, c.LastUpdate
        FROM Corkboard c
        LEFT JOIN User AS u ON u.Email = '%s'
        WHERE c.Title = '%s'
        LIMIT 1
	",
	mysql_real_escape_string($_GET['email']),
	mysql_real_escape_string($_GET['title'])
);

$result = mysql_query($cbquery);
$row = mysql_fetch_assoc($result);
$cbuser = $row['UserName'];
$cbcat = $row['CatName'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL=StyleSheet HREF="layout.css" TYPE="text/css" MEDIA=screen>
		<title><?php echo $_GET["title"]?></title>
	</head>
	<body>
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
		
		
		<table align="Left">
			<tr>
				<td><h2><?php echo $_GET["title"]?></h2></td>
				<td><button>Watch</button></td>
			</tr>
			<tr>
				<td>Owner: <?php echo $cbuser ?></td>
				<td><button>Follow</button></td>
			</tr>
			<tr>
				<td>Category:</td>
				<td><?php echo $cbcat ?></td>
			</tr>
			<tr>
				<td>This board has <?php echo "## " ?>watchers</td>
			</trl>
		<tr>
		
		<td><h3>Pushpins</h3></td><td><button>Add Pushpin</button></td>
		</tr>
		<?php
			$cbtnquery = sprintf("
				SELECT Link
       				FROM PushPin
       				WHERE Email = '%s'
				AND CorkboardTitle = '%s'	
				",
				mysql_real_escape_string($_GET['email']),
				mysql_real_escape_string($_GET['title'])
			);
			$result = mysql_query($cbtnquery);
			while ($row = mysql_fetch_assoc($result)) {
				$link = $row['Link'];
				echo "<td><img class='thumbnail' src='$link'/></td>";
			}
		?>			
		</table>
		
		
		
		
    
	</body>
</html>
