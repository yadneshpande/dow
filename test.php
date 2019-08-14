<?php
	$conn=new mysqli("localhost","root","","movies");
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	$sql="SELECT titles.*,GROUP_CONCAT(genre) from titles join genre on titles.id=genre.id group by(titles.id);";
	$result = $conn->query($sql);
?>
<html>
<head>
	<title>List</title>
	<style>
		th{
			background-color:#e2f2f2;
		}
		table,th,td{
			border:1px solid black;
			border-collapse: collapse;
			padding:10px;
		}
		table{
				width:80%;
		}
		tr:nth-child(even) {background-color: #f2f2f2;} 
		#tab img{
			height:200px;
		}
	</style>
</head>
<body>
	<a href="insert.php">add</a>
	<h2>LIST</h2>
	<table id=tab>
	<!--
	<tr>
		<th>id</th>
		<th>Poster</th>
		<th>Title</th>
		<th>Year</th>
		<th>Director</th>
		<th>Rating</th>
		<th>Genre</th>
	</tr>
	-->
	<?php
	while($row=$result->fetch_assoc()){
				echo "<tr>".
				"<td>".$row["id"]."</td>".
				"<td><img src=".$row['poster']."></td>".
				"<td>".$row["name"]."</td>".
				"<td>".$row["year"]."</td>".
				"<td>".$row["director"]."</td>".
				"<td>".$row["rating"]."</td>".
				"<td>".$row["GROUP_CONCAT(genre)"]."</td>".
				"<td>"."<a href=\"delete.php?id=$row[id]\">Delete</a>"." | "."<a href=\"update.php?id=$row[id]\">Edit</a></td></tr>";
		}
	$conn->close();
	?>
				</table>




