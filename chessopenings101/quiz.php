<!DOCTYPE html>

<html>
	<?php session_start();?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CO101 - Quiz</title>

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
					
					<form action="quiz.php" method="POST">
						<div>
							<button class="btn"><b>Τεστ Γνώσεων</b></button>
						</div>
					</form>
					
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
					Τεστ Αυτοαξιολόγησης
				</div>
				<form action="quizresults.php" method="post" onsubmit="return confirm('Are you sure you want to submit your answers?');">
					<ol>
						<li style="font-size: 170%">Ποια από τα παρακάτω ανοίγματα για τα μαύρα πιόνια αποτελούν απάντηση στην κίνηση e4 των άσπρων; (Παραπάνω από 1 σωστά)</li><br><br>
						<div style="font-size: 150%;">
							<input type="checkbox" name="checkbox1.1" value = "Ruy Lopez" id="checkbox1.1"> Ruy Lopez<br>
							<input type="checkbox" name="checkbox1.2" value = "Sicilian Defence" id="checkbox1.2"> Sicilian Defence<br>
							<input type="checkbox" name="checkbox1.3" value = "Italian Game" id="checkbox1.3"> Italian Game<br>
							<input type="checkbox" name="checkbox1.4" value = "Scandinavian Defence" id="checkbox1.4"> Scandinavian Defence<br>
						</div>
						<br><hr><br><br>
						<li style="font-size: 170%">Μια από τις βασικές αρχές των σκακιστικών ανοιγμάτων είναι "Έλεγχος των άκρων με τα πιόνια."</li><br><br>
						<div style="font-size: 150%;">
							<input type="radio" name="radio2" value = "True" id="radio2.1"> Σωστό<br>
							<input type="radio" name="radio2" value = "False" id="radio2.2"> Λάθος<br>
						</div>
						<br><hr><br><br>
						<li style="font-size: 170%">Ένα γνωστό άνοιγμα για επιθετικούς παίκτες όταν παίζουν με μαύρα πιόνια είναι η <input type="text" name="text3" id="text3" style="font-size: 80%;" size="10"> Άμυνα</li>
						<br><hr><br><br>
						<li style="font-size: 170%">Η ακολουθία κινήσεων των λευκών πιονιών του ανοίγματος Ruy Lopez είναι η:</li><br><br>
						<div style="font-size: 150%;">
							<input type="radio" name="radio4" value = "1.d4 2.Nd3 3.Bc4" id = "radio4.1"> 1.d4 2.Nd3 3.Bc4<br>
							<input type="radio" name="radio4" value = "1.e4 2.Nf3 3.Bb5" id = "radio4.2"> 1.e4 2.Nf3 3.Bb5<br>
							<input type="radio" name="radio4" value = "1.d4 2.Nf3 3.Bb5" id = "radio4.3"> 1.d4 2.Nf3 3.Bb5<br>
							<input type="radio" name="radio4" value = "1.e4 2.Nd3 3.Bc4" id = "radio4.4"> 1.e4 2.Nd3 3.Bc4<br>
						</div>
						<br><hr><br><br>
						<li style="font-size: 170%">Ονομάστε ένα άνοιγμα το οποίο θεωρείται ριψοκίνδυνο: <input type="text" name="text5" id="text5" style="font-size: 80%;" size="10"></li><br><hr>
					</ol>
					<br><br><br>
					<div align="center">
						<button class="btn2" onclick="CalcScore()"><b>Υποβολή Απαντήσεων</b></button>
					</div>
				</form>
			</main>
			<footer>
			</footer>
		</div>
	</body>
</html>

