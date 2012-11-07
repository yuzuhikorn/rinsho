<?php
	if ($_POST) {
		
		@$lesson_id = $_POST['lesson_id'];
		
		include_once("./functions.php");
		
		connect_to_mysql ("select 研修名 from lesson where 研修ID='".$lesson_id."'");
		$row = mysql_fetch_assoc($res);
		$applicated_lesson_name=$row['lesson_name'];
		
		connect_to_mysql("select count(状態) from applicant where 状態=0 and 希望研修ID='".$lesson_id."'");
		
		$row = mysql_fetch_assoc($res);
		session_start();
		$_SESSION['lesson_id']=$lesson_id;
		if($row["count(状態)"]<3){
				header("Location: ./application.php");
			}else{
				header("Location: ./over.php");
			}
		}
	?>