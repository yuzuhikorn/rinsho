<?php
	session_start();
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
	@$lesson_id =$_SESSION['lesson_id'];
	
	include_once("./functions.php");
	connect_to_mysql("select * from lesson where 研修ID='".$lesson_id."'");
	
	
	if(@$num = mysql_num_fields($res)){
		print "<table style='margin:auto; border:hidden;'>\n";
		print "<tr>";
		for($i = 1; $i < $num-1; $i++){
			print "<th nowrap>";
			print mysql_field_name($res, $i);
			print "</th>";
		}
		print "</tr>\n";
		while(@$data = mysql_fetch_row($res)){
			print "<tr>";
			for($j = 1; $j < $num-1; $j++){
				print "<td bgcolor='white'>";
				print $data[$j];
				print "</td>";
			}
			print "</tr>\n";
		}
		print "</table>\n";
		print "<br>";
	}
	
	
	?>

<div id="form_div" style='position:relative;'>
<form action="confirm.php" method="POST" name="iform">
<span style='position:relative;left:80px;'>お名前：</span><input type="text" name="name" size="50" style='position:relative;float:right;right:80px;'/><br/>
<span style='position:relative;left:80px;'>所属：</span><input type="text" name="laboratory" size="50" style='position:relative;float:right;right:80px;'/><br/>
<span style='position:relative;left:80px;'>返信用メールアドレス：</span><input type="text" name="mail" size="50" style='position:relative;float:right;right:80px;'/><span class="attention" name="mail"></span><br/>
<span style='position:relative;left:80px;'>資格：</span><input type="text" name="licence" size="50" style='position:relative;float:right;right:80px;'/><br/>
<span style='position:relative;left:80px;'>経験年数：</span><input type="text" name="years_of_experience" size="50" style='position:relative;float:right;right:80px;'/><span class="attention" name="years_of_experience"></span><br/>
<input type="hidden" name="applicated_lesson_id" value=<?php echo $lesson_id ?> size="50" /><br/>
<div style='text-align:center;'><input type="submit" onClick="return Checks()" value="申し込み" style='text-align:center;'></div>
</form>
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