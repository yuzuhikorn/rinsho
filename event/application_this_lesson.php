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
	print "<h1>お申し込み</h1><br>";
	@$lesson_id =$_SESSION['lesson_id'];
	
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
			print "</table><br>";
			
			
			
			print "<div id='form_div' style='width:500px; margin:auto;text-align:right;'>
			<form action='confirm.php' method='POST' name='iform'>
			お名前：<input type='text' name='name' size='40'><br>
			<p>所属：<input type='text' name='laboratory' size='40'><br>
			<p>返信用メールアドレス：<input type='text' name='mail' size='40'><span class='attention' name='mail'></span><br>
			<p>資格：<input type='text' name='licence' size='40'><br>
			<p>経験年数：<input type='text' name='years_of_experience' size='40'><span class='attention' name='years_of_experience'></span><br>
			<input type='hidden' name='applicated_lesson_id' value=".$lesson_id."><br>";
			if($data[8]=="あり"){
				print "懇親会に参加：<input type='radio' name='go_party' value='する'> する
				<input type='radio' name='go_party' value='しない'> しない<br>";
			}
		}
		
	}
	
	print "<div style='text-align:center;'><input type='submit' onClick='return Checks()' value='申し込み' style='text-align:center;'></div>
	</form>";
	?>
</div>
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