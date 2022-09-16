
<html>
	<?php session_start();?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Basic Openings</title>

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
			<main style="padding-left:20%; padding-right:20%;">
				<div align="center" style="font-size:250%; margin-top: 5vh; margin-bottom: 5vh;">
					Ανοίγματα 101
				</div>
				<img src="media/main/basics/openingpic.jpg" style="width:100%; border-style: solid; border-width: 2px; margin-bottom: 8vh;" class="centerpic">
				<p class="lsize" align="center" style="margin-bottom: 8vh;">
					Όπως έχουμε ήδη αναφέρει, ένα άνοιγμα συνιστάται από τις αρχικές κινήσεις που γίνονται σε μια παρτίδα σκάκι και αποτελεί το θεμέλιο για την στρατηγική που θα ακολουθησει ο κάθε παίκτης στο υπόλοιπο παιχνίδι.<br>
					Όμως, πολλοί νέοι παίκτες δεν γνωρίζουν καν την ύπαρξη της έννοιας 'άνοιγμα' και ακόμα και από αυτούς που την γνωρίζουν, οι περισσότεροι δεν ξέρουν ποια ανοίγματα ταιριάζουν στο επίπεδο τους και στο στυλ παιχνιδιού τους.
					Αυτό συμβαίνει επειδή ο τομέας των ανοιγμάτων έχει αιώνες μελέτης από πίσω του και προκειμένου ένας παίκτης να αξιοποιήσει αποτελεσματικά ορισμένα από τα πιο περίπλοκα ανοίγματα, 
					χρειάζεται να έχει αρκετή γνώση σε σκακιστική θεωρία και αλγόριθμους.<br><br>
					Προκειμένου να λύσουμε αυτό το πρόβλημα που μαστίζει την πλειοψηφία των νέων παικτών, παρακάτω θα δείξουμε ορισμένα απλά και τυποποιημένα ανοίγματα που μπορείτε να χρησιμοποιήσετε στις παρτίδες σας.
				</p>
				
				<ul>
					<li style="font-size: 250%">Ruy López</li>
					<img src="media/main/basics/RuyLopez.jpeg" style="width:100%; border-style: solid; border-width: 2px; margin-top: 6vh; margin-bottom: 3vh;" class="centerpic">
					<p style="margin-top: 8vh; margin-bottom: 10vh;" class="lsize">
						Το άνοιγμα "Ruy López", γνωστό επίσης ως "Spanish Game" είναι ένα από τα πιο κλασσικά ανοίγματα στο σκάκι και έχει πάρει το όνομα του από τον Ισπανό κληρικό Ruy López de Segura ο οποίος έζησε τον 16<sup>o</sup> αιώνα και έγραψε 
						ένα από τα πρώτα βιβλία με θέμα το σκάκι. Παρόλα αυτά, το άνοιγμα αυτό είναι γνωστό από το 1490. 
						<br>Οι κινήσεις που πρέπει να γίνουν για αναπαραγωγή αυτού του ανοίγματος είναι οι ακόλουθες:<br><br>
						1.e4 e5 2.Nf3 Nc6 3.Bb5
						<br><br>
						Μετά από αυτό το σημείο, η πιο συνηθισμένη απάντηση από τα μαύρα πιόνια είναι a6 προκειμένου να ασκήσει πίεση στον λευκό αξιωματικό. Εκεί τα λευκά έχουν την επιλογή είτε να φάνε το άλογο και να χάσουν τον αξιωματικό τους
						είτε να υποχωρήσουν.
					</p>
					<li style="font-size: 250%">Slav Defence</li>
					<img src="media/main/basics/Slavdefence.jpeg" style="width:100%; border-style: solid; border-width: 2px; margin-top: 6vh; margin-bottom: 3vh;" class="centerpic">
					<p style="margin-top: 8vh; margin-bottom: 5vh;" class="lsize">
						Η Σλαβική άμυνα θεωρείται ένα πολύ καλό άνοιγμα για την μεριά που παίζει τα μαύρα, καθώς προστατεύει το πιόνι στο c5 και δίνει την δυνατότητα στα μαύρα να ασκήσουν πίεση στο κέντρο και επιτρέπει την ανάπτυξη του αξιωματικού της
						βασίλισσας στο ταμπλό. Βεβαίως έχει και ορισμένα μειονεκτήματα, όπως το ότι παρεμποδίζει την κίνηση του αλόγου της μεριάς της βασίλισσας και τα λευκά μπορούν να αποφύγουν την απειλή τελείως παίζοντας c5.
						<br>Οι κινήσεις που πρέπει να γίνουν για αναπαραγωγή αυτού του ανοίγματος είναι οι ακόλουθες:<br><br>
						1.d4 d5 2.c4 c6
						<br><br>
					</p>
					<li style="font-size: 250%">Italian Game</li>
					<img src="media/main/basics/Italiangame.jpeg" style="width:100%; border-style: solid; border-width: 2px; margin-top: 6vh; margin-bottom: 3vh;" class="centerpic">
					<p style="margin-top: 8vh; margin-bottom: 5vh;" class="lsize">
						Ένα άλλο πολύ καλό άνοιγμα για τα λευκά είναι το "Italian Game", ένα άνοιγμα το οποίο χρησιμοποιήθηκε για πρώτη φορά από Ιταλούς master τον 16<sup>o</sup> αιώνα. Με αυτό το άνοιγμα τα λευκά ασκούν πίεση στο κέντρο και 
						φέρνουν τον αξιωματικό τους σε ένα από τα πιο επικίνδυνα τετράγωνα όπου έχει μεγαλύτερη ποικιλία κινήσεων. Επίσης φέρνει τα λευκά σε κατάλληλη θέση για Ροκέ. Από την άλλη, ο αξιωματικός παρά την καλή θέση στην οποία 
						βρίσκεται, έχει αφεθεί ακάλυπτος και επιπλέον δεν ασκείτε άμεσα πίεση στο κέντρο για τα μαύρα.
						<br>Οι κινήσεις που πρέπει να γίνουν για αναπαραγωγή αυτού του ανοίγματος είναι οι ακόλουθες:<br><br>
						1.e4 e5 2.Nf3 Nc6 3.Bc4
						<br><br>
					</p>
					<li style="font-size: 250%">Sicilian Defence</li>
					<img src="media/main/basics/Siciliandefence.jpeg" style="width:100%; border-style: solid; border-width: 2px; margin-top: 6vh; margin-bottom: 3vh;" class="centerpic">
					<p style="margin-top: 8vh; margin-bottom: 5vh;" class="lsize">
						Η Σικελική Άμυνα είναι το πιο δημοφιλές άνοιγμα για επιθετικούς παίκτες όταν παίζουν από την μεριά των μαύρων. Μπορεί αρχικά να μην φαίνεται λογικό, αλλά ανοίγοντας στο c5, τα μαύρα βγάζουν το παιχνίδι εκτός ισορροπίας και 
						αμφισβητούν την κυριαρχία των λευκών στο κέντρο απειλώντας το d4, ενώ ταυτόχρονα αποκτούν παραπάνω ευκαιρίες από την μεριά της βασίλισσας τους. Συνήθως, σε κάποια από τις επόμενες κινήσεις, το πιόνι στο c5 θα πάρει το d4 
						και έτσι θα αποκτήσει υπεροχή πιονιών στο κέντρο. Βεβαίως, η Σικελική Άμυνα είναι ένα άνοιγμα το οποίο έχει μελετηθεί εκτενώς, γεγονός που σημαίνει πως έχουν βρεθεί πολλές απαντήσεις σε αυτήν για τα λευκά. Συνεπώς, αν 
						παίζετε με κάποιον πιο έμπειρο ίσως να μην είναι το καλύτερο άνοιγμα.
						<br>Οι κινήσεις που πρέπει να γίνουν για αναπαραγωγή αυτού του ανοίγματος είναι οι ακόλουθες:<br><br>
						1.e4 c5
						<br><br>
					</p>
					<li style="font-size: 250%">Queen's Gambit</li>
					<img src="media/main/basics/Queensgambit.jpeg" style="width:100%; border-style: solid; border-width: 2px; margin-top: 6vh; margin-bottom: 3vh;" class="centerpic">
					<p style="margin-top: 8vh; margin-bottom: 5vh;" class="lsize">
						Ίσως και το πιο γνωστό πλέον άνοιγμα στο σκάκι, χάρη στην ομώνυμη σειρά του Netflix είναι το "Γκαμπί της Βασίλισσας" ή "Queen's Gambit". Σε αυτό το άνοιγμα, τα λευκά ασκούν πίεση στο κέντρο και ρισκάρουν να θυσιάσουν ένα πιόνι 
						παίζοντας c4. Παρότι το πιόνι στο c4 είναι απροστάτευτο, δεν υπάρχει κανένας ουσιώδης κίνδυνος, διότι τα λευκά μπορούν με ευκολεία μετά να καλύψουν την διαφορά και σε περίπτωση που τα μαύρα φάνε το πιόνι στο c4 δίνουν πλήρη έλεγχο 
						του κέντρου στα λευκά. Από την μεριά τους, τα μαύρα μπορούν είτε να αποδεχτούν το Γκαμπί της Βασίλισσας παίρνοντας το πιόνι στο c4 που γενικά θεωρείται ριψοκίνδυνο, είτε να απαντήσουν με άλογο στο c6 (Tchigoran Defence) 
						ή πιόνι στο e6 (Orthodox Defence).
						<br>Οι κινήσεις που πρέπει να γίνουν για αναπαραγωγή αυτού του ανοίγματος είναι οι ακόλουθες:<br><br>
						1.d4 d5 2.c4
						<br><br>
					</p>
					<li style="font-size: 250%">Scandinavian Defence</li>
					<img src="media/main/basics/Scandinaviandefence.jpeg" style="width:100%; border-style: solid; border-width: 2px; margin-top: 6vh; margin-bottom: 3vh;" class="centerpic">
					<p style="margin-top: 8vh; margin-bottom: 5vh;" class="lsize">
						Η Σκανδιναβική Άμυνα είναι ένα άνοιγμα από την μεριά των μαύρων πιονιών που θεωρείται αρκετά προκλητικό και δυναμικό. Με την κίνηση d5 τα μαύρα απειλούν το λευκό πιόνι στο e4 έχοντας καλυμμένο το πιόνι τους από 
						την βασίλισσα. Σε περίπτωση που τα λευκά πάρουν το μαύρο πιόνι, δίνεται η δυνατότητα στα μαύρα να αναπτύξουν από την αρχή την βασίλισσα τους, ενώ σε περίπτωση που δεν το πάρουν, δίνεται η ευκαιρία στα μαύρα να πάρουν το e4 
						ή να αναπτύξουν παραπάνω τις άμυνες τους. Θεωρείται σχετικά ριψοκίνδυνο άνοιγμα, καθώς είναι σχετικά εύκολο να προκύψουν λάθη αφού φέρνει την δράση στην αρχή της παρτίδας.
						<br>Οι κινήσεις που πρέπει να γίνουν για αναπαραγωγή αυτού του ανοίγματος είναι οι ακόλουθες:<br><br>
						1.e4 d5
						<br><br>
					</p>
					
					
					
					<div align="center" style="font-size: 250%; margin-top: 10vh; margin-bottom: 10vh;">
						<b>
							Bonus
						</b>
					</div>
					<li style="font-size: 250%">Scholar's Mate</li>
					<img src="media/main/basics/Scholarsmate.jpeg" style="width:100%; border-style: solid; border-width: 2px; margin-top: 6vh; margin-bottom: 3vh;" class="centerpic">
					<p style="margin-top: 8vh;" class="lsize">
						Το άνοιγμα αυτό είναι μια "παγίδα" η οποία χρησιμοποιείται σχεδόν αποκλειστικά εναντίων νέων παικτών και προσφέρει ματ σε 4 κινήσεις. Έχει διάφορα ονόματα, όπως "Scholar's Mate" στα Αγγλικά, "Child's Mate" σε 
						διάφορες σλαβικές χώρες και "Ματ των Αρχαρίων" ή "Βαριάντα του Ναπολέοντα" στα Ελληνικά. Από τα ονόματα του είναι εύκολο να καταλάβει κανείς και την χρήση του καθώς και πόσο περιορισμένη είναι αυτή...
						<br>Οι κινήσεις που πρέπει να γίνουν για αναπαραγωγή αυτού του ανοίγματος είναι οι ακόλουθες:<br><br>
						1. e4 e5 2. Qh5 Nc6 3. Bc4 Nf6?? 4. Qxf7#
						<br><br>
					</p>
				</ul>
			</main>
			<footer>
			</footer>
		</div>
	</body>
</html>