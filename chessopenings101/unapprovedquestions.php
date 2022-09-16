<html>
	<?php session_start();?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Pending Questions</title>
		<style>  
		/*For some reason it ignores the dropdown if it's placed in the css file, so we'll have to keep it here for now*/

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
            $sql = "SELECT * FROM questions WHERE accepted = '0';";
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

        mysqli_close($con);
?>
<script src="scripts/scripts.js"></script>
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
                        Εκκρεμείς Ερωτήσεις

                </div>
                <div style = "margin-bottom: 40%;"> 
                <?php
                        for($i = 0 ; $i < sizeof($arr) ; $i++)
                        {
                            echo "<div style=\"
                            margin-top:5%;
                            margin-bottom: 5%;
                            padding-bottom:3%;
                            padding-top:3%;
                            border-top: 1px solid;
                            border-bottom: 1px solid;
                            text-align:center;
                            \"><b style=\"padding-left: 1ex;padding-right: 4ex;\">ID Ερώτησης: ".$arr[$i][0]."</b><br><b style=\"
                            padding-left: 4ex;padding-right: 10ex;\">Ερώτηση: ".$arr[$i][2]."</b><br>
                            <b style=\"padding-left: 4ex;padding-right: 10ex;\">Απάντηση: ".$arr[$i][3]."</b><b style=\"padding-left: 4ex;padding-right: 10ex;\">Δυσκολία: ".$arr[$i][5]."</b>
                            <b style=\"padding-left: 4ex;padding-right: 10ex;\">Χρήστης: ".$arr[$i][1]."</b><br><br>
							<button class=\"btn2\" id = \"".$arr[$i][0]."edit\" onclick=\"editq('".$arr[$i][0]."')\"><b>Επεξεργασία</b></button>
							<button class=\"btn2\" id = \"".$arr[$i][0]."del\" onclick=\"approve('".$arr[$i][0]."')\"><b>Έγκριση</b></button></div>";
                        }
                ?>
                </div>
			</main>
			<footer>
			</footer>
		</div>
	</body>
</html>