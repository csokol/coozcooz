$(window).load(function() {
    
     function addIngredient(ingredientName, menu) {
         var ingredientsDiv = $("#ingredients");
            if (ingredientsDiv) {
                var foundTag = false;
                $("#dislikes").find(".tag").each(function() {
                    var tagName = $(this).find('.tagName').html();
                    if (tagName == ingredientName) {
                        $(this).remove();
                    }
                });
                ingredientsDiv.find(".tag").each(function() {
                    var tagName = $(this).find('.tagName').html();
                    if (tagName == ingredientName) {
                        foundTag = true;
                    }
                });
                if (!foundTag) {
                    var tag = newTag(ingredientName);
                    ingredientsDiv.append(tag);
                    postRequest();
                    menu.remove();
                }
            }
    };
	function addCloseButton(tag) {
		tag.append("<span class='closeTag'>X</span>");
		tag.find('.closeTag').click(function() {
			tag.remove();
			var ingredientsArray = getListOfIngredients();
			window.refreshResults(ingredientsArray);
		});
	}
	function newTag(name) {
		var tag = $("<div class='tag'>" + "<span class='tagName'>" + name + "</span>" + "</div>");
		addCloseButton(tag);
		return tag;
	}
	function getListOfIngredients() {
		var array = [];
		$("#ingredients").find('.tag').each(function() {
			var tagName = $(this).find('.tagName').html();
			array.push(tagName);
		});
		return array;
	}
	function getListOfDislikes() {
		var array = [];
		$("#dislikes").find('.tag').each(function() {
			var tagName = $(this).find('.tagName').html();
			array.push(tagName);
		});
		return array;
	}
	function postRequest() {
		var ingredients = getListOfIngredients();
		var dislikes = getListOfDislikes();
		window.refreshResults(ingredients, dislikes);
	}
	
	$(".tag").each(function() {
		var tag = $(this);
		addCloseButton(tag);
	});
	
	$(".ingredient").live('click', function() {
		$(".ingredientMenu").each(function() {
			$(this).remove();
		})
		var ingredientName = $(this).html();
		var menu = $("<div class='ingredientMenu'>" + 
				"<span class='menuButton addIngredient roundedBordersTop'>Eu tenho</span>" + 
				"<span class='menuButton addDislike roundedBordersBottom'>Não gosto</span>"
				+ "</div>");
		$("body").append(menu);
		var position = $(this).position();
		var height = $(this).height();
		menu.css('left', position.left);
		menu.css('top', parseInt(position.top + height));
		menu.find('.addIngredient').click(function() {
			addIngredient(ingredientName, menu);
		});
		menu.find('.addDislike').click(function() {
			var dislikeDiv = $("#dislikes");
			var foundTag = false;
			
			$("#ingredients").find(".tag").each(function() {
				var tagName = $(this).find('.tagName').html();
				if (tagName == ingredientName) {
					$(this).remove();
				}
			});
			dislikeDiv.find(".tag").each(function() {
				var tagName = $(this).find('.tagName').html();
				if (tagName == ingredientName) {
					foundTag = true;
				}
			});
			if (!foundTag) {
				var tag = newTag(ingredientName);
				tag.addClass("dislike");
				dislikeDiv.append(tag);
				postRequest();
				menu.remove();
			}
		});
		menu.slideDown("fast");
	});
	
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
	
	window.refreshResults = function(ingredients, dislikes) {
		$.ajaxSetup({async:false});
		$.post("getRecipe.php", {ingredients: ingredients, dislikes: dislikes}, function(data) { // Do an AJAX call
			$("#results").html(data);
		});
	}
});
