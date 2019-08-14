<HTML>
<head>
<title>
Add</title>
<?php include_once("nav.php"); ?>
<style>
	
	input{
		height:50px;
		margin-bottom:10px;
		width:25%;

		border:transparent;
		border-radius: 3px;

	}
input[type="checkbox"]{
		//float:left;
		height:30px;
		margin-left: 0px;
		margin-bottom:0px;
		width:2%;
	}
	form{
		margin-top:50px;
		font-family:Arial;
		font-size:20px;
		color:white;
	}
	button{
		width:25%;
		height:30px;
	}
	h2{
		font-family:Arial;
		color:white;
	}

</style>


</head>

<?php
	$conn=new mysqli("localhost","root","","movies");
	/*$result=$conn->query("SELECT id FROM titles");
	$row="";
	while($row=$result->fetch_assoc()){	$nextId=$row['id'];};
	$nextId++;*/
	$result=$conn->query("SELECT * FROM counter");
	$row=$result->fetch_assoc();
	$nextId=$row["nextId"];
	$flag=$gflag=0;
	$name=$director=$year=$rating=$actor1=$actor2=$actor3=$sql[]="";
	$nameErr=$directorErr=$yearErr=$genreErr=$actorErr=$ratingErr="";
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(empty($_POST["name"])){
			$nameErr="Enter Name";
		}
		else{
			$name=$_POST["name"];
			$flag++;
		}
		if(empty($_POST["year"])){
			$yearErr="Enter Year";
		}
		else{
			if (!preg_match("/^[0-9]{4}$/",$_POST["year"])) {
				$yearErr="Year should contain only numbers and its length should only be 4";
			}
			else{
				$year=$_POST["year"];
				$flag++;
			}
		}
		if(empty($_POST["director"])){
			$directorErr="Enter director name";
		}
		else{
			$director=$_POST["director"];
			$flag++;
		}
		if(empty($_POST["rating"])){
			$ratingErr="Enter Rating";
		}
		else{
			if(!preg_match("/^[0-9.]+$/",$_POST["rating"])){
				$ratingErr="Rating should only be numbers between 1 to 10";
			}
			else{
				$rating=$_POST["rating"];
				$flag++;
			}
		}
		if(empty($_POST["actor1"])){
			$actorErr="Enter actor's name";
		}
		else{
			if(!preg_match("/^[a-z A-Z,.'-]+$/i",$_POST["actor1"])){
				$actorErr="Actor name can only have alphabets and whitespaces ";
			}
			else{
				$actor1=$_POST["actor1"];
				$flag++;
			}
		}
		$actor2=$_POST["actor2"];
		$actor3=$_POST["actor3"];
		
		if(!empty($_POST["drama"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Drama')";
			$gflag++;
		}
		//echo $nextId;
		//echo $_POST['drama'];
		if(!empty($_POST["crime"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Crime')";
			$gflag++;
		}
		if(!empty($_POST["action"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Action')";
			$gflag++;
		}
		if(!empty($_POST["biography"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Biography')";
			$gflag++;
		}
		if(!empty($_POST["history"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','History')";
			$gflag++;
		}
		if(!empty($_POST["adventure"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Adventure')";
			$gflag++;
		}
		if(!empty($_POST["comedy"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Comedy')";
			$gflag++;
		}
		if(!empty($_POST["western"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Western')";
			$gflag++;
		}
		if(!empty($_POST["scifi"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Sci-Fi')";
			$gflag++;
		}
		if(!empty($_POST["romance"])){
			$sql[]="INSERT INTO genre(id,genre) VALUES ('$nextId','Romance')";
			$gflag++;
		}
		if($gflag < 1){
			$genreErr="Select Genre <br>";
		}
		//echo $sql[1];
		//echo $flag;
		//echo $nextId;
		if($flag==5 and $gflag>=1){
			$conn->query("INSERT INTO titles(`id`,`year`,`director`,`rating`,`actor1`,`actor2`,`actor3`) VALUES ('$nextId','$year','$director','$rating','$actor1','$actor2','$actor3')");
		for($i=1;$i<=$gflag;$i++){
			$conn->query($sql[$i]);
		}
			$conn->query("INSERT INTO titless(id,title) VALUES ('$nextId','$name')");
			$conn->query("UPDATE counter SET nextId=nextId+1 WHERE id = 1");
		}
		
	}
?>	
<body>


<div style ="margin-left:17%" >
<h2>Add a new movie</h2>
<form method="post">
<input type="text" name = "name" placeholder="title"><?php echo $nameErr; ?><br>
<input type="text" name="director" placeholder="director"><?php echo $directorErr; ?><br>
<input type="text" name="year" placeholder="year"><?php echo $yearErr; ?><br>
<input type="text" name="rating" placeholder="Rating"><?php echo $ratingErr; ?><br>
<input type="text" name="actor1" placeholder="Actor's/Actress' Name"><?php echo $actorErr; ?><br>
<input type="text" name="actor2" placeholder="Actor's/Actress' Name"><br>
<input type="text" name="actor3" placeholder="Actor's/Actress' Name"><br>
<input type="checkbox" class = " check" name="action">Action<br> 
<input type="checkbox" class = " check" name="adventure">Adventure<br>
<input type="checkbox" class = " check" name="drama">Drama<br>
<input type="checkbox" class = " check" name="crime">Crime<br>
<input type="checkbox" class = " check" name="history">History<br>
<input type="checkbox" class = " check" name="western">Western<br>
<input type="checkbox" class = " check" name="biography">Biography<br>
<input type="checkbox" class = " check" name="scifi">Sci-Fi<br>
<input type="checkbox" class = " check" name="romance">Romance<br>
<?php echo $genreErr; ?>
<Button type="submit" >Submit</Button>
</form>
</div>
</body>
</html>