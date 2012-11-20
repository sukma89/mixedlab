
var worker1 = new Worker ("inworker.js");
worker1.onmessage = function (e) {
	alert(e.data);
}

worker1.onerror = function (e) {
	alert("Error: " + e.filename + "(" + e.lineno + ") " + e.message); 
}
