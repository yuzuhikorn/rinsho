<?php
	@$applicant_id = $_POST['applicant_id']."<br>";
	@$lesson_id = $_POST['lesson_id']."<br>";
	@$status = $_POST['status']."<br>";
	include("./update_this_applicant_status.php");
	if(!$res){
		header("Location: ./failed.html");
	}else{
		header("Location: ./compleate.html");
	}
?>