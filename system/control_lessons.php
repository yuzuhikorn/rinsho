<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
<header><h1 style='text-align:center;'>研修管理</h1></header>
<p>情報を変更する研修を選択して下さい。
<?php
	
	include_once("./functions.php");
	connect_to_mysql("select * from lesson");
	
	if(@$num = mysql_num_fields($res)){
		print "<table style='margin:auto; border:hidden;'>\n";
		print "<tr bgcolor=\"lightpink\">";
		for($i = 0; $i < $num; $i++){
			print "<td>";
			print mysql_field_name($res, $i);
			print "</td>";
		}
		print "</tr>\n";
		while(@$data = mysql_fetch_row($res)){
			print "<tr>";
			for($j = 0; $j < $num; $j++){
				print "<td>";
				print $data[$j];
				print "</td>";
			}
			print "<td style='border:hidden'>";
			print "<form action='control_this_lesson.php' method='POST'>\n";
				print "<input type='hidden' name='lesson_id_to_control' value='".$data[0]."' size='100' />";
				print "<input type='submit' value='この研修の情報を変更' class='s2'/>\n";
				print "</form>\n";
			print "</td>";
			print "</tr>\n";
			
		}
		print "</table>\n";
	}
	
	
	
	?>

　<div style="float:right; position:relative; right:100px;">
<a href="./index.html">前に戻る</a>　<a href ="./index.html" >トップに戻る</a>
</div>
</body>
</html>