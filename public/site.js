console.log('coucou');
var request = new XMLHttpRequest();
request.open("POST", "http://api.resmush.it/ws.php?img=/Users/eleusis/Document/Images/Images/bouletmaton.jpg");
request.setRequestHeader("Content-Type", "application/json");
request.send(JSON.stringify(jsonBody));


let request = new XMLHttpRequest();
request.onreadystatechange = function() {
	if(this.readyState = XMLHttpRequest.DONE && this.status == 200) {
		let response = JSON.parse(this.responseText);
		document.getElementById('compressedImg').textContent = ("Image compressée");
		console.log(response.src);
	}
};
request.open("GET", "http://api.resmush.it/ws.php?img=/Users/eleusis/Document/Images/Images/bouletmaton.jpg");
request.send();