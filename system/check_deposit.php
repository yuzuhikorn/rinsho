<?php
	@$lesson_id = $_POST['lesson_id'];
	@$status = $_POST['status'];
	
	if( isset( $_POST['applicant_id']) ) {
		$counter=0;
		for( $i = 0; $i < count( $_POST['applicant_id'] ); $i++ ) {
			$applicant_id= $_POST['applicant_id'][$i]."<br>";
			include ('./update_this_applicant_status.php');
		}
	}
	
	if($counter!=count( $_POST['applicant_id'] )){
		header("Location: ./failed.html");
	}else{
		header("Location: ./compleate.html");
	}
	
	?>