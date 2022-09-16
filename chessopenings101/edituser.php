<html>
	<?php session_start();?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Edit Users</title>
		<style>  

		.btn2 {
				border: 1px;
				border-style: solid;
				background-color: inherit;
				padding: 10px 20px;
				font-size: 100%;
				cursor: pointer;
				margin:auto;
			}
			
		.btn2:hover {
				background: black;
				color: white;
			}
		</style>

<?php 
        $db_host        = 'localhost';
		$db_user        = 'admin';
		$db_pass        = 'admin';
		$db_database    = 'chessopenings101'; 

        if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database))
        {
            $sql = "SELECT type FROM user WHERE username = '".$_GET['usern']."';";
			$sql_result=mysqli_query($con,$sql);
			if(!$sql_result)
			{
				echo "<p> Query [$sql] couldn't be executed </p>";
    			echo mysqli_error($con);
			}
			$arr = mysqli_fetch_all($sql_result);
        }
        else
        {
            echo "<script>alert(\"Error connecting to Database\");</script>";
        }
        $_SESSION['usern2edit'] = $_GET['usern'];

        mysqli_close($con);
?>
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
			<main style="width: 100%; padding-left:15%; padding-right:15%;">
                <div align="center" style="font-size:230%; margin-top: 5vh; margin-bottom: 8vh;">
                        Επεξεργασία Χρηστών

                </div>
                <form action="applyuserchanges.php" method="post" onsubmit="return confirm('Είστε σίγουρος πως θέλετε να κάνετε αυτή την αλλαγή;');">
                <div style="margin-top:5%;
                            margin-bottom: 5%;
                            padding-bottom:3%;
                            padding-top:3%;
                            padding-left: 1ex;
                            padding-right: 1ex;
                            border-style: solid;
                            border-width: 1px;
                            border-radius: 25px;
                            text-align:center;"><b style="padding-left: 1ex;padding-right: 4ex;">Όνομα Χρήστη: <?php echo $_GET['usern']; ?></b><b style="
                            padding-left: 4ex;padding-right: 10ex;">Τύπος Χρήστη: <?php echo $arr[0][0] ?></b> 
                            <br><br>
                            Επιλέξτε τον νέο τύπο χρήστη:<br><br>
                            <input type="radio" name="radio1" value = "registered" id="radio1.1"> Εγγεγραμμένος χρήστης<b style="padding-left: 1ex;padding-right: 4ex;"> </b>
							<input type="radio" name="radio1" value = "moderator" id="radio1.2"> Συντονιστής<br>
                            <br><br><br>
                            <button class="btn2"><b>Υποβολή</b></button>
					</div>
                </form>
			</main>
			<footer>
			</footer>
		</div>
	</body>
</html>