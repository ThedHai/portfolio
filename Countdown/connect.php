<?php


//sql Credentials




  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = '1234';
  $db_db = 'countdown';
 
  $mysqli_conn = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );

if ($mysqli_conn->connect_error) {
   echo 'Errno: '.$mysqli_conn->connect_errno;
   echo '<br>';
   echo 'Error: '.$mysqli_conn->connect_error;
   exit();
 }

 echo 'Success: A proper connection to MySQL was made.';
 echo '<br>';
 echo 'Host information: '.$mysqli_conn->host_info;
 echo '<br>';
 echo 'Protocol version: '.$mysqli_conn->protocol_version;

 //$mysqli_conn->close();
?>
