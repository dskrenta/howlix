<?php
// ShredFeed Sidebar.php

// Functions
//require 'functions.php';

// COOKIE
$uid = $_COOKIE["uid"];
//$uid = $_SESSION["uid"];

/*
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

//$uid = $_SESSION["uid"];
*/

// ACCOUNT SQL

$mysql = "SELECT * FROM $user_table WHERE uid=$uid";
$fun = mysql_query($mysql) or die(mysql_error());

if (fun)
{
        $act = mysql_fetch_array($fun);

        $act_id = $act['ID'];
        $act_date = $act['date'];
        $act_uid = $act['uid'];
        $act_user = $act['user'];
        $act_imgUrl = $act['imgUrl'];
}
else
{
        // Failure
}

?>

<div id="wrapper" class="col-md-12 container-fluid">
        <div class="col-md-3" id="leftCol">
		<form action="http://howlix.com/shred2/search.php" method="post">
                        <input type="search" results="5" placeholder="search..." name="q">
                        <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                </form>
                <h3><span style="left:auto !important;right:0;"><a href="http://howlix.com/shred2/addFolder.php" class="glyphicon glyphicon glyphicon-plus-sign" rel="tooltip" data-placement="left" title="add a new folder"></a></span><?php echo $act_user; ?>'s Folders</h3>

<?php
// Vars
$count = 1;

//echo $uid . "\n";
//echo $_SESSION["uid"] . "\n";

//$Sfid = $folder . $_SESSION["uid"];

// SQL
//sqlStart();
	//sqlQuery("SELECT * FROM $folder_table ORDER BY ID DESC");

	$sql = "SELECT * FROM $folder_table WHERE uid=$uid ORDER BY ID DESC";
	$result = mysql_query($sql) or die(mysql_error());

	if ($result)
	{
		while($row = mysql_fetch_array($result))
	        {
			$id = $row['ID'];
                	$date = $row['date'];
                	$folder = $row['folder'];
                	$user = $row['user'];
			$fid = $row["folderid"];
                	$description = $row['description'];
        
  			$Sfid = $folder . $_SESSION["uid"];
		
	              	echo"
                		<div class=\"panel-group\" id=\"accordion\">
                        	<div class=\"panel panel-default\">
                                <div class=\"panel-heading\">
                                <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse" . $count . "\"><span class=\"glyphicon glyphicon-chevron-down fr\"></span></a>

				<!-- <a href=\"http://howlix.com/shred2/folder.php?folder=" . $folder . "&fid=" . $fid . "\"> " . $folder . " </a> -->
				<a href=\"http://howlix.com/shred2/folder.php?folder=" . $folder . "&fid=" . $fid . "&squawk=" . $Sfid . "\"> " . $folder . "</a>
				</h4>
                                </div>
                                <div id=\"collapse" . $count . "\" class=\"panel-collapse collapse\">
                            	<div class=\"panel-body\">
                           	<ul id=\"tabList\">
                 	";
                                                
                 	// Data
                  	$mysql = "SELECT * FROM $main_table WHERE folder='$folder'";
                    	$out = mysql_query($mysql) or die(mysql_error());
                                        
                    	if($out)
                  	{
                     		while($put = mysql_fetch_array($out))
                                {
                               		$shred_id = $put['ID'];
                                    	$shred_date = $put['date'];
                                    	$shred_title = $put['title'];
                                 	$shred_folder = $put['folder'];
                                 	$shred_user = $put['user'];
					$shred_uid = $put['uid'];
					$shred_type = $put['type'];
                                 	$shred_url = $put['url'];
                                 	$shred_icon = $put['icon'];
                                	$shred_snippet = $put['snippet'];
        
                                	echo"
                                    		<li>
                                          	<span class=\"listIcons\"><a href=\"#collapse" . $count . "\" class=\"glyphicon glyphicon-remove\"></a></span>
                                        	<a href=\"http://howlix.com/shred2/post.php?id=" . $shred_id . "\">" . $shred_title . "</a>
                                           	</li>
                                       	";
                           	}
                   	}
        
                     	else 
			{ 
				// Nothing
			}

                    	echo"
				</ul>
				<ul class=\"folderTray\">
				<li><a href=\"http://howlix.com/shred2/addContent.php?folder=" . $folder . "\"  data-toggle=\"modal\" title=\"Add Content\" class=\"glyphicon glyphicon-plus\"></a></li>
				<li><a href=\"#\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" title=\"Share This Folder\" class=\"glyphicon glyphicon-share\"></a></li>
				<form method=\"post\" action=\"delete.php\">
                                <input type=\"hidden\" name=\"rowid\" value=\"" . $id . "\" />
                                <input type=\"hidden\" name=\"userid\" value=\"" . $user . "\" />
                                <input type=\"hidden\" name=\"table\" value=\"shredfold4\" />
                                <input type=\"hidden\" name=\"folder\" value=\"" . $folder . "\" />
                                <li><button type=\"submit\" class=\"glyphicon glyphicon-remove-circle\"></button></li>
                                </form>
				</ul>
                         	</div>
                                </div>
                        	</div>  
                		</div>
                	";

                	$count = $count + 1;

		}
	}
	
	else
	{
		// Nothing
	}
//sqlEnd();

echo "</div>";
?>
