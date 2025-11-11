<?php
session_start();

class ErrClass {
    public $error;
}

// Initialize the errClass object 
$obj = new ErrClass();

// assigning the property 'error'
$obj->error = "";




$message = "";

if(!empty($_POST)){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$message = "Success! You entered: ".$username." ".$password;

	
	//creating array object of user provided username and pass
	$data = ['username'=>$username, 'password'=> $password];
	//sending to Middle  and assining result to variable
	$result = send_to_middle('login',json_encode($data));
	$message  = $result;
	
	$detail = json_decode($result);
	if($detail->{"status"} == "200"){
		$_SESSION['user']=$detail;
		if($detail->{"role"} == "Student"){
			
			header("Location: student.php");
		}else if($detail->{"role"} == "Prof"){
			header("Location: instructor.php"); 
		}
	}else{
		$obj->error="Invalid Login";
		$message =$message.$obj->error;
	}
}
function send_to_middle($action, $data){
	
	$info = array('action'=>$action, 'data'=>$data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost:8888/Portfolio/front/test2.php");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $info);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //storing curl execution result
    $result = curl_exec($ch);
    curl_close($ch);
	
    return "----------";
    //return $result;
	
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  <title>Login</title>

<style >
body{
    /*background-image: url("https://dvqlxo2m2q99q.cloudfront.net/000_clients/162402/page/w1000-162402gYYm5386.gif");*/
    background-size: 100% 100%;
    margin: 0;

}
#wrapper{
	background-color: #eee;
	overflow: hidden;
	padding-bottom: 100px;
}
.top{
	background-image: url("https://news.njit.edu/sites/news/files/styles/16by9-banner/public/Number1WalkingNJIT_L.JPG?itok=DEbqvyTe");
	background-size: 100% 100%; 
	background-repeat: no-repeat;
	background-color: red;
	width: 60%;
	height: 520px;
	margin-left: 100px;
	float: left;
}
#info_AVA{
	background-color: blue;
	float:left;
	width: 30%;
	height: 480px;
	background-image: linear-gradient(to bottom right, darkblue, lightblue);
	color: #fff;
	font-size: 20px;
	padding: 10px;
	overflow-y: scroll;
}
.header{
	margin: 0;
	background-color: #eee;
    border-bottom:2px solid #eee;
    overflow: hidden;
    box-shadow: inset 0 0 10px #000000;
    padding-top: 0;
 	background-image: linear-gradient(  black, #111);
 	height: 50px;
	overflow: hidden;
	color: #fff;

}

/*displays form-wrapper for input*/
#ln{
    margin: auto; 
  	background-image: linear-gradient(   white,#888);
    width: 60%; height: auto; 
    margin-top: 10%; 
    margin-bottom: 10%; 
    overflow: hidden; 
    padding: 0;
  	box-shadow: inset 0 0 10px #000000;
    border-radius: 10px;
    border: 0px solid #000;
    opacity: .8;

}

#btn{
    font-size: 30px; margin: 10% 0 0 0; border-radius: 5px; background-color: #cf0000;
    width: 100px;
    border: 1px solid red;
    background-image: linear-gradient(   red,white);
}

#btn:hover{
    background-image: linear-gradient(   darkred,white);
    border: 1px solid red;
}
 #logo{
 	background-image: url("https://upload.wikimedia.org/wikipedia/commons/c/cf/Logo_of_New_Jersey_Institute_of_Technology.png");
 	background-size: 100% 100%;
 	height: 50px;
 	width: 100px;
 	float: left;
 }
#splicer{

	height: 200px;
	width: 4px;
	background-color: darkred;
	float: left;
	margin-left: 10px;


}
#uname,#pas{
      	width: 100%;
        font-size: 30px;
        margin: 10px 0 10px 0;
        border: none;
        border-bottom:  1px solid #000;
        background-color: none; 
        border-radius: 9px;

}
</style>
    
</head>

<body >
   

      	<!---display header---->
<div class="header">
	
		<div id="logo"></div>
		<div id="splicer"></div>
		<span style="float: left; margin-left: 10px; color: #ddd; font-size:40px;">AVA</span>
	
</div>
      	<div id="wrapper">
        <div class="top"></div>
	        <div id="info_AVA">
		       	<h1 id="create" style="text-align: center; margin: 0;"> Welcome to AVA<h3 style="text-align: center; margin: 0">Brought to you by NJIT</h3></h1>
	        	<p>
	        		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	        		consequat.<br> Duis aute irure dolor in reprehenderit in voluptate velit esse
	        		cillum dolore eu fugiat nulla pariatur.<br> Excepteur sint occaecat cupidatat non
	        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>

	        	</p>
	        	 <p>
	        		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	        		consequat.<br><br> Duis aute irure dolor in reprehenderit in voluptate velit esse
	        		cillum dolore eu fugiat nulla pariatur.<br> Excepteur sint occaecat cupidatat non
	        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
        		
        	</p>
	        </div>
        </div>
        <!---Form Wrapper---->
        <div id="ln"  >

            <div style="margin: 0% 10% 5% 10%; /*background-color: #5e4*/; overflow: hidden;  padding: 0 5% 5% 5%;">
              <h2 id="create" style="text-align: center; color: #cf0000; border-top: 1px solid #6b0000; font-size: 40px;">LOG IN TO AVA</h2>
              <div style="color: darkblue; margin-top: 10px;">Log in to AVA by entering in the Username and password in the form below and click Login. Required fields are indicated with the term "(required)". If you have forgotten your password, click Forgot Password in order to create a new one.</div><br><br>

             <!-- <form id="myform" class="form"   >  -->
            <form method="POST"   > <!-- if you don't specify wher action is posting to, thank it can post to this same page, hence the code above. -->
           <?php echo "<span style='color: red;'>".$message."</span>"; ?>   <!-- can just inject an open php anywhere and make reference from a created variable ( message is created above--> 	
			<label>Username(required)</label>
                <input  id="uname" name="username" type="text" placeholder=" Username"  /><br/>
                <label>Password(required)</label>
                <input  id="pas" name="password" type="password"  placeholder=" Password"/><br/>

                <input type="submit" type="submit" id="btn" value="submit" >      
            </form>     



            </div>
    
        </div>
      

  





<script>

//called by submit button, calls login.inc.php to verify credentials
function validateform(){
  	var Username=document.getElementById("uname").value;               
  	var pass = document.getElementById("pas").value;                 
  	//	alert("here");
  	if (Username==null || Username=="") {
	    alert("Name can't be blank");
	    return false;
   	}else if(pass==null|| pass=="" ){
	    alert("Please type Password");
	    return false;
  	} 
  	return true;
}




</script>
                       
</body>
<footer id="fot">&copy; Copyright Toussaint &copy;</footer>

</html>