<?php
require 'pdf.php';

if ($argc<2)
{
	echo "\n\tphp -f test.php APEURO1.pdf\n\n";
	die;
}
$pdf = new Pdf($argv[1]);
foreach ($pdf->getStreams() as $obj)
{
	echo $obj->getValue()->toString();
}

//echo pdfToText("APEURO1.pdf");

/*
$text = "Nationalism in Europe 
Bob Barker was a one of a kind king of guy.";

$keywords = preg_split("/\n/", $text);
print_r($keywords);
*/






















?>
