<?php
include('/home/so/socialpong.org/html/incs/dbcon.php');

if($_GET['dID']  && $_GET['a']){

	$s0 = 'select * from ticker_trans where deviceID="'.$_GET['dID'].'"';
	$resp = mysql_query($s0)or die (mysql_error());
	if(mysql_num_rows($resp)){
		while($row = mysql_fetch_array($resp)){
			echo $row['pos'];
		}
	} else {
	
		$s1 = 'select count(1) as your_pos from ticker_trans where pos > 0';
		$resp = mysql_query($s1) or die ('Does not return count'.mysql_error());
		while($row = mysql_fetch_array($resp)){
			$your_num = $row['your_pos']+1;		
			echo $your_num;
		}	
		$s0 = 'insert into ticker_trans (deviceID, pos, action) values ("'.$_GET['dID'].'",'.$your_num.',"'.$_GET['a'].'")';		
		mysql_query($s0) or die ('Cant insert ticker trans status'.mysql_error());
	}
	

}

?>
