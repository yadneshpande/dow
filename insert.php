<html>
<head>
<title>insert</title>
</head>
<?php
	$mysqli=mysqli_connect("localhost","root","","movies");
?>
<body>
<h2>
Add</h2>
<table>
<form method="post" name="add">
<tr><td>Name</td><td>    <input type="text" name="name"></td></tr>
<tr><td>Year</td><td>      <input type="text" name="year"></td></tr>
<tr><td>Director</td><td>  <input type="text" name="director"></td></tr>
<tr><td><input type="submit" name="submit"></td></tr>

</form>
</table>
<a href="test.php">table</a>
</body>
<!-- validation-->
<?php
	$name=$year=$director=$id="";
	$flag=1;
	
	if(isset($_POST["submit"])){
		$name=$_POST["name"];
		$year=$_POST["year"];
		$director=$_POST["director"];
		
	}
	if(empty($_POST["name"])||empty($_POST["director"])||empty($_POST["year"])){
		echo"<font color='red'>Please fill out all the fields</font><br>";
		$flag=0;
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$director)) {
  		echo"<font color='red'>Only letters and white space allowed for director</font><br>";
		$flag=0;
	}
	if(!preg_match("/^[0-9]*$/",$year)){
		echo"<font color='red'>Only numbers allowed for year</font><br>";
		$flag=0;
	}
	if($flag==1){
		$result = mysqli_query($mysqli,"INSERT INTO titles(name,year,director) VALUES('$name','$year','$director') ");
	}
?>
