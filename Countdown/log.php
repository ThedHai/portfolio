

<?php 



include "connect.php";

$usernameProvided = validate($_POST["username"]);
$userProvidedPassword = $_POST["pass"];




// creating SELECT querry before sending to mysqli
$select2 = "SELECT username,first_name,last_name,  password FROM user WHERE username = '$usernameProvided' ";
//querying mysql database
$result = $mysqli_conn->query($select2);
//associating results into key/values pairs
$rows = $result->fetch_assoc();
echo $rows["username"]."-------<br>";
//line 21: check results from select querry
//var_dump($rows);
  


  
//verifying username exist 
if ($rows["username"] =="NULL"){
    //invalid username
    echo "Invalid username or password";
}elseif (verifyPass($userProvidedPassword,$rows["password"])){
    echo "Login successful!";
    session_start();
    // ... (storing session data)
    $_SESSION["logged_in"] = true; 
    $_SESSION["user"] = $rows["first_name"]." ".$rows["last_name"];
    $_SESSION["username"] = $rows["username"];
    header('Location: ./dest.php');
     exit();
};

    /*------------------| func |-----------------*/
//cleanup username
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

//verify password 
function verifyPass($provided, $stored){
    echo "prov: ".$provided."store: ".$stored."<br>";
    if (password_verify($provided, $stored)) {
        
        // Password is correct
        echo "Login successful!";
        return true;

    } else {
        // Password is incorrect
       echo "Invalid password.";
        return false;
    }
}



    /* 
//line 21: check results from select querry
var_dump($rows);
    //OR
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo  " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
  */
  ?>