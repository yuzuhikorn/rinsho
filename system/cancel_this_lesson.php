<?php
	if ($_POST) {
		
		@$applicant_id = $_POST['applicant_id'];
		@$event_id = $_POST['event_id'];
		
		include_once("./functions.php");
		connect_to_mysql("update test_applicant set status=1 where applicant_id='".$applicant_id."' and applicated_event_id='".$event_id."'");
		
		
		if(!$res){
			mysql_query( "rollback", $link);
			mysql_close($link);
			header("Location: ./failed.html");
		}else{
			mysql_query( "commit", $link);
			mysql_close($link);
			header("Location: ./compleate.html");
		}
	}
	?>