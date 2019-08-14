<?php  
   $conn=new mysqli("localhost","root","","dow");
   if($conn->connect_error){
   	die("Connection failed: ".$conn->connect_error);
   }
   
    $bn=$_GET['id'];
     echo $bn;

   
$result = $conn->query("SELECT * FROM brand join car on car.BrandN=brand.BrandN join name on car.id=name.id join image on car.id=image.id WHERE brand.BrandN='$bn'");
$abc=$result->fetch_assoc();
echo "<br> <img src=".$abc['logo']." width=100%;>";
echo" <br> ".$abc['binfo'];

$result = $conn->query("SELECT * FROM brand join car on car.BrandN=brand.BrandN join name on car.id=name.id join image on car.id=image.id WHERE brand.BrandN='$bn'");
while($abc=$result->fetch_assoc()){

echo" <br> ".$abc['CarN'];
echo "<br> <img src=".$abc['Poster']." width=100%;>";
echo "

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
</table>

  
";
echo" <br> Price:".$abc['Price'];
}
?>