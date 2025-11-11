<?php
session_start();
include '../helper.php';
$user_id=$_SESSION['user']->{"id"};
$user_fname=$_SESSION['user']->{"firstname"};
$user_lname=$_SESSION['user']->{"lastname"};


?>
<html>
<head>



	<title>Create Exams </title>


<!---------------------------- Question Bank display ---------------->
<style>
  <style type="text/css">
  #q_table{
      border-collapse: collapse;
  }
  tr:nth-child(even) {background-color:  #aaa;}
  </style>
<body>
</head>
<body>
<center>
	<h1>Instructor Page</h1>
	<p>
		Welcome, <?=$user_fname?> <?=$user_lname?>!
	</p>
			 <a href="../instructor.php">Back to Instructor Page</a>
			 | <a href="../logout.php">Logout</a>





<!DOCTYPE html>
<html>
<head>
	<title>Create Exam </title>
</head>

<style type="text/css">
	/* very first wrapper on page */
	.wrapper0{
		overflow-y:  scroll;
		display: flex;

	}
	/* left and right side of split screen */
	#left, #right{
		opacity: 0.8;
		border: 7px solid #fff;
		overflow: hidden;
		border: 1px solid #777;	
		border-bottom: none;
	}
	#left {
  		flex: 0 0 50%;
	}

	#right{
  		flex: 1;
	}

	/* left and right side header */
	#left_h, #right_h{
		background-color: #000;
		text-align: center;
		font-family: sans-serif;
		opacity: 0.95;
		margin: 0;
		color: #eee;

	}
	/* button on questions and exam side  */
	#q_v,#q_c, #new_exam_btn,
	#c_ex,#pnts_btn,
	#c_b_ex, #c_q_b, #add_point_b, #sel_ex, #sel_q,#update_exam, #t_c{
		border: none;
		background-color: #000;
		margin: 0 10px 0 10px;
		opacity: .9;
		color: #eee;
		font-size: 14px;
		font-family: sans-serif;
	}
	/* button on questions and exam side hover */
	#q_v:hover,#q_c:hover, #new_exam_btn:hover,
	#c_ex:hover,#pnts_btn:hover,
	#c_b_ex:hover, #c_q_b:hover, #add_point_b:hover, #sel_ex:hover, #sel_q:hover,#update_exam:hover, #t_c:hover{
 	font: italic small-caps bold 14px/14px sans-serif;
 	color: #e3a;
	}
	/* div that holds button question and exam side */
	#q_buts,#v_ex_buts{
		margin: 5px;
		text-align: center;
	}

	#ex_d{
		padding: 10px;
	}
	#q_d{
		background-color: none;
		padding: 10px;
	}
	input{
		font-size: 20px;
		margin: 5px;
		border: none;
		border-bottom: 2px solid #ddd;
	}

	#mySelect{
		font-size: 40px;
	}
	#search_ques, #key_w{
		border: none;
		background-image: linear-gradient( to bottom right, #778899, white);

	}
	#search_ques:hover, #key_w:hover{
		background-image: linear-gradient( to bottom right, #ea3 , white);
	}

/*------------------------------ EXAM DISPLAY ---------------------------------------------*/

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

.num{
	font-size: 40px;
	text-align: left;
	background-color: #000000;
	color: #F0FFFF;
	opacity: .80;
	margin:0;
}

.quest{
	background-color: #ddd;
	padding: 10px;
	height: 150px;
	overflow-y: scroll;
	margin:0;
}

.point{
	margin:0;
	width: 40px;
	font-size: 25px;
	font-style: bold;
}


