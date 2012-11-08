<?php
	if ($_POST) {
		
		@$name = $_POST['name'];
		@$laboratory = $_POST['laboratory'];
		@$mail = $_POST['mail'];
		@$licence = $_POST['licence'];
		@$years_of_experience = $_POST['years_of_experience'];
		@$applicated_lesson_id = $_POST['applicated_lesson_id'];
		
		
		include_once("./functions.php");
		
		connect_to_mysql ("select 研修名 from lesson where 研修ID='".$applicated_lesson_id."'");
		$row = mysql_fetch_assoc($res);
		$applicated_lesson_name=$row['研修名'];
		mysql_query( "commit", $link);
		mysql_close($link);
		
		connect_to_mysql("select count(状態) from applicant where 状態=0 and 希望研修ID='".$applicated_lesson_id."'");
		
		$row = mysql_fetch_assoc($res);
		
		
		if($row["count(状態)"]<3){
			connect_to_mysql('insert into applicant (名前,所属,メール,資格,経験年数,希望研修ID) values ("'.$name.'","'.$laboratory.'","'.$mail.'","'.$licence.'","'.$years_of_experience.'","'.$applicated_lesson_id.'")');
			
			if(!$res){
				mysql_query( "rollback", $link);
				mysql_close($link);
				header("Location: ./failed.php");
			}else{
				mysql_query( "commit", $link);
				mysql_close($link);
				
				$body=$name."様へ\n研修『".$applicated_lesson_name."』への申し込みありがとう御座います。\n◯◯◯◯◯への入金をよろしくお願い致します。";
				mail_to_applicant($mail,"参加申し込み受理",$body);
				header("Location: ./compleate.php");
			}
			
		}else{
			connect_to_mysql('insert into applicant (名前,所属,メール,資格,経験年数,希望研修ID,状態) values ("'.$name.'","'.$laboratory.'","'.$mail.'","'.$licence.'","'.$years_of_experience.'","'.$applicated_lesson_id.'",2)');
			
			if(!$res){
				mysql_query( "rollback", $link);
				mysql_close($link);
				header("Location: ./failed.php");
			}else{
				mysql_query( "commit", $link);
				mysql_close($link);
				
				$body=$name."様へ\nキャンセル待ちとして登録させていただきました。\n現在参加予定の方がキャンセルされた場合、お知らせいたします。";
				mail_to_applicant($mail,"定員オーバー",$body);
				header("Location: ./compleate.php");
			}
		}
	}
	?>