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

// Date
$date = date("Y-m-d H:i:s");

//require_once('recaptchalib.php');
//$privatekey = "6LeKFPcSAAAAAKyPEOUh3Z5hVMuboXq9_HPBm4E3";
//$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

//if (!$resp->is_valid) 
//{
//    // What happens when the CAPTCHA was entered incorrectly
//    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")");
//} 

//else 
//{

if(!empty($_POST["folder"]))
{
	$folder = mysql_real_escape_string($_POST["folder"]);

	if(!empty($_POST["url"]))
	{
		$url = mysql_real_escape_string($_POST["url"]);
		$type = "website";
	
		// Scrape Title
                $html = file_get_contents($url);
                $title = getTextBetweenTags($html, "title");

		// Insert data into mysql 
        	$sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra)VALUES('$date', '$title', '$folder', '$window_user', '$window_uid', '$type', '$url', '$folderId')";
        	$result=mysql_query($sql);

        	// Folder SQL
        	//$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
        	//$action = mysql_query($folderSQL);
	}

	if(!empty($_POST["image"]))
	{
		$image = mysql_real_escape_string($_POST["image"]);
		$type = "image";

		$imgt = $_POST["imgTitle"];

		// Insert data into mysql 
                $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra)VALUES('$date', '$imgt', '$folder', '$window_user', '$window_uid', '$type', '$image', '$folderId')";
                $result=mysql_query($sql);

                // Folder SQL
                //$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
                //$action = mysql_query($folderSQL);
	}

	if(!empty($_POST["video"]))
	{
		$video = mysql_real_escape_string($_POST["video"]);
		$type = "video";

		// Insert data into mysql 
                $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, extra, snippet)VALUES('$date', '$folder', '$folder', '$window_user', '$window_uid', '$type', '$folderId', '$video')";
                $result=mysql_query($sql);

                // Folder SQL
                //$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
                //$action = mysql_query($folderSQL);
	}

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
}

//}

// Add file upload support

// Header redirect
header("Location: http://howlix.com/shred2/main.php");

// End MySQL
sqlEnd();
?>
