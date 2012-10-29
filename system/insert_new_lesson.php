<?php
	if ($_POST) {
		
		@$event_name = $_POST['event_name'];
		
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
		connect_to_mysql('insert into test_event (event_name,start,finish,teacher,laboratory,place,fee) values ("'.$event_name.'","'.$start.'","'.$finish.'","'.$teacher.'","'.$laboratory.'","'.$place.'","'.$fee.'")');
		
		
		
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