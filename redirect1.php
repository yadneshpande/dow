<?php
session_start();
if(isset($_SESSION['unam']))
{
	$name=$_SESSION['unam'];
}
	else
	{
		header("Location:home1.php");
	}
?>
<?php
	$conn=new mysqli("localhost","root","","dow");
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}

	$crn=$_GET['cr'];
	$result7 = $conn->query("SELECT * FROM brand join car on car.BrandN=brand.BrandN join name on car.id=name.id join image on car.id=image.id WHERE car.id='$crn'");
	$abc7 = $result7->fetch_assoc();
	$bnn=$abc7['BrandN'];

    $req = $conn->query("SELECT * FROM requestzzz WHERE uname='$name'");

	$flag=0;
	while($abc2=$req->fetch_assoc()){
		if($abc2['carid']==$crn){
			$flag=1;
		}
	}
if($flag==1){	 
	header("Location:brands.php?id='$bnn");
}
else
	 $conn->query("INSERT into requestzzz(uname,carid) values ('$name','$crn')");
	 echo mysqli_error($conn);
	 
	 header("Location:brands.php?id=$bnn");
	 ?>