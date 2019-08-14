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
  // $uname=$brand=$model=$mileage=$year=$condition1=$condition2=$condition3="";
  $usererr=$branderr=$modelerr=$mileageerr=$yearerr=$condition1err=$condition2err=$condition3err="";
  $flag=0;
  // if(isset($_POST["submit"])){  
  //   if(empty($_POST["uname"])){
  //     $usererr="*";
  //   }
  //
       // $uname=$_POST["uname"];
       // $flag++;
  //   }
    if(empty($_POST["brand"])){
      $branderr="*";
    }
    else{
      $brand=$_POST["brand"];
      $flag++;
    }
    if(empty($_POST["modelname"])){
      $modelerr="Enter Modelname";
    }
    else{
      $model=$_POST["modelname"];
      $flag++;
    }
    if(empty($_POST["mileage"])){
      $mileageerr="Enter Mileage";
    }
    else{
      if(!preg_match("/^[0-9]*$/",$_POST["mileage"]))
        $mileageerr="Enter Positive Mileage";
      else{
        $mileageerr="";
      $mileage=$_POST["mileage"];
      $flag++;
    }
  }
    if(empty($_POST["year"])){
      $yearerr="Enter Year";
    }
    else{
      // if(!preg_match("/^[0-9]*$/",$_POST["year"]))
      //   $yearerr="Enter year";
      // else{
        $year="";
      $year=$_POST["year"];
      $flag++;
    }
  
    if(empty($_POST["condition1"])){
    $condition1err="*";
  }
    else{
      $condition1=$_POST["condition1"];
      $flag++;
    }
    if(empty($_POST["condition2"])){
    $condition2err="*";
  }
    else{
      $condition2=$_POST["condition2"];
    $flag++;
    } 
    if(empty($_POST["condition3"])){
        $condition3err="*";
    }
    else{
      $condition3=$_POST["condition3"];
      $flag++;
    }  
    echo $flag;
    if($flag==7){
      echo "Dont stop";
      echo $name,$brand,$model,$mileage,$year,$condition1,$condition2,$condition3;

      
      $conn->query("INSERT into sell(uname,BrandN,model,mileage,year,condition1,condition2,condition3) VALUES ('$name','$brand','$model','$mileage','$year','$condition1','$condition2','$condition3')");
     echo mysqli_error($conn);
      $msg="Information Regarding your Car is Received Successfully";
    

    // echo $flag;
    // if($flag==5){
    //   echo "INSIDE IF";
    //   echo $name,$age,$email,$unam,$psw;
    //   $conn->query("INSERT into login(name,age,email,uname,pass) VALUES ('$name','$age','$email','$unam','$psw')");
    //   echo mysqli_error($conn);
    //   $msg= "Account Created Successfully ... <a href = \"syc.php\"> Login </a> Again ";



    }
    
  ?>

<!DOCTYPE html>
<html>
<style>
.error{
  color:red;
}
.login-page
{
  /*background-image: url("cu.jpg");*/
  width: 360px;
  padding: 10% 0 0;
  margin: 0px;
}


.form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 10px;
    background: #F7F7F7;
}
.form-style-6 h1{
    background: #43D1AF;
    padding: 10px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -10px -10px 10px -10px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="url"],
.form-style-6 textarea,
.form-style-6 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #2EBC99;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: black
    color:white;
}

input[type=submit] {
    width: 100%;
    background-color: #bce2df;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color:#8fed8b;
}

.suc {
    border-radius: 5px;
    background-color:#2d2d2d;
    padding: 20px;
    margin-left: 35%;
    margin-right: 15%;
    /*margin-bottom: 10%;*/
    margin-top: 0%;
    color:black;

}

.suc1 {
         /*background-image: url('audilp.jpg');*/
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


</style>
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
    <!-- <li><a href="#na">New Arrivals</a></li>      -->
 <li style="float:right"><a href="userpage.php"><?php echo $name ?></a></li>
</ul>

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




<script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
<div class='suc1'>
<h2 align="center">SELL YOUR CAR</h2>

<div class='suc'>
<div class="login-page" >
<div class="form-style-6">
  <form  method="post">
   <!--  <label for="uname" >USERNAME     </label>
    <input type="text" name="uname" placeholder="Enter username"><br> -->
    <label for="brand">CAR BRAND</label>
    <?php echo $branderr; ?>
    <select name="brand">
      <option value="Audi">Audi</option>
      <option value="Rolls Royce">Rolls Royce</option>
      <option value="Mercedes">Mercedes</option>
      <option value="Jeep">Jeep</option>
      <option value="Lamborghini">Lamborghini</option>
      <option value="Range Rover">Range Rover</option>
      <option value="BMW">BMW</option>
      <option value="Bentley">Bentley</option>
      <option value="nm">Not Mentioned</option>
    </select> <br>
    <label for="modelname">MODEL</label>
    <span class="error"><?php echo $modelerr; ?></span>
    <input type="text" name="modelname" placeholder="Enter Modelname">
    <br>
    <label for="mileage">MILEAGE</label>
    <span class="error"><?php echo $mileageerr; ?></span>
    <input type="text" name="mileage" placeholder="ENTER Mileage(KM)">
    <br>
    <label for="year">YEAR</label>
    <span class="error"><?php echo $yearerr; ?></span>
    <input type="date" name="year" placeholder="Enter Year">
    <br>
    <label for="condition1">EXTERIOR CONDITION</label>
    <span class="error"><?php echo $condition1err; ?></span>
    <select name="condition1">
      <option value="1">PERFECT</option>
      <option value="2">NO ACCIDENTS,VERY FEW SCRATCHES</option>
      <option value="3">A BIT OF WEAR AND TEAR,ALL REPAIRED</option>
      <option value="4">NORMAL CONDITION,FEW ISSUES</option>
      <option value="5">LOTS OF WEAR AND TEAR TO THE BODY</option>

    </select> <br>

    <label for="condition2">INTERIOR CONDITION</label>
    <span class="error"><?php echo $condition2err; ?></span>
    <select name="condition2">
      <option value="1">PERFECT</option>
      <option value="2">LIGHT WEAR AND TEAR</option>
      <option value="3">MEDIUM WEAR AND TEAR</option>
      <option value="4">HEAVY WEAR AND TEAR</option>

     </select> <br>

      <label for="condition3">ACCIDENT HISTORY</label>
        <span class="error"> <?php echo $condition3err; ?></span>

    <select name="condition3">
      <option value="1">NO ACCIDENTS</option>
      <option value="2">MINOR ACCIDENTS,ALL REPAIRED</option>
      <option value="3">MAJOR ACCIDENT,ALL REPAIRED</option>
      <option value="4">AFTER ACCIDENT,ISSUES REMAIN</option>

     </select>
  
    <input type="submit" name="submit" value="Submit">
  </form>
</div>
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
