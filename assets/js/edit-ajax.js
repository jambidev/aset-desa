function loadDoc(tab, id) {
	var edit = new XMLHttpRequest();
	var target = document.getElementById("edit-ajax");
	edit.onreadystatechange = function() {
		if (edit.readyState == 4 && edit.status == 200) {
			$("#c-dp").remove();
			$.getScript("assets/js/plugins/datepicker/bootstrap-datepicker.js", function() {
				$("script:last").attr("id", "c-dp");
			});

			$("#c-ta").remove();
			$.getScript("assets/js/target-admin.js", function() {
				$("script:last").attr("id", "c-ta");
			});

			$("#c-fe").remove();
			$.getScript("assets/js/demos/form-extended.js", function() {
				$("script:last").attr("id", "c-fe");
			});

			$("#c-jbs").remove();
			$.getScript("assets/js/jenis-barang-selector.js", function() {
				$("script:last").attr("id", "c-jbs");
			});

			if(target) target.innerHTML = edit.responseText;
		}
	}
	edit.open("GET", "views/edit_view.php?tab=" + tab + "&id=" + id, true);
	edit.send();
}
