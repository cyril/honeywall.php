window.onload = function () {
	/*var display_graphic = document.getElementById("display_graphic");
	display_graphic.onclick = function() {
		var data = "go=" + this.id + "&display=graphic";
		process("php/", "ajax.php", data, "zone_display");
	}
	var display_tree = document.getElementById("display_tree");
	display_tree.onclick = function() {
		var data = "go=" + this.id + "&display=tree";
		process("php/", "ajax.php", data, "zone_display");
	}
	var display_cloud = document.getElementById("display_cloud");
	display_cloud.onclick = function() {
		var data = "go=" + this.id + "&display=cloud";
		process("php/", "ajax.php", data, "zone_display");
	}
	var display_action = document.getElementById("display_action");
	display_action.onclick = function() {
		var data = "go=" + this.id + "&display=action";
		process("php/", "ajax.php", data, "zone_display");
	}*/
	//--
	var configuration_system = document.getElementById("go_system");
	configuration_system.onclick = function() {
		var data = "go=" + this.id + "&a=b";
		process("php/", "ajax.php", data, "zone_configuration");
	}
	var configuration_interface = document.getElementById("go_interface");
	configuration_interface.onclick = function() {
		var data = "go=" + this.id + "&a=b";
		process("php/", "ajax.php", data, "zone_configuration");
	}
	var configuration_zone = document.getElementById("go_zone");
	configuration_zone.onclick = function() {
		var data = "go=" + this.id + "&a=b";
		process("php/", "ajax.php", data, "zone_configuration");
	}
	var configuration_object = document.getElementById("go_object");
	configuration_object.onclick = function() {
		var data = "go=" + this.id + "&a=b";
		process("php/", "ajax.php", data, "zone_configuration");
	}
	var configuration_ip = document.getElementById("go_ip");
	configuration_ip.onclick = function() {
		var data = "go=" + this.id + "&a=b";
		process("php/", "ajax.php", data, "zone_configuration");
	}
	var configuration_translation = document.getElementById("go_translation");
	configuration_translation.onclick = function() {
		var data = "go=" + this.id + "&a=b";
		process("php/", "ajax.php", data, "zone_configuration");
	}
}

