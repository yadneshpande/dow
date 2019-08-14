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
   
   $conn = new mysqli("localhost","root","","dow");

   $branderr=$carerr=$engerr=$hperr=$milerr=$yearerr=$fuelerr=$gearerr=$colerr=$priceerr=$patherr=$msg="";
   $flag=0;

   if(empty($_POST["brand"])){
    $branderr="*";
   }
   else{
    $brand=$_POST["brand"];
    $flag++;
   }

   if(empty($_POST["car"])){
    $carerr="*";
   }
   else{
    $car=$_POST["car"];
    $flag++;
   }

   if(empty($_POST["eng"])){
    $engerr="*";
   }
   else{
    $eng=$_POST["eng"];
    $flag++;
   }

   if(empty($_POST["hp"])){
    $hperr="*";
   }
   else{
    $hp=$_POST["hp"];
    $flag++;
   }

   if(empty($_POST["mil"])){
    $milerr="*";
   }
   else{
      if(!preg_match("/^[0-9]*$/",$_POST["mil"]))
        $milerr="Enter Positive Mileage";
      else{
        $milerr="";
      $mil=$_POST["mil"];
      $flag++;
    }
  }

   if(empty($_POST["year"])){
    $yearerr="*";
   }
   else{
    $year=$_POST["year"];
    $flag++;
   }

   if(empty($_POST["fuel"])){
    $fuelerr="*";
   }
   else{
    $fuel=$_POST["fuel"];
    $flag++;
   }

if(empty($_POST["gear"])){
    $gearerr="*";
   }
   else{
    $gear=$_POST["gear"];
    $flag++;
   }

   if(empty($_POST["col"])){
    $colerr="*";
   }
   else{
    $col=$_POST["col"];
    $flag++;
   }

   if(empty($_POST["price"])){
    $priceerr="*";
   }
   else{
    $price=$_POST["price"];
    $flag++;
   }

if(empty($_POST["path"])){
    $patherr="*";
   }
   else{
    $path=$_POST["path"];
    $flag++;
   }

   echo $flag;
   if($flag==11){
    echo "Lets do it";
    echo $brand,$car,$eng,$hp,$mil,$year,$fuel,$gear,$col,$price,$path;
      $conn->query("call ins('$brand','$eng','$hp','$mil','$year','$fuel','$gear','$col','$price','$path','$car')");
     echo mysqli_error($conn);
      $msg="New Car is added to the database Successfully";
    
   }


?>
<!DOCTYPE html>
<html>
<style>
.error{
  color:red;
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
* {
    box-sizing: border-box;
}

input[type=text],[type=date], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
     margin-right: 20%;
     margin-left: 20%;
     margin-top: 5%; 
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 75%;
        margin-top: 0;
    }
}
</style>
</head>
<body>

<div class="header">
  <h2><i><b>Deals on Wheels</i></b></h2>
</div>

<ul>
  <li><a  href="ohome.php">Home</a></li>
  <li><a class="active" href="">Add a car</a></li>
   <li><a  href="vac.php">View all Cars</a></li>
   <li><a href="vau.php">View all Users</a></li>
   
<li style="float:right"><a href="logredirect.php"><?php echo $name ?></a></li>
</ul>
<div class='suc1'>
<h2 align="center">ADD A NEW CAR</h2>
<div class="container">
  <form method="post">
<div class="row">
      <div class="col-25">
        <label for="country">Brand Name</label>
        <?php echo $branderr; ?>
      </div>
      <div class="col-75">
        <select name="brand">
          <option value="Audi">Audi</option>
          <option value="Bentley">Bentley</option>
          <option value="Jeep">Jeep</option>
          <option value="Rolls Royce">Rolls Royce</option>
          <option value="Lamborghini">Lamborghini</option>
          <option value="Mercedes-Benz">Mercedes-Benz</option>
          <option value="Range Rover">Range Rover</option>
          <option value="BMW">BMW</option>

        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Car Name</label>
        <span class="error"><?php echo $carerr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="car" placeholder="Car name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Engine</label>
        <span class="error"><?php echo $engerr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="eng" placeholder="Engine Details..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Horsepower</label>
        <span class="error"><?php echo $hperr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="hp" placeholder="Horsepower of the..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Mileage</label>
        <span class="error"><?php echo $milerr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="mil" placeholder="Number of miles covered..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Year</label>
        <span class="error"><?php echo $yearerr; ?></span>
      </div>
      <div class="col-75">
        <input type="date" name="year" placeholder="Year..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Fuel</label>
        <span class="error"><?php echo $fuelerr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="fuel" placeholder="Fuel type..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Gear</label>
       <span class="error"> <?php echo $gearerr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="gear" placeholder="Manual/Automatic..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Color</label>
        <span class="error"><?php echo $colerr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="col" placeholder="Color of car..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Price</label>
        <span class="error"><?php echo $priceerr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="price" placeholder="Price in digits..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Image</label>
        <span class="error"><?php echo $patherr; ?></span>
      </div>
      <div class="col-75">
        <input type="text" name="path" placeholder="Path for Image..">
      </div>
    </div>
    
    
      
    <div class="row">
      <input type="submit" name="submit" value="Submit">
      <?php echo $msg; ?>
    </div>
  </form>
</div>


</body>
</html>
