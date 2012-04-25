<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL=StyleSheet HREF="layout.css" TYPE="text/css" MEDIA=screen>
		<title>CorkBoardIT | Search Pushpins</title>
	</head>
	<body>
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
    <?php
	$pp = @$_GET['p'] ;
	$trimmedPP = trim($pp); //trim whitespace from the stored variable
	
	$limit=10;
	
	if(isset($pp)){
	 include 'config.php';
	 include 'opendb.php';
	$query = "SELECT p.Description,p.CorkboardTitle,p.Email,p.Link FROM  PushPin p WHERE p.Description='$trimmedPP' OR p.Tag='$trimmedPP'";
	echo $query;
 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }


  $result = mysql_query($query);

// display what the person searched for
echo "<br>";
echo "You searched for: &quot;" . $pp . "&quot; returned" .$numrows." result(s).";
echo "<br>";

// begin to show results set
echo "<table border=1 align='center'><tr class='odd'><td>Pushpin Description</td><td>Corkboard</td><td>Owner</td></tr>";
 	
 	while ($row = mysql_fetch_assoc($result)) {      
        echo "<tr>";
            echo "<td align='center'><a href='pushpin_view.php?username=".$row['Email']."&title=".$row['CorkboardTitle']."'>".$row['Description']."</a></td>";
            echo "<td align='center'>".$row['CorkboardTitle']."</td>";
            echo "<td align='center'>".$row['Email']."</td>";                     
	    echo "</tr>";
     } 
echo "</table>";

echo"<br/>";
echo"<br/>";
	} else
	{
		echo "Unable to perform search. Parameters missing.";
	}
	
    ?>
	</body>
</html>

