$(window).load(function() {
	window.refreshResults = function() {
		$.ajaxSetup({async:false});
		var ingredients = window.ingredients.getTags();
		var dislikes = window.dislikes.getTags();
	
		$.post("getRecipe.php", {ingredients: ingredients, dislikes: dislikes}, function(data) { // Do an AJAX call
			$("#main").html(data);
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
		var value = input.attr('value');
		$.ajaxSetup({async:false});
		$.post("getIngredients.php", {query: value}, function(data) { // Do an AJAX call
			$.each(data, function(i, item) {
				var tag = newTag(item);
				var ingredientsDiv = $("#ingredients");
				var foundTag = false;
				ingredientsDiv.find(".tag").each(function() {
					var tagName = $(this).find('.tagName').html();
					if (tagName == item) {
						foundTag = true;
					}
				});
				if (!foundTag) {
					$("#ingredients").append(tag);
				}
			});
			postRequest();
		}, "json");
	});
	
	$.get("getAllIngredients.php", function(ingredients) {
        $("#alsoHave input").autocomplete({
            source: ingredients,
            select: function(event, ui) {
            	window.ingredients.add(ui.item.value);
            },
            close: function() {
            	$("#alsoHave input").val("Também tenho...");
            }
        });
        $("#alsoDislike input").autocomplete({
            source: ingredients,
            select: function(event, ui) {
                window.dislikes.add(ui.item.value);
            },
            close: function() {
            	$("#alsoDislike input").val("Também não gosto...");
            }
        });
    }, "json");
    
    $("#alsoHave input").keyup(function() {
    })
    
});
