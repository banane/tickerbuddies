<?php

include('/home/so/socialpong.org/html/incs/dbcon.php');

$sql = 'select color from color';
$r = mysql_query($sql);
while($r0 = mysql_fetch_array($r)){
	echo $r0['color'] . "Color";
}



?>