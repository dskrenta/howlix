<html>
<head>
<meta http-equiv="refresh" content="300; URL=http://howlix.com/shred/real2/testTable3.php">
</head>
<body>
<?php
$con=mysqli_connect("localhost","wordpress","dtechblog777","wordpress");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM userstore");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Uid</th>
<th>User</th>
<th>imgUrl</th>
<th>DELETE</ht>
</tr>";

while($row = mysqli_fetch_array($result)) {
	$id = $row['ID'];
	echo "<tr>";
  	echo "<td>" . $row['ID'] . "</td>";
  	echo "<td>" . $row['date'] . "</td>";
  	echo "<td>" . $row['uid'] . "</td>";
  	echo "<td>" . $row['user'] . "</td>";
  	echo "<td>" . $row['imgUrl'] . "</td>";
  	echo "<td><a href=\"http://howlix.com/shred/real2/delete.php?id=$id\"><span style=\"color:red\">DELETE</span></a></td>";
  	echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</body>
</html>
