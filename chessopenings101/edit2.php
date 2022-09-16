<?php
	session_start();
	
	$invalid = False;
    $username=$_SESSION['user'];
	
    $password=$_POST['password'];
	$password2=$_POST['password2'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
	$email=$_POST['email'];
	$bday=$_POST['bday'];
	$gender=''. $_POST['genderradiobox'];
	$pfp=$_FILES['pfp'];
	
	$image = $_FILES['pfp']['tmp_name']; 
	$imgContent = addslashes(file_get_contents($image));
	$target_dir = "images/";
	move_uploaded_file($_FILES["pfp"]["tmp_name"], $target_dir.$_FILES["pfp"]["name"]);
	
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
	
	if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database))
	{
		$sql = "select id from user where username ='$username';";
		$sql_result=mysqli_query($con,$sql);
		$row = mysqli_fetch_row($sql_result);
		if($row != NULL)
		{
			if($row[0] == 0){
				$invalid = True;
				$_SESSION['invalid'] = $invalid;
				header("Location: edit.php");
			}
			else{
				if(strcmp($password,$password2)!=0){
					$passworderror = True;
					$_SESSION['invalid'] = $invalid;
					header("Location: edit.php");
				}
				else if(strcmp($password,"")!=0)
				{
					$sql="UPDATE user SET password='$password' WHERE username='$username'";
					mysqli_query($con,$sql);
				}
				if(strcmp($fname,"")!=0)
				{
					$sql="UPDATE user SET fname='$fname' WHERE username='$username'";
					mysqli_query($con,$sql);
				}
				if(strcmp($lname,"")!=0)
				{
					$sql="UPDATE user SET lname='$lname' WHERE username='$username'";
					mysqli_query($con,$sql);
				}
				if(strcmp($email,"")!=0)
				{
					$sql="UPDATE user SET email='$email' WHERE username='$username'";
					mysqli_query($con,$sql);
				}
				if(strcmp($bday,"")!=0)
				{
					$sql="UPDATE user SET bday='$bday' WHERE username='$username'";
					mysqli_query($con,$sql);
				}
				if(strcmp($gender,"")!=0)
				{
					$sql="UPDATE user SET gender='$gender' WHERE username='$username'";
					mysqli_query($con,$sql);
				}
				if($_FILES['pfp']['size'] != 0)
				{
					$sql="UPDATE user SET pfp='$imgContent' WHERE username='$username'";
					mysqli_query($con,$sql);
				}
				$_SESSION['user'] = $username;
				header("Location: edit.php");
				}
			}
			mysqli_close($con);
	}
	else{
		echo "Failed to connect to Database";
	}
?>