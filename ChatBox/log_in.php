

<?php


if(!isset($_POST['submit'])){ //checking if the person arrive here by chance or if they press the "log in" button.
	echo "Post not set";
    
    //header("Location: ./index.php");
    //exit();
}
else { 
    session_start();
    //check if i recieved the right variables
    echo "name ".$_POST['username']."<br>";
    echo "pass ".$_POST['pass']."<br>";
   

    include "DB.php"; //including the file to connect to database

	//escape input to avoid sql injections and test if they work by echo.
	$username = mysqli_real_escape_string($conn, $_POST['username']); 
	$pass = mysqli_real_escape_string($conn, $_POST['pass']); 
    //echo "name ".$name."<br>";
  	//echo "pass ".$pass."<br>";

    /*---------------------------------------------------------------------------------------*/
    
	if(!empty($name)||!empty($pass)){ //check if variables are not somehow empty before proceeding
		//echo "not empty";
		$sql = "SELECT * FROM `user` 
				WHERE name = '$username'
				AND password ='$pass';";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck <=0){ // if nothing came back from the query
            echo " got nothing"."<br>";
            //header("Location: ./index.p//hp?account=DoesNotExist");
            //exit();  
        }else if ($resultCheck >=1){ //if user is authenticated, save the user's id.
        	$row = mysqli_fetch_assoc($result);
        	$id = $row['id'];           
             
            
             $_SESSION['name']= $row['name']; //saving the authenticated user's name
            // echo "session name: ".$_SESSION['name'];

            $sql = "SELECT * FROM `user`;"; //starting a new querry to get all users that this user can chat with
            $result2 = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            
           if($resultCheck <=0){
                echo "Encounted an Unexpected error"."<br>";
                //header("Location: ./index.p//hp?account=DoesNotExist");
                exit();  
        	}else if ($resultCheck >=1){
       	
        		$_SESSION['users']=array(); //cresating an array to save all the users in 

        		while ($row2 = $result2->fetch_assoc()) {

					array_push($_SESSION['users'],array($row2['id'],$row2['name'])); //pushing each array(user, id) into array session[users]

        			}
                
                print_r($_SESSION['users']);

        		
               		//log in user
               		

               		$_SESSION['id']= $id;

               	//echo "name ".$_SESSION['name']."<br>";

               	//echo "id ".$_SESSION['id']."<br>";
               	header("Location: home.php?login=success"); //sending to the home page
                exit(); 
                
                  
        	}  	
        }
 
    }


}

