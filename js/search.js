$(window).load(function() {
	var defaultMessage = "Nome de receita ou ingredientes";
	var input = $("#searchInput");
	input.attr('value', defaultMessage);
	input.css('color', "#aaaaaa");
	input.focus(function() {
		input.attr('value', "");
		input.css('color', "#000000");
	});
	
	$("#searchForm").submit(function(e) {
		e.preventDefault();
		var value = input.attr('value');
		window.redirect("index.php?c=search&q=" + value);
	});
});
