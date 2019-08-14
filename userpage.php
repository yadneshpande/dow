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
    /*position: sticky;
    top: 0;*/
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
.footer {
   position: bottom;
   left: 0;
   bottom: 10%;
   width: 100%;
   background-color:#2d2d2d`;
   color: white;
   text-align: center;
}
/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 10px;
    /*background-color: #ccc;*/
    height: 250px;
}

.column a {
    float: none;
    color: black;
    padding: 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.column a:hover {
    /*background-color: #ddd;*/
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/*body {
    font-family: 'Lato', sans-serif;
}*/

.overlay {
    height: 0%;
    width: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-y: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
    top: 15%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;

}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
    color: white;
}
td img{
  width:100px;
}
</style>
</head>
<body>
<div class="header">
  <h2><i><b>Deals on Wheels</i></b></h2>
</div>

<ul>
  <li><a class="active" href="home2.php">Home</a></li>
  <li><a href="about1.php">About Us</a></li>
  <li><span style="display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none; 
    cursor: pointer;" onclick="openNav()">Buy a Car</span></li>
    <li><a href="syc1.php">Sell a Car</a></li>
    <!-- <li><a href="#na">New Arrivals</a></li>    -->
 <li style="float:right"><a href="logredirect.php"><?php echo $name ?></a></li>
</ul>
<h1 align='center'; style="color:white;"><?php echo $name ?></h1>
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <div class="row">
        <div class="column">
         
          <a href="brands.php?id=Audi"><img src="audi.png"></a><br>
          <a href="brands.php?id=Bentley"><img src="ben.png" ></a><br><br>
          <a href="brands.php?id=Jeep"><img src="j.png" style="width:200px;height:100px;"></a><br>
          
        </div>
        <div class="column">
          
          <a href="brands.php?id=Rolls Royce"><img src="rolls.png"></a><br>
          <a href="brands.php?id=Lamborghini"><img src="lamborghini.png" ></a><br>
          <a href="brands.php?id=Mercedes"><img src="mercedes1.png"  ></a><br>
          
        </div>
       
          <a href="brands.php?id=Range Rover"><img src="range-rover.png" ></a><br>
          <a href="brands.php?id=BMW"><img src="bmw-logo.png" style="width:200px;height:200px;"></a><br>
          
        </div> 
      </div>
      </div>
</div>
<?php
   
    $conn = new mysqli("localhost","root","","dow");

    $result7 = $conn->query("SELECT * FROM `requestzzz` join name on requestzzz.carid=name.id join login on requestzzz.uname=login.uname join image on image.id=name.id join car on car.id=name.id WHERE login.uname='$name' ");
    
    $acdc=$result7->fetch_assoc();

     echo "
             <table>
  
  <tr>
    <td>Username</td>
    <td>".$acdc['uname']."</td>
    
  </tr>
  <tr>
    <td>Name</td>
    <td>".$acdc['name']."</td>
    
  </tr>
  <tr>
    <td>Email</td>
    <td>".$acdc['email']."</td>
    
  </tr>
  <tr>
    <td>Age</td>
    <td>".$acdc['age']."</td>
    </tr>
  <tr>
    <td>Password</td>
    <td>".$acdc['pass']."</td>
    
  </tr>
 
</table>
        <br>
       <a style='float:right; margin:5px; ' href=edit3.php><button style='padding:5px;' onclick='myFunction()'>Edit Info</button></a>
      <button style='float:right; margin:5px; padding:5px;'><a style='color:black;' href=del3.php onClick=\"return confirm('Are you sure you want to delete?')\">Delete Account</a></button>

       <br>
     <h1 align='center' style='color:white;'>Wish List</h1>";
echo "      <table>
<tr>
  
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
";

$result8 = $conn->query("SELECT * FROM `requestzzz` join name on requestzzz.carid=name.id join login on requestzzz.uname=login.uname join image on image.id=name.id join car on car.id=name.id WHERE login.uname='$name' ");


while($acd=$result8->fetch_assoc()){
     echo "
     <tr>".
    "<td>".$acd['BrandN']."</td>".
    "<td>".$acd['CarN']."</td>".
    "<td><img src=".$acd['Poster']." width:50px;></td>".
    "<td>".$acd['CC']."</td>".
    "<td>".$acd['HP']."</td>".
    "<td>".$acd['Mileage']."</td>".
    "<td>".$acd['Year']."</td>".
    "<td>".$acd['Fuel']."</td>".
    "<td>".$acd['Gear']."</td>".
    "<td>".$acd['Color']."</td>".
       "<td>".$acd['Price']."</td>".
    "<td><a style='color:white'; href=\"del.php?idd=".$acd['carid']."\" onClick=\"return confirm('Are you sure you want to delete?')\"><b><i>Delete</i><b></a></td>".
    
    "</tr>".
     
"<br><br>"
     ;





    }
echo "</table>";

  
?>
<script>
function myFunction() {
    var txt;
    if (confirm("Are you sure?!")) {
            } else {
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>
<script>
function myFunction1() {
    alert("Request for the car has been Submitted\nCompany will contact you soon");
}
</script>
<script type="text/javascript">
    $('.delete_button').click(function(e){
        var result = confirm("Are you sure you want to delete this user?");
        if(!result) {
            e.preventDefault();
        }
    });
</script>
<script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
<div class="footer">
  <p>
    <img src="de.png" alt="logo" style="float:left;width:250px;height:200px;">
    <img src="de.png" alt="logo" style="float:right;width:250px;height:200px;">
    <br>
    <br>
    <br>
    <br>
    <h3>Our Showrooms</h3>
   <ul>
      <li><b><i>LOCATION 1 :  
Near Ved Vihar Apartments , Ved Bhavan Road , Kothrud - Pune - India</i></b></li>
<br>
<li><b><i>LOCATION 2 :
Near Vanraje Society , Vishwashanti Marg , Kothrud – Pune – India</i></b></li>
</ul>

<br>
<br>
<br>
<br>
<br><br><br>


  </p>
</div>    

</body>
</html>
