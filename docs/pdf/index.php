<?php

include('pdf.php');
$a = new PDF2Text();
$a->setFilename('https://ia600401.us.archive.org/25/items/historyofwestern000213mbp/historyofwestern000213mbp.pdf'); 
$a->decodePDF();
echo $a->output() . "\n"; 


?>
