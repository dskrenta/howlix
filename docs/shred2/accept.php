<?php
// Start MySQL
require 'sql.php';
require 'session.php';

// UID + USER
session_start();
$window_uid = $_SESSION["uid"];
$window_user = $_SESSION["user"];

// FOLDERID
$folder_name = $_POST["folder"];
$folderId = $folder_name . $window_uid;

// GETS
$r_id = $GET['ID'];
$r_date = $GET['date'];
$r_title = $GET['title'];
$r_folder = $GET['folder'];
$r_user = $GET['user'];
$r_uid = $row['uid'];
$r_url = $row['url'];
$r_fid = $row['extra'];
$r_type = $row['type'];
$r_snippet = $row['snippet'];

// Date
$date = date("Y-m-d H:i:s");

if(!empty($_GET["folder"]))
{
	$folder = mysql_real_escape_string($_GET["folder"]);

	if($r_type == "website")
	{
		//$url = mysql_real_escape_string($_GET["url"]);
		$type = "website";

		// Insert data into mysql 
        	$sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra)VALUES('$date', '$folder', '$folder_name', '$window_user', '$window_uid', '$r_type', '$r_url', '$folderId')";
        	$result=mysql_query($sql);

        	// Folder SQL
        	//$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
        	//$action = mysql_query($folderSQL);
	}

	if($r_type == "image")
	{
		//$image = mysql_real_escape_string($_GET["image"]);
		$type = "image";

		// Insert data into mysql 
                $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra)VALUES('$date', '$folder', '$folder_name', '$window_user', '$window_uid', '$r_type', '$url', '$folderId')";
                $result=mysql_query($sql);

                // Folder SQL
                //$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
                //$action = mysql_query($folderSQL);
	}

	if($r_type == "video")
	{
		//$video = mysql_real_escape_string($_GET["video"]);
		$type = "video";

		// Insert data into mysql 
                $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, extra, snippet)VALUES('$date', '$folder', '$folder', '$window_user', '$window_uid', '$r_type', '$folderId', '$r_snippet')";
                $result=mysql_query($sql);

                // Folder SQL
                //$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
                //$action = mysql_query($folderSQL);
	}

	if($r_type == "document")
        {
                //$video = mysql_real_escape_string($_GET["video"]);
                $type = "video";

                // Insert data into mysql 
                $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, extra, snippet)VALUES('$date', '$folder', '$r_title', '$window_user', '$window_uid', '$r_type', '$folderId', '$r_snippet')";
                $result=mysql_query($sql);

                // Folder SQL
                //$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
                //$action = mysql_query($folderSQL);
        }

	/*
	if(isset($_FILES['file']) && $_FILES['file']['size'] > 0)
        {
                echo "File OK";

                //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                //echo "Type: " . $_FILES["file"]["type"] . "<br>";
                //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        
                //$type = "document";
             
		if (($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
                {
			$type = "image";
		}
	
		elseif ($_FILES["file"]["type"] == "application/pdf")
		{
			$type = "document";
		}

		else
		{
			// Failure
		}

                // BYTE CONVERSIONS 1GB = 1073741824 BYTES, 20 KB = 20000 BYTES

                $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf");
                $temp = explode(".", $_FILES["file"]["name"]);
                $extension = end($temp); 
    
                if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "application/pdf"))
                && ($_FILES["file"]["size"] < 1073741824)
                && in_array($extension, $allowedExts))
                {
                        if ($_FILES["file"]["error"] > 0)
                        {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                        }
                        else
                        {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . $_FILES["file"]["size"] . "<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

				$filename = $_FILES["file"]["name"];
                        }
                        if (file_exists("upload/" . $_FILES["file"]["name"]))
                        {
                                echo $_FILES["file"]["name"] . " already exists. ";
                        }
                        else
                        {
                                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "upload/" . $_FILES["file"]["name"];

                                $path = "upload/" . $_FILES["file"]["name"];

                                // Insert data into mysql 
                                $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra, snippet)VALUES('$date', '$filename', '$folder', '$window_user', '$window_uid', '$type', '$path', '$folderId', '$path')";
                                $result=mysql_query($sql);

                                // Folder SQL
                                //$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
                                //$action = mysql_query($folderSQL);
                        }
                }
                else
                {
                        echo "Invalid file";
                }
        }
        else
        {
                echo "No File Uploaded";
        }
	*/
}


// Add file upload support

// Header redirect
//header("Location: http://howlix.com/shred2/main.php");

// End MySQL
sqlEnd();
?>
