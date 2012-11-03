<?php
	if ($_POST) {
		
		@$lesson_name = $_POST['lesson_name'];
		
		@$start_month=$_POST['start_month'];
		@$start_day=$_POST['start_day'];
		@$start_hour=$_POST['start_hour'];
		@$start_minute=$_POST['start_minute'];
		@$finish_month=$_POST['finish_month'];
		@$finish_day=$_POST['finish_day'];
		@$finish_hour=$_POST['finish_hour'];
		@$finish_minute=$_POST['finish_minute'];
		
		@$teacher = $_POST['teacher'];
		@$laboratory = $_POST['laboratory'];
		@$place = $_POST['place'];
		@$fee = $_POST['fee'];
		
		$start=date("Y").'-'.$start_month.'-'.$start_day.' '.$start_hour.':'.$start_minute.':00';
		$finish=date("Y").'-'.$finish_month.'-'.$finish_day.' '.$finish_hour.':'.$finish_minute.':00';
		
		include_once("./functions.php");
		connect_to_mysql("update lesson set lesson_name='".$lesson_name."',start='".$start."',finish='".$finish."',teacher='".$teacher."',laboratory='".$laboratory."',place='".$place."',fee='".$fee."' where lesson_name='".$lesson_name."'");
		
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