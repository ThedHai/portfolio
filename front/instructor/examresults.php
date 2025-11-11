<?php
include "../helper.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exam Result</title>
	<style type="text/css">
		 /*li:nth-child(even) {background-color:  #778899; color: #fff;}*/
		 li{
		 	margin-bottom: 100px;
		 	border-bottom: 3px solid #444;
		 }
		 /*
		th, td{
		 	border: 1px solid black;
		}*/
		 caption{
		 	margin:20px 0px 40px;
		 }
		 input{
		 	font-size: 15px;
		 }
		 button{
		 	font-size: 15px;
		 }
		 textarea{
		 	height: 100px;
		 	width: 400px;
		 	font-size: 20px;
		 }
#list{
	width: 80%;
}


th:nth-child(1) { width: 10em; }
th:nth-child(2) { width: 5em; }
th:nth-child(3) { width: 10em; }
th:nth-child(4) { width: 7em; }

tr:nth-child(1) { height: 5em; }
tr:nth-child(2) { height: 10em; }
.caption1{
	caption-side: bottom;
}

#release{
	margin: 10% 45% 10% 45%;
	background-image: linear-gradient( to bottom right,#006400, green);
	border: none;
	color: #eee;
	border-radius: 5px;
	width: 200px;
	display: none;

}
#release:hover,.btn:hover{
	color: #e3f;
}

