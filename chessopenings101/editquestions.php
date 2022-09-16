<html>
	<?php session_start();?>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Edit Questions</title>
		
		<?php 
		$db_host        = 'localhost';
		$db_user        = 'admin';
		$db_pass        = 'admin';
		$db_database    = 'chessopenings101'; 
        $usern = $_SESSION['user'];
		$id = $_GET['id'];
		$_SESSION['qid']=$id;

		if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database))
        {
            $sql = "SELECT * FROM questions WHERE id = '$id';";
			$sql_result=mysqli_query($con,$sql);
			$arr = mysqli_fetch_row($sql_result);
        }
        else
        {
            echo "<script>alert(\"Error connecting to Database\");</script>";
        }


        ?>
		
		<style>  
					.btn2 {
				border: 1px;
				border-style: solid;
				background-color: inherit;
				padding: 1vh 1vw;
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
			<main class="mainsu">
				<div align="center" style="font-size:250%;">
					Επεξεργασία Ερώτησης<br><br><hr>
				</div>
				<form action="editquestions2.php" id="form1" method="post">
					<div align="left">
						Δυσκολία ερώτησης<br>
						<input type="radio" name="difficultyradiobox" <?php if($arr[5] =='easy') echo 'checked'; ?> value = "easy"> Εύκολη&nbsp&nbsp&nbsp
						<input type="radio" name="difficultyradiobox" <?php if($arr[5] =='medium') echo 'checked'; ?> value = "medium"> Μέτρια&nbsp&nbsp&nbsp
						<input type="radio" name="difficultyradiobox" <?php if($arr[5] =='hard') echo 'checked'; ?> value = "hard"> Δύσκολη<br><br><hr>
						<label for="question">Ερώτηση</label><br>
						<textarea id="question" name="question" placeholder=<?php echo $arr[2]; ?> cols="45" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 5 +'px'" ></textarea><br><br><hr>
						<label for="answer">Απάντηση</label><br>
						<textarea id="answer" name="answer" placeholder=<?php echo $arr[3]; ?> cols="45" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 5 +'px'" ></textarea><br><br><hr>
					</div>
					<div align="center">
						<br><br>
						<button class="btn2"><b>Υποβολή Ερώτησης</b></button>
					</div>
				</form>
			</main>
			<footer>
			</footer>
	</body>
</html>