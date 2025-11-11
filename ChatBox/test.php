<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "name not set in test";
  //header("Location: ./index.php");
  //exit();
}elseif (isset($_SESSION['name'])) {
  echo '<h1 style="text-align: center; color: #90a0b0;">';
  echo "Hi ".$_SESSION['name'];
  echo "</h1>";
}


?>


<!DOCTYPE html>
<html>

<head>
	<title>
		Chat Box
	</title>
</head>
<style>
body{
	background-color: #aaaaff;
}
	#message{
		margin: 0;
	
		width: 460px;
		overflow: hidden;
		padding: 10px;
		
		
	
	}
	/* contains message */
	#chat{
		background-image: url(https://fsb.zobj.net/crop.php?r=VAXViSwPghUP4lwfu25daJrCHLHOKuNHGJjwDV8pM4Kkjxfj-_dMTay8LW_8c2196mt0Vx078hjBGd5qsCqFc0n44rU1rQfg1OjYFdLYfmzeCHXHqB-5kgFriQSVFs2Yw-LC3vj5-f6YqSOP);
		border: 0px solid #444;
		
		width: 480px;
		height: 800px;
		padding: 20px;
		overflow: hidden;
		overflow-y: scroll;

		display: block;
		float: left;
	}

	#fname{
		width: 470px;
		height: auto;
		overflow-y: scroll;
		font-size: 40px;
		margin-left: 20px;
		border-radius: 5px;
		background-color: #eee;
	}
	#ct{
		width: auto;
		height: auto;
		display: block;
		float: left;
		overflow: hidden;
		overflow-y: scroll;
		background-color: red;
		
	}
	/* actual box for all*/
	#chat_b{
		background-color: #fff;
		display: block;
		float: left;
		display: none;
		margin: 20px;
		border-radius: 10px;
		border: 3px solid #444;
		padding:10px, 5px, 30px, 5px;
		
   		box-shadow:  0 0 10px #000000;

	}
	button{
		font-size: 30px;
		border-radius: 5px;
	}
	button:hover{
		color: green;
	}
	#send{
		background-color: #eee;
		border-radius: 10px;
		font-size: 40px;
		float: right;

	}
	#taking2{
		
		color: #e3f;
		font-size: 30px;
		text-align: center;
	}
</style>
<!----------------------------------------------------------->

<body>
<form action="log_out.php"  method="POST">
<button style="float: right;"> Log out</button>
</form>

<button onclick="ion()">chat box</button><br><br>
<div id="chat_b">
	<h3 id="taking2" ></h3>
<div id="chat">
	<div id="message">
	</div>
</div>
<form  onsubmit="return myFunction()">
   <textarea  id="fname"  name="fname" placeholder="Type message here..."></textarea>
  <br><input type="submit" value="Send" id="send"> 
</form>
</div>

<div id="ct">
 <button onclick="zunction()" id="conta">Your Contacts</button>
 </div>




<script>
var x = document.getElementById("chat_b");
let usrname = "<?php echo $_SESSION['name']; ?>";
let uid = "<?php echo $_SESSION['id']; ?>";
		
let to =0;

function ion() {
  
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


function zunction() {
 let  ex = "jane", id = 2, c=1 ;
var pro = <?php echo json_encode( $_SESSION['users'] ) ?>;
alert("pro: "+pro);
for (i = 0; i < pro.length; i++) {
	ex = pro[i][1];
	id = pro[i][0];
	c = i+1;
  	var btn = document.createElement("BUTTON");
  	btn.innerHTML = "CLICK ME";
  	br=document.getElementById("conta")
  	br.appendChild(document.createElement("br"));
  	funct(ex,id,c);
	document.getElementById("conta").disabled = true;
	}
}

function  funct(cnt,id,c){
		
  	 if (uid == id ) { alert("yes: "+ cnt+id+c); return;}

  var button = document.createElement('button');
  button.innerHTML = cnt;

  button.onclick = function(){
  	 x.style.display = "block";
  	 to = id;
  	 document.getElementById('taking2').innerHTML =cnt;

  	 someOtherFunction("chat.php?", "");
    return false;
  };
   document.getElementById('conta').appendChild(button);
   
};


	
function someOtherFunction(PageToSendTo, mess) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("message").innerHTML =
      this.responseText;   
	  //alert("refreshing 2");  
    }
	
  };


 var name = "Name=";
 var and = "&";
 var from = "frm=";
 var tosend ="sendto=";
var message = "message="

 var UrlToSend = PageToSendTo + name + usrname + and +from + uid + and + tosend+ to + and + message + mess;

  xhttp.open("GET",UrlToSend, true);// open(method, url, async), " ? " marks the end of the file name, "&" used to seperate variable names... ----> xhttp.open("GET", "demo_get2.asp?fname=Henry&lname=Ford");
  xhttp.send();
}




function myFunction() {
 
  	var fname = document.getElementById("fname").value;
  	if (fname.length < 1) {
    	alert("Please type something....");
    	return false;
  	}	  else{
  	
  	someOtherFunction("insert.php?",fname);
  	document.getElementById("fname").value = "";

  	
  	
  	

	}
return false
}

function refresh() {
	
  setInterval(function(){ 
  	someOtherFunction("chat.php?",""); }, 2000);
}
refresh();

</script>
<!----------------------------------------------------------->



</body>
</html>