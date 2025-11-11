<?php
session_start();
include '../helper.php';
$user_id=$_SESSION['user']->{"id"};
$user_fname=$_SESSION['user']->{"firstname"};
$user_lname=$_SESSION['user']->{"lastname"};
?>
<!DOCTYPE html>
<html>
<head>
	<title>Take Exam </title>


<style type="text/css">
	/* very first wrapper on page */
	.wrapper0{
		overflow-y:  scroll;
		display: flex;
		margin-bottom: 100px;

	}
	/* left and right side of split screen */
	#left{
		opacity: 0.8;
		border: 7px solid #fff;
		overflow: hidden;
		border-bottom: none;
  		flex: 0 0 90%;
  		margin: auto;

	}

	/* left and right side header */
	#left_h{
		background-color: #000;
		text-align: center;
		font-family: sans-serif;
		opacity: 0.95;
		margin: 0;
		color: #eee;
	}


</style>

<!--------------------------------------Exam display------------------------------------------------>


<style type="text/css">
	/* very first wrapper on page */

	#ex_name{
		font-size: 40px;
		text-align: right;
		font-family: sans-serif;
	}



li{
	list-style: none;
}
.ex_q {
	margin: 0;
	padding: 36px 0 36px 84px;
	background-image: url('https://cdns.iconmonstr.com/wp-content/assets/preview/2012/240/iconmonstr-arrow-24.png');
	background-repeat: no-repeat;
	background-position: left center;
	background-size: 40px;
	font-size: 1.1em;
}

.examans{
	height: 200px; width: 90%;
	font-size: 1.2em;
	margin-left: 7%;
}
.num{
	margin: 0;
	font-size: 40px;
	text-align: left;
	background-color: #000;
	color: #F0FFFF;
	opacity: .80;
}
.quest{
	padding: 10px;
	height: 150px;
	overflow-y: scroll;
	background-color:#ddd;
}
.points{
	margin: 0;
	background-color: none /*#2F4F4F*/;
	margin-left: 40px;
	width: 90%;
	font-size: 25px;
	font-style: bold;
}

</style>
</head>
	<a href="../student.php" style="text-decoration: none;">Back to Student Page</a>
  	<a  href="../logout.php" style="float: right; border-bottom: 2px solid red; background-color: #eee; border-radius: 9px;font-size: 30px; text-decoration: none;">Log out</a><br><br>
    
    <p ><?php

		echo 'First Name:    <span style="color: red;">'.$user_fname.'</span><br>';
		echo 'Last Name:     <span style="color: red;">'.$user_lname.'</span><br>';
		echo 'ID:          <span style="color: red;">'.$user_id.'</span><br>';

		?></p>
  </div>


<div class="wrapper0">
	<!-------------------------- left ------------------------------>
	<div id="left">

		<div id="left_h"><h2 >Take  an Exam</h2>
			<div id="v_ex_buts">
				<div id="demo"></div>
			<select id="mySelect" onchange="selGet()">
				<option>Select</option>
			</select>
			</div>
		</div>
		<div id="ex_d" >
			<div >
				<h2 id="ex_name" style="text-align: center"></h2>

				<ol id="ex_q_l">
				</ol>

			</div>
		</div>
		<div id="sub" style="display: none;">
			<button onclick="submitExam()" style="font-size: 30px;">Submit</button>
		</div>
	</div>

</div>












<!--============================================= SCRIPTS =======================================-->
<!-- GLOBAL VARIABLES -->
<script >
	var vars;
	var input;
	var output;
	var n = "&";
	var Exam_id;
	var points=[];
	var declaration;
	var restult_test="";
	var question_points=[];

</script>

<!-- MODAL DISPLAY SCRIPT -->
<script type="text/javascript">




//-----------------------Get All Exams---------------------------
get_all_exams();
function get_all_exams(){
	  action="get_all_exams";
  vars="action="+action;
  Ajax("../include/middle_link.inc.php", vars,5);
}
//Get exam by exam ID
function getTest(newTID){	
	document.getElementById("demo").innerHTML ="Exam ID: "+newTID;//wrinting exam ID to page(under update)
	action ="get_exam";
	vars= "action=" + action + n + "examid=" + newTID;
	var page = "../include/middle_link.inc.php";
	Ajax(page, vars, 1);
}
// ----------------------------print exam, question # in mySelect/select_q option
function selectPrint( select, text, value){
  var x = document.getElementById(select);
		var option = document.createElement("OPTION");
	  	option.text = text;
	  	option.value = value;
  		x.add(option); 
}

//----------------------- Get the chosen exam from select option ---------------
function selGet(){
	Exam_id = document.getElementById("mySelect").value;
  	getTest(Exam_id);
}
//Get exam by exam ID
function getTest(newTID){	
	document.getElementById("demo").innerHTML ="Exam ID: "+newTID;//wrinting exam ID to page(under update)
	action ="get_exam";
	vars= "action=" + action + n + "examid=" + newTID;
	var page = "../include/middle_link.inc.php";
	Ajax(page, vars, 1);
}
//Get the quesions for q_points 



