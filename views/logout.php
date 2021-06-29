<?php

session_start();
unset($_SESSION["username"]);
unset($_SESSION["profile"]);

header("Location: log-in-form.php");


?>