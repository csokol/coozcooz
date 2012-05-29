function Manager(divName, title, text) {
	return {
		div: $("#" + divName),
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
				tag.find('.closeTag').click(function() {
					tag.remove();
					if (window.refreshResults) {
			        	window.refreshResults();
			        }
				});
		        this.div.append(tag);
		        if (window.refreshResults) {
		        	window.refreshResults();
		        }
		    }
		},
		remove: function(name) {
			this.div.find(".tag").each(function() {
				var tagName = $(this).find('.tagName').html();
		        if (tagName == name) {
		            $(this).remove();
		            if (window.refreshResults) {
			        	window.refreshResults();
			        }
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
	};
}

$(document).ready(function() {
	var ingredients = Manager("ingredients", "Eu tenho", "Eu também tenho...");
	var dislikes = Manager("dislikes", "Não gosto", "Eu também não gosto...");
	
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