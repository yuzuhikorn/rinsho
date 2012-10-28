<?php
/**
 * MySQLに接続し、SQLを実行する。
 * $sqlを引数とする。
 * $sqlにはSQL文が代入される。
 * 実行可能なSQL文は1つだけで、MySQLへの接続はこの関数の実行毎に切断されるので、多くのSQLを実行したい状況ではレスポンスが悪くなる恐れがある。
 */
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

/**
 * メールを送信する。
 * $subject、$mailto、$mailfrom、$mailfromname、$bodyを引数とする。
 * $subjectにはメールタイトル、$mailtoには送信先メールアドレス、$mailfromには送信元メールアドレス、$mailfromnameには送信主表示名、$bodyにはメール本文が代入される。
 * 本コメント執筆時(2012/10/24)は、この関数を実行するphpファイルに直接上記のメールタイトル〜メール本文が記述してある。この形式だとメールタイトル〜メール本文の変更が難しく、改善の余地がある。 
 */
	function mail_to_applicant($subject/*メールタイトル*/,$mailto/*送信先メールアドレス*/,$mailfrom/*送信元メールアドレス*/,$mailfromname/*送信主表示名*/,$body/*メール本文*/){
		$subject = mb_encode_mimeheader(mb_convert_encoding($subject, "JIS", "auto"), "JIS");
		$boundary = "----".uniqid(rand(),1);
		 * sendmailへアクセス
		$mp = popen("/usr/sbin/sendmail -f $mailfrom $mailto", "w");
		 * Header
		fputs($mp, "MIME-Version: 1.0\n");
		fputs($mp, "Content-Type: Multipart/alternative; boundary=\"$boundary\"\n");
		fputs($mp, "From: " .mb_encode_mimeheader($mailfromname) ."<" .$mailfrom .">\n");
		fputs($mp, "To: $mailto\n");
		fputs($mp, "Subject: $subject\n");
		 * 本文
		fputs($mp, "--$boundary\n");
		fputs($mp, "\n");
		fputs($mp, $body);
		fputs($mp, "\n");
		fputs($mp, "--$boundary" . "--\n");
		 * sendmailへのプロセスを開放
		pclose($mp);
	}
	?>