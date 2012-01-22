/*function process(path, file, data, include) {
	if (xmlHttp) {
		try {
			xmlHttp.open("GET", path + file + "?" + data, true);
			xmlHttp.onreadystatechange = function() {
				handleRequestStateChange(include);
			};
			xmlHttp.send(null);
		} catch(e) {
			alert("Can't connect to server:\n" + e.toString());
		}
	}
}*/
function process(path, file, data, include) {
	if (xmlHttp) {
		try {
			if(xmlHttp != null) document.getElementById('loading').innerHTML = '<p id="text">Loading...</p>';
			xmlHttp.open("POST", path + file, true);
			xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
			xmlHttp.onreadystatechange = function() {
				handleRequestStateChange(include);
			};
			xmlHttp.send(data);
		} catch(e) {
			alert("Can't connect to server:\n" + e.toString());
		}
	}
}
