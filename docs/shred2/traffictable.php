<?php
// Require
require 'sql.php';
require 'functions.php';
require 'header.php';

echo "<div class=\"container\">";

$result = mysql_query("SELECT * FROM traffic");

echo "<h1>Traffic Table:</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Value</th>
<th>DELETE</th>
</tr>";

while($row = mysql_fetch_array($result)) {
  $id = $row['ID'];
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['value'] . "</td>";
  echo "<td><a href=\"http://howlix.com/shred2/delete_admin.php?id=$id&table=traffic\"><span style=\"color:red\">DELETE</span></a></td>";
  echo "</tr>";
}

echo "</table>";

echo "</div>";

//require 'footer.php';
?>
</body>
</html>
