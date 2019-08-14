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
$result0 = $conn->query("SELECT * FROM login WHERE uname='$name'");

$asd0 = $result0->fetch_assoc();


  $nam=$age=$email=$unam=$psw=$cpsw="";
  $nameErr = $ageErr = $emailErr = $unamErr = $pswErr=$cpswErr= "";
  $msg="";
  //$_POST["name"]=$_POST["age"]=$_POST["email"]=$_POST["unam"]=$_POST["psw"]=$_POST["cpsw"]="";
  $flag=$uflag=0;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["nam"])){
      $nameErr="Please fill out name";
    }
    else{
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST["nam"])) 
        $nameErr="Only letters and whitespaces allowed in name";
      else{
        $nameErr="";
        $nam=$_POST["nam"];
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
    if($flag==4){
      echo "INSIDE IF";
      echo $nam,$age,$email,$unam,$psw;
      $conn->query("UPDATE login SET name='$nam',age='$age',email='$email',pass='$psw' WHERE uname='$name'");
      echo mysqli_error($conn);
      $msg= "Account Updated Successfully";
    }
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
#rcorners2 {
    border-radius: 20px;
    border: 2px solid black;
    padding: 20px; 
    width: 200px;
        
}
.foo{
   margin-right: 20%;
   margin-top: 5%;
   margin-left: 20%;
   background-color:#2d2d2d`;
   color: white;
   text-align: center;
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
 <li style="float:right"><a href="userpage.php"><?php echo $name ?></a></li>
</ul>
<!-- <h1 align='center'; style="color:white;"></h1> -->
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

<div class="foo">
<form method="post">
<h1><i>Edit Info for <?php echo $name;?></i></h1>
<input id="rcorners2" type="text" value="<?php echo $asd0['name'];?>"" name = "nam" placeholder="Name" >
<span class="error"><?php echo $nameErr; ?><br><br></span>
<input id="rcorners2" type="text" value=<?php echo $asd0['age'];?> name="age" placeholder="Age" value=<?php echo $age; ?>>
<span class="error"><?php echo $ageErr; ?><br><br></span>
<input id="rcorners2" type="text" value=<?php echo $asd0['email'];?> name="email" placeholder="E-Mail" value=<?php echo $email; ?>>
<span class="error"><?php echo $emailErr; ?><br><br></span>

<input id="rcorners2" type="Password" value=<?php echo $asd0['pass'];?> name ="psw" placeholder="Password" value=<?php echo $psw; ?>>
<span class="error"><?php echo $pswErr; ?><br><br></span>
<input id="rcorners2" type = "password" value=<?php echo $asd0['pass'];?> name ="cpsw" placeholder="Confirm Password" value=<?php echo $cpsw; ?>>
<span class="error"><?php echo $cpswErr; ?><br><br></span>
<button type="Submit">Submit</button>

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
