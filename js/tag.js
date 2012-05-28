$(window).load(function() {
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
});
