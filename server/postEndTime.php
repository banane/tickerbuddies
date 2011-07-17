<?php
include('/home/so/socialpong.org/html/incs/dbcon.php');

print_r($_GET);
$s0 = 'update ticker_trans set end_time = '.$_GET['t'].' where deviceID = "'.$_GET['dID'].'"';		
echo $s0;
mysql_query($s0) or die ('Cant insert ticker trans status'.mysql_error());
echo $_GET['t'];
?>