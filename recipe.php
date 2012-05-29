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
    <script type="text/javascript" src="js/not_implemented.js"></script>

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
	<?php
        include("header.php");
        include("goodies.php");    
    ?>
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
            
        echo "<h1>{$recipe['title']}</h1>
              <div id='overviewRecipe'>
                <div class='time'>{$recipe['time']} min</div>";
        echo htmlGrade($recipe['rate']);
        $img_src = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/mobile.php?id=1&size=100x100";
        echo "<br /><p>Visualizar no celular:</p>
              <img src='http://api.qrserver.com/v1/create-qr-code/?data={$img_src}' />";
        echo "</div>";
        
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

    ?>        

        <div id="rightBar" class="detailRecipe">
			<div id="ingredients">
				<h2>Eu tenho:</h2>
			</div>
			<div id="dislikes">
				<h2>Não gosto de:</h2>
			</div>
		</div>
<?php
        /* Ingredients list and directions */        
        echo "<div id='recipeDetail'>
              <h4>Ingredientes</h4>
                <ul>";
        foreach ($recipe['ingredients'] as $key => $ingredient_id) {
            echo "<li class='ingredient'>{$db->ingredients[$ingredient_id]}</li> ({$recipe['quantities'][$key]})";
        }
        echo "</ul>";
        echo "<h4>Modo de Preparo</h4>
              <p>{$recipe['directions']}</p>";

        /* Show evaluations */
        echo "<br />";
        echo "<h4>Avaliações</h4>";
        foreach ($recipe['evaluations'] as $evaluation) {
            echo "<br />
                  <img src='images/users/{$evaluation['photo']}' width='60' />
                  <b> {$evaluation['user']}</b><br />
                  ". htmlGrade($evaluation['rate']) ."
                  {$evaluation['comments']}<br />";
        }
        echo "</div>";
        
    ?>
	</div>
</body>
</html>