.btn{
	margin: 1% 5% 1% 5%;
	background-image: linear-gradient( to bottom right,#4F8F8F, #1F2F2F);
	border: none;
	color: #eee;
	border-radius: 5px;
	width: 200px;

}
</style>


</head>
<body>
<center style="width: 80%; margin: auto;">
	<a href="../instructor.php">Back to Instructor Page</a>
	 | <a href="../logout.php">Logout</a>

	<h1 class="theme">View Student Exam Result</h1>

	<label > Choose Exam By  Exam Name and Student ID: </label>

	<select name="examid" id="examid" onchange="getRes()">
	<option value="select">Select</option>
	<?php
					
	$data = json_encode([]);
	$list_of_all_exams = json_decode(send_to_middle('get_all_exams',''));
						//var_dump($list_of_all_exams);
						
	foreach ($list_of_all_exams as $id => $exam) {
		$exam_id=$exam->{'id'};
		echo '<option value="'.$exam->{'id'}.'">'.$exam->{'exam_name'}.'</option>';
		}
						
	?>
	</select>

	<select name="topic" id="stu_id" onchange="getRes()">
		<option value="2">Student 1 (ID:2)</option>
		<option value="4">Student 2(ID:4)</option>
		<option value="5">Student 3(ID:5)</option>
	</select>	



<h2  id="score" style="margin: 100px;"></h2>
<div id="list_div">
	<ol id="res_list">
		
	</ol>
</div>
</center>
<div>
	<button id="release" onclick="releaseExam()"> Release To Student</button>
</div>

<!-----------------------------SCRIPT ----------------->

<script type="text/javascript">

/*  GLOABAL VARIABLES */
var Exam_id ;
var student_id ;

var vars="";
var n="&";





textTab();
function textTab(){
var textareas = document.getElementsByTagName('textarea');
var count = textareas.length;
for(var i=0;i<count;i++){
    textareas[i].onkeydown = function(e){
        if(e.keyCode==9 || e.which==9){
            e.preventDefault();
            var s = this.selectionStart;
            this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
            this.selectionEnd = s+1; 
        }
    }
}
 
}



function getRes(){
	Exam_id =  document.getElementById("examid").value;
	student_id =  document.getElementById("stu_id").value;
	if (Exam_id !="select") {
	vars ="action=get_new_exam_result_all"+n+"exam_id="+Exam_id+n+"student_id="+student_id;
	document.getElementById("release").style.display="block";
	Ajax("", vars, 0)
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

   			case 0://get exam result by exam id and student name
   				var r= JSON.parse(res);
   				for (var i =0; i<r.length ; i++) {
   					createLT(r[i]);
   				}
   				vars ="action=get_all_questions_percentage_points"+n+"exam_id="+Exam_id+n+"stu_id="+student_id;
				Ajax("", vars, 2) ;
   				res="";
   			break; 
   			case 1://update_grade_and_comment_and_autogradernotes
   				res="";
   			break; 
   			case 2://update_grade_and_comment_and_autogradernotes
   				var r= JSON.parse(res);
   				document.getElementById("score").innerHTML="Total Score: "+r['percent']+"%";
   				
   				res="";
   			break; 
   			case 3://update_grade_and_comment_and_autogradernotes
   				//var r= JSON.parse(res);
				alert(res);   				
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







function createLT(qres) {
var q_id=qres["q_id"];

  var list= document.getElementById("res_list");
  var node= document.createElement("LI");
  var table = document.createElement("TABLE");
  var ans= document.createElement("TEXTAREA");
  var tda = document.createElement("TD");
  ans.innerHTML=qres["stu_ans"];
  ans.setAttribute("disabled","true");
  table.id="table"+q_id;
  tda.appendChild(ans);
  var row = table.insertRow(0);
  
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  cell1.innerHTML = "Question  ".bold();
  cell2.innerHTML = qres["question"];
  cell3.innerHTML = "Autograder Points".bold();
  cell4.innerHTML = "Earned Points".bold();


  var row1 = table.insertRow(1);

  var cel1 = row1.insertCell(0);
  row1.appendChild(tda);
  var cel3 = row1.insertCell(2);
  var cel4 = row1.insertCell(3);
  cel1.innerHTML = " Answer ".bold();
  cel3.innerHTML = "";
  cel4.innerHTML = "";

 
ques_ids=[];
var auto_g_note = JSON.parse(qres['autograder_comments']);



for (var i =0; i<auto_g_note.length; i++) {
	  var td = document.createElement("TD");

	  var inp= document.createElement("INPUT");

	  inp.value=auto_g_note[i]['e_point'];

	  inp.setAttribute("type","number");
	  ques_ids.push(inp.id);
	  td.appendChild(inp);
	  var cas="Case  "+(1+i);
	  var row2= table.insertRow(i+2);
	  var c_cel1 = row2.insertCell(0);
	  var c_cel2 = row2.insertCell(1);
	  var c_cel3 = row2.insertCell(2);
	  //var c_cel4 = row2.insertCell(3);
	  row2.appendChild(td);
	  //var c_cel4 = row2.insertCell(3);
	  c_cel1.innerHTML = cas.bold();
	  c_cel2.innerHTML = auto_g_note[i]['note'];
	  c_cel3.innerHTML = auto_g_note[i]['point'];
	  //c_cel4.innerHTML = auto_g_note[i]['point'];
}


var caption= document.createElement("caption");
caption.innerHTML="Add Comment here";
caption.setAttribute("class","caption1");

var captionT= document.createElement("caption");
caption.innerHTML="Total: "+qres['grade']+"/"+qres['q_points']+"points";
caption.setAttribute("class","caption1");

var brk= document.createElement("BR");
var brk1= document.createElement("BR");
var text= document.createElement("TEXTAREA");

text.innerHTML=qres['comment'];

if (qres['comment']=="") {
	text.innerHTML="";
}




text.setAttribute("id",q_id+"text");
var btn= document.createElement("BUTTON");
btn.setAttribute("class","btn");
btn.onclick=function(){
	subOveride(q_id,table.id,auto_g_note);
}

btn.innerHTML="Overide points";



caption.appendChild(brk1);
caption.appendChild(btn);
caption.appendChild(brk);
caption.appendChild(text);


node.appendChild(table);
table.appendChild(caption);
list.appendChild(node);
	
}

function subOveride(q_id,tab_id, auto_g_note){
	var table= document.getElementById(tab_id);
	var inputs= table.getElementsByTagName("INPUT");
	var comment= document.getElementById(q_id+"text").value;
	var total=0.0;

	//Loop through the CheckBoxes.
    for (var i = 0; i < inputs.length; i++) {

    	auto_g_note[i]['e_point']=inputs[i].value;
    	total=(total+parseFloat(inputs[i].value));
	}

	var fin=btoa( JSON.stringify(auto_g_note));
	vars= "action=update_grade_and_comment_and_autogradernotes"+n+"q_id="+q_id +n+"stu_id="+student_id+n+"comment="+comment+n+"autograder_comment="+fin+n+"grade="+total +n+"exam_id="+Exam_id;
	Ajax("", vars, 1);
}

function releaseExam(){

	vars ="action=release_stu_results"+n+"exam_id="+Exam_id;
	Ajax("", vars, 3);
}


</script>

</body>
</html>