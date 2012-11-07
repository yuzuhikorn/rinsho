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
		
		@$lesson_name = $_POST['lesson_name'];
		
		@$start_month=$_POST['start_month'];
		@$start_day=$_POST['start_day'];
		@$start_hour=$_POST['start_hour'];
		@$start_minute=$_POST['start_minute'];
		@$finish_month=$_POST['finish_month'];
		@$finish_day=$_POST['finish_day'];
		@$finish_hour=$_POST['finish_hour'];
		@$finish_minute=$_POST['finish_minute'];
		
		@$teacher = $_POST['teacher'];
		@$laboratory = $_POST['laboratory'];
		@$place = $_POST['place'];
		@$fee = $_POST['fee'];
		
		print "<header><h1 style='text-align:center;'>研修登録確認</h1></header>";
		print "<p>この研修を登録します。";
		print "<table style='margin:auto;'>";
		print "<tr><td bgcolor='lightpink' width='200'>lesson_name</td><td width='500'>".lesson_name."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>start</td><td width='500'>".$start_month."-".$start_day." ".$start_hour.":".$start_minute.":00</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>finish</td><td width='500'>".$finish_month."-".$finish_day." ".$finish_hour.":".$finish_minute.":00</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>teacher</td><td width='500'>".$teacher."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>laboratory</td><td width='500'>".$laboratory."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>place</td><td width='500'>".$place."</td></tr>";
		print "<tr><td bgcolor='lightpink' width='200'>fee</td><td width='500'>".$fee."</td></tr>";
		print "</table>";
		
		print "<div style='text-align:center;'>\n";
		print "<form action='insert_new_lesson.php' method='POST'>\n";
		print "<input type='hidden' name='lesson_name' value='".$lesson_name."'>";
		print "<input type='hidden' name='start_month' value='".$start_month."'>";
		print "<input type='hidden' name='start_day' value='".$start_day."'>";
		print "<input type='hidden' name='start_hour' value='".$start_hour."'>";
		print "<input type='hidden' name='start_minute' value='".$start_minute."'>";
		print "<input type='hidden' name='finsh_month' value='".$finsh_month."'>";
		print "<input type='hidden' name='finsh_day' value='".$finsh_day."'>";
		print "<input type='hidden' name='finsh_hour' value='".$finsh_hour."'>";
		print "<input type='hidden' name='finsh_minute' value='".$finsh_minute."'>";
		print "<input type='hidden' name='teacher' value='".$teacher."'>";
		print "<input type='hidden' name='laboratory' value='".$laboratory."'>";
		print "<input type='hidden' name='place' value='".$place."'>";
		print "<input type='hidden' name='fee' value='".$fee."'>";
		print "<input type='submit' value='確定'/>\n";
		print "</form>\n";
		print "</div>\n";
	}
	?>
　<div style="float:right; position:relative; right:100px;">
<a href="<?php echo $_SERVER['HTTP_REFERER'];?>">前に戻る</a>　<a href ="./index.html" >トップに戻る</a>
</div>
</body>
</html>