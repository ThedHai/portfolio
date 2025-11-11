
<?php


if(!isset($_POST['submit2'])){ //checking if the person arrive here by chance or if they press the "log in" button.
	echo "Post not set";
    
    //header("Location: ./index.php");
    //exit();
}
else { 
    session_start();
    //check if i recieved the right variables
    echo "name ".$_POST['fname']."<br>";
    echo "lname ".$_POST['lname']."<br>";

}

?>