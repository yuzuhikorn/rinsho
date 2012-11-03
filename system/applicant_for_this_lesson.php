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
<h1 style='text-align:center;'>本研修希望者</h1></header>

<?php
	$applicated_lesson_id = $_POST["applicated_lesson_id"];
	
	include_once("./functions.php");
	connect_to_mysql("select * from applicant where applicated_lesson_id='".$applicated_lesson_id."'");
	
	$num_rows = mysql_num_rows($res);
	
	if(@$num = mysql_num_fields($res)){
		print '<form action="check_deposit.php" method="POST">';
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
				
				print '<input type="hidden" name="status" value=3>';
				print '<input type="hidden" name="lesson_id" value="'.$applicated_lesson_id.'">';
				print '入金あり<input type="checkbox" name="applicant_id[]" value="'.$data[0].'">';
				print '<input type="button" onClick="cancel('.$data[0].')" value="キャンセル">';
				
				print "<br>";
			}
		}
		print '<input type="submit" value="入金情報確定">';
		print '</form>';
		
		print '<form action="cancel_this_lesson.php" method="POST" name="form1">';
		print '<input type="hidden" name="status" value=1>';
		print '<input type="hidden" name="lesson_id" value="'.$applicated_lesson_id.'">';
		print '<input type="hidden" name="applicant_id">';
		print '</form>';
		print "</div>\n";
	}
	?>
<script language="JavaScript" type="text/javascript">
<!--
function cancel($value){
	alert("キャンセルします。");
	document.form1.applicant_id.value = $value;
	document.form1.submit();
}
//-->
</script>
</body>
</html>