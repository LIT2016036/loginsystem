<?php
session_start();
if(isset($_POST['submit']))
{
include_once 'dbh.inc.php';
$uid=mysqli_real_escape_string($conn,$_POST['uid']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
//Error handler
if(empty($uid) || empty($password)){
	header("Location: ../index.php?login=empty");
	exit();
}
else
{
	$sql="select * from users where user_uid='$uid' OR user_email='$uid'";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck<1)
	{
		header("Location: ../index.php?login=error");
		exit();
	}
	else
	{
		if($row=mysqli_fetch_assoc($result))
		{
			//dehashing the password
			$hashpasswordcheck=password_verify($password,$row['user_password']);
			if($hashpasswordcheck == false){
				header("Location: ../index.php?login=error");
				exit();
			}
			elseif($hashpasswordcheck == true){
				// login the user here
				$_SESSION['u_id'] = $row['user_id'];
				$_SESSION['u_first'] = $row['user_first'];
				$_SESSION['u_last'] = $row['user_last'];
				$_SESSION['u_email'] = $row['user_email'];
				$_SESSION['u_uid'] = $row['user_uid'];
			}
		}
	}
}
}


else
{
	header("Location: ../index.php?login=error");
	exit();
}

?>