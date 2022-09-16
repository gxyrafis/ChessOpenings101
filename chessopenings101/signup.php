<?php
	session_start();

	$usernameExists = False;
	$passworderror = False;

    $username=$_POST['username'];
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
	
	#$img=file_get_contents($pfp);
    #file_put_contents($target_dir.substr($pfp, strrpos($pfp,'/')), $img);
	
	#copy($pfp,'images/'.$pfp);
	
	$db_host        = 'localhost';
	$db_user        = 'admin';
	$db_pass        = 'admin';
	$db_database    = 'chessopenings101'; 

	
	$flag = false;
	if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database)){
		$sql = "select id from user where username ='$username';";
		$sql_result=mysqli_query($con,$sql);
		$row = mysqli_fetch_row($sql_result);
		if($row[0]>0){
			$flag = true;
			$usernameExists = True;
			$_SESSION['usernameExists'] = $usernameExists;
			header("Location: sign-up.php");
		}
		if(strcmp($password,$password2)!=0){
			$passworderror = True;
			$_SESSION['passworderror'] = $passworderror;
			header("Location: sign-up.php");
			$flag = true;
		}
		if($flag == false){
			$sql="INSERT INTO user (id,username,password,email,fname,lname,bday,gender,pfp,type) values(default,'$username','$password','$email','$fname','$lname','$bday','$gender','$imgContent','registered');";
			$sql_result=mysqli_query($con,$sql);
			if($sql_result){
				$_SESSION['user'] = $username;
				$sql = "select type from user where username ='$username';";
				$sql_result=mysqli_query($con,$sql);
				$row = mysqli_fetch_row($sql_result);
				$_SESSION['usertype'] = $row[0];
				header("Location: index.php");
				#echo "inserted";
			}
			else{
				echo "Query failed".mysqli_error($con);
			}
		}
		mysqli_close($con);
	}
	else{
		echo "fail";
	}
?>