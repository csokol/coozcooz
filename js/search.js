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
                addIngredient(ui.item.value);
            },
            close: function() {
            	$("#alsoHave input").val("Também tenho...");
            }
        });
        $("#alsoDislike input").autocomplete({
            source: ingredients,
            select: function(event, ui) {
                addDislike(ui.item.value);
            },
            close: function() {
            	$("#alsoDislike input").val("Também não gosto...");
            }
        });
    }, "json");
    
    $("#alsoHave input").keyup(function() {
    })
    
});
