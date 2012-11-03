<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<style>
				*{
					font-family: '平成角ゴシック';
				}
			</style>
	</head>
	<body>
		<h1>定員オーバー</h1>
		<p>申し訳ありません。
		<p>ご希望の研修は現在、参加可能人数を超えております。
		<p>キャンセル待ちとして登録されますか?(現在参加予定の方がキャンセルされた場合にメールでお伝えします。)<br>
		<?php
			@$lesson_id = $_POST['lesson_id'];
    
			print "<form action='application.php' method='POST'>\n";
			print "<input type='hidden' name='lesson_id' value='".$lesson_id."' />";
			print "<input type='submit' value='キャンセル待ちとして登録'/>\n";
			print "</form>\n";
			?>
		<a href ="./index.html">戻る</a>
	</body>
</html>