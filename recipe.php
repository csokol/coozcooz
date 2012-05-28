<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/common.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/styles.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/slider/slider.css" />
	<noscript>
		<link rel="stylesheet" type="text/css" href="css/slider/noscript.css" />
	</noscript>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/tag.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>

    <script type="text/javascript" src="js/slider/jquery.eislideshow.js"></script>
    <script type="text/javascript" src="js/slider/jquery.easing.1.3.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#ei-slider').eislideshow({
				animation			: 'center',
				autoplay			: true,
				slideshow_interval	: 3000,
				titlesFactor		: 0
            });
        });
    </script>
	
	<title>Cooz Cooz</title>
</head>
<body>
	<?php include("header.php"); ?>
	<div id="content" class="roundedBorders">
    <?php
        include("db.php");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else {
            echo "<h4>Parâmetros inválidos!</h4>";
            die();
        }
        $db = new DB();
        if ($db->getRecipe($id) == null) {
            echo "<h4>A receita solicitada não existe!</h4>";
            die();
        }
        
        $recipe = $db->getRecipe($id);
            
        echo "<h1>{$recipe['title']}</h1>";
        echo "<div id='overviewRecipe'>";
        echo "<div class='time'>{$recipe['time']} min</div>";
        echo "<div class='grade'>";
		for ($i = 0; $i < $recipe['rate']; $i++) {
		    echo "<div class='starFull'></div>";
		}
		for ($i = 5; $i > $recipe['rate']; $i--) {
		    echo "<div class='starEmpty'></div>";
		}	 
        echo "</div></div>";
        
        $thumbs_html = "<ul class='ei-slider-thumbs'>
                        <li class='ei-slider-element'>Current</li>";

        echo "<div id='ei-slider' class='ei-slider'>
                  <ul class='ei-slider-large'>";
        foreach ($recipe['photos'] as $photo) {
		    echo "<li>
                      <img src='images/recipes/$photo' />
                  </li>";
            $thumbs_html .= "<li><a href='#'>Slide</a><img src='images/recipes/{$photo}' /></li>\n";
        }
        echo "</ul>";
        $thumbs_html .= "</ul>";
        echo $thumbs_html;
        echo "</div>";
        
        echo "<div id='recipeDetail'>
              <h4>Ingredientes</h4>
                <ul>";
        foreach ($recipe['ingredients'] as $ingredient_id) {
            echo "<li class='ingredient'>{$db->ingredients[$ingredient_id]}</li>";
        }
        echo "</ul>";
        
        echo "<h4>Modo de Preparo</h4>
              <p>{$recipe['directions']}</p>";
        echo "</div>";
        
    ?>
	</div>
</body>
</html>
