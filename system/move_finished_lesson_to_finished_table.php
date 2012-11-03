<?php
	include_once("./functions.php");
	connect_to_mysql("insert into finished_lesson select * from lesson where finish < NOW()");
	if(!$res){
		mysql_query( "rollback", $link);
		mysql_close($link);
		print "a";
	}else{
		mysql_query( "commit", $link);
		mysql_close($link);
		connect_to_mysql("delete from lesson where finish < NOW()");
		if(!$res){
			mysql_query( "rollback", $link);
			mysql_close($link);
			header("Location: ./failed.html");
		}else{
			mysql_query( "commit", $link);
			mysql_close($link);
			header("Location: ./compleate.html");
		}
	}
	?>