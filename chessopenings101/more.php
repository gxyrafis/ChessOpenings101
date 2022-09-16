<html>
	<?php session_start();?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Extra Theory</title>
			<style>  
			main{
				width: 100%;
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
			<main>
				<div align="center" style="font-size:250%; margin-top: 5vh; margin-bottom: 4vh;">
					Επιπλέον Υλικό
				</div>
				<hr style="width:100%;">
				<p class="lsize" align="center" style="margin: auto; margin-top:5vh; margin-bottom: 5vh; width: 80%;">
					Πιθανότατα ξέρετε ως τώρα ότι τα ανοίγματα στο σκάκι είναι ένα αντικείμενο το οποίο έχει μελετηθεί εκτενώς για εκατοντάδες χρόνια, με ορισμένα ανοίγματα να έχουν καταγραφεί σε χειρόγραφα από το 1490 μ.Χ. όπως είδαμε 
					στην σελίδα με τα <a href="basics.php">βασικά ανοίγματα</a> που προτείνουμε να μάθουν οι νέοι παίκτες. Συνεπώς υπάρχει πολύ μεγάλη ανάλυση του τομέα και πάρα πολύ θεωρία και πολλές στρατηγικές που μπορεί να διαβάσει κανείς. 
					Μάλιστα, μπορούμε με σιγουριά να πούμε πως για την μεγάλη πλειονότητα των ανοιγμάτων, αν όχι για όλα τα ανοίγματα, που μπορεί να κάνει οποιαδήποτε από τις δύο μεριές, υπάρχουν πολλές συγκεκριμένες και μελετημένες αντιδράσεις 
					τις οποίες σε υψηλά επίπεδα πρέπει να ξέρει απέξω και να μπορεί να αξιοποιήσει ο αντίπαλος προκειμένου να κάνει την πιο αποτελεσματική κίνηση.<br><br>
					Παρά την τεράστια ποικιλία ανοιγμάτων και τρόπων παιχνιδιού όμως, υπάρχουν ορισμένες βασικές αξίες και κανόνες που εφαρμόζονται παντού. Αυτές είναι οι ακόλουθες:
				</p>
					
				<ol class="lsize" style="margin: auto; margin-bottom: 4vh; width: 80%;">
					<li><b>Έλεγχος του κέντρου με τα πιόνια.</b></li> Το 1ο βήμα για ένα σωστό άνοιγμα είναι η τοποθέτηση των πιονιών του βασιλιά και της βασίλισσας σε κεντρικά τετράγωνα. Όσο περισσότερο έλεγχο του κέντρου με τα πιόνια έχει ο σκακιστής, τόσο περισσότερο χώρο για μανούβρες και καλύτερη τοποθέτηση των κομματιών του έχει στο άνοιγμα.<br><br>
					<li><b>Ασφάλεια του βασιλιά με το σωστό ροκέ.</b></li> Η ασφάλεια του βασιλιά αποτελεί σημαντική προτεραιότητα, την οποία πολύ συχνά αμελούν οι αρχάριοι σκακιστές στην προσπάθεια τους να κάνουν γρήγορη επίθεση. Η αξία του ροκέ είναι ακόμα μεγαλύτερη στα ανοικτά ανοίγματα. Ένας γενικός μνημονικός κανόνας είναι το ροκέ να γίνεται μέχρι την 8η κίνηση και σε γενικές γραμμές είναι καλύτερο το μικρό ροκέ. Είναι σπάνιες οι περιπτώσεις που δεν πρέπει να γίνει ροκέ, και αφορά ιδιάζουσες και προχωρημένες τεχνικές.<br><br>
					<li><b>Ανάπτυξη των κομματιών σε κεντροποιημένες θέσεις.</b></li> Η δράση των κομματιών είναι πολύ μεγαλύτερη στο κέντρο παρά στις άκρες τις σκακιέρας. Από το κέντρο τα κομμάτια ελέγχουν περισσότερα τετράγωνα, αμύνονται καλύτερα και δημιουργούν περισσότερες απειλές στον αντίπαλο. Ένας καλός μνημονικός κανόνας είναι να αναπτύσσονται πρώτα τα άλογα προς το κέντρο και μετά οι αξιωματικοί σε ανοιχτές διαγώνιες.<br><br>
					<li><b>Μην κυνηγάτε πιόνια του αντιπάλου.</b></li> Ένα συχνό λάθος αρχάριων σκακιστών είναι να επικεντρώνονται στο κέρδος υλικού, χάνοντας πολύτιμο χρόνο από την ανάπτυξη των κομματιών. Δεν είναι λίγες οι φορές που αρχάριοι σκακιστές πέφτουν θύμα ενός γκαμπί πιονιού (θυσία πιονιού) γιατί δεν μπορούν να χειριστούν με την απαιτούμενη ακρίβεια τη θέση μετά την αποδοχή του γκαμπί. Ο αρχάριος σκακιστής δεν πρέπει να παρασύρεται να κυνηγά πιόνια αλλά να προστατεύει το βασιλιά και να ολοκληρώνει γρήγορα την ανάπτυξη.<br><br>
					<li><b>Αποφύγετε άσκοπες μανούβρες κομματιών.</b></li> Είναι συχνό το λάθος στο άνοιγμα να μετακινούνται τα ίδια ανεπτυγμένα κομμάτια δεύτερη και τρίτη φορά για κάποια επιθετική προσπάθεια. Πριν την ολοκλήρωση όμως της ανάπτυξης, μία «τυχοδιωκτική» επίθεση είναι καταδικασμένη να αποτύχει αν ο αντίπαλος χειριστεί σωστά τη θέση. Ο μνημονικός κανόνας είναι ότι πρέπει να μετακινείται αν γίνεται μια φορά κάθε κομμάτι μέχρι την ολοκλήρωση της ανάπτυξης.<br><br>
				</ol>
				<p class="lsize" align="center" style="margin: auto; margin-top:2vh; margin-bottom: 8vh; width: 80%;">
					Μια πολύ καλή ανάλυση των βασικών κανόνων ενός οποιουδήποτε ανοίγματος φαίνεται στο ακόλουθο βίντεο.
				</p>
				<div align="center">
					<video width="60%" height="15%" style="border-style: solid; border-width: 1px; border-radius: 25px;" controls>
						<source src="media/main/more/101openings.mp4" type="video/mp4">
					</video>
				</div>
				<p class="lsize" align="center" style="margin: auto; margin-top:6vh; margin-bottom: 8vh; padding-bottom: 20vh; width: 80%;">
					Επειδή αυτή η ιστοσελίδα αφορά μόνο μια βασική εισαγωγή στα ανοίγματα, γι αυτό άλλωστε λέγεται και Chess Openings 101, δεν θα προχωρήσουμε σε παραπάνω ανάλυση σκακιστικής θεωρίας. Όμως, αν ενδιαφέρεστε να μελετήσετε τα ανοίγματα 
					και το σκάκι γενικά σε βαθύτερο βαθμό, σας προτείνουμε το παρακάτω βιβλίο, το οποίο παρέχουμε δωρεάν σε μορφή pdf.<br><br>
					
					<a href="media/main/more/5dcft5.pdf" style="font-size: 150%;">The Game of Chess by Siegbert Tarrasch</a>
				</p>
			</main>
			<aside class="as" style="@media screen and (max-width:600px){padding-top:10vh;}">
				<div class="divastitle">
					<div align="center">
						<b>
							Ανάλυση Ανοιγμάτων
							<br><br>
						</b>
					</div>
					<div class="divasnormal" align="center">
						<a href="https://www.youtube.com/watch?v=41rPFNY_CAY" style="font-size: 80%;">Ruy Lopez</a><br>
						<a href="https://www.youtube.com/watch?v=9HTiFbGyYZ0" style="font-size: 80%;">Slav Defence</a><br>
						<a href="https://www.youtube.com/watch?v=NWHGmHXEtIE" style="font-size: 80%;">Italian Game</a><br>
						<a href="https://www.youtube.com/watch?v=qzydxPgPKzs" style="font-size: 80%;">Sicilian Defence</a><br>
						<a href="https://www.youtube.com/watch?v=HdHWAuQRG7E" style="font-size: 80%;">Queen's Gambit</a><br>
						<a href="https://www.youtube.com/watch?v=4Rrt0Lm176I" style="font-size: 80%;">Scandinavian Defence</a><br>
					</div>
				</div>
			</aside>
			<footer>
			</footer>
		</div>
	</body>
</html>