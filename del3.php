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
$conn = new mysqli("localhost","root","","dow");

$conn->query("DELETE FROM login WHERE uname='$name'");
$conn->query("DELETE FROM requestzzz WHERE uname='$name'");

header("Location:home1.php");


?>
