<?php 
require "connect.php";

// define variables and set to empty values
$fname = $lname = $username = $pass1 = $pass2 = "";

/*
  $_POST contains form's 'Post' from previous page.
  Grabbing those values and saving to local variable (for simplicity) 
  */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $username = test_input($_POST["username"]);
    $pass1 = test_input($_POST["pass"]);
    $pass2 = test_input($_POST["confirm"]);
  }
  
  //trime whitespace, special character etc. 
  function test_input($data) {
    echo "data : ".$data." --------------------------\n";
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  //salt for password storing
  /*
 function custom_function_for_salt(){
      return "AS4$32(4),.>*0)";
  }

$options = [
    'salt' =>  "AS4ASD@#dd3232ii0*(**9nj(4),.>*0)",//custom_function_for_salt(), 
    'cost' => 12 // the default cost is 10
];*/
echo "line 38 \n";
$hash = password_hash($pass2, PASSWORD_DEFAULT);

$sql = "INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES (NULL,  '$fname',  '$lname',NULL, '$username', '$hash');";

$result = $mysqli_conn->query($sql);

if ($mysqli_conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli_conn->error;
  }
$mysqli_conn->close();

session_start();
$_SESSION["user"] = $fname." ".$lname;
$_SESSION["username"] = $username;

header("Location: ./dest.php");
    exit();



?> 
