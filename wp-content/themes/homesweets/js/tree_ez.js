$(document).ready(function(){
	// first example
	jQuery("#browser").treeview();

	// second example
	jQuery("#navigation").treeview({
		persist: "location",
		collapsed: true,
		unique: true
	});

	// third example
	jQuery("#red").treeview({
		animated: "fast",
		collapsed: true,
		unique: true,
		persist: "cookie",
		toggle: function() {
			window.console && console.log("%o was toggled", this);
		}
	});

	// fourth example
	jQuery("#black, #gray").treeview({
		control: "#treecontrol",
		persist: "cookie",
		cookieId: "treeview-black"
	});

});