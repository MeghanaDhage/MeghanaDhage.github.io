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
		}
		if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
		$lname = $_POST['lname'];
        $confirm_password = $_POST['confirm_password'];
        $phone = $_POST['phone'];
		$location = $_POST['location'];
		
		$query2 = "UPDATE user_table SET 
		username='$username',password='$password',confirm_password='$confirm_password',fname='$fname',lname='$lname',email='$email',phone='$phone',location='$location' WHERE id=$id";
		$result = $connection->query($query2);
			
		if($result)
		{
			echo "User Updated Successfully!";
			header("refresh:2;url=index.php");
            $smsg = "User Record Updated Successfully.";
		}
        else
            $fmsg ="User Record Updation Failed";
        }
        ?>

<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</body>
</html>