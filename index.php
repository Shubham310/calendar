<?php

	$c = date('m');
	$y = date('y');
	
	if(isset($_POST['i'])){
		$t = $_POST['i'];
		$y = $_POST['year'];
		$c = $_POST['month'];
		//$c = $_GET['pid'];
		if($t == '+')
			$c +=1;
		else
			$c -=1;
		
		if($c==0) {$c=12;$y-=1;}
		if($c==13) {$c=1;$y+=1;}
	}
	
	function namemonth1($i){
		$a[0] = "January";
		$a[1] = "February";
		$a[2] = "March";
		$a[3] = "April";
		$a[4] = "May";
		$a[5] = "June";
		$a[6] = "July";
		$a[7] = "August";
		$a[8] = "September";
		$a[9] = "October";
		$a[10] = "November";
		$a[11] = "December";
		return $a[$i];
	}
	
?>
<!doctype html>
<html>
<head>


<link rel="stylesheet" text="text/css" href="style.css" />
<script src="script.js" type="text/javascript"></script>
</head>

<body onload="startTime()">
<div style="width:30%;float:left;background-color: #555;;">
<div id="txt1" style="width:95%;padding: 10px 0 0 0;margin-left: 5%;"></div>
<div class="box" style="width:95%;padding: 0 0 5px 0;margin-left: 5%;">
<div id="txt2"></div>
</div>
<div class="box" style="width:95%;padding: 5px 0 5px 0;margin-left: 5%;">
<div id="txt3" style="width:70%;float:left;"><?php  echo namemonth1($c-1).', '.$y; ?></div>
<div style="width:30%;float:left;margin:0px;">

<form class="f1" action="index.php" method="post" >
<input  style="display:none;" type="text" name="month" value="<?php echo ($c); ?>"/>
<input  style="display:none;" type="text" name="year" value="<?php echo ($y); ?>"/>
<input  type="submit" name="i" value="+"/>
<input  type="submit" name="i" value="-"/>
</form>

</div>
</div>

<div class="box" style="width:100%;margin:0;">
<?php include "main.php";
	calendar($c,$y);
 ?>


</div>
</div>
</body>
</html>