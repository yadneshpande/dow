<?php 
  session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
/*body {
  font-family: Arial, Helvetica, sans-serif;
}*/

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
} 

/* style inputs and link buttons */
input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}

/* style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Two-column layout */
.col {
  float: left;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* text inside the vertical line */
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* bottom container */
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  ?* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }
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
<?php
  $unamErr=$pswErr=$loginErr="<br>";
  $flag=0;
  $conn=new mysqli("localhost","root","","dow");
  $result=$conn->query("SELECT * FROM login");
    if(empty($_POST["unam"])){
      $unamErr ="Username is empty";
    }
    else{
      $unam=$_POST["unam"];
      $flag=1;
    }
    if(empty($_POST["psw"])){
      $pswErr="Password is empty";
    }
    else{
      $psw=$_POST["psw"];
      $flag=2;
    }
    if($flag==2){
      while($row=$result->fetch_assoc()){
        if($row["uname"]==$unam && $row["pass"] == $psw){
          $flag=3;
          echo "Correct";
          $_SESSION["unam"]=$unam;
          header("Location: redirect.php");
        }
      }
    }
    if($flag!=3 && $flag==2){
      $loginErr= "The username password combination doesnt exist<br>";
    }

?>
<body>
<div class="header">
  <h2><i><b>Deals on Wheels</i></b></h2>
</div>

<ul>
  <li><a  href="home1.php">Home</a></li>
  <li><a href="about.php">About Us</a></li>
   <li><a class="active" href="syc.php">Buy a Car</a></li>
    <li><a class="active" href="syc.php">Sell a Car</a></li>
    <!-- <li><a href="#na">New Arrivals</a></li> -->
     <li><a href="contact.php">Contact Us</a></li>
<li style="float:right"><a class="active" href="syc.php">Sign In</a></li>
<li style="float:right"><a href="signup.php">Sign Up</a></li>
</ul>

<div class="container">
  <form name="login" action="" method="post"> 
     <!-- <form action="/action_page.php">  -->
    <div class="row">
      <h2 style="text-align:center; font-size:200%;" >Login </h2>
      <br>
      <div class="vl">
        <span class="vl-innertext">&&</span>
      </div>

      <div class="col">
        <p style="font-size:250%;">
          <h4 style="text-align: center; font-size:160%;">Why to LOGIN ?</h4>
        Logging in is usually used to enter a specific page, which trespassers cannot see. Once the user is logged in, the login token may be used to track what actions the user has taken while connected to the site. Logging out may be performed explicitly by the user taking some actions, such as entering the appropriate command, or clicking a website link labeled as such. It can also be done implicitly, such as by the user powering off his or her workstation, closing a web browser window, leaving a website, or not refreshing a webpage within a defined period.
      </p>

      </div>

      <div class="col">
        <div class="hide-md-lg">
          <p>& sign in manually:</p>
        </div>
        <span class=error><?php echo $loginErr ?></span><br>
        <input type="text" name="unam" id="unam" placeholder="Username"><span class=error><?php echo $unamErr; ?></span>
        <br><br>
        <input type="password" name="psw" id="pass" placeholder="Password"><span class=error><?php echo $pswErr; ?></span>
        <br><br>
        <input type="submit" value="Login">
        <br><br>
      </div>
    </div>
  </form>
</div>
  <!-- <br><br><br> -->
<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="signup.php" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="#" style="color:white" class="btn">Forgot password?</a>
    </div>
    <br><br><br>
  </div>
</div>
</div>

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
