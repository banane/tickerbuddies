<?php
include('/home/so/socialpong.org/html/incs/dbcon.php');
	if($_GET['p']){
		$s2 = 'select sum(end_time) as end_time from ticker_trans where pos < '.$your_pos;
		$resp = mysql_query($s2) or die ('Cant get end time'.mysql_error());
		while($row = mysql_fetch_array($resp)){	
			echo $row['end_time'];
		}	
	}
if($_GET['dID']){

	// your start time
	// compare to current time
	// return difference, client determines offset or delay
	$sql1 = 'select pos from ticker_trans where deviceID = "'.$_GET['dID'].'"';
	$resp = mysql_query($sql1);
	while($row0 = mysql_fetch_array($resp)){
		if($row0['pos']==1){
			$timediff = 0;
			$skip=1;
		}
	}
	
	if(!$skip){
	
		$sql2 = 'select sum(t1.end_time), t2.mod_date, date_add(t2.mod_date, INTERVAL sum(t1.end_time) SECOND) as my_start_time from ticker_trans t1, ticker_trans t2  where t1.deviceID = "'.$_GET['dID'].'"  and t2.pos=1 group by t2.mod_date';
		$resp = mysql_query($sql2) or die ('Cant get end time2'.mysql_error());
		while($row = mysql_fetch_array($resp)){	
			$my_start_time  = $row['my_start_time'];			
		}	
	/*	echo "<hr>";
		echo	$my_start_time;
		echo "<hr>";*/
		$my_start_time_t = strtotime($my_start_time);
		$timediff = $my_start_time_t - mktime();
	}	
	echo $timediff;
}
  
?>