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
			"10" => "Cebola",
			"11" => "Batata",
            "12" => "Farinha de trigo",
            "13" => "Margarina com sal",
            "14" => "Ovo",
            "15" => "Carne moída",
            "16" => "Batata palha",
            "17" => "Molho de tomate",
            "18" => "Catchup",
            "19" => "Queijo mussarela",
            "20" => "Creme de leite",
            "21" => "Margarina",
            "22" => "Salsa",
            "23" => "Queijo parmesão ralado",
            "24" => "Laranja",
            "25" => "Mostarda",
            "26" => "Pimenta",
            "27" => "Leite",
            "28" => "Amido de milho",
            "29" => "Requeijão"
		);
		$this->ingredients = $ingredients;
		
		$oil_ala_salt = array("id" => 0,
								"title" => "Óleo à sal e açucar",
	                             "time"=> 42,
	                             "rate"=> 3,
	                             "ingredients" => array(6, 7, 2, 1),
                                 "quantities" => array("1 colher", "2Kg","1 mucheia", "1 pouco"),
	                             "directions"=> "Pegue o sal, misture com o açucar e jogue o óleo. Sirva-se à vonts",
	                             "thumbUrl"=> "0.jpg",
                                 "photos" => array("0.jpg"),
                                 "evaluations"=> array()
	                             );
	                             
	    $chicken_ala_cheese = array("id" => 1,
	    						"title"=> "Frango recheado com queijo feta & tomate",
	                             "time"=> 105,
	                             "rate"=> 4,
	                             "ingredients" => array(0, 3, 5, 4),
                                 "quantities" => array("3 colheres", "1Kg","2 mucheias", "2 poucos"),
	                             "directions"=> "Lave o frango por dentro e por fora de frango e regue o frango com sumo de limao. Solte a pele do frango em seis a oito lugares e colocque as folhas de louro embaixo. Corte os tomates aos quartos, retire as sementes e corte em cubos. Descasque o alho e corte finamente em cubod. Arranque as folhas de oregano dos talos e pique finamente (lave tudo,claro).",

	                             "thumbUrl"=> "1.jpg",
                                 "photos" => array("1.jpg"),
                                 "evaluations"=> array()
	                             );
	    
	    $bourbon_chicken = array("id" => 2,
	    						"title"=> "Frango Bourbon",
	                             "time"=> 35,
	                             "rate"=> 3,
	                             "ingredients" => array(0, 8, 9, 10),
                                 "quantities" => array("1 peito", "2 tablets","1 dente", "1 cabeça"),
	                             "directions"=> "Heat oil in a large skillet. Add chicken pieces and cook until lightly browned. Remove chicken. Add remaining ingredients, heating over medium Heat until well mixed and dissolved. Add chicken and bring to a hard boil. Reduce heat and simmer for 20 minutes. Serve over hot rice and ENJOY.",
	                             "thumbUrl"=> "2.jpg",
                                 "photos" => array("2.jpg", "bourbon2.jpg", "bourbon3.jpg", "bourbon4.jpg","bourbon5.jpg"),
                                 "evaluations" => array(array("user"=> "jose", "photo"=>"jose.jpg", "rate"=>5, "comments"=> "Velho esta receita é muuuuuuuito boa. Fiz ela de olhos fechados e com o pé nas costa e ainda assim ficou uma delícia."), array("user"=> "maria", "photo"=>"maria.jpg", "rate"=>1, "comments"=> "Não gostei. Parece que precisa ter habilidades especiais pra fazer esta receita."))
	                             );
 	    $bolo_bat_carne = array("id" => 3,
 	    						"title"=> "Bolo de batata com Carne e Queijo",
 	                             "time"=> 60,
 	                             "rate"=> 5,
 	                             "ingredients" => array(11, 12, 13, 14, 6, 15, 10, 17, 18, 19, 2),
                                 "quantities" => array("3 colheres", "1Kg","2 mucheias", "2 poucos", "3 colheres", "1Kg","2 mucheias", "2 poucos", "3 colheres", "1Kg","2 mucheias"),
 	                             "directions"=> "Massa: Cozinhe as batatas com sal até que fiquem macias, passe-as pelo espremedor, adicione a margarina às batatas ainda quentes e amasse com as mãos. Junte os 2 ovos inteiros e vá adicionando aos poucos a farinha de trigo, continue amassando até a massa desgrudar das mãos. Reserve. Recheio: Tempere e carne moída com os temperos de sua preferência, refogue a cebola picadinha no óleo e acrescente a carne, cozinhe em fogo alto para que a carne fique bem soltinha. Depois de cozida acrescente a lata de molho de tomate pronto e o catchup, deixe apurar. Montagem: Coloque metade da massa de batata no fundo de um refratário espalhando com uma colher, por cima da massa coloque o molho de carne moída e por cima da carne. Alterne as fatias de queijo mussarela, finalize colocando sobre o queijo a outra metade da massa de batata. Pincele o bolo com uma gema e leve ao forno até dourar e o queijo derreter.",
 	                             "thumbUrl"=> "3.jpg",
                                 "photos" => array("3.jpg"),
                                 "evaluations"=> array()
 	                             );
	    $esc_frang_qj = array("id" => 4,
	    						"title"=> "Escondidinho especial de frango, creme de queijo e batata palha",
	                             "time"=> 50,
	                             "rate"=> 5,
	                             "ingredients" => array(0, 24, 25, 6, 26, 23, 16, 2, 11, 21, 27, 28, 29),
"quantities" => array("3 colheres", "1Kg","2 mucheias", "2 poucos", "3 colheres", "1Kg","2 mucheias", "2 poucos", "3 colheres", "1Kg","2 mucheias", "2 mucheias", "2 mucheias"),
	                             "directions"=> "Tempere as coxas com o suco de laranja, a mostarda, o sal, a pimenta, o alho e a cebola. Deixe marinar por 30 minutos. Em uma panela, aqueça o óleo e frite bem as coxas até ficarem douradas. Acrescente a marinada e deixe cozinhar até ficarem bem macias. Reserve. Purê: Cozinhe as batatas na água com sal até ficarem bem macias. Escorra e ainda quente passe no espremedor. Em uma panela, misture a batata, a margarina, o leite e o sal cozinhe por 2 minutos no fogo brando, sem parar de mexer. Reserve. Creme de queijo: Em uma panela, dissolva o amido no leite e leve ao fogo, mexendo sem parar até engrossar. Desligue o fogo, misture o requeijão e duas colheres de queijo ralado. Se necessário acrescente sal. Montagem: Desfie as coxas em pedaços grandes. Num refratário, forre o fundo e as laterais com o purê de batata, espalhe o frango e cubra com o creme de queijo. Polvilhe o queijo parmesão restante e cubra com a batata palha. Leve ao forno preaquecido a 200°C e asse durante 30 minutos.",
	                             "thumbUrl"=> "4.jpg",
	                             "photos" => array("4.jpg"),
                                 "evaluations"=> array()
	                             );
	                             
	    $this->recipes = array($oil_ala_salt, $chicken_ala_cheese, $bourbon_chicken, $bolo_bat_carne, $esc_frang_qj);
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
	    			foreach($ingredients as $ingredient) {
	    				$ingredientId = array_search($ingredient, $this->ingredients);
	    				if (in_array($ingredientId, $recipe['ingredients'])) {
	    					$nIng++;
	    				}
	    			}
					if ($nIng > 0) {
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
