<?php
    header ('Content-type: text/html; charset=utf-8');
    
    $oil_ala_salt = array("title"=> "Óleo à sal e açucar",
                             "time"=> 42,
                             "rate"=> 3,
                             "ingredients" => array("sal", "açucar", "óleo"),
                             "directions"=> "Pegue o sal, misture com o açucar e jogue o óleo. Sirva-se à vonts",
                             "photos"=> array("images/recipes/oil.jpg")
                             );
                             
    $chicken_ala_cheese = array("title"=> "Frango recheado com queijo feta & tomate",
                             "time"=> 105,
                             "rate"=> 4,
                             "ingredients" => array("frango", "limão", "tomate", "queijo"),
                             "directions"=> "Lave o frango por dentro e por fora de frango e regue o frango com sumo de limao. Solte a pele do frango em seis a oito lugares e colocque as folhas de louro embaixo. Corte os tomates aos quartos, retire as sementes e corte em cubos. Descasque o alho e corte finamente em cubod. Arranque as folhas de oregano dos talos e pique finamente (lave tudo,claro).",
                             "photos"=> array("images/recipes/chicken.jpg")
                             );
    
    $bourbon_chicken = array("title"=> "Bourbon Chicken",
                             "time"=> 35,
                             "rate"=> 3,
                             "ingredients" => array("frango", "mantega", "alho", "cebola", "água"),
                             "directions"=> "Heat oil in a large skillet. Add chicken pieces and cook until lightly browned. Remove chicken. Add remaining ingredients, heating over medium Heat until well mixed and dissolved. Add chicken and bring to a hard boil. Reduce heat and simmer for 20 minutes. Serve over hot rice and ENJOY.",
                             "photos"=> array("images/recipes/bourbon.jpg")
                             );
                             
    $recipes = array($oil_ala_salt, $chicken_ala_cheese, $bourbon_chicken);
    foreach ($recipes as $recipe) {
        echo "<h1>" . $recipe['title'] . "</h1>";
        echo "<h6>{$recipe['time']}min | {$recipe['rate']} garfos</h6>";
        foreach ($recipe['photos'] as $photo_url) {
            echo "<img src='$photo_url' />";
        }
        echo "<h4>Ingredientes</h4>";
        echo "<ul>";
        foreach ($recipe['ingredients'] as $ingredient) {
            echo "<li>$ingredient</li>";
        }
        echo "</ul>";
        echo "<h4>Modo de preparo</h4>";
        echo "{$recipe['directions']}";
        echo "<br />";
    }
?>
