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
		@$party = $_POST['party'];
		@$party_fee = $_POST['party_fee'];
		
		if($party=="なし"){
		$party_fee="なし";
		}
		
		$start=date("Y").'-'.$start_month.'-'.$start_day.' '.$start_hour.':'.$start_minute;
		$finish=date("Y").'-'.$finish_month.'-'.$finish_day.' '.$finish_hour.':'.$finish_minute;
		
		
		include_once("./functions.php");
		connect_to_mysql('insert into lesson (研修名,開始日時,終了日時,講師,講師所属,会場,料金,懇親会,懇親会の料金) values ("'.$lesson_name.'","'.$start.'","'.$finish.'","'.$teacher.'","'.$laboratory.'","'.$place.'","'.$fee.'","'.$party.'","'.$party_fee.'")');
		
		
		
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