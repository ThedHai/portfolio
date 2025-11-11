<?php
$message = "";
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $input = $_POST['inputText']; //get input text
  $message = "Success! You entered: ".$input;
} 
if(!empty($_POST)){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	echo $username;
    echo $password;} 
?>


<html>
<body>    
<form action="" method="post">
<!--<?php echo $message; ?> kokie --->
  <input type="text" name="inputText"/>
  
  <input  id="uname" name="username" type="text" placeholder=" Username"  /><br/>
    <label>Password(required)</label>
 <input  id="pas" name="password" type="password"  placeholder=" Password"/><br/>

 <input type="submit" name="SubmitButton"/>
</form>    
</body>
</html>