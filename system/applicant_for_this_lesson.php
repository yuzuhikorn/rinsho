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
	connect_to_mysql("select * from applicant where 希望研修ID='".$applicated_lesson_id."'");
	
	$num_rows = mysql_num_rows($res);
	print '<form action="check_deposit.php" method="POST">';
	print '<input type="hidden" name="status" value=3>';
	print '<input type="hidden" name="lesson_id" value="'.$applicated_lesson_id.'">';
	if(@$num = mysql_num_fields($res)){
		print "<table style='margin:auto; border:hidden;'>\n";
		print "<tr bgcolor=\"lightblue\">";
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
					if($data[7]==1 ||$data[7]==3){
						print "<div style='visibility:hidden'>";
					}else{
						print "<div>";
					}
					print '入金あり<input type="checkbox" name="applicant_id[]" value="'.$data[0].'">';
					print '<input type="button" onClick="cancel('.$data[0].')" value="キャンセル">';
					print '</div>';
					print "</td>";
					print "</tr>\n";
					}
				
				print "</table>\n";
				print "<div style='text-align:center;'>\n";
				
				
				
				print "<br>";
		print '<input type="submit" value="入金情報確定">';
		print '</form>';
		
		print '<form action="change_applicant_status.php" method="POST" name="form1">';
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
	var res = confirm("キャンセルします。");
	if( res == true ) {
	document.form1.applicant_id.value = $value;
	document.form1.submit();
	}

	
}
//-->
</script>
　<div style="float:right; position:relative; right:100px;">
<a href="<?php echo $_SERVER['HTTP_REFERER'];?>">前に戻る</a>　<a href ="./index.html" >トップに戻る</a>
</div>
</body>
</html>