<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
<?php
require('connect.php');
if($_GET["id"])
{
	$id=$_GET['id'];
	$sql = "SELECT * FROM user_table WHERE id=$id";
	$result1 = $connection->query($sql);
} 
if ($result1->num_rows > 0) 
	{
    	while($row = $result1->fetch_assoc()) 
    	{ ?>
	       	 
<table>
<form action="edited.php?id=<?php echo $row["id"]?>" method="POST">
	<tr>
		<td></td>
		<td><h3>Registration Form</h3></td>
	</tr>
	<tr>
		<td><label>Username</label></td>
		<td><input type="text" placeholder="suresh" minlength="8" value="<?php echo $row['username']?>" name="username" required></input></td>
	</tr>
	<tr>
		<td><label>Password</label></td>
		<td><input type="password" placeholder="123456" minlength="6" value="<?php echo $row['password']?>" name="password" required></input></td>
	</tr>
	<tr>
		<td><label>Confirm Password</label></td>
		<td><input type="password" placeholder="123456" minlength="6"  value="<?php echo $row['confirm_password']?>" name="confirm_password" required></input></td>
	</tr>
	<tr>
		<td><label>FirstName</label></td>
		<td><input type="text" placeholder="suresh"  value="<?php echo $row['fname']?>"  name="fname" required></input></td>
	</tr>
	<tr>
		<td><label>LastName</label></td>
		<td><input type="text" placeholder="suresh"  value="<?php echo $row['lname']?>"  name="lname" required></input></td>
	</tr>
	<tr>
		<td><label>Email</label></td>
		<td><input type="email" placeholder="suresh@gmail.com"  value="<?php echo $row['email']?>" name="email" required></input></td>
	</tr>
	<tr>
		<td><label>Phone No</label></td>
		<td><input type="number" placeholder="1234567890" maxlength="10" value="<?php echo $row['phone']?>" name="phone" required></input></td>
	</tr>
	<tr>
		<td><label>Location</label></td>
		<td><input type="text" placeholder="hyd"  value="<?php echo $row['location']?>" name="location" required></input></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="submit" href="edited.php?id=<?php echo $row['id']?>">Update</button><button type="reset" value="reset">Reset</button></td>
	</tr>
	</form>
	<?php }
	} ?>


</table> 
</body>
</html>