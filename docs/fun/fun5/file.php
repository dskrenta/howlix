<?php
// Fun. PHP Upload Save Written By David Skrenta Wednesday, June 18, 2014

// Title POST Retrival 
$name = $_POST["title"];
echo "Title: " . $name . "<br>";

// Get File From POST
if ($_FILES["file"]["error"] > 0) {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
} else {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br>";
}

// Get The Possible Media Url
$url = $_POST["url"];
echo "Url: " . $url . "<br>";

// Get File Number 
$myfile = fopen("num.txt", "r") or die("Unable to open file!");
$num = fgets($myfile);
echo "Current Number: " . $num . "<br>";
fclose($myfile);

// Declare Reset Number 
$reset_num = $num + 1;
echo "New Number: " . $reset_num . "<br>";

// Reset File Number
$myfile = fopen("num.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $reset_num);
fclose($myfile);

// Declare Filename
//$english_num = spellNumberInEnglish ("$num");
//$filename = "$english_num.txt";
$filename = "$num.txt";
echo "Filename: " . $filename . "<br>";

// Save File w/ File Number Preped For Retrival
$myfile = fopen("$filename", "w") or die("Unable to open file!");
$txt = "$num\n";
fwrite($myfile, $txt);
$txt = "$name\n";
fwrite($myfile, $txt);
if ($url != "")
{
	$txt = "$url\n";
	fwrite($myfile, $txt);
}
fclose($myfile);

// Functions
function spellNumberInEnglish ($number) {
        $number = strval($number);
        $ones = array("", "one", "two", "three", "four", 
                "five", "six", "seven", "eight", "nine");
        $teens = array("ten", "eleven", "twelve", "thirteen", "fourteen", 
                "fifteen", "sixteen", "seventeen", "eighteen", "nineteen");
        $tens = array("", "", "twenty", "thirty", "forty", 
                "fifty", "sixty", "seventy", "eighty", "ninety");
        $majorUnits = array("", "thousand", "million", "billion", "trillion");
        $result = "";
        $isAnyMajorUnit = false;
        $length = strlen($number);
        for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) {
                if ($number{$i} != '0') {
                        if ($pos % 3 == 0)
                                $result .= $ones[$number{$i}] . ' ';
                        else if ($pos % 3 == 1) {
                        if ($number{$i} == '1') {
                                $result .= $teens[$number{$i + 1}] . ' ';
                                $i++; $pos--;
                        } else {
                                $result .= $tens[$number{$i}];
                                $result .= $number{$i + 1} == '0'? ' ' : '-';
                                }
                        } else 
                        $result .= $ones[$number{$i}] . " hundred ";
                        $isAnyMajorUnit = true;
                }
                if ($pos % 3 == 0 && $isAnyMajorUnit) {
                        $result .= $majorUnits[$pos / 3] . ' ';
                        $isAnyMajorUnit = false;
                }
        }
        trim($result);
        if ($result == "") $result = "zero";
        return($result);
}
?>
