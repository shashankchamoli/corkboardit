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
		<title>CorkBoartIT | Home</title>
	</head>
	<body>
    <img src="images/logo_small.png" alt="logo" />
		<br><br>
    Homepage for 
	<?
          echo $_SESSION['myusername'];
        ?>
    <br />
    <br />
    <form name="Popular Tags" action ="popular_tags.php" method="get">
   	<input type="submit" name="Submit" value="Popular Tags" />
    </form>
    
    <br />    
    
    Recent Corkboard Updates
    <br />
    <table border='1'>
    <tr>
	<td>User</td>
	<td>Title</td>
	<td>Category</td>
	<td>Last Updated</td>
	<td>Visibility</td>
    </tr>
    <?php
	$recentcbquery = sprintf("
	SELECT DISTINCT c.Title, c.CatName, c.LastUpdate, c.Visibility, u.UserName, c.Email, c.Visibility
	FROM Corkboard c
	LEFT JOIN User u ON u.Email = c.Email
	LEFT JOIN Follow f ON f.Follower = '%s'
	LEFT JOIN Watch w ON w.User = '%s'
	WHERE u.Email = '%s'
	OR u.Email = f.Followee
	OR u.Email = w.CorkboardOwner	
	ORDER BY c.LastUpdate DESC
	LIMIT 4
	",
        mysql_real_escape_string($_SESSION['myusername']),
	mysql_real_escape_string($_SESSION['myusername']),
	mysql_real_escape_string($_SESSION['myusername']));
	
        $result = mysql_query($recentcbquery); 
 	
        while ($row = mysql_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['UserName']."</td>";
	    $pinlink = "corkboard_view.php?email=".$row['Email']."&title=".urlencode($row['Title']);
	    if ($row['Visibility'] == "Private") {
		echo "<td><a href='password_corkboard.php?email=".$row['Email']."&title=".urlencode($row['Title'])."'>".$row['Title']."</a></td>";
	    } else {
	        echo "<td><a href=".$pinlink.">".$row['Title']."</a></td>";
	    }
            echo "<td>".$row['CatName']."</td>";
            echo "<td>".$row['LastUpdate']."</td>";
	    echo "<td>".$row['Visibility']."</td>";
	    echo "</tr>";
        } 	

	?>
    </table>    

    <br />
    <br />
    <form name="Add Corkboard" action="corkboard_add.php" method="get">

    My Corkboards &nbsp;&nbsp;<input type="submit" name="Submit" value="Add Corkboard" />
   </form>
    <br />
    <table border='1'>
    <tr>
	<td>Title</td>
	<td>Category</td>
	<td>Last Updated</td>
    </tr>
    <?php
	// this code does not work either!
	$usercbquery= sprintf("
	SELECT  c.Title, c.CatName, c.LastUpdate, u.UserName 
	FROM  Corkboard c
        LEFT JOIN  User u
        ON u.Email = c.Email
	WHERE  c.Email = '%s'
	ORDER BY c.LastUpdate 
	DESC 
	LIMIT  4",
	mysql_real_escape_string($_SESSION['myusername']));

	$result = mysql_query($usercbquery); 
 	
        while ($row = mysql_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><a href='corkboard_view.php?email=".$_SESSION['myusername']."&title=".$row['Title']."'>".$row['Title']."</a></td>";
	    echo "<td>".$row['CatName']."</td>";
            echo "<td>".$row['LastUpdate']."</td>";
	    echo "</tr>";
        } 
    ?>
    </table>
    <br />
    <br />
   <form name="Pushpin Search" action="pushpin_search.php" method="get">
    <input type="text" name="p" class="textfield_effect" />
    <input type="submit" name="Submit" value="Pushpin Search" />
   </form
	
   
	</body>
</html>
