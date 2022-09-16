<?php 
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['usertype']);
	header("Location: index.php");
?>

