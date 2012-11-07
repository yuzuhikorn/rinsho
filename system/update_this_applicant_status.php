<?php
	include_once("./functions.php");
	connect_to_mysql("update applicant set status='".$status."' where applicant_id='".$applicant_id."' and applicated_lesson_id='".$lesson_id."'");
	
	
	if(!$res){
		mysql_query( "rollback", $link);
		mysql_close($link);
	}else{
		if($status==1){
			connect_to_mysql("select mail from applicant where applicant_id='".$applicant_id."'");
			$row = mysql_fetch_assoc($res);
			$body=$name."様へ\nキャンセル致しました。";
			mail_to_applicant($row['mail'],"キャンセル完了",$body);
		}
		mysql_query( "commit", $link);
		mysql_close($link);
		$counter++;
	}
	?>