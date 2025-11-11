<?php 
// resuming/Start the session if it's not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the session is active
if (session_status() == PHP_SESSION_ACTIVE) {
    // Checking if the session is empty (no data stored)
    if (empty($_SESSION)) {
        //echo "Session is empty (contains no variables).";
        header('Location: ./index.html');
        exit();
    } /*else {//echo "Session is not empty (contains variables).";
        // iterating and display session contents if needed
        // print_r($_SESSION);
    }*/
} else {
    //Session is not active.
    header('Location: ./index.html');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home</title>
    <link href="dest.css" rel="stylesheet" />
  </head>
  <body >
    <div>
      <nav >
        
        <ah2 href="#"><?php echo "Welcome ".$_SESSION["user"]."<br>"?></h2>
        <!-- <a href="#"><?php echo $_SESSION["username"]?></a> !-->
        <button id="logoutbut" onclick="myFunction()">Logout </button> 
    </nav>

    </div>
 
    <div class="wrapper" >
  
      <div class="side_menue" id="mySidenav" >
        <span id="x" onclick="Close('mySidenav')">&times </span>
        <a href="#" > &#43 create new </a>
      </div>
      <!-- Left side Menue !-->
      <span  id= "sidebar" onclick="openNav()">
        &#9776; </span>
        <div class="text" style="margin-bottom: 0em; margin-left: 5em;">
         <p style="font-size: 2em;color:navy; width: 70%; margin:2em;">
        </div>
        <h3 id="tt">School Countdowns</h3>
        <div class="content" id="container">

        </div>
        
        </div>

      

    </div>
   
  </body>
<script>
  //func to log out
  function myFunction() {
    php = "<?php session_destroy()?>";
    window.location.replace("./index.html");
  }
    
</script>
  <script src="script.js"></script>

  
</html>
