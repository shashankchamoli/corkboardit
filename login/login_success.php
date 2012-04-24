<? 
session_start();
if(session_is_registered(myusername)){
header("location:../home.php");
}else{
header("location:mainlogin.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>
