<?php
	include_once("./functions.php");
	connect_to_mysql("select 研修ID,研修名 from lesson where 開始日時<=current_date+INTERVAL 3 MONTH + INTERVAL 1 DAY and 開始日時>current_date+INTERVAL 3 MONTH");
	$res1=$res;
	while ($row1 = mysql_fetch_assoc($res1)) {
		connect_to_mysql("select * from applicant where 希望研修ID='".$row1['研修ID']."'");
		$res2=$res;
		while ($row2 = mysql_fetch_assoc($res2)) {
			print $body=$row2['名前']."様へ\n研修『".$row1['研修名']."』の申込み可能期限を過ぎてしまいました。\n申し訳ありません。";
			mail_to_applicant($row2['メール'],"期限切れ",$body);
		}
	}
	?>