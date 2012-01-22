function handleServerResponse(include) {
	document.getElementById('loading').innerHTML = '';
	response = xmlHttp.responseText;
	if (include == 'network') {
		var object = document.getElementById('object');
		svgDocument = object.getSVGDocument();
		myDiv = svgDocument.getElementById(include);	
	} else {
		myDiv = document.getElementById(include);
	}
	myDiv.innerHTML = response;
}
