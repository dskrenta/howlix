<?php
require 'sql.php';
require 'header.php';

$result = mysql_query("SELECT * FROM $content_table ORDER BY ID DESC");

echo "<h1>$content_table</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Title</th>
<th>Snippet</th>
<th>Url</th>
<th>Ref</ht>
<th>Likes</th>
</tr>";

while($row = mysql_fetch_array($result)) {
  $id = $row['ID'];
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['snippet'] . "</td>";
  echo "<td>" . $row['url'] . "</td>";
  echo "<td>" . $row['ref'] . "</td>";
  echo "<td>" . $row['likes'] . "</td>";
  echo "<td><a href=\"http://shredfeed.com/delete_admin.php?id=$id&table=$main_table\"><span style=\"color:red\">DELETE</span></a></td>";
  echo "</tr>";
}

echo "</table>";

require 'footer.php';

?>
