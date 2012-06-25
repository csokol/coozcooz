function getIngredientName(ingredientDiv) {
	var name = ingredientDiv.find('.ingredientName').html();
	name = name.replace(/\s+/g, '');
	return name;
}

function createTag(name) {
	return $(
			"<div class='tag'>" + 
				"<div class='ingredientName'>" + name + "</div>" +
				"<div class='showOptions'></div>" +
			"</div>"
	);
}

function Manager(divName, initialTags) {
	obj = {
		div: $("#" + divName),
		setCookie: function() {
			var currentTags = this.getTags();
	        var cookie = currentTags.join(";");
	        var date = new Date();
	        var timeQuantum = parseInt(date.getTime()) + 3600;
	        $.cookie(divName, cookie);
		},
		add: function(name) {
			var manager = this;
			
			var foundTag = false;
			manager.div.find(".tag").each(function() {
				var tagName = getIngredientName($(this));
		        if (tagName == name) {
		            foundTag = true;
		        }
		    });
			if (!foundTag) {
				var tag = createTag(name);
				
				tag.find('.showOptions').click(function() {
					if (divName == "ingredients") {
						var menu = getTagMenu(true);
					}
					else {
						var menu = getTagMenu(false);
					}
					
					positionMenu(menu, tag, name);
				});
				
		        manager.div.append(tag);
		        if (window.refreshResults) {
		        	window.refreshResults();
		        }
		        
		        manager.setCookie();
		    }
		},
		remove: function(name) {
			var manager = this; 
			manager.div.find(".tag").each(function() {
				var tagName = getIngredientName($(this));
		        if (tagName == name) {
		            $(this).remove();
		            if (window.refreshResults) {
			        	window.refreshResults();
			        }
		            manager.setCookie();
		        }
			});
		},
		getTags: function() {
			var array = [];
			this.div.find('.tag').each(function() {
				var tagName = getIngredientName($(this));
				array.push(tagName);
			});
			return array;
		}
	}
	
	if (initialTags) {
		$.each(initialTags, function(index, ingredient) {
			obj.add(ingredient);
		});
	}
	return obj;
}

function removeMenus() {
	$(".ingredientMenu").each(function() {
		$(this).remove();
	});
}

function getIngredientMenu(ingredientName) {
	var menu = $("<div class='ingredientMenu'>" + 
			"<span class='menuButton addIngredient roundedBordersTop'>Eu tenho</span>" + 
			"<span class='menuButton addDislike'>Não gosto</span>" +
			"<span class='menuButton closeMenu roundedBordersBottom'>X</span>" +
			"</div>");
	return menu;
}

function getTagMenu(like) {
	var menu = "<div class='ingredientMenu'>";
	if (like) {
		menu = menu + "<span class='menuButton addDislike roundedBordersTop'>Não gosto</span>";
	}
	else {
		menu = menu + "<span class='menuButton addIngredient roundedBordersTop'>Eu tenho</span>";
	}
	menu = menu + "<span class='menuButton remove'>Remover</span>";
	menu = menu + "<span class='menuButton closeMenu roundedBordersBottom'>X</span>";
	menu = menu + "</div>";
	menu = $(menu);
	return menu;
}

function positionMenu(menu, tag, ingredientName) {
	removeMenus();
	
	menu.find('.addIngredient').click(function() {
		menu.remove();
		window.ingredients.add(ingredientName);
		window.dislikes.remove(ingredientName);
	});
	menu.find('.addDislike').click(function() {
		menu.remove();
		window.dislikes.add(ingredientName);
		window.ingredients.remove(ingredientName);
	});
	menu.find('.remove').click(function() {
		menu.remove();
		window.ingredients.remove(ingredientName);
		window.dislikes.remove(ingredientName);
		tag.remove();
	});
	menu.find('.closeMenu').click(function() {
		menu.remove();
	});
	
	$("body").append(menu);
	var position = tag.position();
	var height = tag.height();
	var width = tag.width();
	var menuWidth = menu.width();
	menu.css('left', parseInt(position.left + width - menuWidth));
	menu.css('top', parseInt(position.top + height + 5));
	
	menu.slideDown("fast");
}

$(document).ready(function() {
	var cookie_ing = $.cookie("ingredients");
	var cookie_dis = $.cookie("dislikes");
	var initialIngredients = null;
	var initialDislikes = null;
	
	if (cookie_ing) {
		initialIngredients = cookie_ing.split(';');
	}
	if (cookie_dis) {
		initialDislikes = cookie_dis.split(';');
	}
	window.ingredients = Manager("ingredients", initialIngredients);
	window.dislikes = Manager("dislikes", initialDislikes);
	
	$(".ingredient").live('click', function() {
		var ingredientName = getIngredientName($(this));
		var menu = getIngredientMenu();
		positionMenu(menu, $(this), ingredientName);
	});
	
	$("#alsoHave input").css('color', "#aaaaaa");
	$("#alsoHave input").attr('value', "Digite ingrediente...");
	
	$("#alsoHave input").focus(function() {
		$(this).attr('value', "");
		$(this).css('color', "#000000");
	});
	$("#alsoHave input").blur(function() {
		$(this).css('color', "#aaaaaa");
		$(this).attr('value', "Digite ingrediente...");
	});
	
	$("#alsoDislike input").css('color', "#aaaaaa");
	$("#alsoDislike input").attr('value', "Digite ingrediente...");
	
	$("#alsoDislike input").focus(function() {
		$(this).attr('value', "");
		$(this).css('color', "#000000");
	});
	$("#alsoDislike input").blur(function() {
		$(this).css('color', "#aaaaaa");
		$(this).attr('value', "Digite ingrediente...");
	});
    
	$.get("getAllIngredients.php", function(ingredients) {
        $("#alsoHave input").autocomplete({
            source: ingredients,
            select: function(event, ui) {
            	window.ingredients.add(ui.item.value);
            	window.dislikes.remove(ui.item.value);
            	$(this).blur();
            },
            close: function() {
            	$(this).blur();
            },
            autoFocus: true
        });
        $("#alsoDislike input").autocomplete({
            source: ingredients,
            select: function(event, ui) {
                window.dislikes.add(ui.item.value);
                window.ingredients.remove(ui.item.value);
                $(this).blur();
            },
            close: function() {
            	$(this).blur();
            },
            autoFocus: true
        });
    }, "json");
});