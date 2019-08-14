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
$iddd=$_GET['id2'];
$conn = new mysqli("localhost","root","","dow");


$conn->query("DELETE FROM car WHERE id='$iddd'");
$conn->query("DELETE FROM name WHERE id='$iddd'");
$conn->query("DELETE FROM image WHERE id='$iddd'");

header("Location:vac.php");



?>
