<!DOCTYPE html>

<html>
	<?php session_start();?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Quiz</title>

			<style>  
			.btn2 {
				border: 1px;
				border-style: solid;
				background-color: inherit;
				padding: 15px 30px;
				font-size: 100%;
				cursor: pointer;
				margin:auto;
			}
			
			.btn2:hover {
				background: black;
				color: white;
			}
		</style>  

	</head>

	<?php 
		$db_host        = 'localhost';
		$db_user        = 'admin';
		$db_pass        = 'admin';
		$db_database    = 'chessopenings101'; 
		$difficulty = $_GET['difficulty'];
		$_SESSION['difficulty'] = $difficulty;
		$error = False;

		if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database)){
			$sql = "SELECT * FROM questions WHERE level ='$difficulty' AND accepted = 1;";
			$sql_result=mysqli_query($con,$sql);
			$arr = mysqli_fetch_all($sql_result);
			$questions = [];
			shuffle($arr);
			//$arr[x][y] x = number of question. y = question details. 0 = id, 1 = username, 2 = question name, 3 = answers, 4 = type, 5 = difficulty, 6 = approved/not.

			if(!empty($arr))
			{
				for($i = 0 ; $i < 5 ; $i++)
				{
					$questions[$i] = "<li style=\"font-size: 170%\">".$arr[$i][2]."</li><br><br>";
					switch($arr[$i][4])
					{
						case 0:
							$questions[$i] .= "<div style=\"font-size: 150%;\">
							<input type=\"radio\" name=\"radio".$i."\" value = \"True\" id=\"radio".$i.".1\"> Σωστό<br>
							<input type=\"radio\" name=\"radio".$i."\" value = \"False\" id=\"radio".$i.".2\"> Λάθος<br>
						</div> <br><hr><br><br>";
							break;

						case 1:
							$questions[$i] .= "<input type=\"text\" name=\"text".$i."\" id=\"text".$i."\" style=\"font-size: 80%;\" size=\"10\"><br></li>
							<br><hr><br><br>";
							break;

						case 2:
							if(substr_count($arr[$i][3], "+") == 1)
							{
								$questions[$i] .= "<div style=\"font-size: 150%;\">";
								$answers = explode(",", $arr[$i][3]);
								for($j = 0 ; $j < sizeof($answers) ; $j++)
								{
									$answers[$j] = str_replace("+", "", $answers[$j]);
									$answers[$j] = str_replace("-", "", $answers[$j]);
								}
								for($j = 0 ; $j < sizeof($answers) ; $j++)
								{
									$questions[$i] .= "<input type=\"radio\" name=\"radio".$i."\" value = \"".$answers[$j]."\" id=\"radio".$i.$j."\"> ".$answers[$j]."<br>";
								}
								$questions[$i] .= "</div>
								<br><hr><br><br>";
							}
							else if(substr_count($arr[$i][3], "+") > 1)
							{
								$questions[$i] .= "<div style=\"font-size: 150%;\">";
								$answers = explode(",", $arr[$i][3]);
								for($j = 0 ; $j < sizeof($answers) ; $j++)
								{
									$answers[$j] = str_replace("+", "", $answers[$j]);
									$answers[$j] = str_replace("-", "", $answers[$j]);
								}
								for($j = 0 ; $j < sizeof($answers) ; $j++)
								{
									$questions[$i] .= "<input type=\"checkbox\" name=\"checkbox".$i.$j."\" value = \"".$answers[$j]."\" id=\"checkbox".$i.$j."\"> ".$answers[$j]."<br>";
								}
								$questions[$i] .= "</div>
								<br><hr><br><br>";

							}
							else
							{
								$questions[$i] = "Error, invalid question with ID: ".$arr[$i][0];
							}
							
							break;

					}
				}
			}
			else
			{
				echo '<script>alert("Error: No questions found.")</script>';
				$error = True;
			}
		}
	?>
	<body>
		<div class="container">
			<header>
			</header>
			<nav>					
				<div class="button-container">
					<form action="index.php" method="POST">
						<div>
							<button class="btn"><b>Αρχική Σελίδα</b></button>
						</div>
					</form>
					
					<form action="basics.php" method="POST">
						<div>
							<button class="btn"><b>Βασικά Ανοίγματα</b></button>
						</div>
					</form>
					
					<form action="more.php" method="POST">
						<div>
							<button class="btn"><b>Επιπλέον Υλικό</b></button>
						</div>
					</form>
					
					<?php if(!isset($_SESSION['user'])){ ?>
					<form action="quiz.php" method="POST">
						<div>
							<button class="btn"><b>Τεστ Γνώσεων</b></button>
						</div>
					</form>
					<?php } 
					else{ ?>
					<form action="quizregistered.php" method="POST">
						<div>
							<button class="btn"><b>Τεστ Γνώσεων</b></button>
						</div>
					</form>
					<?php } ?>
					<form action="sign-up.php" method="POST">
						<div>
						<?php if(!isset($_SESSION['user'])){ ?>
							<button class="btn"><b>Εγγραφή Χρήστη</b></button>
						<?php } 
						else{ ?>
						<?php } ?>
						</div>
					</form>
					
					<form action="login.php" method="POST">
						<div>
							<?php if(!isset($_SESSION['user'])){ ?>
								<button class="btn"><b>Είσοδος Χρήστη</b></button>
							<?php } 
							else{ ?>
							<?php } ?>
						</div>
					</form>
						<?php if(!isset($_SESSION['user'])){ ?>
						<?php } 
						else if(strcmp($_SESSION['usertype'], "registered") == 0)
							{ ?>
								<div class="dropdown">  
								<button class="dropbtn"><b><?php echo $_SESSION['user']; ?></b></button>
								<div class="dropdown-content">
								<a href="edit.php">Επεξεργασία Προφίλ</a>
								<a href="testhistory.php">Ιστορικό Τεστ</a>
								<a href="questions.php">Προσθήκη Ερωτήσεων</a>
								<a href="logout.php">Αποσύνδεση</a>
								</div>
								</div>
								<?php }
						else if(strcmp($_SESSION['usertype'], "moderator") == 0) 
						{ ?>
							<div class="dropdown">  
								<button class="dropbtn"><b><?php echo $_SESSION['user']; ?></b></button>
								<div class="dropdown-content">
								<a href="edit.php">Επεξεργασία Προφίλ</a>
								<a href="testhistory.php">Ιστορικό Τεστ</a>
								<a href="questions.php">Προσθήκη Ερωτήσεων</a>
								<a href="unapprovedquestions.php">Εκκρεμείς Ερωτήσεις</a>
								<a href="approvedquestions.php">Εγκεκριμένες Ερωτήσεις</a>
								<a href="logout.php">Αποσύνδεση</a>
								</div>
							</div>
						<?php }
						else if(strcmp($_SESSION['usertype'], "admin") == 0) 
						{ ?>
							<div class="dropdown">  
								<button class="dropbtn"><b><?php echo $_SESSION['user']; ?></b></button>
								<div class="dropdown-content">
								<a href="edit.php">Επεξεργασία Προφίλ</a>
								<a href="testhistory.php">Ιστορικό Τεστ</a>
								<a href="questions.php">Προσθήκη Ερωτήσεων</a>
								<a href="unapprovedquestions.php">Εκκρεμείς Ερωτήσεις</a>
								<a href="approvedquestions.php">Εγκεκριμένες Ερωτήσεις</a>
								<a href="editusers.php">Επεξεργασία Χρηστών</a>
								<a href="logout.php">Αποσύνδεση</a>
								</div>
							</div>
						<?php } ?>
				</div>
			</nav>
			<main style="width: 100%; padding-left:15%; padding-right:15%;">
				<div align="center" style="font-size:230%; margin-top: 5vh; margin-bottom: 8vh;">
					Τεστ Αυτοαξιολόγησης
				</div>
				<div align="center" style="font-size:160%;">
					Βαθμός Δυσκολίας: <?php echo $_GET['difficulty']; ?> <br><br><br>
				</div>
                <form action="quizregisteredresults.php" method="post" onsubmit="return confirm('Are you sure you want to submit your answers?');">
					<ol>
							<?php 
								for($i = 0 ; $i < 5 ; $i++)
								{
									echo $questions[$i];
								}
							?>
					</ol>
					<br><br><br>
					<?php if($error != True){ ?>
					<div align="center">
						<button class="btn2" onclick="sendInfo()"><b>Υποβολή Απαντήσεων</b></button>
					</div>
					<?php } ?>
				</form>
			</main>
			<footer>
			</footer>
		</div>
	</body>
	<?php mysqli_close($con); ?>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script>
	function sendInfo()
	{
		score = 0;
		var questions = [];
		var answers = [];
		var types = [];

		questions.push(<?php echo(json_encode($arr[0][2])); ?>);
		questions.push(<?php echo(json_encode($arr[1][2])); ?>);
		questions.push(<?php echo(json_encode($arr[2][2])); ?>);
		questions.push(<?php echo(json_encode($arr[3][2])); ?>);
		questions.push(<?php echo(json_encode($arr[4][2])); ?>);

		answers.push(<?php echo(json_encode($arr[0][3])); ?>);
		answers.push(<?php echo(json_encode($arr[1][3])); ?>);
		answers.push(<?php echo(json_encode($arr[2][3])); ?>);
		answers.push(<?php echo(json_encode($arr[3][3])); ?>);
		answers.push(<?php echo(json_encode($arr[4][3])); ?>);

		types.push(<?php echo(json_encode($arr[0][4])); ?>);
		types.push(<?php echo(json_encode($arr[1][4])); ?>);
		types.push(<?php echo(json_encode($arr[2][4])); ?>);
		types.push(<?php echo(json_encode($arr[3][4])); ?>);
		types.push(<?php echo(json_encode($arr[4][4])); ?>);

		sessionStorage.setItem("questions", JSON.stringify(questions));
		sessionStorage.setItem("answers", JSON.stringify(answers));
		sessionStorage.setItem("types", JSON.stringify(types));
	}
</script>
