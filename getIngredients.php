<?php
	include_once("db.php");
	$db = new DB();
	
	function replace_accents($string) { 
	  return str_replace( array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'), array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $string); 
	}
	
	function parseIngredients($query, $db) {
		$query = str_replace(",", "", $query);
		$query = str_replace(";", "", $query);
		$query = str_replace(".", "", $query);
		$query = explode(" ", $query);
		$ingredients = array();
		foreach($query as $word) {
			foreach($db->ingredients as $ingredient) {
				$word = strtolower(replace_accents($word) );
				$ing = strtolower(replace_accents($ingredient) );
				$result = strcmp($word, $ing);
				if ($result == 0) {
					$ingredients[] = $ingredient;
				}
			}
		}
		return $ingredients;
	}
	
	
	if (isset($_POST['query'])) {
		$q = $_POST['query'];
	}
	else {
		$q = null;
	}
	$ingredients = parseIngredients($q, $db);
	echo json_encode($ingredients);
?>