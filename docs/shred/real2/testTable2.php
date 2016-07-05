<html>
<head>
<meta http-equiv="refresh" content="300; URL=http://howlix.com/shred/real/testTable2.php">
</head>
<body>
<?php
$con=mysqli_connect("localhost","wordpress","dtechblog777","wordpress");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM shredfold");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Folder</th>
<th>User</th>
<th>Description</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['folder'] . "</td>";
  echo "<td>" . $row['user'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</body>
</html>
