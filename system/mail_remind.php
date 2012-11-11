<?php
	$before=3;
	
	
	include_once("./functions.php");
	connect_to_mysql('select * from applicant INNER JOIN lesson ON applicant.希望研修ID=lesson.研修ID where applicant.希望研修ID= ANY(select 研修ID from lesson where current_date<=開始日時-INTERVAL '.$before.' DAY and current_date>=開始日時-INTERVAL '.$before.' DAY -INTERVAL 1 DAY) and applicant.状態=3');
	
	if(@$num = mysql_num_fields($res)){
			while(@$row = mysql_fetch_assoc($res)){
				$when_carry_out =date("Y年m月d日 ", strtotime($row['開始日時']));
		$when_carry_out.=date("h時i分〜", strtotime($row['開始日時']));
		$when_carry_out.=date("h時i分", strtotime($row['終了日時']));
				
				$body=$row['名前']."様へ\nお申し込み頂いた研修の開催が".$before."日後に迫っています。\n\n研修名:".$row['研修名']."\n実施日時:".$when_carry_out."\n講師:".$row['講師']."\n講師所属:".$row['講師所属']."\n会場:".$row['会場']."\n料金:".$row['料金']."円\n";
				if($row['懇親会']=="あり"){
					$body.= "懇親会:あり";
					}
				$body.="当日会場でお会いできる事を楽しみにしております。";
				print $body."<br>";
				mail_to_applicant($row['メール'],"リマインド",$body);
				}
		}
	?>
