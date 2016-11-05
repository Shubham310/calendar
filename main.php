

<?php
function leapyear($year){
	if ($year % 4 == 0) 
	return true; 
	return false;
}

function dayinmonth($month,$year){
	$x = (leapyear($year))? 29:28;
	
	$ar = array(31,$x,31,30,31,30,31,31,30,31,30,31);
	
	return $ar[$month];
}

function namemonth($i){
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

function dayone($date,$day){
	$date = $date%7;
	if($day >= $date){
		$day -= $date;
	}else{
		$day += (7-$date);
	}
	if($day == 6)
	return 0;
	else
	return $day+1;
}

function calendar($c,$y){
	//day
	$text1='';
	$text1 .= '<table cellspacing="0" border="0" width="100%">';
	$text1 .= '<tr>';
	$a[0]="Mo";
	$a[1]="Tu";
	$a[2]="We";
	$a[3]="Th";
	$a[4]="Fr";
	$a[5]="Sa";
	$a[6]="Su";
	for($i=0;$i<=6;$i++){
		$text1 .= '<td>'.$a[$i].'</td>';
	}
	$text1 .= '</tr></table>';
	
	$text1 .= '<table cellspacing="0" border="0" width="100%">';
	
	$mn = $c; 
	$d = date("d");
	$day = date("N");
	$y += 2000;
	
	
	
	if($day == 7) $day = 0;
	$mn = $mn - 1;
	$td = dayinmonth($mn,$y);
	$tdb = ($mn >= 1 ) ? dayinmonth($mn-1,$y):dayinmonth(11,$y-1);
	
	$s = namemonth($c-1);
	
	$dx = strtotime("1 $s $y");
	
	$od = date("N", $dx);
	if($od == 7) $od = 0;
	
	$text1 .= '<tr class="hov">';
	$c=0;
	$days = 1;
	$r = $tdb-5;
	if($od != 0)
		$r = ($tdb+1) - ($od-1);
	for($i = $r;$i<=$tdb;$i++,$c++)
		$text1 .= '<td class="xx">'.$i.'</td>';
	for($i=$c;$i<7;$i++,$days++)
		if(date("d")==$days && (date("m")+1)==($mn+2) && date("Y")== $y)
					$text1 .= '<td class="today">' .$days . '</td>';
				else $text1 .= '<td>' .$days. '</td>';
	$text1 .= '</tr>';
	
	for($i=0;$i<($td/7);$i++){
		$text1 .= '<tr class="hov">';
		for($j=0;$j<=6;$j++,$days++){
			if($days>$td )
			$text1 .= '<td class="xx">'.($days%$td). '</td>';
			else{
				//echo date("d").'/'.(date("m")+1).'/'.date("Y");
				//echo '  '.$d.'/'.($mn+2).'/'.$y.'<br>';
				if(date("d")==$days && (date("m")+1)==($mn+2) && date("Y")== $y)
					$text1 .= '<td class="today">' .$days . '</td>';
				else $text1 .= '<td>' .$days. '</td>';
				
				//if($days != $d) 
				//else $text1 .= '<td class="today">' .$days . '</td>';
			}
		}
		$text1 .= '</tr>';
	}
	$text1 .= '</table>';
	
	//if(date("d")==$d && date("m")==($mn+1) && date("Y")== $y)
	//	echo "Yeah!";
	//echo date("d").'/'.date("m").'/'.date("Y");
	//echo '  '.$d.'/'.$mn.'/'.$y;
	echo $text1;
}

?>