<?php
	if ($_POST) {
		
		@$lesson_id = $_POST['lesson_id'];
		
		include_once("./functions.php");
		include_once("./fixed_number.php");
		
		connect_to_mysql ("select 研修名 from lesson where 研修ID='".$lesson_id."'");
		$row = mysql_fetch_assoc($res);
		$applicated_lesson_name=$row['研修名'];
		
		connect_to_mysql("select count(状態) from applicant where (状態=0 or 状態=3) and 希望研修ID='".$lesson_id."'");
		
		$row = mysql_fetch_assoc($res);
		session_start();
		$_SESSION['lesson_id']=$lesson_id;
		if($row["count(状態)"]<$upper_limit){
			header("Location: ./application_this_lesson.php");
		}else{
			header("Location: ./over.php");
		}
	}
	?>