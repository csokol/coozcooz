$(window).load(function() {
	window.refreshResults = function() {
		$.ajaxSetup({async:false});
		var ingredients = window.ingredients.getTags();
		var dislikes = window.dislikes.getTags();
	
		$.post("getRecipe.php", {ingredients: ingredients, dislikes: dislikes}, function(data) { // Do an AJAX call
			$("#content").html(data);
		});
	}
	
	var defaultMessage = "Nome de receita ou ingredientes";
	var input = $("#searchInput");
	input.attr('value', defaultMessage);
	input.css('color', "#aaaaaa");
	input.focus(function() {
		input.attr('value', "");
		input.css('color', "#000000");
	});
	
	$("#refineSearchForm").submit(function(e) {
		e.preventDefault();
		alert("Funcionalidade não implementada");
		/*var value = $(this).find('input').attr('value');
		$.ajaxSetup({async:false});
		$.post("getIngredients.php", {query: value}, function(data) { // Do an AJAX call
			alert(data);
			$.each(data, function(i, item) {
				window.ingredients.add(item);
				window.dislikes.remove(item);
				windiw.refreshResults();
			});
		}, "json");*/
	});
});
