
<head>
    <!-- Bootstrap CSS & Javascript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style >
	
	#cont{
		font-size: 3rem;
		overflow-y: scroll;
		width: 75rem;

	}
	#blockFriend{ /*  message block of person being addressed*/
		margin: .5rem;
		padding: 0;
		padding-left: 1rem;
		padding-right: 1rem;
		background-color: #eee;
		border-radius: 10px;
		color: #000;
		width: auto;
		float: left;

	}

	#blockSelf{ /*  message block of person sending message*/
		margin: .5rem;
		padding: 0;
		padding-left: 1rem;
		padding-right: 1rem;
		background-color: #00CED1;
		border-radius: 10px;
		width: auto;
		float: right;
	
	}

	p,small{
		margin: 0;
		padding: 0;
	}
	small{ /* Time stamp font-size*/
		font-size: 2rem;
	}

</style>
</head>
<body>
</body>
</html>
<?php

/*
echo "THIS IS PREV<br>";
echo "User 1: ".$from."<br>";
echo "User 2: ".$to."<br>";

*/

// Formats the layout of message blocks
$sql = "SELECT  `message`, `frm`, `to`, DATE_FORMAT(created, '%h:%i %p') as `time`
FROM `chat`
WHERE  `frm`= '$from'  AND `to` = '$to'
OR 	`frm`= '$to'  AND `to` = '$from';";


$result = mysqli_query($conn, $sql);


while ($row = $result->fetch_assoc()) {
	echo '<div class="container g-0 p-0 m-0" id="cont">';
		if($row['frm'] == $to){
			echo '<div class=" alert g-0 " id="blockFriend">';
			echo  '<p>'.$row['message'].'</p>';
			echo '<small>'.$row['time'].'</small>';
			echo '</div>';

		}elseif($row['frm'] == $from){
			echo '<div class=" alert g-0" id="blockSelf">';
			echo  '<p>'.$row['message'].'</p>';
			echo '<small>'.$row['time'].'</small>';
			echo '</div>';
		}
	echo '</div>';
}
 
 
 $conn->close();
 ?>


