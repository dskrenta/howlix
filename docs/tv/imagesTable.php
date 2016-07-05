<?php
require 'sql.php';
require 'header.php';

echo"<div class=\"container\">";

$result = mysql_query("SELECT * FROM images ORDER BY ID DESC");

echo "<h1>$video_table</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Title</th>
<th>Thumbnail</th>
<th>Url</th>
<th>Votes</ht>
</tr>";

while($row = mysql_fetch_array($result)) {
  $id = $row['ID'];
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['thumbnail'] . "</td>";
  echo "<td>" . $row['url'] . "</td>";
  echo "<td>" . $row['votes'] . "</td>";
echo "
	<td>
	<form method=\"post\" action=\"delete.php\">
	<input type=\"hidden\" name=\"id\" value=\"" . $row['ID'] . "\" />
	<button type=\"submit\" class=\"btn btn-danger\">DELETE</button>
	</form>
	</td>
";
  echo "</tr>";
}

echo "</table></div>";

require 'footer.php';



?>
