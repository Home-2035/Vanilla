<?php
  $db_host = 'localhost';
  $db_user = 'u2339146_Changer';
  $db_password = 'neqde2-bAkryh-nyttyt';
  $db_db = 'u2339146_Materials';
 
  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }


?>