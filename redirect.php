<?php
        session_start();
        $u=$_SESSION['unam'];
        if($_SESSION["unam"]=="owner"){
        	header("Location: ohome.php");
        }
        else
        	 header("Location:home2.php");
        	$conn = new mysqli("localhost","root","","dow");
        	$conn->query("UPDATE login SET visits = visits+1 WHERE uname= '$u'");
?>