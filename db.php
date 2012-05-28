<?php
class DB {
	function __construct () {
		$oil_ala_salt = array("title"=> "Óleo à sal e açucar",
	                             "time"=> 42,
	                             "rate"=> 3,
	                             "ingredients" => array("Sal", "Açúcar", "Óleo", "Água"),
	                             "directions"=> "Pegue o sal, misture com o açucar e jogue o óleo. Sirva-se à vonts",
	                             "thumbUrl"=> "images/recipes/oil.jpg"
	                             );
	                             
	    $chicken_ala_cheese = array("title"=> "Frango recheado com queijo feta & tomate",
	                             "time"=> 105,
	                             "rate"=> 4,
	                             "ingredients" => array("Frango", "Limão", "Tomate", "Queijo"),
	                             "directions"=> "Lave o frango por dentro e por fora de frango e regue o frango com sumo de limao. Solte a pele do frango em seis a oito lugares e colocque as folhas de louro embaixo. Corte os tomates aos quartos, retire as sementes e corte em cubos. Descasque o alho e corte finamente em cubod. Arranque as folhas de oregano dos talos e pique finamente (lave tudo,claro).",
	                             "thumbUrl"=> "images/recipes/chicken.jpg"
	                             );
	    
	    $bourbon_chicken = array("title"=> "Bourbon Chicken",
	                             "time"=> 35,
	                             "rate"=> 3,
	                             "ingredients" => array("Frango", "Manteiga", "Alho", "Cebola", "Água"),
	                             "directions"=> "Heat oil in a large skillet. Add chicken pieces and cook until lightly browned. Remove chicken. Add remaining ingredients, heating over medium Heat until well mixed and dissolved. Add chicken and bring to a hard boil. Reduce heat and simmer for 20 minutes. Serve over hot rice and ENJOY.",
	                             "thumbUrl"=> "images/recipes/bourbon.jpg"
	                             );
	                             
	    $this->recipes = array($this->oil_ala_salt, $this->chicken_ala_cheese, $this->bourbon_chicken);
	}

    public function getRecipe($i) {
    	return $this->recipes[$i];
    }
    public function getFilteredRecipes($ingredients, $dislikes) {
    	$filtered = array();
    	foreach($this->recipes as $recipe) {
	    	foreach($recipe['ingredients'] as $ingredient) {
				if (in_array($ingredient, $ingredients)) {
					$filtered[] = $recipe;
					break;
				}
			}
    	}
    	return $filtered;
    }
}
?>