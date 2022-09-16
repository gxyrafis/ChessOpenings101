<?php
	session_start();
	
	$invalid = False;
    $username=$_POST['usern'];
    $password=$_POST['pass'];
	
	$username = str_replace(' ', '', $username);
	$password = str_replace(' ', '', $password);
	
	if(strcmp($username,"")==0){
		echo "username";
	}
	if(strcmp($password,"")==0){
		echo "password";
	}
	else{
		if(strcmp($username,"")==0){
			echo "password";
		}
	}
	
	$db_host        = 'localhost';
	$db_user        = 'admin';
	$db_pass        = 'admin';
	$db_database    = 'chessopenings101'; 
	
	if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database)){
		$sql = "select id from user where username ='$username';";
		$sql_result=mysqli_query($con,$sql);
		$row = mysqli_fetch_row($sql_result);
		if($row != NULL)
		{
			if($row[0] == 0){
				$invalid = True;
				$_SESSION['invalid'] = $invalid;
				header("Location: login.php");
			}
			else{
				$sql = "select password from user where username ='$username';";
				$sql_result=mysqli_query($con,$sql);
				$row = mysqli_fetch_row($sql_result);
				if(strcmp($row[0],$password)==0){
					$_SESSION['user'] = $username;
					$usertype;
					$sql = "select type from user where username ='$username';";
					$sql_result=mysqli_query($con,$sql);
					$row = mysqli_fetch_row($sql_result);
					$_SESSION['usertype'] = $row[0];
					header("Location: index.php");
				}
				else{
					$invalid = True;
					$_SESSION['invalid'] = $invalid;
					header("Location: login.php");
				}
			}
			mysqli_close($con);
		}
		else
		{
			$invalid = True;
			$_SESSION['invalid'] = $invalid;
			header("Location: login.php");
		}
	}
	else{
		echo "Failed to connect to Database";
	}
?>