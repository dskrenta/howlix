<html>
<head>
<meta http-equiv="refresh" content="300; URL=http://howlix.com/shred/real2/testTable.php">
</head>
<body>
<?php
$con=mysqli_connect("localhost","wordpress","dtechblog777","wordpress");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM shredstore5");

echo "<h1>Shredstore5</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Title</th>
<th>Folder</th>
<th>User</th>
<th>Uid</ht>
<th>Type</th>
<th>Url</th>
<th>Snippet</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['folder'] . "</td>";
  echo "<td>" . $row['user'] . "</td>";
  echo "<td>" . $row['uid'] . "</td>";
  echo "<td>" . $row['type'] . "</td>";
  echo "<td>" . $row['url'] . "</td>";
  echo "<td>" . $row['snippet'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</body>
</html>
