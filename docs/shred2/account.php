<?php
// SESSION
if (isset($_SESSION["uid"]))
{
        // Session Destroy
        //session_destroy();
        // Continue on...
}
else
{
        session_start();
        $_SESSION["uid"] = $_GET["uid"];
        
        $uid = $_SESSION["uid"];
}

$uid = $_COOKIE["uid"];


// ACCOUNT SQL

$mysql = "SELECT * FROM $user_table WHERE uid=$uid";
$fun = mysql_query($mysql) or die(mysql_error());

if (fun)
{
        $act = mysql_fetch_array($fun);

        $account_id = $act['ID'];
        $account_date = $act['date'];
        $account_uid = $act['uid'];
        $account_user = $act['user'];
        $account_imgUrl = $act['imgUrl'];
}
else
{
        // Failure
}
?>
