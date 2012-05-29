function Manager(divName, initialTags) {
	obj = {
		div: $("#" + divName),
		setCookie: function() {
			var currentTags = this.getTags();
	        var cookie = currentTags.join(";");
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
	var ingredients = Manager("ingredients", initialIngredients);
	var dislikes = Manager("dislikes", initialDislikes);
	
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
			ingredients.add(ingredientName);
			dislikes.remove(ingredientName);
		});
		menu.find('.addDislike').click(function() {
			menu.remove();
            dislikes.add(ingredientName);
            ingredients.remove(ingredientName);
		});
		menu.slideDown("fast");
	});
	
});