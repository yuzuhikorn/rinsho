<?php
	/**
	 *MySQLに接続し、SQLを実行する。
	 *$sqlを引数とする。
	 *$sqlにはSQL文が代入される。
	 *実行可能なSQL文は1つだけで、MySQLへの接続はこの関数の実行毎に切断されるので、多くのSQLを実行したい状況ではレスポンスが悪くなる恐れがある。
	 */
	function connect_to_mysql($sql/*実行するSQL*/){		/*mysql_close($link);を忘れるな!*/
		global $link;
		global $res;
		
		include ('./server_config.php');
		
		$link = mysql_connect($sql_server, $sql_user, $sql_pw);
		if (!$link) die('failed' . mysql_error());
		
		mysql_query("SET NAMES utf8",$link);
		
		mysql_select_db($sql_db, $link);
		
		//トランザクションをはじめる準備
		mysql_query( "set autocommit = 0", $link);
		//トランザクション開始
		mysql_query( "begin", $link);
		
		$res = mysql_query($sql, $link);
	}
	
	/**メールを送信する。
	 *$subject、$mailto、$mailfrom、$mailfromname、$bodyを引数とする。
	 *$subjectにはメールタイトル、$mailtoには送信先メールアドレス、$mailfromには送信元メールアドレス、$mailfromnameには送信主表示名、$bodyにはメール本文が代入される。
	 *本コメント執筆時(2012/10/24)は、この関数を実行するphpファイルに直接上記のメールタイトル〜メール本文が記述してある。この形式だとメールタイトル〜メール本文の変更が難しく、改善の余地がある。
	 */
	function mail_to_applicant($to/*送信先メールアドレス*/, $subject/*メールタイトル*/, $message/*メール本文*/)
	{
		mb_language("ja");
		mb_internal_encoding("UTF-8");
		
		$header = 'Content-Type: text/plain;charset=ISO-2022-JP' . "\r\n" .
		'From: '.mb_encode_mimeheader("臨床運動研究会").' <tyehai2@gmial.com>' . "\r\n" .
		'Reply-To: tyehai2@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		if(mb_send_mail($to, $subject, $message, $header)){
			print "success";
		}else{
			print "failed";
		}
	}
	?>