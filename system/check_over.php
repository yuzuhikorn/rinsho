<?php
	if ($_POST) {
		
		@$lesson_id = $_POST['lesson_id'];
		
		include_once("./functions.php");
		
		connect_to_mysql ("select lesson_name from lesson where lesson_id='".$lesson_id."'");
		$row = mysql_fetch_assoc($res);
		$applicated_lesson_name=$row['lesson_name'];
		
		connect_to_mysql("select count(status) from applicant where status=0 and applicated_lesson_id='".$lesson_id."'");
		
		$row = mysql_fetch_assoc($res);
		session_start();
		$_SESSION['lesson_id']=$lesson_id;
		if($row["count(status)"]<3){
				header("Location: ./application.php");
			}else{
				header("Location: ./over.html");
			}
		}
	?>