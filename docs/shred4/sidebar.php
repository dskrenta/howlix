<?php
// ShredFeed Sidebar.php

// Functions
//require 'functions.php';
?>

<div id="wrapper" class="col-md-12 container-fluid">
        <div class="col-md-3" id="leftCol">
                <form action="searchResults.html">
                        <input type="search" results="5" placeholder="search..." name="s">
                </form>

                <h3><span style="left:auto !important;right:0;"><a href="http://howlix.com/shred2/addFolder.php" class="glyphicon glyphicon glyphicon-plus-sign" rel="tooltip" data-placement="left" title="add a new folder"></a></span>David's Folders</h3>

<?php
// Var
$count = 1;

// SQL
//sqlStart();
	//sqlQuery("SELECT * FROM $folder_table ORDER BY ID DESC");

	$sql = "SELECT * FROM $folder_table ORDER BY ID DESC";
	$result = mysql_query($sql) or die(mysql_error());

	if ($result)
	{
		while($row = mysql_fetch_array($result))
	        {
			$id = $row['ID'];
                	$date = $row['date'];
                	$folder = $row['folder'];
                	$user = $row['user'];
                	$description = $row['description'];
        
                	echo"
                		<div class=\"panel-group\" id=\"accordion\">
                        	<div class=\"panel panel-default\">
                                <div class=\"panel-heading\">
                                <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse" . $count . "\"><span class=\"glyphicon glyphicon-chevron-down fr\"></span></a><a href=\"http://howlix.com/shred/real/folder.php?folder=" . $folder . "\"> " . $folder . " </a></h4>
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
                                        	<a href=\"http://howlix.com/shred/real/post.php?id=" . $id . "\">" . $shred_title . "</a>
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