/*---------------------------- Question Bank display ----------------> */

  <style type="text/css">
  #q_table{
      border-collapse: collapse;
  }
  tr:nth-child(even) {background-color:  #aaa;}
  </style>
<body>




<div class="wrapper0">
	<!-------------------------- left ------------------------------>
	<div id="left">

		<div id="left_h"><h2 >View Exam</h2>
			<div id="v_ex_buts">
				<div id="demo"></div>
			<select id="mySelect" onchange="selGet()">
				<option>Select</option>
			</select>

			<br><input type="text" id="ex_name_inp" placeholder="Exam name">
			
			<button onclick="createExam()" id="c_b_ex"> Create New Exam</button>
			<br>	
			<button id="pnts_btn"  onclick="disQues()" >Assign Exam Points</button>


			</div>
		</div>
		<div id="ex_d" >
			<div >
				<h2 id="ex_name" style="text-align: center"></h2>

				<ol id="ex_q_l">
				</ol>

			</div>
		</div>
	</div>

	<!-------------------------- right ------------------------------>
	<div id="right">
		<div id="right_h">
			<h2 >Question Bank</h2>	
			<div id="q_buts">
				<button id="update_exam" onclick=" updateExam()">Update Exam Questions</button> 
			</div>
			<div >
				<select id="easiness">
					<option value = "any">Any</option>
					<option value = "easy">Easy</option>
			        <option value = "medium">Medium</option>
			        <option value = "hard"> Hard </option>
				</select>

				<select id="topicSelect">
					<option value = "any">Any</option>
					<option value = "lists">Lists</option>
			        <option value = "loops">Loops</option>
			        <option value = "ifs"> If Statements</option>
			        <option value = "strings">Strings</option>
			        <option value = "recursion">Recursion</option>
				</select>

				<button id="search_ques" onclick="easyTopic()">Select</button>

			</div>
			<br>
			<div> <input type="text" id="key_w_inpt" style="font-size: 15px; border-radius: 4px;" placeholder="Keyword">
				<button id="key_w" onclick="seachkw()"> GO</button>
			</div>
		</div>
		<div id="q_d">

			<table id="q_table">
			<thead>
			  <tr>
			    <th>Choose</th>
			    <th> Quesion</th>
			    <th>Diff</th>
			    <th>Topic</th>
			    <th>Constraint</th>
			  </tr>			
			</thead>	
			<tbody  id="table_bod">
				
			</tbody>

			</table>

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


//----------------------create exam----------
function createExam(){
	var cr_exam_n = document.getElementById("ex_name_inp").value;
	


	if(cr_exam_n == null || cr_exam_n.length <1 ){
		alert("Error: Exam name or Class Id can't be blank!");
		return false;
	}
 	action= "create_exam";
	var exam_name = cr_exam_n;
	var exam_released =0;
	var questions ="";

	vars = "action="+ action + n + "exam_name=" + exam_name + n +"exam_released=" + exam_released + n + "questions="+ questions + n +"classid=0";
	 Ajax("../include/middle_link.inc.php", vars, 3, "");
}


//-----------------------Get All Exams---------------------------
get_all_exams();
function get_all_exams(){
	  action="get_all_exams";
  vars="action="+action;
  Ajax("../include/middle_link.inc.php", vars,5);
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
//---------------Assign points
function disQues(){

	var y  = document.getElementById("ex_q_l");
	var children= y.getElementsByTagName("LI");
		var new_points;
		var q_id;
	for (var i = 0; i < children.length; i++) {
      new_points= children[i].getElementsByTagName('input')[0].value;
      q_id= children[i].getElementsByTagName('input')[0].id;
    

  	vars = "action=add_points_to_exam"+n+"examid="+Exam_id+n+"q_id="+q_id+n+"points="+new_points;
	Ajax("", vars, 6);	
	}
}
//get select option for topic and difficulty
function easyTopic(){
	var easiness = document.getElementById("easiness").value;
  	var topic= document.getElementById("topicSelect").value;
  	if (easiness !="any" && topic!="any") {
  		vars = "action=get_all_questions_by_topic_and_difficulty"+n+"difficulty="+easiness+n+"topic="+topic;
  		Ajax("", vars,8);
  	}else if (easiness !="any" && topic=="any") {
  		vars = "action=get_all_questions_by_difficulty"+n+"difficulty="+easiness;
  		Ajax("", vars,8);
  	}else if (easiness =="any" && topic!="any") {
  		vars = "action=get_all_questions_by_topic"+n+"topic="+topic;
  		Ajax("", vars,8);
  	}else{
  		vars = "action=get_all_questions";
  		Ajax("", vars,8);
  	}

}
//get keyword from keyword input to query question by keyword
function seachkw(){
	keyword=document.getElementById("key_w_inpt").value;
	if (keyword.length>0) {
  		vars = "action=get_all_questions_by_keyword"+n+"keyword="+keyword;
  		Ajax("", vars,7);		
	}
}

//                         __________________                                            
//_________________________| GENERAL SCRIPT |_____________________________________//
//-------------------------|_|____drive___|_|------------------------------------//
function Ajax(page, vars, from){
 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange =  function() {
    if (this.readyState == 4 && this.status == 200) {
    	var res = (this.responseText);

   		switch(from){

   			case 0://get Quest for question bank 
   				var r= JSON.parse(res);
   				gatherQuest(r);
   				res="";
   			break; 
   			case 1://get exam, call getQuest() ->2
   				var r= JSON.parse(res);
   				displayExam(r);
   				res="";
   			break; 
   			case 2: //get exam and display name, get Exam questions ->
   				restult_test=res;
   				var r= JSON.parse(res);  				
 				 var q_id ;
 				 
 				question_points=[];
   				for (var i =0; i<r.length ; i++) {
   					var q_id =r[i]['id'];
   
					vars="action=get_points_for_exam"+n+"examid="+Exam_id+n+"q_id="+q_id;
					Ajax("", vars, 9);
   				}
   				
   				res="";
   			break;
   			case 3://Creates an exam and get the new exam id to call getTest() 
   				var r= JSON.parse(res);
   				Exam_id=r['id'];
   				getTest(Exam_id);
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
   			case 6://assign points to exam 
	   			getTest(Exam_id);
	   			res="";
   			break;
   			case 7://get all questions filtered by Keyword to display in question bank
   				var r= JSON.parse(res);
				clearTable("q_table");
				gatherQuest(r);
				res="";
   			break;  
   			case 8://get all questions filtered by topic and/or difficulty  to display in question bank
   				var r= JSON.parse(res);
				clearTable("q_table");
				gatherQuest(r);
				res="";
   			break; 
   			case 9://get all points for exam
   				var r= JSON.parse(res);

				question_points.push(r['point']);
				printTest(JSON.parse(restult_test));

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
	var answer="#answer Goes here";
	var parent_list=document.getElementById("ex_q_l");
	parent_list.innerHTML="";
	for (var i = 0; i<quest.length;  i++) {
		ques_id = quest[i]['id'];
		question= quest[i]['question'];
		points=question_points[i];

		myFunction(i+1, ques_id,question, points, answer);
	}
}

// Create the list that show the exam
function myFunction(q_num, q_id,question, points, answer) {
	var parent_list=document.getElementById("ex_q_l");
  var node = document.createElement("LI");
  node.setAttribute("class","ex_q");
 
  var num = document.createElement("P");
  var ques = document.createElement("DIV");
  var ass_points = document.createElement("INPUT");
  var pointstr = document.createElement("SPAN");

  num.setAttribute("id","num"+q_num);
  num.setAttribute("class","num");

  ass_points.value =points; 
  pointstr.innerHTML=" Points";

  ass_points.setAttribute("id",q_id);
  ass_points.setAttribute("class","point");

  ques.setAttribute("id","ques"+q_id);
  ques.setAttribute("class","quest");

  node.appendChild(num);
  node.appendChild(ass_points);
  node.appendChild(pointstr);
  node.appendChild(ques);

  num.innerHTML = q_num; 
  ques.innerHTML = question; 

  parent_list.appendChild(node);
  
  var node1 = document.createElement("LI");  
  







 



  
}

//---------------------------------------------------------------------------------------------|\
//<!--==================================| Question Bank |================================ -------->
//---------------------------------------------------------------------------------------------|/

 getQuestBank();
function getQuestBank(){
	vars="action=get_all_questions";
	Ajax("",vars, 0);
}
//Clear the question bank before adding new questions
function clearTable(table) {
  var tb= document.getElementById(table);
  tbl=tb.rows.length;
  while(tbl >1){
  	tbl=tbl-1;
    tb.deleteRow(1);
  }
}
//gather questions for question bank
function gatherQuest(res){
	
	var q_id;
	var question;
	var diff ;
	var topic ;
	var constraint ;
	for (var i = res.length - 1; i >= 0; i--) {
		var constraint="";
		q_id= res[i]['id'];
		question = res[i]['question'];
		diff = res[i]['difficulty'];
		topic = res[i]['topic'];
		if (res[i]['forConstraint'] =='1') {
			constraint ="For Loop";
		}
		else if (res[i]['printConstraint'] =='1') {
			constraint ="Print";
		}else{
			constraint ="None";
		}
		QuestDis("q_table",q_id, question, diff, topic, constraint);		
		
	}
}

//display question bank in table format
function QuestDis(table,q_id, question, diff, topic, constraint) {
  var table = document.getElementById(table);
  var row = table.insertRow(1);
  var td = document.createElement("TD");
  var input= document.createElement("INPUT");

  input.type = "checkbox";
  input.id = q_id;
  td.appendChild(input);
  row.appendChild(td);
  
  var cell1 = row.insertCell(1);
  var cell2 = row.insertCell(2);
  var cell3 = row.insertCell(3);
  var cell4 = row.insertCell(4);
 
  cell1.innerHTML = question;
  cell2.innerHTML = diff;
  cell3.innerHTML = topic;
  cell4.innerHTML = constraint;
}

//----------------------------------------    UPDATE EXAM    --------------------------------------------------
// called by update button takes the questions from the question bamk that will be added to exam an call Ajax
function updateExam(){
	var questions="";

        //Reference the Table.
        var grid = document.getElementById("q_table");
 
        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("INPUT");
 
        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {

            	if(questions.length<1 ){
    				questions = questions +checkBoxes[i].id;
				}else if(questions.length==0 ){
					questions = questions+"," +checkBoxes[i].id;
					alert("Exam Cleared");
				}
				else{
					questions = questions+"," +checkBoxes[i].id;
				}
            }
        }
 	vars= "action=update_exam_questions"+ n + "examid=" + Exam_id +n+ "questions=" +questions;
	
	Ajax("", vars, 4);
	getTest(Exam_id);

}

</script>

</body>
</html>




</script>

</body>
</html>


		