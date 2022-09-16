<?php
	session_start();
	$username=$_SESSION['user'];
    $type=''. $_POST['typeradiobox'];
    $difficulty=''. $_POST['difficultyradiobox'];
	$question=$_POST['question'];
    $answer=$_POST['answer'];
	
	
	$db_host        = 'localhost';
	$db_user        = 'admin';
	$db_pass        = 'admin';
	$db_database    = 'chessopenings101'; 

	$question = str_replace("'", "\'", $question);
	$answer = str_replace("'", "\'", $answer);
	
	$flag = false;
	if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database)){
		if($flag == false){
			$sql="INSERT INTO questions (id,username,question,answer,type,level,accepted) values(default,'$username','$question','$answer','$type','$difficulty','False');";
			$sql_result=mysqli_query($con,$sql);
			if($sql_result){
				$_SESSION['user'] = $username;
				header("Location: questions.php");
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