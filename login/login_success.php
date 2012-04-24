 <? 
session_start();
if(session_is_registered(myusername)){
header("location:../home.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>
