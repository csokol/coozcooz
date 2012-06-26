$(window).load(function() {
	window.refreshResults = function() {
		$.ajaxSetup({async:false});
		var ingredients = window.ingredients.getTags();
		var dislikes = window.dislikes.getTags();
	
		$.post("getRecipe.php", {ingredients: ingredients, dislikes: dislikes}, function(data) { // Do an AJAX call
			$("#content").html(data);
		});
	}
	
	function resetInput(input) {
		input.attr('value', "Nome de receita ou ingredientes");
		input.css('color', "#aaaaaa");
	}
	
	var input = $("#searchInput");
	resetInput(input);
	input.focus(function() {
		input.attr('value', "");
		input.css('color', "#000000");
	});
	
	$("#refineSearchForm").submit(function(e) {
		e.preventDefault();
		var value = $(this).find('input').attr('value');
		$.ajaxSetup({async:false});
		
		$.post("getIngredients.php", {query: value}, function(data) { // Do an AJAX call
			$.each(data, function(i, item) {
				window.ingredients.add(item);
				window.dislikes.remove(item);
				window.refreshResults();
				resetInput(input);
				input.blur();
			});
		}, "json");
	});
});
