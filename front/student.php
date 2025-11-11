<?php
session_start();
include 'helper.php';
$user_id=$_SESSION['user']->{"id"};
$user_fname=$_SESSION['user']->{"firstname"};
$user_lname=$_SESSION['user']->{"lastname"};



?>

<html>
<head>
	<title>Intructor Page</title>
	  <link rel="stylesheet" href="./styles.css">
	<style>
	
	.theme td{
		width:50%;
		
	}
	.q_lists{
		color:red;
		 border: 1px solid black;
	}
	
	</style>
	<style >
 	 	.bts{
 	 		background-image: url("https://www.shutterstock.com/video/clip-1024092275-glowing-lights-neon-color-changing-purple-pink");
 		font-size: 15px;
 		border-radius: 10px;
 		border-bottom: 1px solid red;
 		color: #444;
 		width: 100px;
 	}

 	.bts:hover{
 		background-color: #aB0000;
 	}
 	#ac, #hm, #ib, #ex, #hp{
 		 border-radius: 50px; margin: auto; height: 40px; width: 40px; 
 	}
 	#ac{background-image:url("https://image.shutterstock.com/image-vector/user-login-authenticate-icon-vector-600w-1236250177.jpg");
 		background-size: 100% 100%;
 	}
 	#hm{background-image:url("https://cdn3.vectorstock.com/i/1000x1000/60/47/home-icon-white-silhouette-on-blue-round-vector-20326047.jpg");
 		background-size: 100% 100%;
 	}
 	#ib{background-image:url("https://www.pngkit.com/png/detail/208-2085666_message-png-image-with-transparent-background-people-icon.png");
 		background-size: 100% 100%;
 	}
 	#ex{background-image:url("https://www.kindpng.com/picc/m/77-774678_icon-sencha-test-archiver-unit-test-icon-hd.png");
 		background-size: 100% 100%;
 	}
 	#hp{background-image:url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTPk6BjGcCdtm4Ue-c64S4THoP5at1xeCKJh0UPcMj8qzhktG4j&usqp=CAU");
 		background-size: 100% 100%;
 	}
 	#list_TD{
 		color: darkred;
 	}
 	#info_ava_stud{
 		font-family: sans-serif;
 		color: #eee;

 	}
 	
 		
 </style>
</head>
<body>

<!-------------------------------------------------------------------------------------------------------------->
<div id="wrapper">

</div>
<!-------------------------------------------------------------------------------------------------------------->
<div id= "sidenav">
	<u>
		<div id="menu"><li>
			
			<!-- Trigger/Open The Modal -->
			<button id="myBtn" class="bts"><div  id="ac" > </div>Account</button>
			
		</li></div>
		<div id="menu"><li>
			<button id="dash-page"  class="bts"><div  id="hm" > </div>Home</button>
			 
		</li></div>
		<div id="menu"><li>
			<button  id="inbox-btn" class="bts"><div  id="ib" > </div>Inbox</button>
			
		</li></div>
		<div id="menu"><li>
			<button id="help-btn"  class="bts"><div  id="hp" ></div>Help</button>
			
		</li></div>
	</u>
</div>
<!-------------------------------------------------------------------------------------------------------------->
<div style=" height: 1000PX; width: 100%; overflow: hidden;">
  <div id="main-wrapper-d" style="height: 700px; margin: 0;  width: 400px; width: 900px;" >

  <div id="content"  >
		
		<div id="dash"> Dashboard</div>
		<div id="class-wrapper">
		
		<div id="class-i">
			<div id="c-img"></div>
			 <a href="student/takeexam.php">Take an Exam</a> 


		</div>

		<div id="class-i">
			<div id="c-img"></div>
			<a href="student/viewexam.php">View Exam Results</a> |

			</div>
		</div>


</div>
	
  </div>


	<!-------------------------------------------------------------------------------------------------------------->
	<div id="side-W" >
		<div id="side">
			<h2 id="td"> To Do </h2>
			<ul id="list_TD">
				<li> do this</li>
				<li> do that</li>
				<li> and more</li>	
			</ul>
		</div>

	</div>
</div>
</div>
<!-------------------------------------------------------------------------------------------------------------->






<!------------------------------------- The Modal account ----------------------------------->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="background-color: #F0FFFF; width: 400px;">
  	<span class="close">&times;</span>
  	<br><br>  	<a  href="./logout.php" style="float: right; border-bottom: 2px solid red; background-color: #eee; border-radius: 9px;font-size: 30px; text-decoration: none;">Log out</a><br><br>
  	<h2 style="text-shadow: 1px 2px #222; text-align: center;font-size: 30px;">Account</h2>

    
    <p style="text-align: center; font-size: 30px;  height: 400px; border-radius: 7px;"><?php

		echo 'First Name:    <span style="color: red;">'.$user_fname.'</span><br>';
		echo 'Last Name:     <span style="color: red;">'.$user_lname.'</span><br>';
		echo 'ID:          <span style="color: red;">'.$user_id.'</span><br>';

		?></p>
  </div>

</div>
  <!------------------------------------- The Modal courses -------------------------------->
<div id="inbox-m" class="inbox-m">

  <!-- Modal content -->
  <div class="inbox-cont" style="background-color: #F0FFFF; width: 400px; height: 1000px; overflow: hidden;">
  	<span class="clz">&times;</span>
  	<h2 style="text-shadow: 1px 2px #222; text-align: center;font-size: 30px;">Inbox</h2><h3> view messages</h3>

    
    <section style="text-align: center; font-size: 30px;  height: 400px; border-radius: 7px;"><?php

		echo '<div style="color: red;" >'.'messages'.'</div><br>';
		echo '<div style="color: red;" >'.'messages'.'</div><br>';	
		echo '<div style="color: red;" >'.'messages'.'</div><br>';
		?></section>
  </div>

</div>


  <!---------------------------------------- The Modal help ------------------------------->
<div id="help" class="help">

  <!-- Modal content -->
  <div class="help-cont" style="background-color: #F0FFFF; width: 400px; height: 1000px; overflow: hidden;">
  	<span class="hel">&times;</span>
  	<h2 style="text-shadow: 1px 2px #222; text-align: center;font-size: 30px;">Help</h2><h3> Here to answer your questions</h3>

    
    <p style="text-align: center; font-size: 30px;  height: 400px; border-radius: 7px;">
    	Question 1: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    	tempor incididunt ut labore et dolore magna aliqua. 
    	<br><br><br>
    	Question 2: Ut enim ad minim veniam,
    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    	cillum dolore eu fugiat nulla pariatur. 
    	<br><br><br>
    	Question 3: Excepteur sint occaecat cupidatat non
    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


		</p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");
var inmo = document.getElementById("inbox-m");
var hpmo = document.getElementById("help");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var i_btn = document.getElementById("inbox-btn");
var h_btn = document.getElementById("help-btn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var i_span = document.getElementsByClassName("clz")[0];
var h_span = document.getElementsByClassName("hel")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() { modal.style.display = "block";}
i_btn.onclick = function() {inmo.style.display = "block";}
h_btn.onclick = function() {hpmo.style.display = "block";}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {modal.style.display = "none";}
i_span.onclick = function() {inmo.style.display = "none";}
h_span.onclick = function() {hpmo.style.display = "none";}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal || event.target == inmo|| event.target == hpmo) {
    modal.style.display = "none";
    inmo.style.display = "none";
    hpmo.style.display = "none";
  }
}





</script>

</body>
</html>