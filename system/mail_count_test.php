<?php
	$a=$row['count(状態)'];
	include_once("./functions.php");
	connect_to_mysql("select count(状態) from applicant where 状態=1");
	$row = mysql_fetch_assoc($res);
	print($row['count(状態)']);
	mail_to_applicant("tyehai@gmail.com","テスト",$a);
	?>