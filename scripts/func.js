function handleResponse(idstr) {
	
	var word = idstr.split("_");
	var table = word[0];
	var id    = word[1];
	
	var data = "go=go_" + table + "&key=" + id;
	process("php/", "ajax.php", data, "zone_configuration");
}