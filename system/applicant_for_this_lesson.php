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
<header>
<h1 style='text-align:center;'>申込可能講座</h1></header>

<?php
	include_once ('./server_config.php');
	$applicated_lesson_id = $_POST["applicated_lesson_id"];
	$data1 = "select * from test_applicant where applicated_event_id='".$applicated_lesson_id."'";
	
	$link = mysql_connect($sql_server, $sql_user, $sql_pw);
	if (!$link) {
		die('failed' . mysql_error());
	}
	
	mysql_query("SET NAMES utf8",$link);
	
	$selecteddb = mysql_select_db($sql_db, $link);
	
	$strsql = $data1;
	$res = mysql_query($strsql, $link);
	if(!$res){
		print mysql_errno($link) . ": " . mysql_error($link);
	}
	
	$num_rows = mysql_num_rows($res);
	
	if(@$num = mysql_num_fields($res)){
		for($num_rows; $num_rows>0; $num_rows--){
			while(@$data = mysql_fetch_row($res)){
				print "<table style='margin:auto;'>\n";
				for($j = 0; $j < $num; $j++){
					print "<tr>";
					print "<td bgcolor=\"lightblue\" width='200'>";
					print mysql_field_name($res, $j);
					print "</td>";
					print "<td width='500'>";
					print $data[$j];
					print "</td>";
					print "</tr>\n";
				}
				print "</table>\n<br>\n";
				print "<div style='text-align:center;'>\n";
				print '<form action="mail_to_request_to_deposit_in_the_bank.php" method="POST">';
				print '<input type="hidden" name="name" value="'.$data[0].'" size="100" />';
				print '<input type="hidden" name="mail" value="'.$data[2].'" size="100" />';
				print '<input type="hidden" name="applicated_event_id" value="'.$data[5].'" size="100" />';
				
				print '<input type="submit" value="この受講希望者にメール" class="s2"/>';
				print '</form>';
				
				print "</div>\n";
				print "<br>";
			}
		}
	}
	
	$data1 = null;
	
	
	?>

</body>
</html>