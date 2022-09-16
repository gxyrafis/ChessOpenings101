
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
		<title>CO101 - Sign Up</title>
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
			
			.btn2:hover{
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
			<main class="mainsu">
				<div align="center" style="font-size:250%;">
					Εγγραφή Χρήστη<br><br><hr>
				</div>
				<form action="signup.php" id="form1" method="post" enctype="multipart/form-data">
					<div align="left">
						<label for="fname">Όνομα</label><br>
						<input type="text" id="fname" name="fname" placeholder="Εισάγετε το όνομα σας..." size="23%" required><br><br><hr>
						<label for="lname">Επώνυμο</label><br>
						<input type="text" id="lname" name="lname" placeholder="Εισάγετε το επώνυμο σας..." size="23%" required><br><br><hr>
						<label for="bday">Ημερομηνία Γέννησης</label><br>
						<input id="bday" type="date" name="bday" max= '2000-01-01'  min = '1900-01-01' required><br><br><hr>
						Φύλο<br>
						<input type="radio" name="genderradiobox" value = "Male" required> Αρσενικό&nbsp&nbsp&nbsp
						<input type="radio" name="genderradiobox" value = "Female"> Θηλυκό&nbsp&nbsp&nbsp
						<input type="radio" name="genderradiobox" value = "Other"> Άλλο<br><br><hr>
						<label for="username">Username</label><br>
						<input type="text" id="username" name="username" placeholder="Εισάγετε το όνομα χρήστη..." size="23%" required><br><br><hr>
						<label for="password">Password</label><br>
						<input type="password" id="password" name="password" placeholder="Εισάγετε τον κωδικό σας..." size="23%" required><br><br><hr>
						<label for="password2">Confirm password</label><br>
						<input type="password" id="password2" name="password2" placeholder="Εισάγετε τον κωδικό σας ξανά..." size="23%" required><br><br><hr>
						<label for="email">Email</label><br>
						<input type="email" name="email" id="email" placeholder="Εισάγετε το email σας..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" size="23%" name="usermail" required><br><br><hr>
						Φωτογραφία Προφίλ<br>
						<input type="file" name="pfp" id="pfp" accept=".gif,.jpg,.jpeg,.png"><br><br>
						<hr><br><br><br><br>
					
					</div>
					<?php	if((isset($_SESSION['usernameExists']))&&($_SESSION['usernameExists'] === TRUE))
							{?>
							<div align="center">
								<b style="color: red;">Σφάλμα: Το όνομα χρήστη που δώσατε χρησιμοποιείται ήδη<br>Παρακαλώ δοκιμάστε κάποιο διαφορετικό</b><br><br><br><br>
							</div>
							<?php 
							$_SESSION['usernameExists'] = False;
							} 
							else if((isset($_SESSION['passworderror']))&&($_SESSION['passworderror'] === TRUE))
							{ ?>
							<div align="center">
								<b style="color: red;">Σφάλμα: Οι κωδικοί που δώσατε δεν ταιριάζουν μεταξύ τους</b><br><br><br><br>
							</div>
							<?php 
							$_SESSION['passworderror'] = False;
							} ?>
					<div align="center">
						<button class="btn2"><b>Υποβολή Εγγραφής</b></button>
					</div>
				</form>
			</main>
			<footer>
			</footer>
	</body>
</html>

<script>
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yyyy = today.getFullYear();
	 if(dd<10){
			dd='0'+dd
		} 
		if(mm<10){
			mm='0'+mm
		} 

	today = yyyy+'-'+mm+'-'+dd;
	document.getElementById("bday").setAttribute("max", today);
</script>