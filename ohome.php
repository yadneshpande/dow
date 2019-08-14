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
<!DOCTYPE html>
<html>
<head>
<style>
body {
         background-color:#2d2d2d;
         background-size:cover;
         background-position:center;
         height:100vh;
     }
h2{
    color:#bc973a;
    text-align:center;
  }

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: -webkit-sticky; /* Safari */
    position: sticky;
    top: 0;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

.active {
    background-color: #d1ce36;
}
table{
    border-collapse: collapse;
    padding-top:70px;
    font-family: Arial;
    color:white;
    width:100%;
}
td{
    border:1px solid white;
    padding:5px;
    letter-spacing: 1px;
    border-collapse: collapse;
}
td img{
  width:100px;
}
a{
  color:white;
}
</style>
</head>
<body>

<div class="header">
  <h2><i><b>Deals on Wheels</i></b></h2>
</div>

<ul>
  <li><a class="active" href="">Home</a></li>
  <li><a href="aac.php">Add a car</a></li>
   <li><a href="vac.php">View all Cars</a></li>
   <li><a href="vau.php">View all Users</a></li>

<li style="float:right"><a href="logredirect.php"><?php echo $name ?></a></li>
</ul>

<h1 align='center'; style="color:white;">Requests to Buy a Car</h1>


<?php
   
    $conn = new mysqli("localhost","root","","dow");

    $result7 = $conn->query("SELECT * FROM `requestzzz` join name on requestzzz.carid=name.id join login on requestzzz.uname=login.uname join image on image.id=name.id ");
    ?>
<table>
  <tr>  
    <th>Name</th>
    <th>Username</th>
    <th>Car Name</th>
    <th>Email</th>
  </tr>

<?php
while($acdc=$result7->fetch_assoc()){
echo "<tr><td>".$acdc['name']."</td>".
    "<td>".$acdc['uname']."</td>".
    "<td>".$acdc['CarN']."</td>".
    "<td>".$acdc['email']."</td>".
    "<td><img src=".$acdc['Poster']." width:50px;></td>".
   
    
    "</tr>";


}
?>
</table>

</body>
</html>