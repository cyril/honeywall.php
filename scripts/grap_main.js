(function() {
	var addEvent = function (obj,evType,fn) {
		if (obj.addEventListener) {
			obj.addEventListener(evType,fn,false)
		} else if (obj.attachEvent) obj.attachEvent("on"+evType,fn)
	}
	addEvent(document, 'mousedown', function(e) {
		var el = e.target||event.srcElement;
		if (!el.tagName) el=el.parentNode;
		if (el.tagName != "svg" && el.id != "network" && el.id != "mainwall") window.parent.handleResponse(el.id);
	});
})();