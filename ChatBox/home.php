
<?php

    session_start();
    if(!isset($_SESSION['name'])){
        echo "name not set in test";
        header("Location: ./index.php");
        exit();
    }elseif (isset($_SESSION['name'])) {
       $name = $_SESSION['name'];
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS & Javascript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <title>QuickChat</title>

    <style> 
    .col-4{
        border: none;
    }
    #Chats{

        overflow-y: scroll;
        height: 10%;
        
    }
    i{  /* Nav bar Icons */
        font-size: 2em;
    }
     #screen{ /* inside of message */
        overflow-y: scroll; 
        height: 80%;
        background-image: url(./img/mess_backgrd.png);
    }
    #chat_box{
        overflow: hidden; 
        height:70%; 
        width: 100%;
        margin:0; 

        background-color: #506070;
    }
    #inbox>li{
   
    }

     #profile_pic{
        width:7rem; height:7rem;
    }
    .button-group-item{/* chat List*/
        background-color: white;
        border: none;
        border-bottom: solid gray;
        color: #000;
   
    
    }
    #fname{
        width: 20rem;
    }
    .t_stamp{
        font-size: 1rem;
    }

    </style>
</head>
<!-- Home Page, after login in -->
<body >

    <!-- Navigation Bar-->  
    <?php include './nav.php' ?> 


<!-- Chats and Message box Container -->
<section class=" p-3 " style="overflow: hidden;  margin:auto; ">
    <div class="container" style="overflow:hidden"> 
    
         <div class="row text-ligh g-0" >
             <!-- Chat List -->
            <div class="col-4" style="height: 90rem; overflow-y: scroll; border:none;" >
                <ul class="list-group  " id="inbox" >
                </ul>
            </div>

             <!--------------------- Message Box ---------------------->   
            <div class="col-8  " >

                <div class=" text-light conainer bg-light  rounded"  id="chat_box">
                    <h5 class="card-title bg-secondary p-3" style="margin:0; font-size: 3rem;"> 
                    <sapn id='talkingTo'> <?php echo"$name" ?>  (Myself) </span>  
                    
                    </h5>
                        
                    <!-- view previous messages Screen -->  
                    <div class=" container bg-light text-light"  id="screen">                     
                            
                    </div>    
                    <div class=""  style="overflow: hidden">

                        <!--- to make text box on left and send button on right--> 
                        <form  onsubmit="return sendMessage()"  style="display: flex; justify-content: space-between;">
                            <textarea  class="  text-muted m-1 p-1"  id="fname"  name="fname" placeholder="Type message here..." style="width: 90%; height: auto; border-radius: 3rem; font-size: 2rem;">  
                            </textarea>
                            <input type="submit" value="Send" id="send" style="background-color: blue;"> 
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    let inbox = document.getElementById("inbox");

function myFunction() {
  var txt = "";
  var i;
  for (i = 0; i < inbox.length; i++) {
    txt = txt + inbox[i].nodeName + "<br>";
  }
  document.getElementById("screen").innerHTML = txt;
}
   

    let  ex = "jane", id = 2, c=1 ;
    var pro = <?php echo json_encode( $_SESSION['users'] ) ?>;
    let usrname = "<?php echo $_SESSION['name']; ?>";
    let uid = "<?php echo $_SESSION['id']; ?>";
    

    let to =0; //id of who message  being sent 

    
    //--------driver---------------
    for (i = 0; i < pro.length; i++) {
        whoIs = pro[i][1];// who loogeg in
        id = pro[i][0];
        if(uid == id){continue;}

        c = i+1;

        li = CreateinboxListItem(whoIs, id, c);//adding create block of element into list
        select(li,li.id); // Selecting the current user

    }
    
    //make hovering over the mouse highlighted
    function select(obj,obj_id) {  
        obj.addEventListener( 
                "mouseover", function over() {
                    document.getElementById(
                        obj_id).style.backgroundColor = "#6c757d";
                    document.getElementById(
                        obj_id).style.color = '#eee';
                    
                  });
        obj.addEventListener(
             "mouseout", function out() {
                    document.getElementById(
                        obj_id).style.backgroundColor = "white";
                    document.getElementById(
                        obj_id).style.color = "black";
                  });
    }
                
    // function to dynamically creat list of contacts and their attributes
    function CreateinboxListItem(contact_name, id, c){ 
        if (uid == id ) { alert("This user: "+ contact_name+id+c); }
        // creating neccessary elements
        let li = document.createElement("BUTTON");
        let    row = document.createElement("DIV");
        let       leftCol = document.createElement("DIV");
        let          img = document.createElement("IMG");       
                     leftCol.appendChild(img);

        let        rightCol = document.createElement("DIV"); 
        let           contact = document.createElement("H3");          
        let           timeStamp = document.createElement("SMALL");
        let            p = document.createElement("P");
                    rightCol.appendChild(contact);
                    rightCol.appendChild(timeStamp);
                    rightCol.appendChild(p);
                row.appendChild(leftCol);
                row.appendChild(rightCol);
            li.appendChild(row);
            
            li.className = "button-group-item";  // --> atributes for elements insides li object
            li.id= "list" +String(id);
                row.className = "row g-0";
                    leftCol.className = "col-sm-6 col-md-4";
                        img.className = "rounded-circle";
                        img.src = "https://upload.wikimedia.org/wikipedia/commons/7/7e/Circle-icons-profile.svg"; 
                        img.alt = "Profile Picture";
                        img.id = "profile_pic";
                    rightCol.className  = "col-6 col-md-8";
                        contact.className =  "mb-1";
                        contact.innerHTML = contact_name; 
                        timeStamp.className = "float-end";
                        timeStamp.innerHTML = "3 min ago";
                        timeStamp.id = "t_stamp";
                        p.className = "mb-1";
                        p.id = "last_message";
                        p.innerHTML = "Last Message";
            li.onclick = function(){
                to = id;
                document.getElementById('talkingTo').innerHTML =contact_name;
                sendToConvo("chat.php?", "");

            };
        inbox.appendChild(li);
        return li; 
    }

    //------Ajax-------
    function sendToConvo(PageToSendTo, mess, ) {// and call refresh send to database
        //alert("--->: "+sTo);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                document.getElementById("screen").innerHTML = this.responseText;    
                //alert( "Response: "+this.responseText); 
            }
            
        };

        var name = "Name=";
        var and = "&";
        var from = "frm=";
        var tosend ="sendto=";
        var message = "message="

        var UrlToSend = PageToSendTo + name + usrname + and +from + uid + and + tosend+ to + and + message + mess;
        //alert("url: "+UrlToSend);

        xhttp.open("GET",UrlToSend, true);// open(method, url, async), " ? " marks the end of the file name, "&" used to seperate variable names... ----> xhttp.open("GET", "demo_get2.asp?fname=Henry&lname=Ford");
        xhttp.send();

    }

    function sendMessage() { //function to set message from message box 
       
        var fname = document.getElementById("fname").value;
        if (fname.length < 1) {
            alert("Please type something....");
            return false;
        }	  else{
            sendToConvo("insert.php?",fname);
            document.getElementById("fname").value = "";
        }
        return false
    }

function refresh() {
  setInterval(function(){ 
    sendToConvo("chat.php?",""); }, 2000);
}
refresh();




</script>
</body>

</html>
