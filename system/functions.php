<?php
	function connect_to_mysql($sql/*実行するSQL*/){    /*mysql_close($link);を忘れるな!*/
		global $link;
		global $res;
		
		include ('./server_config.php');
		
		$link = mysql_connect($sql_server, $sql_user, $sql_pw);
		if (!$link) die('failed' . mysql_error());
		
		mysql_query("SET NAMES utf8",$link);
		
		mysql_select_db($sql_db, $link);
		
		$res = mysql_query($sql, $link);
		if(!$res) print mysql_errno($link) . ": " . mysql_error($link);
		$link = mysql_close($link);
	}
	
	function mail_to_applicant($subject/*メールタイトル*/,$mailto/*送信先メールアドレス*/,$mailfrom/*送信元メールアドレス*/,$mailfromname/*送信主表示名*/,$body/*メール本文*/){
		$subject = mb_encode_mimeheader(mb_convert_encoding($subject, "JIS", "auto"), "JIS");
		$boundary = "----".uniqid(rand(),1);
		//sendmailへアクセス
		$mp = popen("/usr/sbin/sendmail -f $mailfrom $mailto", "w");
		//Header
		fputs($mp, "MIME-Version: 1.0\n");
		fputs($mp, "Content-Type: Multipart/alternative; boundary=\"$boundary\"\n");
		fputs($mp, "From: " .mb_encode_mimeheader($mailfromname) ."<" .$mailfrom .">\n");
		fputs($mp, "To: $mailto\n");
		fputs($mp, "Subject: $subject\n");
		//本文
		fputs($mp, "--$boundary\n");
		fputs($mp, "\n");
		fputs($mp, $body);
		fputs($mp, "\n");
		fputs($mp, "--$boundary" . "--\n");
		//sendmailへのプロセスを開放
		pclose($mp);
	}
	?>