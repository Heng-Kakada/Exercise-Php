<?php
$myFile = fopen('myfile.txt', 'w') or die("Unable to open file!");
$word = "Hello World\n";
for ($i = 0; $i < 1000; $i++) {
    fwrite($myFile, $word);
}
fclose($myFile);

