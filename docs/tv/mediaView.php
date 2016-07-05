<?php
require 'sql.php';
require 'header.php';

echo"<div class=\"container\">";

$result = mysql_query("SELECT * FROM media2 ORDER BY ID DESC");

echo "<h1>media table extension view</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Data</th>
</tr>";

while($row = mysql_fetch_array($result)) {
  $id = $row['ID'];
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['data'] . "</td>";
  echo "</tr>";
}

echo "</table></div>";

require 'footer.php';



?>
