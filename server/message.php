<?php
include('/home/so/socialpong.org/html/incs/dbcon.php');

if($_REQUEST['m']){
	$s0 = 'update messages set message = "'.$_REQUEST['m'].'"';
	
	mysql_query($s0) or die ('Cant update message status'.mysql_error());
	echo "message updated";
} else {
	echo "no message";
}


?>
