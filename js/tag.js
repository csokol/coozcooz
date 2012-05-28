$(window).load(function() {
	$(".tag").each(function() {
		var tag = $(this);
		tag.append("<span class='closeTag'>X</span>");
		tag.find('.closeTag').click(function() {
			tag.remove();
		});
	});
	$(".ingredient").click(function() {
		$(".ingredientMenu").each(function() {
			$(this).remove();
		})
		var ingredientName = $(this).html();
		var menu = $("<div class='ingredientMenu'>" + 
				"<span class='menuButton addIngredient roundedBordersTop'>Adicionar à lista</span>" + 
				"<span class='menuButton addDislike roundedBordersBottom'>Não gosto de " + ingredientName + "</span>"
				+ "</div>");
		$("body").append(menu);
		var position = $(this).position();
		var height = $(this).height();
		menu.css('left', position.left);
		menu.css('top', parseInt(position.top + height));
		menu.slideDown("fast");
	});
});
