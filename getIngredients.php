<?php
	include_once("db.php");
	$db = new DB();
	
	if (isset($_POST['query'])) {
		$q = $_POST['query'];
	}
	else {
		$q = "frango, alho";
	}
	$q = str_replace(",", "", $q);
	$q = str_replace(";", "", $q);
	$q = str_replace(".", "", $q);
	$q = explode(" ", $q);
	$ingredients = array();
	$i = 0;
	foreach($q as $word) {
		foreach($db->ingredients as $ingredient) {
			if (strcmp(strtolower($word), strtolower($ingredient) ) == 0) {
				$ingredients[$i++] = $ingredient;
			}
		}
	}
	echo json_encode($ingredients);
?>