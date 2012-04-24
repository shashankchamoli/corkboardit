<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL=StyleSheet HREF="layout.css" TYPE="text/css" MEDIA=screen>
		<title>Pushpin</title>
	</head>
	<body>
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
		
		<h2 align="center"><?php echo "Pushpin_Title on "?><a href="corkboard_view.php"><?php echo "Corkboard_Title" ?></a></h2>

		<table align="center">
			<tr>
				<td>Pinned by <?php echo "UserName" ?>&nbsp;<button>Follow</button></td>
			</tr>
			<tr>
				<td>On: <?php echo "DATE" ?></td>
			</tr>
		</table>
		<hr>
		
		<table align="center">
			<tr>
			<td>
				<a href="http://pictures.topspeed.com/IMG/crop/201103/2012-lamborghini-aventado-14_460x0w.jpg">
					<img class="pushpinMain" src="http://pictures.topspeed.com/IMG/crop/201103/2012-lamborghini-aventado-14_460x0w.jpg"/>
				</a>
			</td>
			</tr>
			<tr>
				<td>
					<a><?php echo "Description goes here"  ?></a>
				</td>
			</tr>
			<tr>
				<td>
					<a>Tags: <?php echo "tags, go, here"  ?></a>
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
				for ($i=1; $i<=10; $i++)
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
