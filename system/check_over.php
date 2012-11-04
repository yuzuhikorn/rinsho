<?php
if ($_POST) {

@$lesson_id = $_POST['lesson_id'];

include_once("./functions.php");

connect_to_mysql ("select lesson_name from lesson where lesson_id='".$lesson_id."'");
$row = mysql_fetch_assoc($res);
$applicated_lesson_name=$row['lesson_name'];

connect_to_mysql("select count(status) from applicant where status=0 and applicated_lesson_id='".$lesson_id."'");

$row = mysql_fetch_assoc($res);

if($row["count(status)"]<3){
    $go_to="./application.php";
}else{
    $go_to="./over.php";
    }
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript">    window.onload = function(){        document.postForm.submit();    }</script>
<style>
*{
font-family: '平成角ゴシック';
}
</style>
</head>
<body>

<form action=<?php echo $go_to?> method="POST" name="postForm">
<input type="hidden" name="lesson_id" value=<?php echo $lesson_id ?> />
</form>

</body>
</html>