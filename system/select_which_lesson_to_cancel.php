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
		<p>キャンセルする研修を選択して下さい。<br>
		あなたの情報はこの研修に関しては削除されます。<br>
		他の研修をご希望の場合、そちらの情報は保持されていますのでご安心ください。<br>
		キャンセルされた枠はキャンセル待ちの方に回されます。<br>
		<?php
			@$name = $_POST['name'];
			include_once("./functions.php");
			connect_to_mysql("select * from test_applicant INNER JOIN test_event ON test_applicant.applicated_event_id=test_event.event_id where test_applicant.name='".$name."'");
			
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
						print "<form action='cancel_this_lesson.php' method='POST'>\n";
						print '<input type="hidden" name="applicant_id" value="'.$data[0].'" size="100" />';
						print '<input type="hidden" name="event_id" value="'.$data[8].'" size="100" />';
						print "<input type='submit' value='この研修をキャンセル' class='s2'/>\n";
						print "</form>\n";
						print "</div>\n";
					}
					
					
				}
				
			}
			?>
	</body>
</html>