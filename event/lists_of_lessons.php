
<?php
	include_once("./functions.php");
	connect_to_mysql("select * from lesson");
	mysql_close($link);
	print '<li><a href="./index.php");">研修一覧</a></li><br>';
	while ($row = mysql_fetch_assoc($res)){
		print '<li><a href="javascript:void(0);" onClick="JavaScript:select_lesson('.$row["研修ID"].');">'.$row["研修名"].'</a></li>';
	}
	print '<form action="check_over.php" method="POST" name="form1">';
	print '<input type="hidden" name="lesson_id">';
	print '</form>';
	print "</div>\n";
	?>
<script language="JavaScript" type="text/javascript">
function select_lesson($value){
	document.form1.lesson_id.value = $value;
	document.form1.submit();
}
</script>
