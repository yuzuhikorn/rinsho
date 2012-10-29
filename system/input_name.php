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
<header><h1 style='text-align:center;'>希望中の研修のキャンセル手続き</h1></header>
<p>お名前を入力して下さい。
<?php
    print "<div style='text-align:center;'>\n";
    print "<form action='select_which_lesson_to_cancel.php' method='POST'>\n";
    print "<input type='text' name='name' size='100' />";
    print "<input type='submit' value='送信'/>\n";
    print "</form>\n";
    print "</div>\n";
	?>
<!--safari用キャシュ無効化(機能せず?)-->
<iframe style="height:0px;width:0px;visibility:hidden" src="about:blank">
this frame prevents back forward cache
</iframe>
<!--safari用キャシュ無効化(機能せず?)-->

</body>
</html>