
<?php

  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = '';
  $db_db = 'testing';
 
  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );

$mysqli->set_charset("utf8mb4"); // Установка кодировки соединения


if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
