<?php
if (!empty($_GET["id"])) 
{
	// Logged in
	// GET Vars
	$uid = $_GET["id"];
	$user = $_GET["name"];

	// Date
	$date = date("Y-m-d H:i:s");

	//imgUrl
	$imgUrl = "http://graph.facebook.com/" . $uid . "/picture";

	// Vars
	$host="localhost"; // Host name 
	$username="wordpress"; // Mysql username 
	$password="dtechblog777"; // Mysql password 
	$db_name="wordpress"; // Database name 
	$tbl_name="userstore"; // Table name 

	// Connect to server and select database.
	mysql_connect("localhost", "wordpress", "dtechblog777", "wordpress")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

	// Query for user
	//$mysql="SELECT * FROM $tbl_name WHERE uid=$uid";
	$mysql = "SELECT count(uid) as total FROM $tbl_name WHERE uid=$uid"; 
	$out=mysql_query($mysql) or die(mysql_error());
	
	$row = mysql_fetch_assoc($out);

	if( $row['total'] > 0)
	{
		// Set cookie
        	setcookie("uid", $uid, time()+86400);
        	// TIME CONVERSION: 3600 = 1 hour (60*60)
        
        	// Header Redirect
       		header('Location: http://howlix.com/shred/real2/shredm.php');
	}
	
	else
	{
		// Insert data into mysql 
        	$sql="INSERT INTO $tbl_name (date, uid, user, imgUrl)VALUES('$date', '$uid', '$user', '$imgUrl')";
        	$result=mysql_query($sql);
        
         	// Set cookie
              	setcookie("uid", $uid, time()+86400);
        	// TIME CONVERSION: 3600 = 1 hour (60*60)
        
        	// Header Redirect
        	header('Location: http://howlix.com/shred/real2/shredm.php');
	}

	//if($out)
	//{
	//	while($row = mysql_fetch_array($out))
	//	{
	//		$user_row = $row['ID'];
	//		$user_date = $row['date'];
	//		$user_id = $row['uid'];
	//		$user_img = $row['imgUrl'];
	//		
	//		// Check for previous login
        //		if($id > 0)
        //		{       
        //        		// Set cookie
	//			setcookie("uid", $uid, time()+86400);
        //			// TIME CONVERSION: 3600 = 1 hour (60*60)
	//
	//			// Header Redirect
	//			header('Location: http://howlix.com/shred/real2/shredm.php');
      	//		}
        //		else
        //		{
      	//			// Insert data into mysql 
        //			$sql="INSERT INTO $tbl_name (date, uid, user, imgUrl)VALUES('$date', '$uid', '$user', '$imgUrl')";
        //			$result=mysql_query($sql);
	//
	//			// Set cookie
        //                      setcookie("uid", $uid, time()+86400);
        //                      // TIME CONVERSION: 3600 = 1 hour (60*60)
	//
	//			// Header Redirect
	//			header('Location: http://howlix.com/shred/real2/shredm.php');	
	//		}
	//	}
	//}

	// Insert data into mysql 
	//$sql="INSERT INTO $tbl_name (date, uid, user, imgUrl)VALUES('$date', '$uid', '$user', '$imgUrl')";
	//$result=mysql_query($sql);
	
	// Session 
	//session_start();
	//$_SESSION["uid"]=$uid;
	//$_SESSION["name"]=$user;
	//$_SESSION["image"]=$imgUrl;

	// COOKIE
	//setcookie("uid", $uid, time()+86400);
	// TIME: 3600 = 1 hour (60*60)	
	
	// Header
	//header('Location: http://howlix.com/shred/real2/shredm.php');
}
else
{
	// Not logged in
	// Header
	header('Location: http://howlix.com/shred/real2/fb/index.php');
}
?>
