<?php
	if ($_POST) {
		@$name = $_POST['name'];
		@$laboratory = $_POST['laboratory'];
		@$mail = $_POST['mail'];
		@$licence = $_POST['licence'];
		@$years_of_experience = $_POST['years_of_experience'];
		@$go_party = $_POST['go_party'];
		@$applicated_lesson_id = $_POST['applicated_lesson_id'];
		
		if($go_party!="する"){
			$go_party="しない";
		}
		
		include_once("./functions.php");
		include_once("./fixed_number.php");
		
		connect_to_mysql ("select * from lesson where 研修ID='".$applicated_lesson_id."'");
		$row = mysql_fetch_assoc($res);
		$row1=$row;
		mysql_query( "commit", $link);
		mysql_close($link);
		
		connect_to_mysql("select count(状態) from applicant where (状態=0 or 状態=3) and 希望研修ID='".$applicated_lesson_id."'");
		
		$row = mysql_fetch_assoc($res);
		
		$when_carry_out =date("Y年m月d日 ", strtotime($row1['開始日時']));
		$when_carry_out.=date("h時i分〜", strtotime($row1['開始日時']));
		$when_carry_out.=date("h時i分", strtotime($row1['終了日時']));
		
		if($row["count(状態)"]<$upper_limit){
			connect_to_mysql('insert into applicant (名前,所属,メール,資格,経験年数,希望研修ID,懇親会に参加,状態) values ("'.$name.'","'.$laboratory.'","'.$mail.'","'.$licence.'","'.$years_of_experience.'","'.$applicated_lesson_id.'","'.$go_party.'",0)');
			
			if(!$res){
				mysql_query( "rollback", $link);
				mysql_close($link);
				header("Location: ./failed.php");
			}else{
				mysql_query( "commit", $link);
				mysql_close($link);
				
				$body=$name."様へ\n研修への申し込みありがとう御座います。\n\n研修名:".$row1['研修名']."\n実施日時:".$when_carry_out."\n講師:".$row1['講師']."\n講師所属:".$row1['講師所属']."\n会場:".$row1['会場']."\n料金:".$row1['料金']."円\n";
				if($row1['懇親会']=="あり"){
					$money=$row1['料金']+intval($row1['懇親会の料金']);
					$body.="懇親会:".$row1['懇親会']."\n懇親会の料金:".$row1['懇親会の料金']."\n\n入金依頼額:研修の料金+懇親会の料金=".$money."円";
				}else{
					$body.="入金依頼額:研修の料金=".$row1['料金']."円\n";
				}
				$body.="\n◯◯◯◯◯への入金をよろしくお願い致します。";
				mail_to_applicant($mail,"参加申し込み受理",$body);
				header("Location: ./compleate.php");
			}
		}else{
			connect_to_mysql('insert into applicant (名前,所属,メール,資格,経験年数,希望研修ID,懇親会に参加,状態) values ("'.$name.'","'.$laboratory.'","'.$mail.'","'.$licence.'","'.$years_of_experience.'","'.$applicated_lesson_id.'","'.$go_party.'",2)');
			
			if(!$res){
				mysql_query( "rollback", $link);
				mysql_close($link);
				header("Location: ./failed.php");
				print "dame";
			}else{
				mysql_query( "commit", $link);
				mysql_close($link);
				
				$body=$name."様へ\nキャンセル待ちとして登録させていただきました。\n\n研修名:".$row1['研修名']."\n実施日時:".$when_carry_out."\n講師:".$row1['講師']."\n講師所属:".$row1['講師所属']."\n会場:".$row1['会場']."\n\n現在参加予定の方がキャンセルされた場合、お知らせいたします。";
				mail_to_applicant($mail,"定員オーバー",$body);
				header("Location: ./compleate.php");
			}
		}
	}
	?>