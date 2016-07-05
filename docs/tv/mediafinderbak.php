<?php
require 'sql.php';
require 'library/dom.php';
require 'functions.php';

// Create DOM from URL
$html = file_get_html('http://www.answers.com/article/1181432/10-long-lost-celebrity-scandals-that-you-forgot-about');

$title = $html->find('h1', 0)->plaintext;

// Find all image blocks
foreach($html->find('div.section') as $image) 
{
	$item['image'] = preg_replace('/^/', "http:", $image->find('img', 0)->src);	
	$item['header'] = trim($image->find('h2.section_title', 0)->plaintext);
	$item['description'] = html_entity_decode(trim($image->find('div.section_body', 0)->plaintext));

    	$images[] = $item;
}

print $title . "\n";
print_r($images);


$safeTitle = mysqli_real_escape_string($conn, $title);
$images = json_encode($images);
$images = addslashes($images);
$images = htmlspecialchars($images);
//$images = addslashes(htmlspecialchars($images));
//$safeImages = json_encode($images);

echo $safeTitle . "\n";
echo $safeImages . "\n";
	
$sql = "SELECT * FROM $images_table WHERE title='$safeTitle' LIMIT 1";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$date = date("Y-m-d H:i:s");

/*
if (mysqli_fetch_array($result) !== false)
{
	//Exists
}

else
{
	$date = date("Y-m-d H:i:s");

        // Insert data into mysql 
        $sqltwo = "INSERT INTO $images (date, title, images) VALUES ('$date', '$safeTitle', '$images')";
       	$resulttwo = mysqli_query($conn, $sqltwo) or die(mysqli_error($conn));	
}
*/

if (mysqli_num_rows($result) > 0)
{
	die("Data set already exists");
}

else
{
	$sql = "INSERT INTO $images_table (date, title, images) VALUES ('$date', '$safeTitle', '$safeImages')";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}


?>