//                         __________________                                            
//_________________________| GENERAL SCRIPT |_____________________________________//
//-------------------------|_|____drive___|_|------------------------------------//
function Ajax(page, vars, from){
 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange =  function() {
    if (this.readyState == 4 && this.status == 200) {
    	var res = (this.responseText);

   		switch(from){


   			case 1://get exam, call getQuest() ->2
   				var r= JSON.parse(res);
   				displayExam(r);
   				res="";
   			break; 
   			case 2: //get exam and display name, get Exam questions ->
   				restult_test=res;
   				var r= JSON.parse(res);


 				 
 				question_points=[];
   				for (var i =0; i<r.length ; i++) {
   					var q_id =r[i]['id'];
   
					vars="action=get_points_for_exam"+n+"examid="+Exam_id+n+"q_id="+q_id;
					Ajax("", vars, 9);
   				}
   				
   				res="";
   			break;
   			case 4: //get exam and display name, get Exam questions ->
   				var r= JSON.parse(res);
   				res="";
   			break;
   			case 5://get all exams  to display in my_select->1, 

	   				var r= JSON.parse(res);
	   			for (var i = r.length - 1; i >= 0; i--) {
		   			var exam_name = r[i]['exam_name'];
			  		var exam_id =r[i]['id'];
			  		selectPrint("mySelect",exam_name, exam_id);   				
	   			}
	   			res="";
   			break;
   			case 9://get all points for exam
   				var r= JSON.parse(res);

				question_points.push(r['point']);
				printTest(JSON.parse(restult_test));

				res="";
   			break;
   			case 10://get all points for exam
   				//var r= JSON.parse(res);
				res="";
   			break;



   		} 
    } 
  };
  xhttp.open("POST", "../include/middle_link.inc.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(vars);
}
//------------------------------------------------------------------------------------------|
//--------------------------|        END OF             |------------------------------------|
//--------------------------|        DRIVE              |------------------------------------|
//------------------------------------------------------------------------------------------|

//diplay exam data (without questions included)
function displayExam(exm){

	var exam_name = exm['exam_name'];
	var question = exm['questions'];

	var ex_id = exm['id'];
	examid=ex_id;
    document.getElementById("ex_name").innerHTML = exam_name;   
   if (question.length!=0) {
   		document.getElementById("sub").style.display="block";
   	    getQuest(ex_id);

   }if (question.length==0) {
	var parent_list=document.getElementById("ex_q_l");
	parent_list.innerHTML="";
   }
}

//Get the quesions of an exam by exam ID and array of exam questions
function getQuest( exam){
	action ="get_all_exam_questions";
	vars= "action=" + action + n + "examid=" + exam;
	Ajax("../include/middle_link.inc.php", vars, 2);
}
//----------------------------------------------------------------------------------
//                            |                     |                             
//============================|        EXAM         |=============================
//                            |                     |                             
//--------------------------------------------------------------------------------//
//<!-- ===================SCRIPT FOR DISPLAYING EXAM ==========================-->


//gather the questions to be displayed by myFuction AND print question options
function printTest(quest){
	var ques_id ;
	var question;
	var points;
	var answer_placeholder="#answer Goes here";
	var parent_list=document.getElementById("ex_q_l");
	parent_list.innerHTML="";
	for (var i = 0; i<quest.length;  i++) {
		ques_id = quest[i]['id'];
		question= quest[i]['question'];
		points=question_points[i];
		answer_placeholder="#answer Goes here";

		myFunction(i+1, ques_id,question, points, answer_placeholder);
	}
}

// Create the list that show the exam
function myFunction(q_num, q_id,question, points, answer_placeholder) {
	var parent_list=document.getElementById("ex_q_l");
  var node = document.createElement("LI");
  node.setAttribute("class","ex_q");
 
  var num = document.createElement("P");
  var ques = document.createElement("DIV");

  num.setAttribute("id","num"+q_num);
  num.setAttribute("class","num"); 

  ques.setAttribute("id","ques"+q_id);
  ques.setAttribute("class","quest");

  node.appendChild(num);
  node.appendChild(ques);

  num.innerHTML = q_num; 
  ques.innerHTML = question; 

  parent_list.appendChild(node);
  
  var node1 = document.createElement("LI");  
  var ass_points = document.createElement("P");
  var text = document.createElement("TEXTAREA");

  ass_points.innerHTML ="( "+points +" Points)" ; 

  text.innerHTML = answer_placeholder;

  ass_points.setAttribute("id","points"+points);
  ass_points.setAttribute("class","points");
  
  text.setAttribute("id",q_id);
  text.setAttribute("class","examans");

  node1.appendChild(ass_points);
  node1.appendChild(text);

  parent_list.appendChild(node1);

}

//submiting exam to be graded
function submitExam(){
	var stu_id = '<?php echo $user_id; ?>';
	var list_of_areas = document.querySelectorAll('.examans');
	
	for (var i = 0; i < list_of_areas.length; i++) {
		var vars = "action=new_exam_result&stu_id="+stu_id+"&exam_id="+Exam_id+"&q_id="+list_of_areas[i].id+"&stu_ans="+btoa(list_of_areas[i].value);
			Ajax("", vars, 10);
		}
		var parent_list=document.getElementById("ex_q_l");
		parent_list.innerHTML="";
		var ex_name=document.getElementById("ex_name");
		ex_name.innerHTML="";
	var ret= '<php? header("Location: ./stud.php"); ?>';
		document.getElementById("sub").style.display="none";
}

</script>
</body>
</html>