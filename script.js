
function startTime() {
    var today1 = new Date();
	var y = today1.getYear();
	var mn = today1.getMonth();
	var d = today1.getDate();
	var day = today1.getDay();
    var h = today1.getHours();
    var m = today1.getMinutes();
    var s = today1.getSeconds();
	if(h>12) {
		h-=12;
		mer = "PM";
	}else{
		mer = "AM";
	}
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt1').innerHTML =
    checkTime(h) + ":" + m + ":" + s + " " + mer;
	document.getElementById('txt2').innerHTML =
    nameday(day) + " " + checkTime(d) + "-" + checkTime(mn+1) + "-" + (y+1900);
    var t = setTimeout(startTime, 1000);
}
function nameday(i){
	var a = new Array(7);
	a[0] = "Sunday";
	a[1] = "Monday";
	a[2] = "Tuesday";
	a[3] = "Wednesday";
	a[4] = "Thursday";
	a[5] = "Friday";
	a[6] = "Saturday";
	return a[i];
}
function namemonth(i){
	var a = new Array(12);
	a[0] = "January";
	a[1] = "February";
	a[2] = "March";
	a[3] = "April";
	a[4] = "May";
	a[5] = "June";
	a[6] = "July";
	a[7] = "August";
	a[8] = "September";
	a[9] = "October";
	a[10] = "November";
	a[11] = "December";
	return a[i];
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
 