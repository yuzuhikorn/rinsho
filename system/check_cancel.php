<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?php
	
	include_once("./functions.php");
	
	connect_to_mysql("select applicated_lesson_id from applicant where status=2 group by applicated_lesson_id");//キャンセル待ちがいる研修
	
	
	$res1=$res;
	while ($row1 = mysql_fetch_assoc($res1)) {
		connect_to_mysql("select applicated_lesson_id,count(status) from applicant where status=0 and applicated_lesson_id='".$row1['applicated_lesson_id']."'");//キャンセル待ちがいる研修の何人が入金待ちであるか
		$res2=$res;
		while ($row2 = mysql_fetch_assoc($res2)) {
			if($row2['count(status)']<3){//入金待ちの人数が定員以下だったら
				connect_to_mysql("select * from applicant inner join lesson on applicant.applicated_lesson_id=lesson.lesson_id where applicant.status=2 and applicated_lesson_id='".$row2['applicated_lesson_id']."'");//キャンセル待ちになっている希望者と希望中の研修の情報
				print "select * from applicant inner join lesson on applicant.applicated_lesson_id=lesson.lesson_id where applicant.status=2 and applicated_lesson_id='".$row2['applicated_lesson_id']."'";
				$res3=$res;
				if (strtotime(date('Y-m-d H:i:s')) <= strtotime('-3 week',strtotime($row3['start']))) {
					while ($row3 = mysql_fetch_assoc($res3)) {
						
						print "<p>研修".$row2['applicated_lesson_id']." 研修名「".$row3['lesson_name']."」"." 定員3人 ".$row2['count(status)']."人希望中 " ."開催日時".$row3['start'];
						mail_to_applicant($row3['mail']/*送信先メールアドレス*/,"キャンセルにより空きができました"/*メールタイトル*/,$row3['name']."様へ\n先に申し込みされていた方がキャンセルされた事により 研修『".$row3['lesson_name']."』 に参加が可能になりました。\n本メールは他のキャンセル待ちだった方にも送信しており、参加申し込みは早い順で決定いたしますので、ご希望でしたらお早めに申し込みをお願い致します。"/*メール本文*/);
					}
				}else{print "<br>研修開始3ヶ月前過ぎちゃった><";}
			}
		}
	}
	
	
	?>
</html>