<?php
	if ($_POST) {
		@$name = $_POST["name"];
		@$mail = $_POST["mail"];
		@$applicated_lesson_name = $_POST["applicated_lesson_name"];
		$body=$name."様へ\n\n研修会『".$applicated_lesson_name."』への申し込みありがとうございます。\nつきましては◯◯◯◯◯◯へご入金頂ます様、よろしくお願い致します。\n";
		include_once("./functions.php");
		mail_to_applicant("入金依頼"/*メールタイトル*/,$mail/*送信先メールアドレス*/,"tyehai2@gmail.com"/*送信元メールアドレス*/,"tyehai2"/*送信主表示名*/,$body/*メール本文*/);
		
		header("Location: ./compleate.html");
	}
	?>
