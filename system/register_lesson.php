<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT">
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
		<style>
		*{
			font-family: '平成角ゴシック';
		}
		table,td,th{
			border:1px #aaa solid;
			border-spacing:0px;
			position:relative;
		}
		</style>
	</head>
	<body>
		<header><h1 style='text-align:center;'>研修登録</h1></header>
		<p>新規に研修を登録します。
		<p>既存の研修の希望者も確認できます。
		<div style="text-align:center;">
			<form action="confirm_lesson_information.php" method="POST"><br>
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
			<input type="submit" value="研修登録"/><br>
			</div>
		</form>
		<?php
			include_once("./functions.php");
			connect_to_mysql("select * from lesson");

			$num_rows = mysql_num_rows($res);
	
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
						print "<form action='applicant_for_this_lesson.php' method='POST'>\n";
						print "<input type='hidden' name='applicated_lesson_id' value='".$data[0]."' size='100' />";
						print "<input type='submit' value='この研修の受講希望者を一覧表示' class='s2'/>\n";
						print "</form>\n";
						print "</div>\n";
						print "<br>";
					}
				}
			}
	
		?>
		<a href="./index.html" style="float:right; position:relative; right:100px;">戻る</a>
	</body>
</html>