<?php
	include_once("db.php");
	$db = new DB();
	
	$i = 0;
    foreach($db->ingredients as $ingredient) {
        $ingredients[$i++] = $ingredient;
    }
	echo json_encode($ingredients);
?>