<?php
	$a=$row['count(status)'];
	include_once("./functions.php");
	connect_to_mysql("select count(status) from applicant where status=1");
	$row = mysql_fetch_assoc($res);
	print($row['count(status)']);
	mail_to_applicant("tyehai@gmail.com","テスト",$a);
	?>