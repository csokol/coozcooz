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
            "29" => "Requeijão",
            "30" => "Macarrão parafuso",
            "31" => "Milho verde",
            "32" => "Ervilha",
            "33" => "Óleo de soja",
            "34" => "Creme de leite",
            "35" => "Massa de tomate",
            "36" => "Leite",
            "37" => "Catupiry",
            "38" => "Presunto",
            "39" => "Alcatra",
            "40" => "Farinha de rosca",
            "41" => "Arroz",
            "42" => "Caldo de carne",
            "43" => "Salsinha"
		);
		$this->ingredients = $ingredients;
		
		$rice_simple = array(
            "id" => 0,
            "title" => "Arroz cozido",
            "time"=> 20,
            "rate"=> 4,
            "ingredients" => array(41, 6, 10, 2, 1),
            "quantities" => array("2 xícaras", "A gosto", "1/2", "2 colheres", "4 xícaras"),
            "directions"=> "Lave bem o arroz com água corrente, escorra e reserve. Coloque a água para ferver (sempre o dobro da quantidade de arroz que você for utilizar). Pique a cebola em pedaços bem pequenos. Coloque óleo numa panela e leve ao fogo para esquentar. Quando estiver bem quente, junte a cebola. Mexa e deixe dourar levemente. Junte o arroz e mexa bem. Quando secar completamente e, antes de começar a grudar no fundo da panela, despeje a água fervente e mexa bem. Tempere com sal. Abaixe o fogo e deixe cozinhar até a água secar totalmente. Vá provando para ver se o arroz já está cozido. Caso contrário, acrescente mais um pouco de água. Quando a água secar no fundo da panela, o arroz estará pronto.",
            "thumbUrl"=> "0.jpg",
            "photos" => array("0.jpg"),
            "evaluations"=> array()
        );
	                             
	    $chicken_ala_cheese = array(
            "id" => 1,
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
	    
	    $bourbon_chicken = array(
            "id" => 2,
            "title"=> "Frango Bourbon",
            "time"=> 35,
            "rate"=> 3,
            "ingredients" => array(0, 8, 9, 10),
            "quantities" => array("1 peito", "2 tablets","1 dente", "1 cabeça"),
            "directions"=> "Heat oil in a large skillet. Add chicken pieces and cook until lightly browned. Remove chicken. Add remaining ingredients, heating over medium Heat until well mixed and dissolved. Add chicken and bring to a hard boil. Reduce heat and simmer for 20 minutes. Serve over hot rice and ENJOY.",
            "thumbUrl"=> "2.jpg",
            "photos" => array("2.jpg", "bourbon2.jpg", "bourbon3.jpg", "bourbon4.jpg","bourbon5.jpg"),
            "evaluations" => array(array("user"=> "jose", "photo"=>"jose.jpg", "rate"=>5, "comments"=> "Velho esta receita é muuuuuuuito boa. Fiz ela estes dias e ficou uma delícia."), array("user"=> "maria", "photo"=>"maria.jpg", "rate"=>1, "comments"=> "Não gostei. Esta receita parece não ser muito gostosa."))
        );

 	    $bolo_bat_carne = array(
            "id" => 3,
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

	    $esc_frang_qj = array(
            "id" => 4,
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

  	    $mac_par = array(
            "id" => 5,
            "title"=> "Macarrão Parafuso ao Forno",
            "time"=> 30,
            "rate"=> 3,
            "ingredients" => array(30, 15, 31, 32, 10, 9, 17, 33, 34, 19, 6, 26),
            "quantities" => array("1 pacote", "500g", "1 lata", "1 lata", "1 (picada)", "5 gomos (picados)", "2 xícaras", "8 colheres (sopa)", "1 caixa", "150g", "A gosto", "A gosto"),
            "directions"=> "Cozinhe o macarrão parafuso e reserve. Aqueça o óleo e coloque para refogar a cebola com o alho. Acrescente a carne moída e tempere com sal e pimenta. Refogue bem a carne para que fique bem soltinha. Quando a carne estiver bem cozida acrescente o molho pronto de tomate, o milho verde e a ervilha e misture bem. Misture a parafuso cozido com o molho. Cubra com o creme de leite e com o queijo mussarela e leve ao forno para derreter o queijo.",
            "thumbUrl"=> "5.jpg",
            "photos" => array("5.jpg"),
            "evaluations"=> array()
        );

   	    $mac_crem = array(
            "id" => 6,
            "title"=> "Macarrão Cremoso ao Forno",
            "time"=> 30,
            "rate"=> 3,
            "ingredients" => array(30, 21, 10, 12, 35, 36, 37, 6, 26, 38, 23),
            "quantities" => array("500g", "3 colheres (sopa)", "1 (picada)", "3 colheres (sopa)", "4 colheres (sopa)", "3 xícaras (chá)", "100g", "A gosto", "A gosto", "200g", "1 xícara (chá)"),
            "directions"=> "Aqueça a água e cozinhe o macarrão até que fique al dente. Na panela, aqueça a margarina, doure a cebola e misture a farinha de trigo. Cozinhe sem parar de mexer até dourar a farinha. Junte a massa de tomate e, aos poucos, o leite quente. Mexa sem parar até engrossar. Misture o Catupiry, o sal e a pimenta. Unte um refratário com margarina, coloque camadas de macarrão, presunto e molho. Polvilhe o queijo ralado e leve ao forno, preaquecido, a 200º C durante 15 minutos ou até dourar.",
            "thumbUrl"=> "6.jpg",
            "photos" => array("6.jpg"),
            "evaluations"=> array()
        );
   	                             
	    $pure = array(
            "id" => 7,
            "title"=> "Purê de Batatas",
            "time"=> 30,
            "rate"=> 4,
            "ingredients" => array(11, 36, 21, 6, 9),
            "quantities" => array("1Kg", "1/2 xícara", "2 colheres (sopa)", "A gosto", "1 dente (amassado)"),
            "directions"=> "Cozinhe as batatas até ficarem bem molinhas. Descasque as ainda quentes, desde que consiga manuseá-las, esprema as batatas no espremedor. Leve-as a um recepiente e acrescente a margarina, o sal e o alho, mexa até que a margarina derreta por completo. Acrescente o leite aos poucos até que se obtenha a consistência desejada.",
            "thumbUrl"=> "7.jpg",
            "photos" => array("7.jpg"),
            "evaluations"=> array()
        );

 	    $bife_milan = array(
            "id" => 8,
            "title"=> "Bife à Milanesa",
            "time"=> 25,
            "rate"=> 5,
            "ingredients" => array(39, 9, 10, 14, 23, 40),
            "quantities" => array("300g (cortada em bifes)", "1 dente (amassado)", "1 colher (sobremesa); (picada)", "50g", "1 xícara (chá)"),
            "directions"=> "Tempere os bifes com o sal, o alho e a cebola. Reserve. Numa vasilha, bata ligeiramente os ovos e acrescente uma pitada de queijo parmesão e outra de sal. Reserve. Em outro recipiente, misture o restante do queijo parmesão com a farinha de rosca. Passe os bifes nos ovos batidos e em seguida na farinha de rosca. Frite-os em óleo bem quente e escorra o excesso de gordura em papel-toalha.",
            "thumbUrl"=> "8.jpg",
            "photos" => array("8.jpg"),
            "evaluations"=> array()
        );

        $carne_morrida = array("id" => 9,
            "title"=> "Carne Moída com Batata",
            "time"=> 25,
            "rate"=> 5,
            "ingredients" => array(2, 15, 11, 5, 10, 9, 26, 43),
            "quantities" => array("2 colheres", "300g", "1 cubo", "5", "3", "1 (pequena)", "1", "A gosto", "A gosto"),
            "directions"=> "Fritar a carne moída no óleo, mexendo sempre. Depois de frita a carne, acrescentar a cebola e o alho e deixar dourar. Colocar os tomates, a salsinha, a pimenta e o cubo de caldo. Acrescentar ½ xícara (chá) de água. Assim que começar a ferver, deixar mais 2 minutos e colocar as batatas. Tampar e deixar em fogo baixo até que as batatas fiquem macias.",
            "thumbUrl"=> "9.jpg",
            "photos" => array("9.jpg"),
            "evaluations"=> array()
        );
	                             
	    $this->recipes = array($rice_simple, $chicken_ala_cheese, $bourbon_chicken, $bolo_bat_carne,
            $esc_frang_qj, $mac_par, $mac_crem, $pure, $bife_milan, $carne_morrida);
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
    	if (is_array($ingredients) && count($ingredients) > 0) {
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
    	else {
    		if (is_array($dislikes)) {
    			foreach($this->recipes as $recipe) {
    				if (!DB::dislikeRecipe($recipe, $dislikes) ) {
    					$filtered[] = $recipe;
    				}
    			}
    		}
    		else {
	    		$filtered = $this->recipes;
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
