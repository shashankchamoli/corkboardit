<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL=StyleSheet HREF="layout.css" TYPE="text/css" MEDIA=screen>
		<title>Pushpin</title>
	</head>
	<body>
	
		<?php
		session_start();
		
		include 'config.php';
		include 'opendb.php';
		
		if(!session_is_registered(myusername)){
			header("location:login/mainlogin.php");
		}
		
		$host="academic-mysql.cc.gatech.edu"; // Host name 
		$username="cs4400_group29"; // Mysql username 
		$password="56wVseal"; // Mysql password 
		$db_name="cs4400_group29"; // Database name 
		$tbl_name="User"; // Table name
		
		// Connect to server and select database.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");	
		
		// link, title, email
		?>
		
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
		
		<h2 align="center"><?php 
			$pushtitle = mysql_query("SELECT DISTINCT Description FROM PushPin
				WHERE Link='' AND Email='' AND CorkboardTitle=''");
			echo "$pushtitle on "
		?>
		
		<a href="corkboard_view.php"><?php echo "Corkboard_Title" ?></a></h2>

		<table align="center">
			<tr>
				<td>Pinned by <?php echo "UserName" ?>&nbsp;<button>Follow</button></td>
			</tr>
			<tr>
				<td>On: <?php
					$pushdate = mysql_query("SELECT DISTINCT DateAndTime FROM PushPin WHERE Link = '%key'");
					echo $pushdate
				?></td>
			</tr>
		</table>
		<hr>
		
		<table align="center">
			<tr>
			<td>
				<a href="Pushpin Image">
					<img class="pushpinMain" src=php <?php $pinimg ?>/>
				</a>
			</td>
			</tr>
			<tr>
				<td>
					<a><?php
					$pushdesc = mysql_query("SELECT DISTINCT Description FROM PushPin
						WHERE Link='' AND Email='' AND CorkboardTitle=''");
						echo $pushdesc
					?></a>
				</td>
			</tr>
			<tr>
				<td>
					<a>Tags: <?php 
					$tag = mysql_query("SELECT Tag FROM PushPin
					WHERE Email='' AND Link='' AND CorkboardTitle=''");
					echo $tag
					?></a>
				</td>
			</tr>
		</table>
		<hr>
		<table align="center">
			<tr>
				<td>
					<a><?php echo "List of usernames goes here.." ?> like this.</a>
				</td>
			</tr>
			<tr align="center">
				<td>
					<button>Like</button>
				</td>
			</tr>
		</table>
		<hr>
		<table align="center" width="60%">
			<tr>
				<td>
					<h3>Comments</h3>
				</td>
			</tr>
			<tr>
				<form>				<td>
					Your Comment:
				</td>
				<td>
					<input class="textInput1" type="text" name="pushpin_comment"/>
				</td>
				<td>
					<input type="Submit" value="Post" style="height:50px"/>
				</td>
				</form>
			</tr>
			<tr>
				<td><hr></td><td><hr></td><td><hr></td>
			</tr>
			<?php
				for ($i=1; $i<=5; $i++)
				{
					echo "<tr><td>";
					echo "UserName". $i .":";
					echo "</td><td>";
					echo "User Comment goes here";
					echo "</td><td>";
					echo "On: DATE";
					echo "</td></tr>";
					echo "<tr><td><hr></td><td><hr></td><td><hr></td></tr>";
										
				}
			
			 ?>
		</table>
		
		
	</body>
</html>
