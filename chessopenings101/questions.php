<html>
	<?php session_start();?>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Submit Questions</title>
		
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
					Προσθήκη Ερώτησης<br><br><hr>
				</div>
				<form action="questions2.php" id="form1" method="post">
					<div align="left">
						Τύπος Ερώτησης<br>
						<input type="radio" name="typeradiobox" value = "0" required> Σωστό-Λάθος&nbsp&nbsp&nbsp
						<input type="radio" name="typeradiobox" value = "1"> Συμπλήρωση Κενού&nbsp&nbsp&nbsp
						<input type="radio" name="typeradiobox" value = "2"> Πολλαπλής Επιλογής<br><br><hr>
						Δυσκολία Ερώτησης<br>
						<input type="radio" name="difficultyradiobox" value = "easy" required> Εύκολη&nbsp&nbsp&nbsp
						<input type="radio" name="difficultyradiobox" value = "medium"> Μέτρια&nbsp&nbsp&nbsp
						<input type="radio" name="difficultyradiobox" value = "hard"> Δύσκολη<br><br><hr>
						<label for="question">Ερώτηση</label><br>
						<textarea id="question" name="question" placeholder="Εισάγετε την ερώτησή σας..." cols="45" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 5 +'px'" required></textarea><br><br><hr>
						<label for="answer">Απάντηση</label><br>
						<textarea id="answer" name="answer" placeholder="Εισάγετε την απάντηση σας... Για ερωτήσεις πολλαπλής επιλογής χωρίστε τις σωστές και λάθος απαντήσεις με ','
						και βάλτε '+' μπροστά από τις σωστές και '-' μπροστά από τις λάθος" cols="45" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 5 +'px'" required></textarea><br><br><hr>
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