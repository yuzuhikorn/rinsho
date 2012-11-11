<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>臨床運動障害研究会システム管理画面</title>

<meta name="viewport" content="width=device-width">

<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>

<style>

body	{font-family: 'メイリオ', 'Hiragino Kaku Gothic Pro', sans-serif;
	background-color: #e5e5e5;
	margin: 0}

a	{color: #017acd}

section a	{color: #017acd
	display:block;
	width:100%;
	height:100%;
	position:absolute;
	left:0;
	top:0;}
	
section a:hover {background:rgba(0,0,0,0.2);}
/* コンテナ */
div#container	{width: 900px;
	margin-left: auto;
	margin-right: auto;
	background-color: #ffffff;
	padding: 0 40px;
	-webkit-box-shadow: 0px 0px 50px #bbbbbb;
	box-shadow: 0px 0px 50px #bbbbbb;
	background-image: url(circle.png), url(circle-yellow.png);
	background-repeat: no-repeat;
	background-position: 15px 420px, 90px 500px;
	background-size: 94px 94px, 30px 30px;
	position: relative;
	overflow: hidden}

/* ヘッダー */
header#pageheader	{background: none;
	padding: 15px 0 0}

header#pageheader h1	{margin: 0;
	float: left;
	font-size: 40px;
	font-weight: normal;
	font-family: 'Righteous', cursive}

header#pageheader h2	{color: #666666;
	font-size: 0.75em;
	margin: 0;
	padding-top: 20px;
	text-align: right;
	font-weight: normal}

nav	{clear: both}


