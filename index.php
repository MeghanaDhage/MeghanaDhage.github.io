<!DOCTYPE html>
<html>
<head>
	<title>Student_Registration</title>
<style type="text/css">
	tr td label{
		font-size: 18px;
		float: right;
		padding-right: 5px;
	}
	.head{
		background: blue;
		color: white;
		height: 50px;
		text-align: center;
		font-size: 18px;
	}
	.reg_table{
		border:2px !important;
		border-color: red;
		color: blue;
	}
	.reg_table a{
		color: blue;
	}
	.reg_form{
		margin:auto;
		font-size: 18px;
	}
</style>
</head>
<body>
<table class="reg_form">
<form  action="index.php" method="POST">
	<tr>
		<td></td>
		<td><h3>Registration Form</h3></td>
	</tr>
	<tr>
		<td><label>Username</label></td>
		<td><input type="text" placeholder="suresh" name="username" minlength="8" required></input></td>
	</tr>
	<tr>
		<td><label>Password</label></td>
		<td><input type="password" placeholder="123456" name="password" minlength="6" required></input></td>
	</tr>
	<tr>
		<td><label>Confirm Password</label></td>
		<td><input type="password" placeholder="123456" name="confirm_password" minlength="6" required></input></td>
	</tr>
	<tr>
		<td><label>FirstName</label></td>
		<td><input type="text" placeholder="suresh"  name="fname" required></input></td>
	</tr>
	<tr>
		<td><label>LastName</label></td>
		<td><input type="text" placeholder="suresh"  name="lname" required></input></td>
	</tr>
	<tr>
		<td><label>Email</label></td>
		<td><input type="email" placeholder="suresh@gmail.com" name="email" required></input></td>
	</tr>
	<tr>
		<td><label>Phone No</label></td>
		<td><input type="number" id="mobno" placeholder="1234567890" maxlength="10" name="phone" required></input></td>
	</tr>
	<tr>
		<td><label>Location</label></td>
		<td><input type="text" placeholder="hyd" name="location" required></input></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="submit">Save</button> <button type="reset" value="reset">Reset</button></td>
	</tr>
	</form>
</table> 

<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'user');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
    if(isset($_POST['username']) && isset($_POST['password']))
    {
    if ($_POST['password']==$_POST['confirm_password']){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
		$lname = $_POST['lname'];
        $confirm_password = $_POST['confirm_password'];
        $phone = $_POST['phone'];
		$location = $_POST['location'];
		$query1 = "INSERT INTO user_table
		(username, password, confirm_password, fname, lname, email, phone, location) 
		VALUES 
		('$username', '$password', '$confirm_password', '$fname', '$lname', '$email', '$phone', '$location')";
        $result1 = mysqli_query($connection, $query1);
        if($result1){
	    	if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['password']))
	    	{
			    echo '<script language="javascript">';
				echo 'alert("Your password is strong. User Created Successfully!")';
				echo '</script>';
			} else {
			    echo '<script language="javascript">';
				echo 'alert("Your password is weak. User Created Successfully!")';
				echo '</script>';
			}
            
        }else{
        	echo '<script language="javascript">';
			echo 'alert("User Registration Failed!")';
			echo '</script>';
        }
        
    }
    else
    {
    	echo '<script language="javascript">';
			echo 'alert("Confirmation password does not match!")';
			echo '</script>';
    }
}
    ?>
	<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<table class="reg_table" border="1">
	<tr class="head">
		<td width="15%">First Name</td>
		<td width="15%">Last Name</td>
		<td width="25%">Email</td>
		<td width="15%">Phone No</td>
		<td width="10%">Location</td>
		<td width=""></td>
	</tr>
	
	<?php 
	$sql = "SELECT * FROM user_table";
	$result1 = $connection->query($sql);

	if ($result1->num_rows > 0) 
	{
    	while($row = $result1->fetch_assoc()) 
    	{
	        echo "<tr><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td>". $row["email"]."</td><td>". $row["phone"]."</td><td>". $row["location"]."</td>";?>
        	<td><a href="edit.php?id=<?php echo $row["id"]?>">Edit</a> <a href="delete.php?id=<?php echo $row["id"]?>">Delete</a></td></tr><?php 
    	}
	}
	else 
	{
	    echo "0 results";
	}
	?>
</table>
<script type="text/javascript">
	 $("#mobno").mask("9999999999");
</script>
</body>
</html>