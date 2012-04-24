<?php
session_start();
if(!session_is_registered(myusername)){
header("location:/login/mainlogin.php");
}
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
    <?php
	// I guarantee this code does not work!
	$recentcbquery= "SELECT  c.Email,
   		c.Title,
   		c.CatName,
   		c.LastUpdate,
   		c.Visibility,   
	  	w.CorkboardTitle,
                        u.UserName
 	FROM  Corkboard c, Follow f, Watch w
	LEFT JOIN  Follow f
		ON  f.Follower = 'user1@gt.edu'
	LEFT JOIN  Watch w
		ON  w.User = 'user1@gt.edu'
            LEFT JOIN  User u ON
                   u.Email = f.Followee
	WHERE  (
         	 c.Email = 'user1@gt.edu'
         	OR  c.Email = f.Followee
         	OR  c.Title = w.CorkboardTitle
   		)
 ORDER BY  LastUpdate DESC
	LIMIT  4";
	
	echo mysql_query($recentcbquery); 
	
	?>
    
    <br />
    <br />
    My Corkboards
    
    <?php
	// this code does not work either!
	$usercbquery= "SELECT  Title, CatName, LastUpdate FROM  Corkboard WHERE  Email = $name ORDER BY 		
	LastUpdate DESC LIMIT  4";
	
	echo mysql_query($usercbquery);
    ?>
    <br />
    <br />
   <form name="Pushpin Search" action="home.php" method="get">
    <input type="text" name="p" class="textfield_effect" />
    <input type="submit" name="Submit" value="Pushpin Search" />
   
	
   
	</body>
</html>
