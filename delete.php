<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>
<?php
	require('connect.php');
		if($_GET["id"])
		{
			$id=$_GET['id'];
			$sql = "DELETE FROM user_table WHERE id=$id";
			$result = $connection->query($sql);
		}	
	if($result){
           echo "User Record Deleted Successfully!";
	header("refresh:2;url=index.php");
        }else{
            $fmsg ="User Deletion Failed";
        }?>

<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</body>
</html>