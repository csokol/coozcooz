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
			var foundTag = false;
			this.div.find(".tag").each(function() {
		        var tagName = $(this).find('.tagName').html();
		        if (tagName == name) {
		            foundTag = true;
		        }
		    });
			if (!foundTag) {
				var tag = $("<div class='tag'>" + "<span class='tagName'>" + name + "</span><span class='closeTag'>X</span></div>");
				
				var me = this;
				tag.find('.closeTag').click(function() {
					me.remove(name);
					if (window.refreshResults) {
			        	window.refreshResults();
			        }
				});
				
		        this.div.append(tag);
		        if (window.refreshResults) {
		        	window.refreshResults();
		        }
		        
		        this.setCookie();
		    }
		},
		remove: function(name) {
			var me = this; 
			this.div.find(".tag").each(function() {
				var tagName = $(this).find('.tagName').html();
		        if (tagName == name) {
		            $(this).remove();
		            if (window.refreshResults) {
			        	window.refreshResults();
			        }
		            me.setCookie();
		        }
			});
		},
		getTags: function() {
			var array = [];
			this.div.find('.tag').each(function() {
				var tagName = $(this).find('.tagName').html();
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
		var ingredientName = $(this).html();
		$(".ingredientMenu").each(function() {
			$(this).remove();
		});
		
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
			menu.remove();
			window.ingredients.add(ingredientName);
			window.dislikes.remove(ingredientName);
		});
		menu.find('.addDislike').click(function() {
			menu.remove();
			window.dislikes.add(ingredientName);
			window.ingredients.remove(ingredientName);
		});
		menu.slideDown("fast");
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