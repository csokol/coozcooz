<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php include('head.php'); ?>
<body>
	<?php
        include("top.php");
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

<?php include_once("ingredientsBar.php"); ?>
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
                  <a href='#' class='notImplemented'><img src='images/users/{$evaluation['photo']}' width='60' /></a>
                  <b> {$evaluation['user']}</b><br />
                  ". htmlGrade($evaluation['rate']) ."
                  {$evaluation['comments']}<br />";
        }
        echo "</div>";
        
    ?>
	</div>
</body>
</html>
