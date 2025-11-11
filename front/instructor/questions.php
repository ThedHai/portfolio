<?php
session_start();
include '../helper.php';
$user_id=$_SESSION['user']->{"id"};
$user_fname=$_SESSION['user']->{"firstname"};
$user_lname=$_SESSION['user']->{"lastname"};


?>
<html>
<head>



	<title>Question Bank </title>


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
	#functionName, #topic, #difficulty, #constraint{
		font-size: 25px;
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
</style>
<!----------------  MODALS'style --------------------------->
<style>

/* Modal Content */
.modal-content, .q_content, .choose_content, .points_content, .t_case_content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  opacity: .9;
  box-shadow: inset 0 0 10px #000000;
  border-radius: 4px;
  height: 900px; 
  overflow-y: scroll;
}
input{
	font-size: 20px;
}



</style>
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




<div class="wrapper0">
	<!-------------------------- left ------------------------------>
	<div id="left">

		<div id="left_h"><h2 >Create New Question</h2></div>
		<div id="ex_d" >
		  <!-- Modal content -->
		  <div class="q_content">
		    <h2 style="text-align: center;">Create New Question</h2>
		    		
			<form id="create_q">
					<textarea type="text" id="question" placeholder="question" style=" height: 100px; font-size: 20px; width: 500px"></textarea>  <br>
					<input type="text" id="functionName" placeholder="function Name"> <br>


					<input type="text" id="topic" placeholder="topic"> <br>
					<label> Topic: </label>
					<select id="diff_sel">
						<option value="easy">Easy</option>
						<option value="medium">Medium</option>
						<option value="hard">Hard</option>
					</select>
					<label>Constraints:</label>
					<input type="checkbox" id="print_C" >Print
					<input type="checkbox" id="for_C" >For
	
			</form>
			<br><br>
			<form id="t_case">
					
				<!--<label>Input for test case:</label>
				<input type="test" id="input" placeholder="8"><br><br>
				<label>Output for test case:</label>				
				<input type="test" id="output" placeholder="9"><br><br>
				<label>Declarations for test case</label><br>
				<textarea id="declaration" placeholder="x=8" style="height: 200px;width: 500px; font-size: 20px;"></textarea> <br><br> -->
			
			</form>

			<button type="button" onclick="testCase()" id="sel_q">Add Testcase</button>
			<br><br><br>
			<button type="button" onclick="create_Q()">Submit Question</button>
		</div>
	</div>
</div>
	<!-------------------------- right ------------------------------>
	<div id="right">
		<div id="right_h">
			<h2 >Question Bank</h2>	

		
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
	var inp=[];
	var out=[];
	var n = "&";
	var declaration;
	var restult_test="";

</script>

<!-- MODAL DISPLAY SCRIPT -->
<script type="text/javascript">


//----------------------------create quest---------
function create_Q(){
	var question = document.getElementById("question").value
	var functionName =document.getElementById("functionName").value;
	var topic =document.getElementById("topic").value;
	var difficulty =document.getElementById("diff_sel").value;
	var testcases ="";

	var printConstraint=0;
	var forConstraint=0;

	if (document.getElementById("print_C").checked) {
		printConstraint= 1;
	}else if (document.getElementById("for_C").checked) {
		forConstraint= 1;
	}

	vars = "action=create_question"+n+"question="+question+n+
			"functionName="+functionName+n+
			"topic="+topic+n+
			"difficulty="+difficulty+n+
			"testcases=" +n+
			"classid=0"+n+
			"printConstraint="+printConstraint+n+	
			"forConstraint="+forConstraint
			;

	var form= document.getElementById("t_case");
	var chl= form.getElementsByTagName('input');

	var i =0, k=1;
	while ( i< chl.length && k< chl.length) {
		if (chl[i].value.length<1||chl[k].value.length<1) { alert("Test case input and output cannot be empty"); break;}else{

			inp.push(chl[i].value);
			out.push(chl[k].value);
		i=i+2;
		k=k+2;	
		}	
	}

	Ajax("",vars, 10);

}

function sendTC(q_id){
	var q_id;

	for (var i =0; i<inp.length; i++) {
		vars = "action=add_testcase"+n+"q_id="+q_id+n+"input="+inp[i]+n+"output="+out[i]+n+"declaration=";
		Ajax("",vars, 11);
	}	
}


function testCase(){
	var form = document.getElementById("t_case");
	var label_i = document.createElement("label");
	var label_o = document.createElement("label");
	var br= document.createElement("BR");
	var br1= document.createElement("BR");
	var br3= document.createElement("BR");
	var inp = document.createElement("INPUT");
	var out = document.createElement("INPUT");

	label_i.innerHTML="Input for test-case: ";
	label_o.innerHTML="Output for test-case: ";
	form.appendChild(label_i);
	form.appendChild(inp);
	form.appendChild(br);

	form.appendChild(label_o);
	form.appendChild(out);
	form.appendChild(br1);
	form.appendChild(br3);
      
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
   			case 7://get all questions filtered by topic and/or difficulty  to display in question bank
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

   			case 10://create a question
   				var r= JSON.parse(res);
   				sendTC(r['id']);
				res="";
   			break; 
   			case 11://add testcase for question from ->10
   				clearTable("q_table");
   				 //getQuestBank();
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


</script>

</body>
</html>


		