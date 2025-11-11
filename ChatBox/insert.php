<?php
include "DB.php";

//echo "This is insert<br>";
$id1 = $_GET['frm'];
$id2 = $_GET['sendto'];
$message = mysqli_escape_string($conn,$_GET['message'] ) ;
/*
echo "id1: ".$id1."<br>";
echo "id2: ".$id2."<br>";
echo "message: ".$message."<br>";
*/
 
/* insert in message table id*/
$sql = "INSERT INTO `chat` (`c_id`, `message`, `frm`, `to`, `created`) 
VALUES (NULL, '$message', '$id1', '$id2', CURRENT_TIMESTAMP);";


if (mysqli_query($conn, $sql)) {

} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

