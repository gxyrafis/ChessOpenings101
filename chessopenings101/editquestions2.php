<script src="scripts/scripts.js"></script>
<?php
	session_start();
	
	$invalid = False;
    $username=$_SESSION['user'];
	
	$id = $_SESSION['qid'];
	$level=''. $_POST['difficultyradiobox'];
    $question=$_POST['question'];
	$answer=$_POST['answer'];
   
	$question = str_replace("'", "\'", $question);
	$answer = str_replace("'", "\'", $answer);
	
	if(strcmp($username,"")==0){
		echo "username";
	}
	
	$db_host        = 'localhost';
	$db_user        = 'admin';
	$db_pass        = 'admin';
	$db_database    = 'chessopenings101'; 
	
	if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database))
	{
		$sql = "select id from questions where id ='$id';";
		$sql_result=mysqli_query($con,$sql);
		$row = mysqli_fetch_row($sql_result);
		if($row != NULL)
		{
			if($row[0] == 0){
				$invalid = True;
				$_SESSION['invalid'] = $invalid;
				header("Location: editquestions.php");
			}
			else{
				if(strcmp($question,"")!=0){
					$sql="UPDATE questions SET question='$question' WHERE id='$id'";
					mysqli_query($con,$sql);
				}
				if(strcmp($answer,"")!=0)
				{
					$sql="UPDATE questions SET answer='$answer' WHERE id='$id'";
					mysqli_query($con,$sql);
				}
				if(strcmp($level,"")!=0)
				{
					$sql="UPDATE questions SET level='$level' WHERE id='$id'";
					mysqli_query($con,$sql);
				}
				$_SESSION['user'] = $username;
				
				header("Location: unapprovedquestions.php");
				}
			}
			mysqli_close($con);
	}
	else{
		echo "Failed to connect to Database";
	}
?>