/* メニュー */
nav ul	{font-size: 0.75em;
	margin-top: 0;
	margin-bottom: 10px;
	margin-left: 0;
	padding-left: 0;
	height: 30px;
	background-color: #333333;
	border-radius: 5px;
	background: -webkit-gradient(linear, left top, left bottom, from(#777777), color-stop(50%, #444444), color-stop(50%, #333333), to(#555555));
	background: -webkit-linear-gradient(#777777 0%, #444444 50%, #333333 51%, #555555 100%);
	background: -moz-linear-gradient(#777777 0%, #444444 50%, #333333 51%, #555555 100%);
	background: -o-linear-gradient(#777777 0%, #444444 50%, #333333 51%, #555555 100%);
	background: -ms-linear-gradient(#777777 0%, #444444 50%, #333333 51%, #555555 100%)}

nav ul li	{list-style-type: none;
	float: left}

nav ul li a	{display: block;
	width: 120px;
	line-height: 30px;
	text-decoration: none;
	text-align: center;
	color: #ffffff;
	border-right: solid 1px rgba(255,255,255,0.2)}

nav ul li a:hover	{background-color: rgba(1,122,205,0.3)}

nav ul li:first-of-type a:hover
	{border-radius: 5px 0 0 5px}

/* コンテンツ */
article	{width: auto;
	margin-left: auto;
	margin-right: auto}

article header	{border: solid 1px #aaaaaa;
	margin: 20px 0 10px;
	padding: 18px;
	border-radius: 5px;
	-webkit-box-shadow: 0px 2px 3px #cccccc, 0px 0px 4px 3px #ffffff inset;
	box-shadow: 0px 2px 3px #cccccc, 0px 0px 4px 3px #ffffff inset;
	background-color: rgba(255,255,255,0.5)}

article header h1	{background: none;
	font-size: 28px;
	color: #000000;
	line-height: 45px;
	padding-left: 0;
	margin: 0;
	font-weight: normal;
	float: left}

article header p	{font-size: 16px;
	color: #444444;
	margin-left: 300px}

article section	{clear: both;
	border: solid 1px #aaaaaa;
	margin: 20px 0 10px;
	padding: 18px;
	border-radius: 5px;
	overflow: hidden;
	background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#dfdfdf));
	background: -webkit-linear-gradient(#ffffff 0%, #dfdfdf 100%);
	background: -moz-linear-gradient(#ffffff 0%, #dfdfdf 100%);
	background: -o-linear-gradient(#ffffff 0%, #dfdfdf 100%);
	background: -ms-linear-gradient(#ffffff 0%, #dfdfdf 100%);
	-webkit-box-shadow: 0px 2px 3px #cccccc, 0px 0px 4px 3px #ffffff inset;
	box-shadow: 0px 2px 3px #cccccc, 0px 0px 4px 3px #ffffff inset}

article section h1	{background: none;
	font-size: 24px;
	font-weight: normal;
	line-height: 22px;
	padding-left: 0;
	margin-top: 0;
	margin-bottom: 20px;
	margin-left: 0;
	margin-right: 0}

article p	{font-size: 0.75em;
	line-height: 1.6;
	margin-top: 10px;
	margin-left: 0;
	margin-right: 0}

article h2	{
	font-weight: normal;
	font-family: 'Righteous', cursive}
/* フッター */
footer	{color: #888888;
	margin-top: 25px;
	padding-top: 8px;
	padding-bottom: 8px;
	clear: both;
	border-top: solid 1px #aaaaaa}

small	{font-size: 10px;
	font-style: normal;
	text-align: left;
	display: block}

small::before	{content: 'RINSHO';
	display: block;
	width: 200px;
	padding: 10px 0;
	background-color: #880000;
	color: #ffffff;
	font-family: 'Righteous', cursive;
	font-size: 16px;
	text-align: center;
	position: absolute;
	right: 0;
	bottom: 0;
	-webkit-transform: rotate(-45deg) translate(62px, 20px);
	-moz-transform: rotate(-45deg) translate(62px, 20px);
	-o-transform: rotate(-45deg) translate(62px, 20px);
	-ms-transform: rotate(-45deg) translate(62px, 20px)}


/* 画像の配置 */
figure	{margin: 0}

article section:nth-of-type(odd) figure
	{float: right;
	margin-left: 15px;
	margin-bottom: 0}

article section:nth-of-type(even) figure
	{float: left;
	margin-right: 15px;
	margin-bottom: 0}

article section figcaption	{color: #666666;
	font-size: 10px;
	display: block}

article section:nth-of-type(odd) figcaption
	{text-align: right}


/* ====== PC用の設定 ====== */
@media only screen and (min-width:900px) {

/* ３段組み */
article div[itemprop="articleBody"]
	{display: -webkit-box;
	display: -moz-box;
	display: -ms-box}

article section	{width: 288px;
	min-height:100px;
	margin-right: 18px;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	overflow: visible}

article section h1	{height: 48px;
	line-height: 1.2}

article section:nth-of-type(1n) figure
	{float: none;
	margin: 0}

article section:nth-of-type(1n) figcaption
	{text-align: center;
	margin-bottom: 15px}

/* ３段組み IE8～9 & Opera */
article section	{clear: none;
	float: left;
	position: relative}

article section + section + section	{margin-right: 0}

}

table,td,th{
border:1px #aaa solid;
	border-spacing:0px;
position:relative;
}

/* ====== タブレット用の設定 ====== */
@media only screen and (min-width: 600px) and (max-width:899px) {

div#container	{width: 100%;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	padding: 0 10px;
	background-position: -3px 380px, 100px 460px}

header#pageheader img	{width: 100%;
	height: auto}

nav ul	{font-size: 10px}

nav ul li a	{width: 100px}

}


/* ====== スマートフォン用の設定 ====== */
@media only screen and (max-width:599px) {

div#container	{width: 100%;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	padding: 0 10px;
	background-position: -3px 220px, 100px 280px}

header#pageheader img	{width: 100%;
	height: auto}

nav ul	{font-size: 8px}

nav ul li a	{width: auto;
	display: inline-block;
	padding: 0 3px}

header#pageheader h1	{font-size: 24px;
	margin-right: 15px}

header#pageheader h2	{font-size: 10px;
	text-align: left;
	padding: 0}

article header h1	{float: none}

article header p	{margin: 0}

article section:nth-of-type(1n) figure
	{float: none;
	margin: 0;
	text-align: center;
	display: block}

article section:nth-of-type(1n) figcaption
	{text-align: center;
	margin-bottom: 15px}

}



</style>


<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

<style>
article section figure	{float: right;
	margin-left: 15px;
	margin-bottom: 15px}

nav ul li a	{border-right: solid 1px #ffffff}

nav ul li a:hover	{background-color: #017acd}


/* ３段組み */
article div[itemprop="articleBody"]
	{display: -webkit-box;
	display: -moz-box;
	display: -ms-box}

article section	{width: 288px;
	min-height:100px;
	margin-right: 18px;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	overflow: visible}

article section h1	{height: 48px;
	line-height: 1.2}

article section:nth-of-type(1n) figure
	{float: none;
	margin: 0}

article section:nth-of-type(1n) figcaption
	{text-align: center;
	margin-bottom: 15px}

/* ３段組み IE8～9 & Opera */
article section	{clear: none;
	float: left;
	position: relative}

article section + section + section	{margin-right: 0}

</style>
<![endif]-->

<SCRIPT language="JavaScript">
<!--
// 数値のみを入力可能にする
function numOnly() {
	m = String.fromCharCode(lesson.keyCode);
	if("0123456789\b\r".indexOf(m, 0) < 0) return false;
	return true;
}
//-->
</SCRIPT>

<!-- コンテナ -->
<div id="container">

<header id="pageheader">
<hgroup>
<h1>研修管理画面</h1>
<h2>臨床運動研究会</h2>
</hgroup>

<!-- メニュー -->
<nav>
<ul>
<li><a href="index.html">研修管理画面トップ</a></li>
<li><a href="register_lesson.php">新規研修登録</a></li>
<li><a href="lessons.php">研修一覧</a></li>
<li><a href="control_lessons.php">研修情報管理</a></li>
<li><a href="#">説明書</a></li>
</ul>
</nav>
</header>

<!-- コンテンツ -->
<article itemscope itemtype="http://schema.org/Article">
<h2>新規研修登録</h2>
<p>新規に研修を登録します。
<div style="text-align:center;">
<form action="confirm_lesson_information.php" method="POST">
研修名：<input type="text" name="lesson_name" size="100" /><br/>
<?php
	print "日時:<select name='start_month'>";
	print "<option value=''>-月</option>";
	for($start_month_number=1; $start_month_number<=12; $start_month_number++){
		print "'<option value=".$start_month_number.">".$start_month_number."月</option>'";
	}
	print "</select> ";
	
	print "<select name='start_day'>";
	print "<option value=''>-日</option>";
	for($start_day_number=1;$start_day_number<=31;$start_day_number++){
		print "'<option value=".$start_day_number.">".$start_day_number."日</option>'";
	}
	print "</select> ";
	
	print "<select name='start_hour'>";
	print "<option value=''>-時</option>";
	for($start_hour_number=1;$start_hour_number<=24;$start_hour_number++){
		print "'<option value=".$start_hour_number.">".$start_hour_number."時</option>'";
	}
	print "</select> ";
	
	print "<select name='start_minute'>";
	print "<option value=''>-分</option>";
	for($start_munute_number=0;$start_munute_number<=59;$start_munute_number++){
		print "'<option value=".$start_munute_number.">".$start_munute_number."分</option>'";
	}
	print "</select>";
	print "〜";
	print "<select name='finish_month'>";
	print "<option value=''>-月</option>";
	for($finish_month_number=1; $finish_month_number<=12; $finish_month_number++){
		print "'<option value=".$finish_month_number.">".$finish_month_number."月</option>'";
	}
	print "</select> ";
	
	print "<select name='finish_day'>";
	print "<option value=''>-日</option>";
	for($finish_day_number=1;$finish_day_number<=31;$finish_day_number++){
		print "'<option value=".$finish_day_number.">".$finish_day_number."日</option>'";
	}
	print "</select> ";
	
	print "<select name='finish_hour'>";
	print "<option value=''>-時</option>";
	for($finish_hour_number=1;$finish_hour_number<=24;$finish_hour_number++){
		print "'<option value=".$finish_hour_number.">".$finish_hour_number."時</option>'";
	}
	print "</select> ";
	
	print "<select name='finish_minute'>";
	print "<option value=''>-分</option>";
	for($finish_minute_number=0;$finish_minute_number<=59;$finish_minute_number++){
		print "'<option value=".$finish_minute_number.">".$finish_minute_number."分</option>'";
	}
	print "</select><br>";
	?>
講師：<input type="text" name="teacher" size="100" /><br/>
所属：<input type="text" name="laboratory" size="100" /><br/>
場所：<input type="text" name="place" size="100" /><br/>
参加費：<input type="text" name="fee" size="100" onkeyDown="return numOnly()"/><br/>
懇親会：<input type="radio" name="party" value="あり"> あり
<input type="radio" name="party" value="なし" checked> なし<br/>
懇親会の参加費：<input type="text" name="party_fee" size="100" onkeyDown="return numOnly()"/><br/>
<input type="submit" value="研修登録"/><br>
</div>
</form>
		</article>

<!-- フッター -->
<footer>
<small>Copyright (C) Rinsho Undo Kenkyukai, All rights reserved.</small>
</footer>
		
		</div>
		
</body>
</html>