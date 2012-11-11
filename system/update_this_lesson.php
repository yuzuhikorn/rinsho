<?php
	if ($_POST) {
		@$lesson_id = $_POST['研修ID'];
		@$lesson_name = $_POST['研修名'];
		
		@$start_month=$_POST['開始日時_month'];
		@$start_day=$_POST['開始日時_day'];
		@$start_hour=$_POST['開始日時_hour'];
		@$start_minute=$_POST['開始日時_minute'];
		@$finish_month=$_POST['終了日時_month'];
		@$finish_day=$_POST['終了日時_day'];
		@$finish_hour=$_POST['終了日時_hour'];
		@$finish_minute=$_POST['終了日時_minute'];
		
		@$teacher = $_POST['講師'];
		@$laboratory = $_POST['講師所属'];
		@$place = $_POST['会場'];
		@$fee = $_POST['料金'];
		@$party = $_POST['懇親会'];
		@$party_fee = $_POST['懇親会の料金'];
		
		if($party=="なし"){
		$party_fee="なし";
		}
		
		$start=date("Y").'-'.$start_month.'-'.$start_day.' '.$start_hour.':'.$start_minute.':00';
		$finish=date("Y").'-'.$finish_month.'-'.$finish_day.' '.$finish_hour.':'.$finish_minute.':00';
		
		include_once("./functions.php");
		connect_to_mysql("update lesson set 研修名='".$lesson_name."',開始日時='".$start."',終了日時='".$finish."',講師='".$teacher."',講師所属='".$laboratory."',会場='".$place."',料金='".$fee."',懇親会='".$party."',懇親会の料金='".$party_fee."' where 研修ID='".$lesson_id."'");
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