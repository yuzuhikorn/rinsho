<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?php
	
	include_once("./functions.php");
	
	connect_to_mysql("select applicated_event_id from test_applicant where status=2 group by applicated_event_id");//キャンセル待ちがいる研修か
	
	
	$res1=$res;
	while ($row1 = mysql_fetch_assoc($res1)) {
		connect_to_mysql("select applicated_event_id,count(status) from test_applicant where status=0 and applicated_event_id='".$row1['applicated_event_id']."'");//キャンセル待ちがいる研修の何人が入金待ちであるか
		$res2=$res;
		while ($row2 = mysql_fetch_assoc($res2)) {
			if($row2['count(status)']<3){//入金待ちの人数が定員以下だったら
				connect_to_mysql("select * from test_applicant inner join test_event on test_applicant.applicated_event_id=test_event.event_id where status=2 and applicated_event_id='".$row2['applicated_event_id']."'");//キャンセル待ちになっている希望者と希望中の研修の情報
				$res3=$res;
				while ($row3 = mysql_fetch_assoc($res3)) {
					
					print "<p>研修".$row2['applicated_event_id']." ".$row3['event_name']." 定員3人 ".$row2['count(status)']."人希望中";
					mail_to_applicant("キャンセルにより空きができました"/*メールタイトル*/,$row3['mail']/*送信先メールアドレス*/,"tyehai2@gmail.com"/*送信元メールアドレス*/,"tyehai2"/*送信主表示名*/,$row3['name']."様へ\n先に申し込みされていた方がキャンセルされた事により 研修『".$row3['event_name']."』 に参加が可能になりました。\n本メールは他のキャンセル待ちだった方にも送信しており、参加申し込みは早い順で決定いたしますので、ご希望でしたらお早めに申し込みをお願い致します。"/*メール本文*/);
				}
			}
		}
	}
	
	
	?>
</html>