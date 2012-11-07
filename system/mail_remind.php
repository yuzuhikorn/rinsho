<?php
	$before=1;
	
	
	include_once("./functions.php");
	connect_to_mysql('select applicant.名前,メール,希望研修ID,開始日時,終了日時 from applicant INNER JOIN lesson ON applicant.applicated_lesson_name=lesson.研修名 where applicant.希望研修ID= ANY(select 研修ID from lesson where 開始日時<now()-INTERVAL "'.$before.'" DAY - INTERVAL "1" SECOND AND 開始日時<now()-INTERVAL "'.$before.'" DAY - INTERVAL "1" SECOND + INTERVAL "1" DAY )');
	
	if ($res) echo "ok";
	
	$num_rows = mysql_num_rows($res);
	
	if(@$num = mysql_num_fields($res)){
		for($num_rows; $num_rows>0; $num_rows--){
			while(@$data = mysql_fetch_row($res)){
				//ヘッダー用変数
				$subject = "remind";
				$mailto = $data[1];
				$mailfrom = "tyehai2@gmail.com";
				$mailfromname = "tyehai2";
				$subject = mb_encode_mimeheader(mb_convert_encoding($subject, "JIS", "auto"), "JIS");
				$boundary = "----".uniqid(rand(),1);
				//sendmailへアクセス
				$mp = popen("/usr/sbin/sendmail -f $mailfrom $mailto", "w");
				//Header
				fputs($mp, "MIME-Version: 1.0\n");
				fputs($mp, "Content-Type: Multipart/alternative; boundary=\'$boundary\'\n");
				fputs($mp, "From: " .mb_encode_mimeheader($mailfromname) ."<" .$mailfrom .">\n");
				fputs($mp, "To: $mailto\n");
				fputs($mp, "Subject: $subject\n");
				//本文
				fputs($mp, "\n");
				fputs($mp, $data[0]."様\nお申し込みいただいた研修会「".$data[2]."」の開催日が".$before."日後に迫っています。\n会場でお会いできる事をを楽しみにしております。\n");
				fputs($mp, "\n");
				//sendmailへのプロセスを開放
				pclose($mp);
			}
		}
	}
	?>
