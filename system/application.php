<?php
session_start();
?>
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
.attention{
color:red;
position:absolute;
left:600px;
}
#form_div input{
position:absolute;
left:275px;
}
</style><script type="text/javascript">

/* 半角英文字チェック */
function AlphabetCheck() {
	var str = document.iform.mail.value;
	if( str.match( /[^A-Za-z\s.-@]+/ ) ) {
		var elms = document.getElementsByName("mail");
		for( var j=0; j<elms.length; j++ ) {
			elms[j].innerHTML = "半角英文字のみで入力して下さい。"; // クラス名を変更する
		}
		return 1;
	}else{
		return 0;
	}
}

/* 半角数字チェック */
function NumberCheck() {
	var str = document.iform.years_of_experience.value;
	if( str.match( /[^0-9]+/ ) ) {
		var elms = document.getElementsByName("years_of_experience");
		for( var j=0; j<elms.length; j++ ) {
			elms[j].innerHTML = "半角数字のみで入力して下さい。"; // クラス名を変更する
		}
		return 1;
	}else{
		return 0;
	}
}

function NullCheck() {
	// 入力必須項目（「,」で区切って追加可能）
	ess = new Array("name","laboratory","mail","licence","years_of_experience");
	for(i=0; i<ess.length; i++) {
		txt = document.iform.elements[ess[i]].value;
		if(txt == "") {
			alert("未入力項目があります");
			return 0;
		}
	}
	return 1;
}

/* 全部チェック ここに未入力用のも入れなくてはいけない */
function AllCheck() {
	var check = 0;
	check += AlphabetCheck();
	check += NumberCheck();
	if( check > 0 ) {
		return 0;
	}else{
		return 1;
	}
}

function Checks(){
    var checks=0;
    checks+=NullCheck();
    //alert("NullCheck "+NullCheck());
    checks+=AllCheck();
    //alert("AllCheck "+AllCheck());
    //alert("Checks "+checks);
    if(checks<2){
		return false;
    }else{
		return true;
    }
}
</script>
</head>
<body>
<header><h1 style='text-align:center;'>ご希望の研修</h1></header>

<?php
session_start();
	@$lesson_id =$_SESSION['lesson_id'];
	
	include_once("./functions.php");
	connect_to_mysql("select * from lesson where 研修ID='".$lesson_id."'");
	
	
	if(@$num = mysql_num_fields($res)){
		print "<table style='margin:auto; border:hidden;'>\n";
		print "<tr bgcolor=\"lightpink\">";
		for($i = 1; $i < $num-1; $i++){
			print "<td>";
			print mysql_field_name($res, $i);
			print "</td>";
		}
		print "</tr>\n";
		while(@$data = mysql_fetch_row($res)){
			print "<tr>";
			for($j = 1; $j < $num-1; $j++){
				print "<td>";
				print $data[$j];
				print "</td>";
			}
			print "</tr>\n";
		}
		print "</table>\n";
		print "<br>";
	}
	
	
	?>

<div id="form_div" style='position:relative;left:325px;'>
<form action="confirm_applicant_information.php" method="POST" name="iform">
お名前：<input type="text" name="name" size="50" /><br/>
所属：<input type="text" name="laboratory" size="50" /><br/>
返信用メールアドレス：<input type="text" name="mail" size="50" /><span class="attention" name="mail"></span><br/>
資格：<input type="text" name="licence" size="50" /><br/>
経験年数：<input type="text" name="years_of_experience" size="50" /><span class="attention" name="years_of_experience"></span><br/>
<input type="hidden" name="applicated_lesson_id" value=<?php echo $lesson_id ?> size="50" /><br/>

<input type="submit" onClick="return Checks()" value="申し込み" class="s2"/>
</form>
</div>

　<div style="float:right; position:relative; right:100px;">
<a href="./lessons.php">前に戻る</a>　<a href ="./index.html" >トップに戻る</a>
</div>
</body>
</html>