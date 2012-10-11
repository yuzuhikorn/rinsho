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

<script type="text/javascript" src="./jquery-1.7.2.min.js"></script>

    <script language="javascript" type="text/javascript">
$(function(){

     // id="application_form_div" を親要素に持つdivを非表示
    $("#application_form_div > div").css("display", "none");

    // id="application_form_div"を親要素に持つi番目のbuttonが
    // クリックされた時、i番目のdivの表示、非表示切り替え
    $("#application_form_div > form").each(function(i){
        $(this).click(function(){
            $("#application_form_div > div").eq(i).toggle();
        //$(this).text("close");
        });
    });
});
</script>
</head>
<body>
<header><h1 style='text-align:center;'>申込可能講座</h1></header>

<?php

include_once("../functions.php");
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


print '<div id="application_form_div" style="text-align:center;">';
print '<form><button type="button">この講座に申し込み</button></form>';

print'<div>';
print 'お名前：<input type="text" name="name" size="100" /><br/>';
print '所属：<input type="text" name="laboratory" size="100" /><br/>';
print '返信用メールアドレス：<input type="text" name="mail" size="100" /><br/>';
print '資格：<input type="text" name="licence" size="100" /><br/>';
print '経験年数：<input type="text" name="years_of_experience" size="100" /><br/>';
print '<input type="hidden" name="applicated_event_name" value='.$data[0].'size="100" /><br/>';

print '</div>';
print '</div>';
	}


	}

}



?>

</body>
</html>