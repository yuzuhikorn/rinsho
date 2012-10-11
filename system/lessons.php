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
<header><h1 style='text-align:center;'>申込可能講座</h1></header>
<p>参加したい講座を選択して下さい。
<?php
include_once("./functions.php");
connect_to_mysql("select * from test_event");

$num_rows = mysql_num_rows($res);

if(@$num = mysql_num_fields($res)){
for($num_rows; $num_rows>0; $num_rows--){

	while(@$data = mysql_fetch_row($res)){
		print "<table style='margin:auto;'>\n";

		for($j = 0; $j < $num; $j++){
            print "<tr>";
            
            print "<td bgcolor=\"lightpink\" width='200'>";
    		print mysql_field_name($res, $j);
	    	print "</td>";
            
			print "<td width='500'>";
			print $data[$j];
			print "</td>";
		    print "</tr>\n";
		}
	print "</table>\n<br>\n";
	    print "<div style='text-align:center;'>\n";
	print "<form action='check_over.php' method='POST'>\n";
    print "<input type='hidden' name='event_id' value='".$data[0]."' size='100' />";
    print "<input type='submit' value='この講座に申し込み'/>\n";
    print "</form>\n";
    print "</div>\n";
    print "<br>";
	}
	}
}
?>
<!--safari用キャシュ無効化(機能せず?)-->
<iframe style="height:0px;width:0px;visibility:hidden" src="about:blank">
    this frame prevents back forward cache
</iframe>
<!--safari用キャシュ無効化(機能せず?)-->

</body>
</html>