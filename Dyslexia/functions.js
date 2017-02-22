$("input").keypress(function(event) {
	//Button fades in
	$("#goButton").fadeIn("1500").css("display", "block");
	//When enter key is pressed
	if (event.which === 13) {
		var text = $(this).val();
		$(this).val("");
		$("#container").fadeOut(700, function() {
			$("#container2").fadeIn(1000);
			$("body").css("background", "rgb(53,45,56)");
			$("#text").text(text);
		});
	}
});

$("#goButton").click(function() {
	//When button is clicked
	var text = $("input").val();
	$("input").val("");
	$("#container").fadeOut(700, function() {
		$("#container2").fadeIn(1000);
		$("body").css("background", "rgb(53,45,56)");
		$("#text").text(text);
	})
});

$("#goButton").mouseenter(function() {
	$(this).css({
		background: "rgb(253,238,237)",
		color: "rgb(53,45,56)",
	})
	$(this).text("Let's do this!");
});

$("#goButton").mouseleave(function() {
	$(this).css({
		background: "rgb(53,45,56)",
		color: "rgb(253,238,237)"
	})
	$(this).text("Click here!");
});

$("#container2 div").mouseenter(function() {
	$(this).css({
		background: "rgb(234,209,205)",
		color: "rgb(53,45,56)",
		border: "5px solid rgb(163,118,119)"
	})
});

$("#container2 div").mouseleave(function() {
	$(this).css({
		background: "rgb(53,45,56",
		color: "rgb(234,209,205)",
		border: "5px solid rgb(234,209,205)"
	})
});

$("#up").click(function() {
	var font_size = parseFloat($("#text").css("font-size"));
	font_size = font_size +  7;
	font_size = font_size + "px";
	$("#text").css("font-size", font_size);
	resetButton();
});

$("#down").click(function() {
	var font_size = parseFloat($("#text").css("font-size"));
	font_size = font_size - 7;
	font_size = font_size + "px";
	$("#text").css("font-size", font_size);
	resetButton();
});

$("#random").click(function() {
	alert("Sorry, this function will be available soon.\n\n\t\t- Win Wong")
	resetButton();
});

$("#new").click(function() {
	$("#container2").fadeOut(700, function() {
		$("#goButton").css("display", "none");
		$("#container").fadeIn(1000);
		$("body").css("background", "rgb(234,209,205)");
	});
	resetButton();
});

// For mobile view
function resetButton() {
	$("#container2 div").css({
		background: "rgb(53,45,56)",
		color: "rgb(234,209,205)"
	});
}