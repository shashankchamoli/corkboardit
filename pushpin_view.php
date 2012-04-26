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
		
		<h2 align="center">Corkboard: <?php 
		
		$email = $_GET['email'];
		$corkTitle = $_GET['title'];
		$link = $_GET['link'];


			
		$corklink = "corkboard_view.php?email=".$email."&title=".urlencode($corkTitle)."";
		$visquery = "SELECT Visibility FROM Corkboard WHERE Title=\"".$corkTitle."\" AND Email\"".$email."\"";
		$result = mysql_query($tempquery);
		$row = mysql_fetch_assoc($result);
		
		if ($row['Visibility'] == "Private") {
			echo "<td><a href='password_corkboard.php?email=".$email."&title=".urlencode($corkTitle)."'>".$corkTitle."</a></td>";
			} else {
				echo "<td><a href='corkboard_view.php?email=".$email."&title=".urlencode($corkTitle)."'>".$corkTitle."</a></td>";
			}
			
			$userquery = "SELECT UserName FROM User WHERE Email=\"".$email."\"";
			
			$result = mysql_query($userquery);
			$row = mysql_fetch_assoc($result);
			
			$user = $row['UserName'];

		?>
		
		
		

		<table align="center">
			<tr>
				<td>Pinned by <?php echo $user; ?>&nbsp;<button>Follow</button></td>
			</tr>
			<tr>
				<td>On: <?php
				
						$dateQuery = "SELECT DateAndTime, Description FROM PushPin WHERE Link=\"".$link."\" AND Email=\"".$email."\" AND CorkboardTitle=\"".$corkTitle."\"";
						$result = mysql_query($dateQuery);
						$row = mysql_fetch_assoc($result);
						$dateAndTime = $row['DateAndTime'];
						$description = $row['Description'];
				
					echo $dateAndTime;
				?></td>
			</tr>
		</table>
		<hr>
		
		<table align="center">
			<tr>
			<td>
				<a href="<?php echo $link;?>">
					<img class="pushpinMain" src="<?php echo $link;?>"/>
				</a>
			</td>
			</tr>
			<tr>
				<td>
					<a><?php
						echo "Description: ".$description."";
					?></a>
				</td>
			</tr>
			<tr>
				<td>
					<a>Tags: <?php 
					$tags = mysql_query("SELECT Tag FROM PushPin WHERE Link=\"".$link."\" AND Email=\"".$email."\" AND CorkboardTitle=\"".$corkTitle."\"");
					$row = mysql_fetch_assoc($tags);
					foreach($row as &$tag)
					{
						echo "".$tag.", ";
					}
					?></a>
				</td>
			</tr>
		</table>
		<hr>
		<table align="center">
			<tr>
				<td>
					<?php
					
					$likequery = "SELECT UserLiked FROM Likes WHERE User=\"".$email."\" AND PushpinLink=\"".$link."\"";
					$result = mysql_query($likequery);
					while ($row = mysql_fetch_assoc($result)) {
						echo "".$row['UserLiked'].", ";
					}
					
					
					
					
					  ?> like(s) this.
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
				<form action ="make_comment.php" method="get">				<td>
					Your Comment:
					<input type="hidden" name="Link" value=<?php echo $link; ?> >
				<input type="hidden" name="CorkboardTitle" value=<?php echo urlencode($corkTitle); ?>/>
				<input type="hidden" name="Owner" value=<?php echo $email; ?>/>
				<input type="hidden" name="back" value=<?php echo $_SERVER['REQUEST_URI']; ?>/>
				</td>
				<td>
					<input class="textInput1" type="text" name="pushpin_comment"/>
				</td>
				<td>
					<input type="Submit" value="Post" style="height:50px"/>
				</td>
				
				</form>
				<?php

					$date = date('m/d/Y h:i:s a', time());
					$sql="INSERT INTO Comment (Username, DateAndTime, PushpinLink, Text, CorkboardTitle, OwnerEmail)
						VALUES('','','','','','')"
				?>
			</tr>
			<tr>
				<td><hr></td><td><hr></td><td><hr></td>
			</tr>
			<?php
			
			$commentquery = "SELECT Username, Text, DateAndTime FROM Comment WHERE OwnerEmail=\"".$email."\" AND PushpinLink=\"".$link."\"";
				$result = mysql_query($commentquery);
				while ($row = mysql_fetch_assoc($result)) {
					echo "".$row['UserLiked'].", ";
					echo "<tr><td>";
					echo "". $row['Username'] .":";
					echo "</td><td>";
					echo "".$row['Text']."";
					echo "</td><td>";
					echo "On: ".$row['DateAndTime']."";
					echo "</td></tr>";
					echo "<tr><td><hr></td><td><hr></td><td><hr></td></tr>";
				}
			
			 ?>
		</table>
		
		
	</body>
</html>
