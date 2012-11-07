<?php
	include_once("./functions.php");
	connect_to_mysql("update applicant set 状態='".$status."' where 希望者ID='".$applicant_id."' and 希望研修ID='".$lesson_id."'");
	if(!$res){
		mysql_query( "rollback", $link);
		mysql_close($link);
	}else{
		if($status==1){
			connect_to_mysql("select 名前,メール from applicant where 希望者ID='".$applicant_id."'");
			$row = mysql_fetch_assoc($res);
			$body=$row['名前']."様へ\nキャンセル致しました。".$applicant_id;
			mail_to_applicant($row['メール'],"キャンセル完了",$body);
		}
		mysql_query( "commit", $link);
		mysql_close($link);
		$counter++;
	}
	?>