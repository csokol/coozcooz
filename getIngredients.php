<?php
	include_once("db.php");
	$db = new DB();
	
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