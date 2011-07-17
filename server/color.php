<?php

include('/home/so/socialpong.org/html/incs/dbcon.php');

if($_REQUEST['c']){
  $sql = 'update color set color = "'.$_REQUEST['c'].'"';
	mysql_query($sql);
} else {
	echo "no color";
}



?>