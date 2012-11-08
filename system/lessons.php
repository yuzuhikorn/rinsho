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
<header><h1 style='text-align:center;'>申込可能研修</h1></header>
<p>参加したい研修を選択して下さい。
<?php
	include_once("./functions.php");
	connect_to_mysql("select * from lesson");
	
	if(@$num = mysql_num_fields($res)){
		print "<table style='margin:auto; border:hidden;'>\n";
		print "<tr bgcolor=\"lightpink\">";
		for($i = 1; $i < $num-1; $i++){
			print "<td>";
			print mysql_field_name($res, $i);
			print "</td>";
		}
		print "</tr>\n";
		while(@$data = mysql_fetch_row($res)){
			print "<tr>";
			for($j = 1; $j < $num-1; $j++){
				print "<td>";
				print $data[$j];
				print "</td>";
			}
			print "<td style='border:hidden'>";
			print "<form action='check_over.php' method='POST'>\n";
			print "<input type='hidden' name='lesson_id' value='".$data[0]."' size='100' />";
			print "<input type='submit' value='この研修に申し込み'/>\n";
			print "</form>\n";
			print "</td>";
			print "</tr>\n";
			
		}
		print "</table>\n";
	}
	?>
<!--safari用キャシュ無効化(機能せず?)-->
<iframe style="height:0px;width:0px;visibility:hidden" src="about:blank">
this frame prevents back forward cache
</iframe>
<!--safari用キャシュ無効化(機能せず?)-->

　<div style="float:right; position:relative; right:100px;">
<a href="./index.html">前に戻る</a>　<a href ="./index.html" >トップに戻る</a>
</div>
</body>
</html>