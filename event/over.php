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
<h1>定員オーバー</h1>
<p>申し訳ありません。
<p>ご希望の研修は現在、参加可能人数を超えております。
<p>キャンセル待ちとして登録されますか?
<p>(現在参加予定の方がキャンセルされた場合にメールでお伝えします。)<br>
<?php
	@$lesson_id = $_POST['lesson_id'];
    
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