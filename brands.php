<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font: 400 15px/1.8 "Lato", sans-serif;
  color: #777;
}

.bgimg-1, .bgimg-2, .bgimg-3 {
  position: relative;
  opacity: 0.65;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}


.caption {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;
}

.caption span.border {
  background-color: #111;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}

h3 {
  letter-spacing: 5px;
  text-transform: uppercase;
  font: 20px "Lato", sans-serif;
  color: #111;
}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
}
.collapsible {
    background-color: #777;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}

.active, .collapsible:hover {
    background-color: #555;
}

.content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
    color:black;
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
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<?php  
   $conn=new mysqli("localhost","root","","dow");
   if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
   }
   
    $bn=$_GET['id'];
     

   
$result = $conn->query("SELECT * FROM brand join car on car.BrandN=brand.BrandN join name on car.id=name.id join image on car.id=image.id WHERE brand.BrandN='$bn'");
$abc=$result->fetch_assoc();
echo "
<div class=bgimg-1 >
  <style>
  .bgimg-1 {
  background-image: url(".$abc['logo']." );
  min-height: 100%;
}
</style>
   <br>
  <a style='font-size:15px;' href='home2.php'><img src='de.png' width='100' height='100'></a>
  <div class=caption>
    <span class=border>$bn</span>
  </div>
</div>

<div style='color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;'>
  <h3 style='text-align:center;'>$bn</h3>
  <p>".$abc['binfo']."</p>
</div> 
";

$result = $conn->query("SELECT * FROM brand join car on car.BrandN=brand.BrandN join name on car.id=name.id join image on car.id=image.id WHERE brand.BrandN='$bn'");
$i=0;
while($abc=$result->fetch_assoc()){
$cid = $abc['id'];
echo "
<div class=bgimg".$i.">
  <style>
    .bgimg".$i."{
  background-image: url(".$abc['Poster'].");
  min-height: 400px;
  position: relative;
  opacity: 0.65;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  </style>

  <div class=caption>
    <span class=border style='background-color:transparent;font-size:25px;color: #f7f7f7;'>".$abc['CarN']."</span>
  </div>
</div>

<div style='position:relative;'>
  <div style='color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;'>
    <button class=collapsible>General</button>
<div class=content>
  <p>
    <table>
  <tr>
    <th>Parameters</th>
    <th>Specification</th>
    
  </tr>
  <tr>
    <td>Engine Size</td>
    <td>".$abc['CC']."</td>
    
  </tr>
  <tr>
    <td>Horse Power</td>
    <td>".$abc['HP']."</td>
    
  </tr>
  <tr>
    <td>Color</td>
    <td>".$abc['Color']."</td>
    
  </tr>
  <tr>
    <td>Mileage</td>
    <td>".$abc['Mileage']."</td>
    </tr>
  <tr>
    <td>Year</td>
    <td>".$abc['Year']."</td>
    
  </tr>
  <tr>
    <td>Fuel</td>
    <td>".$abc['Fuel']."</td>
    
  </tr>
  <tr>
    <td>Gear Box</td>
    <td>".$abc['Gear']."</td>
    
  </tr>
</table></p>
</div>

<button class=collapsible>Interior Features</button>
<div class=content>
  <p>AIR CONDITIONING — ALARM — AUX AUDIO IN — BLUETOOTH SYSTEM — CD PLAYER — CLIMATE CONTROL — CRUISE CONTROL — LEATHER SEATS — NAVIGATION SYSTEM — PARKING SENSOR FRONT — PARKING SENSOR REAR — POWER LOCKS — POWER SEATS — POWER WINDOWS — TUNER/RADIO — USB</p>
</div>
<button class=collapsible>Price</button>
<div class=content>
  <p>Price:".$abc['Price']."
  <br>(incl. of all Taxes)
  <br>
  
  <a href=redirect1.php?cr=$cid><button onclick='myFunction()'>Click If Intrested to Buy</button></a>
    </p>
</div>

</p>
  </div>
</div>
";
$i++;
}
?>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
<script>
function myFunction() {
    alert("Request for the car has been Submitted\nCompany will contact you soon");
}
</script>

</body>
</html>