window.onsubmit = function () {
	if (document.getElementById("id").value == "") {
		//then we know that it s a new element
		var data = "insert=";
	} else {
		//then we know that it s an update
		var data = "update=";
	}
	
	
	
	
	
	
	if (document.getElementById("table").value == "systems") {
		data = data + "configuration_system";
		data = data + "&" + "id" + "=" + document.getElementById('id').value;
		data = data + "&" + "name" + "=" + document.getElementById('name').value;
		data = data + "&" + "description" + "=" + document.getElementById('description').value;
		data = data + "&" + "gateway" + "=" + document.getElementById('gateway').value;
		data = data + "&" + "dns" + "=" + document.getElementById('dns').value;
		data = data + "&" + "password" + "=" + document.getElementById('password').value;
		process("php/", "ajax.php", data, "form_info");
		return false;
	} else if (document.getElementById("table").value == "interfaces") {
		data = data + "configuration_interface";
		data = data + "&" + "id" + "=" + document.getElementById('id').value;
		data = data + "&" + "name" + "=" + document.getElementById('name').value;
		data = data + "&" + "macro" + "=" + document.getElementById('macro').value;
		data = data + "&" + "ip" + "=" + document.getElementById('ip').value;
		data = data + "&" + "mask" + "=" + document.getElementById('mask').value;
		process("php/", "ajax.php", data, "form_info");
		return false;
	} else if (document.getElementById("table").value == "zones") {
		data = data + "configuration_zone";
		data = data + "&" + "id" + "=" + document.getElementById('id').value;
		data = data + "&" + "name" + "=" + document.getElementById('name').value;
		data = data + "&" + "interface_id" + "=" + document.getElementById('interface_id').value;
		process("php/", "ajax.php", data, "form_info");
		return false;
	} else if (document.getElementById("table").value == "objects") {
		data = data + "configuration_object";
		data = data + "&" + "id" + "=" + document.getElementById('id').value;
		data = data + "&" + "name" + "=" + document.getElementById('name').value;
		data = data + "&" + "objectoption_id" + "=" + document.getElementById('objectoption_id').value;
		data = data + "&" + "zone_id" + "=" + document.getElementById('zone_id').value;
		process("php/", "ajax.php", data, "form_info");
		return false;
	} else if (document.getElementById("table").value == "ips") {
		data = data + "configuration_ip";
		data = data + "&" + "id" + "=" + document.getElementById('id').value;
		data = data + "&" + "address" + "=" + document.getElementById('address').value;
		data = data + "&" + "object_id" + "=" + document.getElementById('object_id').value;
		process("php/", "ajax.php", data, "form_info");
		return false;
	} else if (document.getElementById("table").value == "translations") {
		data = data + "configuration_translation";
		data = data + "&" + "id" + "=" + document.getElementById('id').value;
		data = data + "&" + "srcport" + "=" + document.getElementById('srcport').value;
		data = data + "&" + "dstport" + "=" + document.getElementById('dstport').value;
		data = data + "&" + "staticport" + "=" + document.getElementById('staticport').value;
		data = data + "&" + "interfaceway_id" + "=" + document.getElementById('interfaceway_id').value;
		data = data + "&" + "enabletranslation_id" + "=" + document.getElementById('enabletranslation_id').value;
		data = data + "&" + "action_id" + "=" + document.getElementById('action_id').value;
		data = data + "&" + "passtranslation_id" + "=" + document.getElementById('passtranslation_id').value;
		data = data + "&" + "log_id" + "=" + document.getElementById('log_id').value;
		data = data + "&" + "networkprotocol_id" + "=" + document.getElementById('networkprotocol_id').value;
		data = data + "&" + "transportprotocol_id" + "=" + document.getElementById('transportprotocol_id').value;
		data = data + "&" + "addresspool_id" + "=" + document.getElementById('addresspool_id').value;
		data = data + "&" + "stickyconnection_id" + "=" + document.getElementById('stickyconnection_id').value;
		data = data + "&" + "srcobject_id" + "=" + document.getElementById('srcobject_id').value;
		data = data + "&" + "dstobject_id" + "=" + document.getElementById('dstobject_id').value;
		data = data + "&" + "extobject_id" + "=" + document.getElementById('extobject_id').value;
		process("php/", "ajax.php", data, "form_info");
		return false;
	}
}
/*function open_id(table) {
	if (table == "systems") {
		var data = "open=" + "configuration_system";
				data = data + "&" + "id" + "=" + document.getElementById('id').value;
		process("php/", "ajax.php", data, "zone_display");
		return false;
	}
}*/
/*function close_id(table) {
	if (table == "systems") {
		var data = "close=" + "configuration_system";
				data = data + "&" + "id" + "=" + document.getElementById('id').value;
		process("php/", "ajax.php", data, "zone_display");
		return false;
	}
}*/
function delete_id(table) {
	if (confirm("Are you sure?")) {
		if (table == "systems") {
			var data = "delete=" + "configuration_system";
					data = data + "&" + "id" + "=" + document.getElementById('id').value;
			process("php/", "ajax.php", data, "zone_display");
			return false;
		} else if (table == "interfaces") {
			var data = "delete=" + "configuration_interface";
					data = data + "&" + "id" + "=" + document.getElementById('id').value;
			process("php/", "ajax.php", data, "zone_display");
			return false;
		} else if (table == "zones") {
			var data = "delete=" + "configuration_zone";
					data = data + "&" + "id" + "=" + document.getElementById('id').value;
			process("php/", "ajax.php", data, "zone_display");
			return false;
		} else if (table == "objects") {
			var data = "delete=" + "configuration_object";
					data = data + "&" + "id" + "=" + document.getElementById('id').value;
			process("php/", "ajax.php", data, "zone_display");
			return false;
		} else if (table == "ips") {
			var data = "delete=" + "configuration_ip";
					data = data + "&" + "id" + "=" + document.getElementById('id').value;
			process("php/", "ajax.php", data, "zone_display");
			return false;
		} else if (table == "translations") {
			var data = "delete=" + "configuration_translation";
					data = data + "&" + "id" + "=" + document.getElementById('id').value;
			process("php/", "ajax.php", data, "zone_display");
			return false;
		}
	}
}