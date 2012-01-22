function createXmlHttpRequestObject() {
	var xmlHttp;
	try {
		xmlHttp = new XMLHttpRequest();
	} catch(e) {
		try {
			xmlHttp = new ActiveXObject("Microsoft.XMLHttp");
		} catch(e) {}
	}
	if (!xmlHttp) alert("Error creating the XMLHttpRequest object.");
	else return xmlHttp;
}
