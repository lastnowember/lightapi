<?php
  $text = $_POST['text'];
  $file = ('log.txt',"a");
  fwrite($file, $text);
  fclose($file); 
?>
