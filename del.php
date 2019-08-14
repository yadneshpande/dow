<?php

  session_start();
  if(isset($_SESSION['unam']))
  {
       $name=$_SESSION['unam'];
  }
    else
  {
    header("Location: home1.php");
  }
?>
<?php
$iddd=$_GET['idd'];
$conn = new mysqli("localhost","root","","dow");


$conn->query("DELETE FROM requestzzz WHERE uname='$name'AND carid='$iddd'");

header("Location:userpage.php");


?>
