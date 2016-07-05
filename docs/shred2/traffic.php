<?php
// Declare lasting VARS
$traffic_table = "traffic";
$traffic_date = date("Y-m-d H:i:s");

/*
$sql = "SELECT * FROM $traffic_table WHERE date='$traffic_date'";
$result = mysql_query($sql) or die(mysql_error());

if(mysql_fetch_array($result) !== false)
{
	// Assigned
	$row = mysql_fetch_array($result);

	$id = $row['ID'];
      	$date = $row['date'];
     	$value = $row['value'];

	$value = $value+1;
	
	$sql2 = "UPDATE $traffic_table SET value='$value' WHERE date='$traffic_date'";
	$result2 = mysql_query($sql2) or die(mysql_error());
}
else
{
	// Available
	$sql3 = "INSERT INTO $traffic_table (date, value) VALUES ('$traffic_date', '1')";
	mysql_query($sql3);

}
*/

$result = mysql_query("SELECT * FROM $traffic_table WHERE date='$traffic_date' LIMIT 1");
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) 
{
	// Exists
	
	$row = mysql_fetch_array($result);

        $id = $row['ID'];
        $date = $row['date'];
        $value = $row['value'];

        $value = $value+1;
        
        $sql2 = "UPDATE $traffic_table SET value='$value' WHERE date='$traffic_date'";
        $result2 = mysql_query($sql2) or die(mysql_error());
}
else 
{
  	// Does not exist
	
	$sql3 = "INSERT INTO $traffic_table (date, value) VALUES ('$traffic_date', '1')";
        mysql_query($sql3);
}

?>
