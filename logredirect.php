<?php
    session_start();
     // if(isset($_SESSION["unam"]))

    unset($_SESSION["unam"]);

	session_destroy();
	header("Location: home1.php");
?>