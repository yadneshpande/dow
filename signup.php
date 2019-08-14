<!DOCTYPE html>
<html>
<head>
<style>
#rcorners2 {
    border-radius: 25px;
    border: 2px solid black;
    padding: 10px; 
    width: 200px;
        
}
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

.mySlides {display: none;}

.slideshow-container {

  position: relative;
  margin: auto;
}

.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.error{
  color:red;
}
form{
  /*background-color:white;*/
  width:40%;
  margin-left:50px;
  padding:20;
  /*border:solid black 2px;*/
}
input{
    width:50%;
    height:50px;
    /*margin:20px;*/
    background-color:#e5e5c7;
    border:none;
    font-size:20
}
button{
    width:50%;
    height:50px;
    border:none;
    background-color:#7f5d5d;
    width:50%;
    cursor:pointer;
    font-size:20;
}
button:hover{
  opacity:0.8;

}
img{
  height:50;
  float:left;
}
#unam{
  float:right;
}
#pass{
  float:right;
}
.cs{
    background-image: url("su.jpg");
    background-size: 1600px 900px;
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
</style>
</head>
<body>

<div class="header">
  <h2><i><b>Deals on Wheels</i></b></h2>
</div>

<ul>
  <li><a class="active" href="home1.php">Home</a></li>
  <li><a href="about.php">About Us</a></li>
   <li><a href="syc.php">Buy a Car</a></li>
    <li><a href="syc.php">Sell a Car</a></li>
    <!-- <li><a href="#na">New Arrivals</a></li> -->
     <li><a href="contact.php">Contact Us</a></li>
<li style="float:right"><a href="syc.php">Sign In</a></li>
<!-- <li style="float:right"><a href="syc.php">Admin</a></li> -->
</ul>
<div class="cs">
<?php 
$conn=new mysqli("localhost","root","","dow");
  $name=$age=$email=$unam=$psw=$cpsw="";
  $nameErr = $ageErr = $emailErr = $unamErr = $pswErr=$cpswErr= "";
  $msg="<a href=\"syc.php\"> Login </a>";
  //$_POST["name"]=$_POST["age"]=$_POST["email"]=$_POST["unam"]=$_POST["psw"]=$_POST["cpsw"]="";
  $flag=$uflag=0;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["name"])){
      $nameErr="Please fill out name";
    }
    else{
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) 
        $nameErr="Only letters and whitespaces allowed in name";
      else{
        $nameErr="";
        $name=$_POST["name"];
        $flag++;
      }
    }
    if(empty($_POST["age"])){
      $ageErr="Enter Age";
    }
    else{
      if(!preg_match("/^[0-9]*$/",$_POST["age"]))
        $ageErr="-_-";
      else{
        $ageErr="";
        $age=$_POST["age"];
        $flag++;
      }
    }
    if(empty($_POST["email"])){
      $emailErr="Enter Email";
    }
    else{
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
        $emailErr="Invalid email format";
      else{
        $emailErr="";
        $email=$_POST["email"];
        $flag++;
      }
    }
    if(empty($_POST["unam"]))
      $unamErr="Enter Username";
    else{
      
      $result=$conn->query("SELECT * FROM login");
      while($row=$result->fetch_assoc()){
        if($row["uname"]==$_POST["unam"]){
          $unamErr="Username already exists !";
          $uflag=1;
          break;
        }
      }
      if($uflag==0){
        $unamErr="";
        $unam=$_POST["unam"];
        $flag++;
      }
      
    }
    if(empty($_POST["psw"])){
      $pswErr="Enter Password";
    }
    else
      $pswErr="";
    if(empty($_POST["cpsw"])){
      $cpswErr="Enter Confirm Password";
    }
    else{
      if($_POST["cpsw"]!=$_POST["psw"]){
        $cpswErr="The passwords do not match";
      }
      else{
        $cpswErr="";
        $psw=$_POST["cpsw"];
        $flag++;      
      }
    }

    echo $flag;
    if($flag==5){
      echo "INSIDE IF";
      echo $name,$age,$email,$unam,$psw;
      $conn->query("INSERT into login(name,age,email,uname,pass) VALUES ('$name','$age','$email','$unam','$psw')");
      echo mysqli_error($conn);
      $msg= "Account Created Successfully ... <a href = \"syc.php\"> Login </a> Again ";
    }
  }
?>
<form method="post">
<h1><i>Sign Up</i></h1>
<input id="rcorners2" type="text" name = "name" placeholder="Name" value=<?php echo $name; ?>>
<span class="error"><?php echo $nameErr; ?><br><br></span>
<input id="rcorners2" type="text" name="age" placeholder="Age" value=<?php echo $age; ?>>
<span class="error"><?php echo $ageErr; ?><br><br></span>
<input id="rcorners2" type="text" name="email" placeholder="E-Mail" value=<?php echo $email; ?>>
<span class="error"><?php echo $emailErr; ?><br><br></span>
<input id="rcorners2" type="text" name="unam" placeholder="Username" value=<?php echo $unam; ?>>
<span class="error"><?php echo $unamErr; ?><br><br></span>
<input id="rcorners2" type="Password" name ="psw" placeholder="Password" value=<?php echo $psw; ?>>
<span class="error"><?php echo $pswErr; ?><br><br></span>
<input id="rcorners2" type = "password" name ="cpsw" placeholder="Confirm Password" value=<?php echo $cpsw; ?>>
<span class="error"><?php echo $cpswErr; ?><br><br></span>
<button type="Submit">Sign Up</button>

<?php echo $msg ?>
</form>
<br><br><br>
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