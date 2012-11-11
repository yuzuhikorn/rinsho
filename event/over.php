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
<h1>定員オーバー</h1><br>
<?php
	if ($_POST) {
		@$lesson_id = $_POST['lesson_id'];
	}else{
		@$lesson_id = $_SESSION['lesson_id'];
	}
	include_once("./functions.php");
	connect_to_mysql("select * from lesson where 研修ID='".$lesson_id."'");
	mysql_close($link);
	if(@$num = mysql_num_fields($res)){
		print "<table style='margin:auto; border:hidden;'>\n";
		while(@$data = mysql_fetch_row($res)){
			for($i = 1; $i < $num-1; $i++){
				if($i==2){
					print "<tr>";
					print "<th nowrap>";
					print "実施日時";
					print "</th>";
					print "<td bgcolor='white'>";
					$when_carry_out =date("Y年m月d日 ", strtotime($data[2]));
					//			$when_carry_out.="<br>";
					$when_carry_out.=date("h時i分〜", strtotime($data[2]));
					//			$when_carry_out.="<br>";
					$when_carry_out.=date("h時i分", strtotime($data[3]));
					print $when_carry_out;
					print "</td>";
					print "</tr>\n";
				}else if($i==3){
					//何もしない
				}else{
					print "<tr>";
					print "<th nowrap>";
					print mysql_field_name($res, $i);
					print "</th>";
					print "<td bgcolor='white'>";
					print $data[$i];
					print "</td>";
					print "</tr>";
				}
			}
		}
		print "</table>";
		print "<br>";
	}
	
	print "<p>申し訳ありません。";
	print "<p>ご希望の研修は現在、参加可能人数を超えております。";
	print "<p>キャンセル待ちとして登録されますか?";
	print "<p>(現在参加予定の方がキャンセルされた場合にメールでお伝えします。)";
    
	print "<form action='application_this_lesson.php' method='POST'>\n";
	print "<input type='hidden' name='lesson_id' value='".$lesson_id."' />";
	print "<div style='text-align:center;'><input type='submit' value='キャンセル待ちとして登録'/></div>\n";
	print "</form>\n";
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