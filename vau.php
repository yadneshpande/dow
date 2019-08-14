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
  $conn=new mysqli("localhost","root","","dow");
  
  $result = $conn->query("SELECT * FROM login");
// $abc=$result->fetch_assoc();
?>
<HTML>
<head>
<title>VIEW</title>
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
   <li><a href="vac.php">View all Cars</a></li>
   <li><a class="active" href="">View all Users</a></li>
   
<li style="float:right"><a href="logredirect.php"><?php echo $name ?></a></li>
</ul>
<div style="padding-right:1%;padding-top:70px;overflow-x:auto;">
<table>
<tr>
  <th>id</th>
  <th>Name</th>
  <th>age</th>
  <th>email</th>
  <th>User Name</th>
  <th>Visits</th>
  
  <th></th>
</tr>
<?php
while($abcd=$result->fetch_assoc()){
  echo "<tr><td>".$abcd['id']."</td>".
    "<td>".$abcd['name']."</td>".
    "<td>".$abcd['age']."</td>".
    "<td>".$abcd['email']."</td>".
    "<td>".$abcd['uname']."</td>".
    "<td>".$abcd['visits']."</td>".
    
    "</tr>";
}
?>
</table>
</div>
</div>
</HTML>