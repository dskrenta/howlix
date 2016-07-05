<?php
// Require
require 'sql.php';
require 'functions.php';
require 'header.php';

$result = mysql_query("SELECT * FROM $main_table");

echo "<h1>$main_table</h1>";

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
<th>Extra</th>
<th>Snippet</th>
<th>Folderid</th>
<th>Profileimg</th>
</tr>";

while($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['folder'] . "</td>";
  echo "<td>" . $row['user'] . "</td>";
  echo "<td>" . $row['uid'] . "</td>";
  echo "<td>" . $row['type'] . "</td>";
  echo "<td>" . $row['url'] . "</td>";
  echo "<td>" . $row['extra'] . "</td>";
  echo "<td>" . $row['snippet'] . "</td>";
  echo "<td>" . $row['folderid'] . "</td>";
  echo "<td>" . $row['profileimg'] . "</td>";
  echo "</tr>";
}

echo "</table>";

$result = mysql_query("SELECT * FROM $folder_table");

echo "<h1>$folder_table</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Folder</th>
<th>User</th>
<th>Uid</th>
<th>Snippet</ht>
<th>folderid</th>
</tr>";

while($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['folder'] . "</td>";
  echo "<td>" . $row['user'] . "</td>";
  echo "<td>" . $row['uid'] . "</td>";
  echo "<td>" . $row['snippet'] . "</td>";
  echo "<td>" . $row['folderid'] . "</td>";
  echo "</tr>";
}

echo "</table>";

$result = mysql_query("SELECT * FROM $user_table");

echo "<h1>$user_table</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Uid</th>
<th>User</th>
<th>imgUrl</th>
<th>DELETE</ht>
</tr>";

while($row = mysql_fetch_array($result)) {
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

$result = mysql_query("SELECT * FROM $id_table");

echo "<h1>$id_table</h1>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Date</th>
<th>Input</th>
<th>Folder</th>
</tr>";

while($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['inout'] . "</td>";
  echo "<td>" . $row['folder'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysql_close();

//require 'footer.php';
?>
</body>
</html>
