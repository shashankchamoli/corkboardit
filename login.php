<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CorkBoartIT | Login Page</title>
</head>

<body>


<form name="login" action="login.php" method="get">
  <p>
  <label> Email: </label>
  <input type="text" name="t" class="textfield_effect" />
  <br>
  <br>
  <label> Password: </label>
  <input type="text" name="q" class="textfield_effect" />
  </p>
  <p>
    <input type="submit" name="Submit" value="Login" />
  </p>
</form>

<p><?php
// get search variable
  $var = @$_GET['t'] ;
  $trimmed = trim($var); //trim whitespace from the stored variable
  $pass = @$_GET['q'] ;
  $trimmedPass = trim($pass);

 	if(isset($var)){
	 include 'config.php';
	 include 'opendb.php';
	 
	 $query = "SELECT * from User where EMAIL == $trimmed and PIN == $trimmedPass";
	 $result = mysql_query($query);
	 
	 if (!$result){
		 
		 echo "Login Failed";

	 }
	else{
		header(".../home.php");	 		
		}
	}
	 
	
	 
?></p>
</body>

</html>
