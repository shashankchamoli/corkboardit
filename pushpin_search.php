<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CorkBoardIT | Search Pushpins</title>
	</head>
	<body>
    <?php
	$pp = @$_GET['p'] ;
	$trimmedPP = trim($pp); //trim whitespace from the stored variable
	
	$limit=10;
	
	if(isset($pp)){
	 include 'config.php';
	 include 'opendb.php';
	
	$query = "select * from PUSHPIN where $trimmedPP "; 

 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }


  $result = mysql_query($query);

// display what the person searched for
echo "<p>You searched for: &quot;" . $pp . "&quot;</p>";

// begin to show results set
echo "Your search returned ".$numrows." result(s). "."<br/>";
$count = 1 + $s ;
echo"<br/>";
echo"<br/>";
	}
	
    ?>
	</body>
</html>

