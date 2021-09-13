$().ready(function () {
	$("#theId").change(function() {
		$.get("ajax.php",
			{id:$("#theId").val()},
			function(data) {
				$("#Nom").val(data.Nom);
				$("#Prenom").val(data.Prenom);
			},
			"json");
	});
});