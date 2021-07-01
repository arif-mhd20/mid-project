

<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: log-in-form.php");
	}
?>

<h1>Home Page</h1>

<?php
    include 'menu-layout.php'
?>