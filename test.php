<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once('wordphp.php');
$rt = new WordPHP(false);
$text = $rt->readDocument('test.docx','N');
// $text = $rt->readDocument('test.docx', 'Y');

echo $text;
// The following two lines are optional if required to save the html text to a file (newfile.php)
// $myfile = fopen("newfile.php", "w") or die("Unable to open file!");
// fwrite($myfile, $text);
?>
  
</body>
</html>