<script>
	function CalcScore()
	{
		score = 0;
		var checkbox11 = document.getElementById('checkbox1.1');
		var checkbox12 = document.getElementById('checkbox1.2');
		var checkbox13 =document.getElementById('checkbox1.3');
		var checkbox14 = document.getElementById('checkbox1.4');
		var radio21 = document.getElementById('radio2.1');
		var radio22 = document.getElementById('radio2.2');
		var text3 = document.getElementById('text3');
		var radio41 = document.getElementById('radio4.1');
		var radio42 = document.getElementById('radio4.2');
		var radio43 = document.getElementById('radio4.3');
		var radio44 = document.getElementById('radio4.4');
		var text5 = document.getElementById('text5');
		var elements = [checkbox11, checkbox12,checkbox13,checkbox14,radio21,radio22,text3,radio41,radio42,radio43,radio44,text5];
		var ans1 = "Στην ερώτηση: \"Ποια από τα παρακάτω ανοίγματα για τα μαύρα πιόνια αποτελούν απάντηση στην κίνηση e4 των άσπρων; (Παραπάνω από 1 σωστά)\" απαντήσατε: <br><br>";
		var ans2 = "Στην ερώτηση: \"Μια από τις βασικές αρχές των σκακιστικών ανοιγμάτων είναι \"Έλεγχος των άκρων με τα πιόνια.\"\" απαντήσατε: <br><br>";
		var ans3 = "Στην ερώτηση: \"Ένα γνωστό άνοιγμα για επιθετικούς παίκτες όταν παίζουν με μαύρα πιόνια είναι η __________ Άμυνα\" απαντήσατε: <br><br>";
		var ans4 = "Στην ερώτηση: \"Η ακολουθία κινήσεων των λευκών πιονιών του ανοίγματος Ruy Lopez είναι η:\" απαντήσατε: <br><br>"
		var ans5 = "Στην ερώτηση: \"Ονομάστε ένα άνοιγμα το οποίο θεωρείται ριψοκίνδυνο:\" απαντήσατε: <br><br>";
		

		if((checkbox12.checked)&&(checkbox14.checked)&&(!checkbox13.checked)&&(!checkbox11.checked))
		{
			score++;
			ans1 = ans1.concat(checkbox12.value);
			ans1 = ans1.concat("<br>");
			ans1 = ans1.concat(checkbox14.value);
			ans1 = ans1.concat("<br>Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>");
		}
		else
		{
			for(i = 0; i < 4 ; i++)
            {
                if(elements[i].checked)
                {
                    ans1 = ans1.concat(elements[i].value);
                    ans1 = ans1.concat("<br>");
                }
            }
			ans1 = ans1.concat("<br>Οι σωστές απαντήσεις είναι: <br>");
            ans1 = ans1.concat(elements[1].value);
            ans1 = ans1.concat("<br>");
            ans1 = ans1.concat(elements[3].value);
			ans1 = ans1.concat("<br><br><br>");
		}
		if(radio22.checked)
		{
			score++;
			ans2 = ans2.concat(radio22.value);
			ans2 = ans2.concat("<br>Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>");
		}
		else
		{
			ans2 = ans2.concat(radio21.value);
			ans2 = ans2.concat("<br>Η σωστή απάντηση είναι: <br>");
            ans2 = ans2.concat(radio22.value);
			ans2 = ans2.concat("<br><br><br>");
		}
		if((text3.value.toLowerCase() === "σικελική")||(text3.value.toLowerCase() === "σικελικη"))
		{
			score++;
			ans3 = ans3.concat(text3.value);
			ans3 = ans3.concat("<br>Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>");
		}
		else
		{
			ans3 = ans3.concat(text3.value);
			ans3 = ans3.concat("<br>Η σωστή απάντηση είναι: <br>Σικελική<br><br><br>");
		}
		if(radio42.checked)
		{
			score++;
			ans4 = ans4.concat(radio42.value);
			ans4 = ans4.concat("<br>Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>");
		}
		else
		{
			for(i = 7; i < 11 ; i++)
            {
                if(elements[i].checked)
                {
                    ans4 = ans4.concat(elements[i].value);
                    ans4 = ans4.concat("<br>");
                }
            }
			ans4 = ans4.concat("<br>Η σωστή απάντηση είναι: <br>");
            ans4 = ans4.concat(elements[1].value);
			ans4 = ans4.concat("<br><br><br>");
		}
		if((text5.value.toLowerCase() === "σκανδιναβική άμυνα")||(text5.value.toLowerCase() === "σκανδιναβικη αμυνα")||(text5.value.toLowerCase() === "γκαμπί της βασίλισσας")||(text5.value.toLowerCase() === "γκαμπι της βασιλισσας"))
		{
			score++;
			ans5 = ans5.concat(text5.value);
			ans5 = ans5.concat("<br>Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>");
		}
		else
		{
			ans5 = ans5.concat(text5.value);
			ans5 = ans5.concat("<br>Η σωστή απάντηση είναι: <br>Γκαμπί της Βασίλισσας ή Σκανδιναβική Άμυνα.<br><br><br>");
		}

		ans5 = ans5.concat("<br><br><br>Το τελικό σας σκορ είναι: ");
		ans5 = ans5.concat(score);
		ans5 = ans5.concat("/5<br>");
		ans5 = ans5.concat("</div>");

		sessionStorage.setItem("ans1", ans1);
		sessionStorage.setItem("ans2", ans2);
		sessionStorage.setItem("ans3", ans3);
		sessionStorage.setItem("ans4", ans4);
		sessionStorage.setItem("ans5", ans5);
		sessionStorage.setItem("str1", test);
		
	}
</script>