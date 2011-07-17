<?php
include('/home/so/socialpong.org/html/incs/dbcon.php');
if($_GET['dID']){
	$sql = 'update ticker_trans set tmp = "hey", mod_date = now() where deviceID = "'.$_GET['dID'].'" and pos=1';
//	echo $sql;
//	echo "in cond";
	mysql_query($sql);
}
	$s1 = 'select message from messages where live=1 limit 0,1';

	$resp = mysql_query($s1) or die ('Does not return message'.mysql_error());
	while($row = mysql_fetch_array($resp)){
		echo $row['message'];		
	}	
	
	?>