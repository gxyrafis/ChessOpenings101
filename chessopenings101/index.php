
<html>
	<?php session_start();?>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Main</title>

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
			
			<main align="center" style="padding-bottom: 10vh;">
			<br><br><br>
				<div align="center" style="font-size:250%; margin-bottom: 5vh;">
					Αρχική Σελίδα
				</div>
				<hr><br><br><br>
				<div style="margin: auto; width: 90%;">
					<p class="lsize">Καλώς ήρθατε στην σελίδα ChessOpenings101, έναν ιστότοπο στον οποίο, όπως προιδεάζει και το όνομα, θα σας δωθεί η ευκαιρεία να μάθετε ορισμένα βασικά ανοίγματα στο σκάκι.</p><br>
					<img src="media/main/index/queensgambit.png" alt="Missing Queen's Gambit" class="centerpic" style="width:50%; height: 45%; margin-top: 5vh;"><br>
					<sup>Το πλέον γνωστό σε πολλούς άνοιγμα χάρη στην ομώνυμη σειρά του Netflix: Queen's Gambit</sup><br><br>
					<p class="lsize" align = "center" style="margin-top: 3vh;">Αλλά πριν αρχίσουμε να μιλάμε για ανοίγματα και τεχνικές, τι ακριβώς είναι ένα άνοιγμα;
					<br><br>Το σύνολο των κινήσεων που γίνονται στην αρχή ενός παιχνιδιού προκειμένου να 'ανοιχτούν' τα πιόνια στο ταμπλό ονομάζεται "άνοιγμα" ή 
					"κινήσεις ανοίγματος" και αποτελεί τα θεμέλεια κάθε παρτίδας σκάκι. Τα περισσότερα σκακιστικά ανοίγματα έχουν μελετηθεί για αιώνες και τους έχει δοθεί κάποια συγκεκριμένη ονομασία.
					Είναι σημαντικό για οποιονδήποτε θέλει να γίνει καλός στο σκάκι να γνωρίζει ορισμένα βασικά ανοίγματα, την θεωρία πίσω από αυτά καθώς και πώς να αντιδράσει αν χρησιμοποιηθούν από τον αντίπαλό του.</p>
				</div>
			</main>
			<footer>
			</footer>
		</div>
	</body>
</html>