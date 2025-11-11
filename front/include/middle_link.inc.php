<?php
$act=$_POST['action'];


//$url = "https://web.njit.edu/~js2423/beta.php";

//$url = "https://web.njit.edu/~js2423/490/middle.php";

//echo "string";
//$act="get_all_questions_percentage_points";

switch ($act) {
	case "get_exam":
	    $examid = $_POST['examid'];

		$jsonobj->exam_id = $examid;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

	  	$ch = curl_init($url);    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info );                 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); //indicate POST method
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); // telling server to save result in variable instead of print'n
	    # Send request.
	    $result = curl_exec($ch); // send and save result here
	    #don't forget to close the connection
	    curl_close($ch);
	    #echo result for whoever Ajaxing or curling to page
	    echo $result;
	    break;
	case "create_exam":
		//$jj->id = 5;
	    //echo json_encode($jj);
	    
		$exam_name=$_POST['exam_name'];
		$exam_released=$_POST['exam_released'];
		$questions= $_POST['questions'];
		$classid=$_POST['classid'];

		$jsonobj->exam_name = $exam_name;
		$jsonobj->exam_released = $exam_released;
		$jsonobj->questions = $questions;
		$jsonobj->classid = $classid;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

		
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info );  
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_all_exams":

	
		$info = "action=$act";

	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "update_exam_questions":
	
		$examid = $_POST['examid'];
		$questions= $_POST['questions'];

		$jsonobj->examid = $examid;
		$jsonobj->exam_released = 0;
		$jsonobj->questions = $questions;
		$jsonobj->classid = 0;
		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "add_result_exam":
		$exam_id= $_POST['exam_id'];
		$student_id= $_POST['student_id'];
		$answers= $_POST['answers'] ;

		$jsonobj->exam_id = $examid;
		$jsonobj->student_id = "";
		$jsonobj->answers = $answers;
		//$jsonobj->classid = $classid;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_all_exam_questions":
	
		$examid = $_POST['examid'];

		$jsonobj->examid = $examid;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_question":
		$q_id = $_POST['q_id'];
		
		$jsonobj->q_id = $q_id;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_new_exam_result_all":
		$examid = $_POST['exam_id'];
		$student_id=$_POST['student_id'];
		
		//$examid=55;
		//$student_id=2;
		$jsonobj->exam_id = $examid;
		$jsonobj->stu_id = $student_id;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		//echo "Sending... ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "create_question":

		$question = $_POST['question'];

		$functionName=$_POST['functionName'];
		$topic = $_POST['topic'];
		$diffculity = $_POST['difficulty'];
		$classid=$_POST['classid'];
		$testcases=$_POST['testcases'];
		$printConstraint=$_POST['printConstraint'];
		$forConstraint=$_POST['forConstraint'];


		$jsonobj->question = $question;
		$jsonobj->functionName = $functionName;
		$jsonobj->topic = $topic;
		$jsonobj->diffculity = $diffculity;
		$jsonobj->classid = $classid;
		$jsonobj->testcases = $testcases;
		$jsonobj->printConstraint = $printConstraint;
		$jsonobj->forConstraint = $forConstraint;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

		//echo "Sending... ".$info."<br>";
		
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_all_questions":
		$question= $_POST['question'];
		
		$info = "action=$act";
		#echo "ere ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "add_points_to_exam":
		$examid = $_POST['examid'];
		$q_id=$_POST['q_id'];
		$points=$_POST['points'];

		//$examid = 55;
		//$q_id= 50;
		//$points= 20;

		$jsonobj->examid = $examid;
		$jsonobj->q_id = $q_id;
		$jsonobj->points = $points;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		
		
		//echo "Sending... ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_points_for_exam":
		$examid = $_POST['examid'];
		$q_id = $_POST['q_id'];

		$jsonobj->examid = $examid;
		$jsonobj->q_id = $q_id;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		
		//echo "Sending... ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_all_questions_by_topic_and_difficulty":
		$topic= $_POST['topic'];
		$difficulty= $_POST['difficulty'];

		$jsonobj->topic = $topic;
		$jsonobj->difficulty = $difficulty;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		
		#echo "ere ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_all_questions_by_topic":
		$topic= $_POST['topic'];
		$jsonobj->topic = $topic;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		
		#echo "ere ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_all_questions_by_difficulty":
		$difficulty= $_POST['difficulty'];

		$jsonobj->difficulty = $difficulty;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

		#echo "ere ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_all_questions_by_keyword":
		$keyword= $_POST['keyword'];

		$jsonobj->keyword = $keyword;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		
		#echo "Sending... ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "add_testcase": 
		$q_id = $_POST['q_id'];//{"q_id":"","input":null,"output":"8","declaration":"x=2\ny=4"}
		$input=$_POST['input'];
		$output=$_POST['output'];
		$declaration=$_POST['declaration'];


		$jsonobj->q_id = $q_id;
		$jsonobj->input = $input;
		$jsonobj->output = $output;
		$jsonobj->declaration = $declaration;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		
		//echo "Sending... ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "add_testcase": 
	case "new_exam_result": 
		$exam_id=$_POST['exam_id'];
		$stu_id=$_POST['stu_id'];
		$q_id=$_POST['q_id'];
		$stu_ans=$_POST['stu_ans'];


		$jsonobj->exam_id = $exam_id;
		$jsonobj->stu_id = $stu_id;
		$jsonobj->q_id = $q_id;
		$jsonobj->stu_ans = $stu_ans;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		
		//echo "Sending... ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "get_exam_results_by_id"://might be obsolete.....use get_new_exam_result_all
		$exam_id= $_POST['exam_id'];


		$jsonobj->exam_id = $exam_id;

		//$jsonobj->classid = $classid;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		//echo "Sending... ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "update_grade_and_comment":
		$exam_id = $_POST['exam_id'];
		$q_id = $_POST['q_id'];
		$stu_id = $_POST['stu_id'];
		$grade = $_POST['points'];
		$comment = $_POST['comment'];

		$jsonobj->exam_id = $exam_id;
		$jsonobj->q_id = $q_id;
		$jsonobj->stu_id = $stu_id;
		$jsonobj->grade = $grade;
		$jsonobj->comment = $comment;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";

	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
	case "update_grade_and_comment_and_autogradernotes":
		$exam_id = $_POST['exam_id'];
		$q_id = $_POST['q_id'];
		$stu_id = $_POST['stu_id'];
		$autograder_comment = $_POST['autograder_comment'];
		$comment = $_POST['comment'];
		$grade = $_POST['grade'];

		$jsonobj->exam_id = $exam_id;
		$jsonobj->q_id = $q_id;
		$jsonobj->stu_id = $stu_id;
		$jsonobj->autograder_comment = urlencode($autograder_comment);
		$jsonobj->comment = $comment;
		$jsonobj->grade = $grade;

		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		echo "Sending... ".$info."<br>------------";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;//update_grade_and_comm
	case "get_all_questions_percentage_points":
		$exam_id = $_POST['exam_id'];
		$stu_id = $_POST['stu_id'];

		$jsonobj->exam_id = $exam_id;
		$jsonobj->stu_id = $stu_id;


		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		//echo "Sending... ".$info."<br>------------";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;//update_grade_and_comm
	case "release_stu_results": 
		$exam_id=$_POST['exam_id'];



		$jsonobj->exam_id = $exam_id;


		$en_inf=json_encode($jsonobj);
		$info = "action=$act&data=$en_inf";
		
		//echo "Sending... ".$info."<br>";
	  	$ch = curl_init($url);                    
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $info ); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	    $result = curl_exec($ch); 
	    curl_close($ch);
	    echo $result;
	    break;
}