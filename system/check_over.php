<?php
if ($_POST) {

@$event_id = $_POST['event_id'];

include_once("./functions.php");

connect_to_mysql ("select event_name from test_event where event_id='".$event_id."'");
$row = mysql_fetch_assoc($res);
$applicated_event_name=$row['event_name'];

connect_to_mysql("select count(status) from test_applicant where status=0 and applicated_event_id='".$event_id."'");

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
<input type="hidden" name="event_id" value=<?php echo $event_id ?> />
</form>

</body>
</html>