<?php
class DB {
	function __construct () {
		$ingredients = array(
			"0" => "Frango",
			"1" => "Água",
			"2" => "Óleo",
			"3" => "Limão",
			"4" => "Queijo",
			"5" => "Tomate",
			"6" => "Sal",
			"7" => "Açúcar",
			"8" => "Manteiga",
			"9" => "Alho",
			"10" => "Cebola"
		);
		$this->ingredients = $ingredients;
		
		$oil_ala_salt = array("id" => 0,
								"title" => "Óleo à sal e açucar",
	                             "time"=> 42,
	                             "rate"=> 3,
	                             "ingredients" => array(6, 7, 2, 1),
	                             "directions"=> "Pegue o sal, misture com o açucar e jogue o óleo. Sirva-se à vonts",
	                             "thumbUrl"=> "images/recipes/oil.jpg"
	                             );
	                             
	    $chicken_ala_cheese = array("id" => 1,
	    						"title"=> "Frango recheado com queijo feta & tomate",
	                             "time"=> 105,
	                             "rate"=> 4,
	                             "ingredients" => array(0, 3, 5, 4),
	                             "directions"=> "Lave o frango por dentro e por fora de frango e regue o frango com sumo de limao. Solte a pele do frango em seis a oito lugares e colocque as folhas de louro embaixo. Corte os tomates aos quartos, retire as sementes e corte em cubos. Descasque o alho e corte finamente em cubod. Arranque as folhas de oregano dos talos e pique finamente (lave tudo,claro).",
	                             "thumbUrl"=> "images/recipes/chicken.jpg"
	                             );
	    
	    $bourbon_chicken = array("id" => 2,
	    						"title"=> "Bourbon Chicken",
	                             "time"=> 35,
	                             "rate"=> 3,
	                             "ingredients" => array(0, 8, 9, 10),
	                             "directions"=> "Heat oil in a large skillet. Add chicken pieces and cook until lightly browned. Remove chicken. Add remaining ingredients, heating over medium Heat until well mixed and dissolved. Add chicken and bring to a hard boil. Reduce heat and simmer for 20 minutes. Serve over hot rice and ENJOY.",
	                             "thumbUrl"=> "images/recipes/bourbon.jpg"
	                             );
	                             
	    $this->recipes = array($oil_ala_salt, $chicken_ala_cheese, $bourbon_chicken);
	}

    public function getRecipe($i) {
    	if (isset($this->recipes[$i]))  {
	    	return $this->recipes[$i];
    	}
    	else {
    		return null;
    	}
    }
    public function getFilteredRecipes($ingredients, $dislikes) {
    	$match = array();
    	$filtered = array();
    	if (is_array($ingredients) ) {
	    	foreach($this->recipes as $recipe) {
	    		if (!DB::dislikeRecipe($recipe, $dislikes)) {
	    			$nIng = 0;
			    	foreach($recipe['ingredients'] as $ingredientId) {
						if (in_array($this->ingredients[$ingredientId], $ingredients)) {
							$nIng++;
						}
					}
					if ($nIng) {
						$match[] = array("n" => $nIng, "recipe" => $recipe);
					}
	    		}
	    	}
	    	
		    function cmp($a, $b) {   
			    if ($a['n'] == $b['n']) {
			    	return 0;
			    }
			    return ($a['n'] > $b['n']) ? -1 : 1;
			}
			usort($match, 'cmp');
			foreach($match as $mat) {
				$filtered[] = $mat['recipe'];
			}
    	}
    	
    	return $filtered;
    }
    private function dislikeRecipe($recipe, $dislikes) {
    	if (is_array($dislikes)) {
	    	foreach($recipe['ingredients'] as $ingredientId) {
	    		if (in_array($this->ingredients[$ingredientId], $dislikes)) {
	    			return true;
	    		}
	    	}
    	}
    	return false;
    }
    public function getIngredientName($id) {
    	if (isset($this->ingredients[$id])) {
    		return $this->ingredients[$id];
    	}
    	else {
    		return null;
    	}
    }
}
?>