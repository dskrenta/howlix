<?php
$text = $_POST["text"];

//$myfile = fopen("save_file.txt", "w") or die("Unable to open file!");
//$txt = $text;
//fwrite($myfile, $txt);
//fclose($myfile);



$myfile = 'save_file.txt';

//chown("save_file.txt", "david");

// Read and write for owner, nothing for everybody else
chmod("$myfile", 0755);

if (!file_exists($myfile)) {
  print 'File not found';
  die("fuck...");
}
else if(!$fh = fopen($myfile, 'w')) {
  print 'Can\'t open file';
  die("SHit");
}
else {
  print 'Success open file';
  die("BOOM!");
}

?>

<script>
window.location.assign("http://howlix.com/drive/index.html")
</script>
