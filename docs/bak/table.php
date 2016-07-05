<?php
require 'sql.php';
require 'header.php';

echo"<div class=\"container\">";

$result = mysql_query("SELECT * FROM $video_table ORDER BY ID DESC");

echo "<h1>$video_table</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Title</th>
<th>Snippet</th>
<th>Url</th>
<th>Image</ht>
<th>Embed</th>
<th>Votes</th>
<th>DELETE</th>
</tr>";

while($row = mysql_fetch_array($result)) {
  $id = $row['ID'];
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['snippet'] . "</td>";
  echo "<td>" . $row['url'] . "</td>";
  echo "<td>" . $row['image'] . "</td>";
  //echo "<td>" . $row['embed'] . "</td>";
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
