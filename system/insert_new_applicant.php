<?php
	if ($_POST) {
		
		@$name = $_POST['name'];
		@$laboratory = $_POST['laboratory'];
		@$mail = $_POST['mail'];
		@$licence = $_POST['licence'];
		@$years_of_experience = $_POST['years_of_experience'];
		@$applicated_event_id = $_POST['applicated_event_id'];
		
		
		include_once("./functions.php");
		
		connect_to_mysql ("select event_name from test_event where event_id='".$applicated_event_id."'");
		$row = mysql_fetch_assoc($res);
		$applicated_event_name=$row['event_name'];
		
		connect_to_mysql("select count(status) from test_applicant where status=0 and applicated_event_id='".$applicated_event_id."'");
		
		$row = mysql_fetch_assoc($res);
		
		
		if($row["count(status)"]<3){
			$body=$name."様へ\n講座『".$applicated_event_name."』への申し込みありがとう御座います。\n◯◯◯◯◯への入金をよろしくお願い致します。";
			$body.="select event_name from test_event where event_id=".$applicated_event_name;
			mail_to_applicant("参加申し込み受理",$mail,"tyehai2@gmail.com","tyehai2",$body);
			
			connect_to_mysql('insert into test_applicant (name,laboratory,mail,licence,years_of_experience,applicated_event_id) values ("'.$name.'","'.$laboratory.'","'.$mail.'","'.$licence.'","'.$years_of_experience.'","'.$applicated_event_id.'")');
			
		}else{
			$body=$name."様へ\nキャンセル待ちとして登録させていただきました。\n現在参加予定の方がキャンセルされた場合、お知らせいたします。".$row['mail'];
			mail_to_applicant("定員オーバー",$mail,"tyehai2@gmail.com","tyehai2",$body);
			
			connect_to_mysql('insert into test_applicant (name,laboratory,mail,licence,years_of_experience,applicated_event_id,status) values ("'.$name.'","'.$laboratory.'","'.$mail.'","'.$licence.'","'.$years_of_experience.'","'.$applicated_event_id.'",2)');
			
		}
		
		
		
		header("Location: ./compleate.html");
	}
	?>