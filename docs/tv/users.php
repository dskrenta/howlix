<?php
require 'sql.php';
require 'header.php';

echo"<div class=\"container\">";

$result = mysql_query("SELECT * FROM users2 ORDER BY ID DESC");

echo "<h1>Users2</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Username</th>
<th>Password</th>
<th>Email</th>
<th>Points</th>
<th>DELETE</th>
</tr>";

while($row = mysql_fetch_array($result)) {
  $id = $row['ID'];
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['points'] . "</td>";
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
