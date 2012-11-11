<?php
	@$applicant_id = $_POST['applicant_id'];
	@$lesson_id = $_POST['lesson_id'];
	@$status = $_POST['status'];
	include("./update_this_applicant_status.php");
	if(!$res){
		header("Location: ./failed.html");
	}else{
	include("./check_cancel.php");
		header("Location: ./compleate.html");
	}
?>