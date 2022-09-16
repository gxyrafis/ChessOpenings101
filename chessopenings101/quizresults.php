
<?php global $scorecounter?>
<html>
	<?php session_start();?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Main</title>
        <script>
            function showresults()
            {
                var ans1 = sessionStorage.getItem("ans1");
                var ans2 = sessionStorage.getItem("ans2");
                var ans3 = sessionStorage.getItem("ans3");
                var ans4 = sessionStorage.getItem("ans4");
                var ans5 = sessionStorage.getItem("ans5");
                document.write("<div style=\"font-size: 150%;\">");
                document.write(ans1);
                document.write(ans2);
                document.write(ans3);
                document.write(ans4);
                document.write(ans5);

            }
        </script>
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
						else{ ?>
								<div class="dropdown">  
								<button class="dropbtn"><b><?php echo $_SESSION['user']; ?></b></button>
								<div class="dropdown-content">
								<a href="logout.php">Αποσύνδεση</a>
						</div>
						</div>
						<?php } ?>
				</div>
			</nav>
			<main style="width: 100%; padding-left:15%; padding-right:15%;">
                <div align="center" style="font-size:230%; margin-top: 5vh; margin-bottom: 8vh;">
                        Αποτελέσματα Τεστ Αυτοαξιολόγησης
                </div>
                <script>showresults();</script>
					<br><br><br>

			</main>
			<footer>
			</footer>
		</div>
	</body>
</html>