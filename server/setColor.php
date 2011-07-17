<?php
include('/home/so/socialpong.org/html/incs/dbcon.php');

?>

<html>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script> 

<style type="text/css">
	body {
		font-family:"lucida grande", arial;
		size:64px;
		color:gray;	
		margin:100px;
}

.color {
  height:100px;
  width:100px;
  margin:5px;
  display:inline-block;
}

.chosen-color input#chosen-message{
  font-size:150px;
  font-weight:bold;
  font-family: 'American Typewriter', Courier, 'Courier New';
}

#redColor  {
	background-color:red;
}
#blueColor {
	background-color:blue;
}
#yellowColor {
	background-color:yellow;
}
#blueColor {
	background-color:blue;
}
#purpleColor {
	background-color:purple;
}
#blackColor {
	background-color:black;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('.color').click(function(){
		var newcolor = $(this).attr('color');
		$.post('http://socialpong.org/tickerbuddies/color.php',{c:newcolor});
		$('#current').css('color',newcolor);
		$('#chosen-message').css('color',newcolor);
	});
	$('#chosen-message').focusout(function(){
	  $.post('http://socialpong.org/tickerbuddies/message.php',{m:$(this).attr('value')},function(response){
	  //	alert(response);
	  });
	});
});
</script>
</head>
<body>
<p style="text-align:center;">Current Color</p>
<div>
<center>
  <?php 
  $resp = mysql_query('select color, message from color, messages where messages.live=1');
  while($row = mysql_fetch_array($resp)){
  	echo '<div class="chosen-color" style="margin-bottom:20px; color:'.$row['color'].'" id=current>';
  	echo '<input id="chosen-message" size="100" type="text" value="'.$row['message'].'">';
  	echo '</div>';
  }
  ?></div>
  <center>
  <div style="border-bottom:#ababab dashed 3px;width:600px;display:block;margin-bottom:40px;"></div>
  <p>Set Color</p>
  <div style="width:600px;">
  <div id="redColor" class="color" color="red"></div>
  <div id="blueColor" class="color" color="blue"></div>
  <div id="yellowColor" class="color" color="yellow"></div>
  <div id="blackColor" class="color" color="black"></div>
  <div id="purpleColor" class="color" color="purple"></div>
  </div>
  </center>
</center>
</body>
</html>