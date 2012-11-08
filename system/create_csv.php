<?php
	include_once("./functions.php");
	connect_to_mysql("select * from lesson");
	$res1=$res;
	mysql_close($link);

//ヘッダー作成


        $todate = date("Y_m_d_H:i:s");
    $file_name="/home/rinshoundoshogai/www/system/csv/".$todate.".csv";
    $fp = fopen( $file_name, "w" );

    $contents = "\"研修ID\",\"研修名\",\"開始日時\",\"終了日時\",\"講師\"\n";
    fputs($fp, $contents);
        while($row1 = mysql_fetch_assoc($res1)){
        $contents = "\"" . $row1["研修ID"] . "\",\"" . $row1["研修名"] . "\",\"" . $row1["開始日時"] . "\",\"" . $row1["終了日時"] . "\",\"" . $row1["講師"] . "\"\n";
        fputs($fp, $contents);
        
        print $row1["研修ID"];
    }

    fclose( $fp );

	?>