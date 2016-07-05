<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Fun.</title>

    <!-- Core CSS -->
    <link href="http://harvix.com/search/css2/bootstrap.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="http://harvix.com/flappy/narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">	
	  <li><a href="#" class="btn btn-primary">Like</a></li>
          <li><a href="#" class="btn btn-info">Tweet</a></li>
          <li><a href="#" class="btn btn-danger">Upload</a></li>
        </ul>
        <h3 class="text-muted">Fun.</h3>
      </div>

      <div class="jumbotron">
        <h1>Fun.</h1>
	<button type="button" class="btn btn-danger" data-toggle="modal" onClick='document.getElementById("iframeURL").src="http://howlix.com/fun/fun2/file.html";' data-target="#myUploadModal">Upload</button>
      </div>

      <!--Modal Upload Start-->
      <div class="modal fade" id="myUploadModal" tabindex="-1" role="dialog" aria-labelledby="myWIKIModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Upload</h4>
      </div>
      <div class="modal-body">
      <iframe id="iframeURL" height="500px" width="100%" frameborder="0"></iframe>
      </div>
      </div>
      </div>
      </div>
      <!--Modal Upload End-->

      <div class="row marketing">

<!--PHP Start-->
<?php
// Vars
$host="localhost"; // Host name 
$username="wordpress"; // Mysql username 
$password="dtechblog777"; // Mysql password 
$db_name="wordpress"; // Database name 
$tbl_name="funstore"; // Table name 

// Connect to server and select database.
mysql_connect("localhost", "wordpress", "dtechblog777", "wordpress")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Retrive data from database 
$sql = "SELECT * FROM $tbl_name";
$result = mysql_query($sql) or die(mysql_error()); 

// If successful... 
if($result)
{
        // If Successfully...

//	echo "<table border='1'>
//	<tr>
//	<th>Title</th>
//	<th>Url</th>
//	</tr>";
//
//	while($row = mysqli_fetch_array($result)) 
//	{
//        	echo "<tr>";
//        	echo "<td>" . $row['title'] . "</td>";
//        	echo "<td>" . $row['url'] . "</td>";
//        	echo "</tr>";
//	}
//
//	echo "</table>";

	while($row = mysql_fetch_array($result)) 
	{
  		//echo $row['title'] . " " . $row['url'];
  		//echo "<br>";

		$title = $row['title'];
		$url = $row['url'];

		$check = check_url($url);
		if ($check == '200')
		{		
			echo " 
				<h1> " . $title . " </h1>
        			<img width=\"100%\" src=\" " .  $url . " \"></a>
        			<p>
        			<div class=\"btn-group\">
        			<a href=\"\" class=\"btn btn-default btn-lg\"><i class=\"glyphicon glyphicon-thumbs-up\"></i></a>
        			<a href=\"\" class=\"btn btn-default btn-lg\"><i class=\"glyphicon glyphicon-thumbs-down\"></i></a>    
        			<a href=\"\" class=\"btn btn-default btn-lg\"><i class=\"glyphicon glyphicon-flag\"></i></a>
        			<a href=\"\" class=\"btn btn-default btn-lg\"><i class=\"glyphicon glyphicon-fullscreen\"></i></a>
        			</div>
        			<a href=\"\" class=\"btn btn-primary btn-lg\">Like</a>
        			<a href=\"\" class=\"btn btn-info btn-lg\">Tweet</a>
        			</p>
			";	
		}

		else
		{
			echo " 
                                <h1>Broken...</h1>
                                <img width=\"100%\" src=\"\"></a>
                                <p>
                                <div class=\"btn-group\">
                                <a href=\"\" class=\"btn btn-default btn-lg\"><i class=\"glyphicon glyphicon-thumbs-up\"></i></a>
                                <a href=\"\" class=\"btn btn-default btn-lg\"><i class=\"glyphicon glyphicon-thumbs-down\"></i></a>    
                                <a href=\"\" class=\"btn btn-default btn-lg\"><i class=\"glyphicon glyphicon-flag\"></i></a>
                                <a href=\"\" class=\"btn btn-default btn-lg\"><i class=\"glyphicon glyphicon-fullscreen\"></i></a>
                                </div>
                                <a href=\"\" class=\"btn btn-primary btn-lg\">Like</a>
                                <a href=\"\" class=\"btn btn-info btn-lg\">Tweet</a>
                                </p>
                        ";
		}
	}

}

else 
{
	// Else...

        echo "Error, Could not retrive... <br>";
}

mysqli_close($con);

//$myurl = "http://www.flickr.com/photos/thecancerus/2869110105/";
//$satus = check_url($myurl);
//if($satus == '200')
//	echo "Its works";
//else
//	echo "broken url";


//Functions

function check_url($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	$headers = curl_getinfo($ch);
	curl_close($ch);
	return $headers['http_code'];
}
?>
<!--PHP End-->

<!--Start Placeholder HTML-->
<?/*?>
	<!--Post Start-->
        <h1>Me everyday.</h1>
	<img width="100%" src="http://d3dsacqprgcsqh.cloudfront.net/photo/aG94nD6_460s_v1.jpg"></a>
        <!-- Start Like Dislike Flag-->
	<p>
	<div class="btn-group">
	<a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-thumbs-up"></i></a>
        <a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-thumbs-down"></i></a>    
        <a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-flag"></i></a>
	<a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-fullscreen"></i></a>
	</div>
	<a href="" class="btn btn-primary btn-lg">Like</a>
        <a href="" class="btn btn-info btn-lg">Tweet</a>
	</p>
	<!--End Like Dislike Flag-->
	<!--Post End-->

	<hr></hr>

	<!--Post Start-->
        <h1>Well this trend has officially jumped the shark.</h1>
        <img width="100%" src="http://d3dsacqprgcsqh.cloudfront.net/photo/aZPO5g6_460s.jpg"></a>
        <!-- Start Like Dislike Flag-->
        <p>
        <div class="btn-group">
        <a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-thumbs-up"></i></a>
        <a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-thumbs-down"></i></a>    
        <a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-flag"></i></a>
	<a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-fullscreen"></i></a>
        </div>
	<a href="" class="btn btn-primary btn-lg">Like</a>
        <a href="" class="btn btn-info btn-lg">Tweet</a>
        </p>    
        <!--End Like Dislike Flag-->
        <!--Post End-->

	<hr></hr>
	
	<!--Post Start-->
        <h1>Dad made this for himself. Pretty spot on</h1>
        <img width="100%" src="http://d3dsacqprgcsqh.cloudfront.net/photo/a44OgM6_460s_v1.jpg"></a>
        <!-- Start Like Dislike Flag-->
        <p>
        <div class="btn-group">
        <a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-thumbs-up"></i></a>
        <a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-thumbs-down"></i></a>    
        <a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-flag"></i></a>
	<a href="" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-fullscreen"></i></a>
        </div>
        <a href="" class="btn btn-primary btn-lg">Like</a>
        <a href="" class="btn btn-info btn-lg">Tweet</a>
	</p>    
        <!--End Like Dislike Flag-->
        <!--Post End-->
<?*/?>
<!--End Placeholder HTML-->

      </div>

      <div class="footer">
        <p>&copy; Fun. 2014</p>
      </div>

    </div> <!-- /container -->


    <!-- Core JavaScript -->
    <script src="http://harvix.com/search/new/js/bootstrap.js"></script>
    <script src="http://harvix.com/search/new/js/jquery.js"></script>
    <script src="http://harvix.com/search/new/js/modal.js"></script>

  </body>
</html>

