<?php
  require_once('settings.php');

  mysql_connect($base_server, $base_login, $base_pass) or die("Сервер умер".mysql_error());
  
  mysql_select_db($base_name) or die("Нет подключения к базе".mysql_error());

  $status = mysql_query("SHOW TABLES LIKE 'clients'") or die(mysql_error());
  $run = mysql_fetch_assoc($status);
  $name = $_POST['name'];
  $tel = $_POST['tel'];
  $query_v = "INSERT INTO `clients`(`name`, `tel`) VALUES ('$name','$tel')";
  if (!$run) {
    mysql_query("CREATE TABLE clients(id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), tel VARCHAR(12))") or die(mysql_error());
    echo "Базы данных не было, но я создал<br>";
    mysql_query($query_v) or die(mysql_error());
    echo "И записал данные";
  } else {
    echo "База данных уже создана!";
    mysql_query($query_v) or die(mysql_error());
    echo "И я записалв неё данные";
  }
   
?>
