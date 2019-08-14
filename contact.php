<!DOCTYPE html>
<html>
<head>
<style>
body {
          /*background-image: url("cu.jpg");*/
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

.footer {
   position: bottom;
   left: 0;
   bottom: 10%;
   width: 100%;
   background-color: #2d2d2d;
   color: white;
   text-align: center;
}
.error {color: #FF0000;}
.cs{
    background-image: url("cu1.jpg");
    width:1330px;
    height:900px;
    /*border:0;*/
}
.login-page
{
  /*background-image: url("cu.jpg");*/
  width: 360px;
  padding: 10% 0 0;
  margin: auto;
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

</style>
</head>
<body>

    <div class="header">
  <h2><i><b>Deals on Wheels</i></b></h2>
</div>

<ul>
  <li><a href="home1.php">Home</a></li>
  <li><a href="about.php">About Us</a></li>
   <li><a href="syc.php">Buy a Car</a></li>
    <li><a href="syc.php">Sell a Car</a></li>
    <!-- <li><a href="#na">New Arrivals</a></li> -->
     <li><a class="active" href="contact.php">Contact Us</a></li>
<li style="float:right"><a href="syc.php">Sign In</a></li>
<li style="float:right"><a href="signup.php">Sign up</a></li>
</ul>

 <?php 
$nameErr = $emailErr = $genderErr = $phoneErr = "";
$name = $email = $gender = $comment = $phone = ""; 
$flag=0;
$conn=new mysqli("localhost","root","","dow");
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } 
    else {
    //check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed"; 
        }
        else{
            $flag++;
            $name = $_POST["name"];
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } 
    else
    {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
        }
        else{ 
            $email =$_POST["email"];
            //check if e-mail address is well-formed
            $flag++; 
        }
    }
    if (!preg_match("/^[1-9][0-9]{10}$/",$_POST["phone"])) {
            $phoneErr = "Invalid number"; 
    }
    else{  $phone = $_POST["phone"];
            //check if phone syntax is valid 
    }
    $comment = $_POST["comment"];
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } 
    else {
        $gender = $_POST["gender"];
        $flag++;
        echo $flag;
    }
    echo $flag;

/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
*/

    if ($flag==3){
        echo "Inside IF";
        $conn->query("INSERT into contact_us(name,email,phone,comment,gender) VALUES ('$name','$email','$phone','$comment','$gender')");
        $msg= "Submitted Successfully ... ";
    }
}
?>

<div class="cs">
<div class="login-page" >
<div class="form-style-6">
<h1>Contact Us</h1>
<p><span class="error">* required field</span></p>
<form method="post" >  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phone: <input type="text" name="phone" value="<?php echo $phone;?>">
  <span class="error"><?php echo $phoneErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
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

