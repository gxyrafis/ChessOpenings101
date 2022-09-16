<html>
	<?php session_start();?>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Edit Profile</title>
		
		<?php 
		$db_host        = 'localhost';
		$db_user        = 'admin';
		$db_pass        = 'admin';
		$db_database    = 'chessopenings101'; 
        $usern = $_SESSION['user'];

		if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database))
        {
            $sql = "SELECT * FROM user WHERE username = '$usern';";
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
				padding: 15px 30px;
				font-size: 100%;
				cursor: pointer;
				margin:auto;
			}
			
			.btn2:hover {background: black;
				color: white;
			}
		    .dateclass {
				width: 100%;
			}

			.dateclass.placeholderclass::before {
				width: 100%;
				content: attr(placeholder);
			}

			.dateclass.placeholderclass:hover::before {
				width: 0%;
				content: "";
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
					Επεξεργασία Προφίλ<br><br><hr>
				</div>
				<form action="edit2.php" id="form1" method="post" enctype="multipart/form-data">
					<div align="left">
						<label for="fname">Όνομα</label><br>
						<input type="text" id="fname" name="fname" placeholder=<?php echo $arr[4]; ?> size="23%" ><br><br><hr>
						<label for="lname">Επώνυμο</label><br>
						<input type="text" id="lname" name="lname" placeholder=<?php echo $arr[5]; ?> size="23%" ><br><br><hr>
						<label for="bday">Ημερομηνία Γέννησης</label><br>
						<input id="bday" type="date" name="bday" max= '2000-01-01'  min = '1900-01-01' placeholder=<?php echo $arr[6]; ?> onClick="$(this).removeClass('placeholderclass')" class="dateclass placeholderclass" ><br><br><hr>
						Φύλο<br>
						<input type="radio" name="genderradiobox" <?php if($arr[7] =='Male') echo 'checked'; ?> value = "Male"> Αρσενικό&nbsp&nbsp&nbsp
						<input type="radio" name="genderradiobox" <?php if($arr[7] =='Female') echo 'checked'; ?> value = "Female" > Θηλυκό&nbsp&nbsp&nbsp
						<input type="radio" name="genderradiobox" <?php if($arr[7] =='Other') echo 'checked'; ?> value = "Other" > Άλλο<br><br><hr>
						<label for="password">Password</label><br>
						<input type="password" id="password" name="password" placeholder="Εισάγετε τον νέο κωδικό σας..." size="33%"><br><br><hr>
						<label for="password2">Confirm password</label><br>
						<input type="password" id="password2" name="password2" placeholder="Εισάγετε τον νέο κωδικό σας ξανά..." size="33%"><br><br><hr>
						<label for="email">Email</label><br>
						<input type="email" name="email" id="email" placeholder=<?php echo $arr[3]; ?> pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" size="23%" name="usermail"><br><br><hr>
						Φωτογραφία Προφίλ<br>
						<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($arr[8]); ?>" height="20%" ><br><br>
						<input type="file" name="pfp" id="pfp" accept=".gif,.jpg,.jpeg,.png" ><br><br>
						<hr><br><br><br><br>
					</div>
					<div align="center">
						<button class="btn2"><b>Υποβολή Αλλαγών</b></button>
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