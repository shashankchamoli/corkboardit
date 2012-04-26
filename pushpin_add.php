<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL=StyleSheet HREF="layout.css" TYPE="text/css" MEDIA=screen>
		<title>CorkboardIT | Add Pushpin</title>
	</head>
	<body>
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
		
		<h2 align="center"><?php echo "Add Pushpin to Corkboard ".$_POST['title'].": "?></h2>
		<form align="left">
		<table align="center">
			<tr>
				<td>
					URL:
				</td>
				<td>
					<input type="text" name="pushpin_url" class="textInput1"/>
				</td>
			</tr>
			<tr>
				<td>
					Description:
				</td>
				<td>
					<input type="text" name="pushpin_descrition" class="textInput1"/>
				</td>
			</tr>
			<tr>
				<td>
					Tags (Optional):
				</td>
				<td>
					<input type="text" name="pushpin_tags" class="textInput1" />
				</td>
			</tr>
			<tr>
			<td></td>
				<td>
					<button>Cancel</button>	<input type="submit" name="Submit" value="Add" >
				</td>
				</tr>
		</table>
		</form>
	</body>
</html>

