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

.about {
         background-color:#2d2d2d;
         font-family: arial;
color: #bbccbb;
    font-size: 25px;
       }

h5{
      color:#d8b3b3;
    text-align:center;  
    font-size: 40px;

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

.footer {
   position: bottom;
   left: 0;
   bottom: 10%;
   width: 100%;
   background-color:#2d2d2d`;
   color: white;
   text-align: center;
}

.footer {
   position: bottom;
   left: 0;
   bottom: 10%;
   width: 100%;
   background-color: #2d2d2d;
   color: white;
   text-align: center;
}
</style>
</head>
<body>
    <div class="header">
  <h2><i><b>Deals on Wheels</i></b></h2>
</div>

<ul>
  <li><a  href="home2.php">Home</a></li>
  <li><a class="active" href="about1.php" >About Us</a></li>
   <li><span style="display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none; 
    cursor: pointer;" onclick="openNav()">Buy a Car</span></li>
    <li><a href="syc1.php">Sell a Car</a></li>
    <!-- <li><a href="#na">New Arrivals</a></li> -->
     
<li style="float:right"><a href="userpage.php"><?php echo $name?></a></li>
</ul>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <div class="row">
        <div class="column">
          <!-- <h3>Category 1</h3> -->
          <a href="brands.php?id=Audi"><img src="audi.png"></a><br>
          <a href="brands.php?id=Bentley"><img src="ben.png" ></a><br><br>
          <a href="brands.php?id=Jeep"><img src="j.png" style="width:200px;height:100px;"  ></a><br>
          
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




<script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>






<div class="about">
<p1>
    <h5><b><i>About Deals on Wheels</b></i></h5>
    <br>
    <i>The Market Leader in Pre-owned Luxury and Sports Cars
Deals on Wheels was established in 2008 and it is the fastest growing car dealership in the world.
<br>
We have a reputation of making it our business to understand the individual needs of our clients and ensure that we offer them something that will align with their budget. We understand that some of our clients are new market entrants seeking an affordable luxury vehicle. We serve their individual needs by creating customized financial packages to ensure that their dream of owning a luxury car is a reality, and they leave Deals on Wheels satisfied with our service. Our belief is the buying and selling experience should be free of stress and overall an enjoyable experience. Our sales team is well versed in all the brands we sell and effective in communicating the features and benefits of each of the cars we sell.
<br>
Our extensive collection of exclusive luxury cars cannot be found anywhere else in the world, with brands such as Bentley, Rolls Royce, and Maybach. Our Supercars collection include cars from Koenigsegg,  Bugatti, McLaren, Lamborghini, to name a few and we also have amazing performance cars from brands such as Ferrari, Aston Martin, Porche, Maserati, among others.  We also cater to the SUV and entry-level sports cars market, with cars such as Bentley Bentayga, Range Rover, and Mercedes AMG as well as Jaguar, Infiniti, Mercedes, BMW, and Audi.  All this makes for a unique buying experience for our customers, allowing them the ability to choose from a variety of brands at competitive prices.
<br>
We welcome part exchanges and offer competitive prices to ensure our clients don’t have to invest their own time and money in marketing their car to potential buyers. Our reputation is demonstrated in our excellence in serving the needs of each of our customers before, during and after the sale. Many of our clients are existing customers who simply keep returning to deals on wheels to enhance their lifestyle.</i>
<br>
</p1>
</div>>
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
