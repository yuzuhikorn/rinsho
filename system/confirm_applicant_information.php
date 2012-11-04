<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--IE用キャシュ無効化(機能せず?)-->
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-store">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="-1">
<!--IE用キャシュ無効化(機能せず?)-->
<style>
*{
	font-family: '平成角ゴシック';
}
table,td,th{
border:1px #aaa solid;
    border-spacing:0px;
}
</style>
</head>
<body>
<?php
	if ($_POST) {
		
		@$name = $_POST['name'];
		@$laboratory = $_POST['laboratory'];
		@$mail = $_POST['mail'];
		@$licence = $_POST['licence'];
		@$years_of_experience = $_POST['years_of_experience'];
		@$applicated_lesson_id = $_POST['applicated_lesson_id'];
		
		print "<header><h1 style='text-align:center;'>申込み情報確認</h1></header>";
		print "<p>この情報で登録します。";
		print "<table style='margin:auto;'>";
		print "<tr><td bgcolor='lightpink' width='200'>name</td><td width='500'>".$name."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>laboratory</td><td width='500'>".$laboratory."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>mail</td><td width='500'>".$mail."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>licence</td><td width='500'>".$licence."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>years_of_experience</td><td width='500'>".$years_of_experience."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>applicated_lesson_id</td><td width='500'>".$applicated_lesson_id."</td></tr>";
		print "</table>";
		
		print "<div style='text-align:center;'>\n";
		print "<form action='insert_new_applicant.php' method='POST'>\n";
		print "<input type='hidden' name='name' value='".$name."'>";
		print "<input type='hidden' name='laboratory' value='".$laboratory."'>";
		print "<input type='hidden' name='mail' value='".$mail."'>";
		print "<input type='hidden' name='licence' value='".$licence."'>";
		print "<input type='hidden' name='years_of_experience' value='".$years_of_experience."'>";
		print "<input type='hidden' name='applicated_lesson_id' value='".$applicated_lesson_id."'>";
		print "<input type='submit' value='確定'/>\n";
		print "</form>\n";
		print "</div>\n";
	}
	?>
</body>
</html>