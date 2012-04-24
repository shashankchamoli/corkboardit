<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL=StyleSheet HREF="layout.css" TYPE="text/css" MEDIA=screen>
		<title>CorkBoartIT | Add CorkBoard</title>
	</head>
	<body>
		
		<img src="images/logo_small.png" alt="logo" />
		<br><br>
		
    <h2 align="center">Add Corkboard</h2>
		
		<form align="left">
		<table align="center">
			<tr>
				<td>
					Corkboard Title:
				</td>
				<td>
					<input type="text" name="cork_title" />
				</td>
			</tr>
			<tr>
				<td>
					Catagory:
				</td>
				<td>
					<select name="cork_catagory"> 
						<option value="Pets" >Pets </option>
						<option value="Travel" >Travel</option>
						<option value="Technology" >Technology</option>
						<?php
							for ($i=1; $i<=5; $i++)
							{
								echo "<option value=Catagory" . $i . ">Catagory". $i ."</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Private:
				</td>
				<td>
					<input type="checkbox" name="private" value="private" />
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type="password" name="cork_pass" /> (Leave blank if public)
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

