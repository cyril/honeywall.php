function handleRequestStateChange(include) {
	if (xmlHttp.readyState == 4) {
		//document.getElementById('loading').innerHTML = '<p id="text">Loading...</p>';
		if (xmlHttp.status == 200) {
			try {
				handleServerResponse(include);
			} catch(e) {
				alert("Error reading the response: " + e.toString());
			}
		} else alert("There was a problem retrieving the data:\n" + xmlHttp.statusText);
	}
}
