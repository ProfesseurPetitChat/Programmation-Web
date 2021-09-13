$().ready(function() {
	updateNumDices();
	$("#nDice").change(updateNumDices);
	$("#lancer").click(function() {
		var r=0;
		$(".dice").each(function(){
			r+=Math.floor(Math.random()*this.value)+1;
		});
		$("#result").val(r);
	});
});

function updateNumDices() {
	$("#facediv").html("");
	for(var i=0;i<$("#nDice").val();i++) {
		$("#facediv").append("<input type='number' class='dice' value='6'>");
	}
}