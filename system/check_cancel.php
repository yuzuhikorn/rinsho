<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?php
	
	include_once("./functions.php");
	
	connect_to_mysql("select 希望研修ID from applicant where 状態=2 group by 希望研修ID");//キャンセル待ちがいる研修
	
	
	$res1=$res;
	while ($row1 = mysql_fetch_assoc($res1)) {
		connect_to_mysql("select 希望研修ID,count(状態) from applicant where 状態=0 and 希望研修ID='".$row1['希望研修ID']."'");//キャンセル待ちがいる研修の何人が入金待ちであるか
		$res2=$res;
		while ($row2 = mysql_fetch_assoc($res2)) {
			if($row2['count(状態)']<3){//入金待ちの人数が定員以下だったら
				connect_to_mysql("select * from applicant inner join lesson on applicant.希望研修ID=lesson.研修ID where applicant.状態=2 and 希望研修ID='".$row2['希望研修ID']."'");//キャンセル待ちになっている希望者と希望中の研修の情報
				$res3=$res;
				if (strtotime(date('Y-m-d H:i:s')) <= strtotime('-3 week',strtotime($row3['start']))) {
					while ($row3 = mysql_fetch_assoc($res3)) {
						
						mail_to_applicant($row3['メール']/*送信先メールアドレス*/,"キャンセルにより空きができました"/*メールタイトル*/,$row3['名前']."様へ\n先に申し込みされていた方がキャンセルされた事により 研修『".$row3['研修名']."』 に参加が可能になりました。\n本メールは他のキャンセル待ちだった方にも送信しており、参加申し込みは早い順で決定いたしますので、ご希望でしたらお早めに申し込みをお願い致します。"/*メール本文*/);
					}
				}else{print "<br>研修開始3ヶ月前過ぎちゃった><";}
			}
		}
	}
	
	
	?>
</html>