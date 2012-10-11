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
<header><h1 style='text-align:center;'>この講座の情報を変更</h1></header>
<p>情報を変更し、「変更」ボタンを押して下さい。
<?php
$lesson_id_to_control = $_POST["lesson_id_to_control"];

include_once("./functions.php");
connect_to_mysql("select * from test_event where event_id='".$lesson_id_to_control."'");

$num_rows = mysql_num_rows($res);

if(@$num = mysql_num_fields($res)){

print "<form action='update_this_lesson.php' method='POST'>";
for($num_rows; $num_rows>0; $num_rows--){
	while(@$data = mysql_fetch_row($res)){
		print "<table style='margin:auto;'>\n";

		for($j = 0; $j < $num; $j++){
            print "<tr>";
            
            print "<td bgcolor=\"lightpink\" width='200'>";
    		print mysql_field_name($res, $j);
	    	print "</td>";
            
			print "<td width='500'>";
			
			if(mysql_field_name($res, $j)=="start"||mysql_field_name($res, $j)=="finish"){
			$time = $data[$j];
			$month = date("m", strtotime($time));
			$day = date("d", strtotime($time));
			$hour = date("H", strtotime($time));
			$minute = date("M", strtotime($time));
			
			print "<select name='".mysql_field_name($res, $j)."_month'>";
print "<option value=''>-月</option>";
for($start_month_number=1; $start_month_number<=12; $start_month_number++){
if($start_month_number==$month){
    print "'<option value=".$start_month_number." selected>".$start_month_number."月</option>'";
    }else{
    print "'<option value=".$start_month_number.">".$start_month_number."月</option>'";
    }
}
print "</select> ";

print "<select name='".mysql_field_name($res, $j)."_day'>";
print "<option value=''>-日</option>";
for($start_day_number=1;$start_day_number<=31;$start_day_number++){
if($start_day_number==$day){
    print "'<option value=".$start_day_number." selected>".$start_day_number."日</option>'";
    }else{
    print "'<option value=".$start_day_number.">".$start_day_number."日</option>'";
}

}
print "</select> ";

print "<select name='".mysql_field_name($res, $j)."_hour'>";
print "<option value=''>-時</option>";
for($start_hour_number=1;$start_hour_number<=24;$start_hour_number++){
if($start_hour_number==$hour){
    print "'<option value=".$start_hour_number." selected>".$start_hour_number."時</option>'";
    }else{
    print "'<option value=".$start_hour_number.">".$start_hour_number."時</option>'";
}
}
print "</select> ";

print "<select name='".mysql_field_name($res, $j)."_minute'>";
print "<option value=''>-分</option>";
for($start_minute_number=0;$start_minute_number<=59;$start_minute_number++){
if($start_minute_number==$minute){
    print "'<option value=".$start_minute_number." selected>".$start_minute_number."分</option>'";
    }else{
    print "'<option value=".$start_minute_number.">".$start_minute_number."分</option>'";
    }
}
print "</select>";

if(mysql_field_name($res, $j)=="start") print "〜";
			}else{
			print '<input type="text" name="'.mysql_field_name($res, $j).'" value="'.$data[$j].'" size="100" />';
			}
			
			print "</td>";
		    print "</tr>\n";
		}
	print "</table>\n<br>\n";

print "<div style='text-align:center;'>";
print '<input type="submit" value="変更"></form>';
print "</div>";
print '</form>';
	}


	}

}



?>

</body>
</html>