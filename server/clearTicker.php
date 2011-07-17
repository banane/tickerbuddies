<?php

include('/home/so/socialpong.org/html/incs/dbcon.php');

$sql = 'truncate table ticker_trans';
mysql_query($sql);
echo "ticker cleared";
?>
