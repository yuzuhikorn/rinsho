<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?php
	
	include_once("./functions.php");
	include_once("./fixed_number.php");
	
	connect_to_mysql("select 希望研修ID from applicant where 状態=2 group by 希望研修ID");//キャンセル待ちがいる研修
	
	
	$res1=$res;
	while ($row1 = mysql_fetch_assoc($res1)) {
		connect_to_mysql("select 希望研修ID,count(状態) from applicant where 状態=0 and 希望研修ID='".$row1['希望研修ID']."'");//キャンセル待ちがいる研修の何人が入金待ちであるか
		$res2=$res;
		while ($row2 = mysql_fetch_assoc($res2)) {
		print "研修".$row2['希望研修ID']."<br>";
		connect_to_mysql("select count(状態) from applicant where 状態=3 and 希望研修ID='".$row1['希望研修ID']."'");//対象の研修は何人「入金済み」か
				$res3=$res;
				while ($row3 = mysql_fetch_assoc($res3)) {
					print "今 ".$row2['count(状態)']."人が状態「0」";
					print " ";
					print "今 ".$row3['count(状態)']."人が状態「3」";
					print "上限:".$upper_limit;
					print " ";
					$how_many_room=$upper_limit-$row2['count(状態)']-$row3['count(状態)'];
					print $how_many_room."人の余裕がある<br>";
				}
			if($row2['count(状態)']+$row3['count(状態)']<$upper_limit){//入金待ちの人数が定員以下だったら
				

				connect_to_mysql("select * from applicant inner join lesson on applicant.希望研修ID=lesson.研修ID where applicant.状態=2 and 希望研修ID='".$row2['希望研修ID']."'");//キャンセル待ちになっている希望者と希望中の研修の情報
				$res4=$res;
				//				if (strtotime(date('Y-m-d H:i:s')) <= strtotime('-3 week',strtotime($row4['start']))) {
				while ($row4 = mysql_fetch_assoc($res4)) {
				$status=0;
				print $applicant_id=$row4['希望者ID'];
				print $lesson_id=$row4['希望研修ID'];
					include("./update_this_applicant_status.php");
					if($res){
										print $body=$row4['名前']."様へ\n先に申し込みされていた方がキャンセルされた事により 研修『".$row4['研修名']."』 に参加が可能になりました。\n本メールは他のキャンセル待ちだった方にも送信しており、参加申し込みは早い順で決定いたしますので、ご希望でしたらお早めに申し込みをお願い致します。";
					mail_to_applicant($row4['メール']/*送信先メールアドレス*/,"キャンセルにより空きができました"/*メールタイトル*/,$body.$row4['希望者ID']/*メール本文*/);
					}
					

					$how_many_room--;
					if($how_many_room<=0){break;}
				}
				//				}else{print "<br>研修開始3ヶ月前過ぎちゃった><";}
			}
		}
	}
	
	
	?>
</html>