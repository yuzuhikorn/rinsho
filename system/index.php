<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=shift^jisP">
</head>
<body>
<form action="index.php" method="POST">
to:<input type="input" name="to"><br>
subject:<input type="input" name="subject"><br>
<input type="text" size="200" name="text"><br>
<input type="submit" value="submit">
</form>
<?php
print $to = $_POST['to'];
print $subject = $_POST['subject'];
print $message = $_POST['text'];
$header = 'Content-Type: text/plain;charset=ISO-2022-JP' . "\r\n" .
	'From: ぬるぽ <admin@dc10.etius.jp>' . "\r\n" .
	'Reply-To: yamanokama@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
if(mb_send_mail($to, $subject, $message, $header)){
print "success";
}else{
print "failed";
}
?>
</body>
</html>

