<?php 
  session_start();
  if(isset($_SESSION['unam']))
  {
       $name=$_SESSION['unam'];
       $conn=new mysqli("localhost","root","","dow");
  
  $result = $conn->query("SELECT * FROM car join name on car.id=name.id join image on car.id=image.id ");
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
  <li><a  href="ohome.php">Home</a></li>
  <li><a href="aac.php">Add a car</a></li>
   <li><a class="active" href="">View all Cars</a></li>
   <li><a href="vau.php">View all Users</a></li>
   
<li style="float:right"><a href="logredirect.php"><?php echo $name ?></a></li>
</ul>

<div style="padding-right:1%;padding-top:70px;overflow-x:auto;">
<table>
<tr>
  <th>id</th>
  <th>Brand Name</th>
  <th>Car Name</th>
  <th>Images</th>
  <th>Engine</th>
  <th>Horse Power</th>
  <th>Mileage</th>
  <th>Year</th>
  <th>Fuel</th>
  <th>Gear</th>
  <th>Color</th>
  <th>Price</th>
  <th></th>
</tr>
<?php
while($abcd=$result->fetch_assoc()){
  echo "<tr><td>".$abcd['id']."</td>".
    "<td>".$abcd['BrandN']."</td>".
    "<td>".$abcd['CarN']."</td>".
    "<td><img src=".$abcd['Poster']." width:50px;></td>".
    "<td>".$abcd['CC']."</td>".
    "<td>".$abcd['HP']."</td>".
    "<td>".$abcd['Mileage']."</td>".
    "<td>".$abcd['Year']."</td>".
    "<td>".$abcd['Fuel']."</td>".
    "<td>".$abcd['Gear']."</td>".
    "<td>".$abcd['Color']."</td>".
    "<td>".$abcd['Price']."</td>".
    "<td><a href=\"edit.php?id=".$abcd['id']."\"><b><i>Edit</i></b></a></td>".
    "<td><a href=\"delete.php?id2=".$abcd['id']."\" onClick=\"return confirm('Are you sure you want to delete?')\"><b><i>Delete</i></b></a></td>".
    "</tr>";
}
?>
</table>
</div>
</div>
</body>
</html>