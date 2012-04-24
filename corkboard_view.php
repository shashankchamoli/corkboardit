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
	SELECT u.UserName, c.Title, c.CatName, c.LastUpdate, t.Thumbnail
	FROM Corkboard c
	LEFT JOIN User AS u ON u.Email = c.Email
	LEFT JOIN (

	SELECT Link AS Thumbnail, CorkboardTitle AS Title
	FROM PushPin
	) AS t ON t.Title = c.Title
	WHERE c.Email = '%s'
	AND c.Title = '%s'
	AND (
	Visibility = 'public'
	OR (
	Visibility = 'private'
	AND PASSWORD = 'password'
	)
	)
	",
	mysql_real_escape_string($_GET['username']),
	mysql_real_escape_string($_GET['title'])
);

$result = mysql_query($cbquery);
while ($row = mysql_fetch_assoc($result)) {

} 


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
				<td>Owner: <?php echo "Owner Name" ?></td>
				<td><button>Follow</button></td>
			</tr>
			<tr>
				<td>Category:</td>
				<td><?php echo "Cars" ?></td>
			</tr>
			<tr>
				<td>This board has <?php echo "## " ?>watchers</td>
			</trl>
		<tr>
		
		<td><h3>Pushpins</h3></td><td><button>Add Pushpin</button></td>
		</tr>
			<tr>
				<td><img class="thumbnail" src="http://pictures.topspeed.com/IMG/crop/201103/2012-lamborghini-aventado-14_460x0w.jpg"/></td>
				<td><img class="thumbnail" src="http://www.likecool.com/Car/Concept/Lamborghini%20Ankonian%20Concept%20by%20Slavche%20Tanevsky/Lamborghini-Ankonian-Concept-by-Slavche-Tanevsky_1.jpg" /></td>
				<td><img class="thumbnail" src="http://appeqadwin.com/wp-content/uploads/2011/10/Porsche-Carrera-GT.jpg"</td>
				<td><img class="thumbnail" src="http://www.dreamroad.us/wp-content/uploads/2011/05/Porsche-356-Silver.jpg"/></td>
			</tr>
			<tr>
				<td><img class="thumbnail" src="http://pictures.topspeed.com/IMG/crop/201103/2012-lamborghini-aventado-14_460x0w.jpg"/></td>
				<td><img class="thumbnail" src="http://www.likecool.com/Car/Concept/Lamborghini%20Ankonian%20Concept%20by%20Slavche%20Tanevsky/Lamborghini-Ankonian-Concept-by-Slavche-Tanevsky_1.jpg" /></td>
				<td><img class="thumbnail" src="http://appeqadwin.com/wp-content/uploads/2011/10/Porsche-Carrera-GT.jpg"</td>
				<td><img class="thumbnail" src="http://www.dreamroad.us/wp-content/uploads/2011/05/Porsche-356-Silver.jpg"/></td>
			</tr>
			<tr>
				<td><img class="thumbnail" src="http://pictures.topspeed.com/IMG/crop/201103/2012-lamborghini-aventado-14_460x0w.jpg"/></td>
				<td><img class="thumbnail" src="http://www.likecool.com/Car/Concept/Lamborghini%20Ankonian%20Concept%20by%20Slavche%20Tanevsky/Lamborghini-Ankonian-Concept-by-Slavche-Tanevsky_1.jpg" /></td>
				<td><img class="thumbnail" src="http://appeqadwin.com/wp-content/uploads/2011/10/Porsche-Carrera-GT.jpg"</td>
				<td><img class="thumbnail" src="http://www.dreamroad.us/wp-content/uploads/2011/05/Porsche-356-Silver.jpg"/></td>
			</tr>
			<tr>
				<td><img class="thumbnail" src="http://pictures.topspeed.com/IMG/crop/201103/2012-lamborghini-aventado-14_460x0w.jpg"/></td>
				<td><img class="thumbnail" src="http://www.likecool.com/Car/Concept/Lamborghini%20Ankonian%20Concept%20by%20Slavche%20Tanevsky/Lamborghini-Ankonian-Concept-by-Slavche-Tanevsky_1.jpg" /></td>
				<td><img class="thumbnail" src="http://appeqadwin.com/wp-content/uploads/2011/10/Porsche-Carrera-GT.jpg"</td>
				<td><img class="thumbnail" src="http://www.dreamroad.us/wp-content/uploads/2011/05/Porsche-356-Silver.jpg"/></td>
			</tr>
		</table>
		
		
		
		
    
	</body>
</html>
