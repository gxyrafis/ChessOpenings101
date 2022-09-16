
<html>
	<?php session_start();
	 if(isset($_SESSION['user'])){ 
		header("Location: index.php");
	 }
	?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Login</title>
		<style>
			main{
				max-width:100%; 
				margin-top:5%;
				margin-bottom: 5%;
				padding-top: 3%;
				padding-bottom:3%;
				padding-left: 20%;
				padding-right: 20%;
				border-style: solid;
				border-width: 1px;
				border-radius: 25px;
			}
			
			.btn2 {
				border: 1px;
				border-style: solid;
				background-color: inherit;
				padding: 15px 30px;
				font-size: 100%;
				cursor: pointer;
				margin:auto;
			}
			
			.btn2:hover {background: black;
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
					
					<form action="quiz.php" method="POST">
						<div>
							<button class="btn"><b>Τεστ Γνώσεων</b></button>
						</div>
					</form>
					
					<form action="sign-up.php" method="POST">
						<div>
							<button class="btn"><b>Εγγραφή Χρήστη</b></button>
						</div>
					</form>
					
					<form action="login.php" method="POST">
						<div>
							<button class="btn"><b>Είσοδος Χρήστη</b></button>
						</div>
					</form>
				</div>
			</nav>
			<main class="mainsu" style="margin-top: 15%; margin-bottom:6%;">
				<div align="center" style="font-size:250%;">
					Είσοδος Χρήστη<br><br><hr>
				</div>
				<form action="login2.php" id="form2" method="post">
					<div align="left">
						<label for="usern">Username</label><br>
						<input type="text" name="usern" id="usern" placeholder="Εισάγετε το όνομα χρήστη..." size="30" required><br><br><hr>
						<label for="pass">Password</label><br>
						<input type="password" name="pass" id="pass" placeholder="Εισάγετε τον κωδικό σας..." size="30" required><br><br><hr><br><br>
					</div>
					<?php	if((isset($_SESSION['invalid']))&&($_SESSION['invalid'] === TRUE))
							{?>
							<div align="center">
								<b style="color: red;">Λάθος κωδικός ή όνομα χρήστη<br>Παρακαλώ δοκιμάστε ξανά</b><br><br><br><br>
							</div>
							<?php 
							$_SESSION['invalid'] = False;
							} ?>
				<div align="center" id="form-submit">
					<button id="login" class="btn2"><b>Είσοδος</b></button>
				</div>
				</form>
			</main>
			<footer style="margin-top:10%;">
			</footer>
	</body>
</html>	