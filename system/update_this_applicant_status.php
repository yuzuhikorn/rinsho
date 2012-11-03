<?php
	include_once("./functions.php");
	connect_to_mysql("update applicant set status='".$status."' where applicant_id='".$applicant_id."' and applicated_lesson_id='".$lesson_id."'");
		
		print "update applicant set status='".$status."' where applicant_id='".$applicant_id."' and applicated_lesson_id='".$lesson_id."'";
		
	if(!$res){
		mysql_query( "rollback", $link);
		mysql_close($link);
	}else{
		mysql_query( "commit", $link);
		mysql_close($link);
		$counter++;
	}
	?>