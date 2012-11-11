<?php
	session_start();
	if(!$_SERVER[HTTP_REFERER]){
		print "<!DOCTYPE HTML>
		<html>
		<meta charset='utf-8'><body>";
		print "URL入力で直接来る事を禁止しています。<br>";
		print "<a href='http://rinshoundoshogai.sakura.ne.jp'>http://rinshoundoshogai.sakura.ne.jp</a>からリンクを辿って来てください。";
		print "</body></html>";
		exit();
	}
	?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>臨床運動障害研究会</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
table,td,th{
border:1px #aaa solid;
	border-spacing:0px;
}
th{
	background-color: #003333;
color:#fff;
}</style></head>

<div id="wrapper">
<header>
<img src="../img/header.png" alt="header">
<ul id="nav">
<li><a href="../index.php">HOME</a></li>
<li><a href="../staff/index.html">Staff</a></li>
<li><a href="./index.php">Event</a></li>
<li><a href="../log/">Log</a></li>
<li><a href="../volunteer/index.html">Volunteer</a></li>
</ul>
</header>
<div id="main">
<div id="menu">
<ul id="nav_sub">
<?php
	include_once("./lists_of_lessons.php");
	?>
</ul>
</div>
<div id="contents">
<?php
	if ($_POST) {
		
		@$name = $_POST['name'];
		@$laboratory = $_POST['laboratory'];
		@$mail = $_POST['mail'];
		@$licence = $_POST['licence'];
		@$years_of_experience = $_POST['years_of_experience'];
		@$go_party = $_POST['go_party'];
		@$applicated_lesson_id = $_POST['applicated_lesson_id'];
		
		print "<h1>申込み情報確認</h1><br>";
		print "<p>この情報で登録します。";
		print "<table style='margin:auto;'>";
		print "<tr><th width='200' nowrap>名前</th><td bgcolor='white' width='500'>".$name."</td></tr>";
		print "<tr><th width='200' nowrap>所属</th><td bgcolor='white' width='500'>".$laboratory."</td></tr>";
		print "<tr><th width='200' nowrap>メール</th><td bgcolor='white' width='500'>".$mail."</td></tr>";
		print "<tr><th width='200' nowrap>資格</th><td bgcolor='white' width='500'>".$licence."</td></tr>";
		print "<tr><th width='200' nowrap>経験年数</th><td bgcolor='white' width='500'>".$years_of_experience."</td></tr>";
		if($go_party=="する"){
			print "<tr><th width='200' nowrap>懇親会に参加</th><td bgcolor='white' width='500'>".$go_party."</td></tr>";
		}
		print "</table>";
		
		print "<div style='text-align:center;'>\n";
		print "<form action='insert_new_applicant.php' method='POST'>\n";
		print "<input type='hidden' name='name' value='".$name."'>";
		print "<input type='hidden' name='laboratory' value='".$laboratory."'>";
		print "<input type='hidden' name='mail' value='".$mail."'>";
		print "<input type='hidden' name='licence' value='".$licence."'>";
		print "<input type='hidden' name='years_of_experience' value='".$years_of_experience."'>";
		print "<input type='hidden' name='go_party' value='".$go_party."'>";
		print "<input type='hidden' name='applicated_lesson_id' value='".$applicated_lesson_id."'>";
		print "<input type='submit' value='確定'/>\n";
		print "</form>\n";
		print "</div>\n";
	}
	?>
</div>
<footer>

<div width="950px">
<a href="../event/index.html"><img src="../img/IMG_0350.jpg" width="210" height="90" alt="勉強会" style="margin:10px;"></a>
<a href="../volunteer/index.html"><img src="../img/v.png" width="210" height="90" alt="海外ボランティア" style="margin:10px;"></a>
<a href="http://ftp.minasehp.jp/"><img src="../img/m.png" width="210" height="90" alt="水無瀬病院" style="margin:10px;"></a>
<a href="../mail/index.html"><img src="../img/t.png" width="210" height="90" alt="お問い合わせ" style="margin:10px;"></a>
</div>

<small>
Copyright © 2012 miyazaki-seminar All Rights Reserved. </small>
</footer>
</div>
</html>