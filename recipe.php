<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php include('head.php'); ?>
<body>
	<?php
        include("top.php");
        include("goodies.php");    
    ?>
	<div id="content" class="roundedBorders">
    <div id="main">
    <?php
        include("db.php");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else {
            echo "<h1>Parâmetros inválidos!</h1>";
            die();
        }
        $db = new DB();
        if ($db->getRecipe($id) == null) {
            echo "<h1>A receita solicitada não existe!</h1>";
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

        $photo = $recipe['photos'][0];
        echo "<img style='float: left;' src='images/recipes/$photo'/>";
        
      //   $thumbs_html = "<ul class='ei-slider-thumbs'>
      //                   <li class='ei-slider-element'>Current</li>";

      //   echo "<div id='ei-slider' class='ei-slider'>
      //             <ul class='ei-slider-large'>";
      //   foreach ($recipe['photos'] as $photo) {
		    // echo "<li>
      //                 <img src='images/recipes/$photo' />
      //             </li>";
      //       $thumbs_html .= "<li><a href='#'>Slide</a><img src='images/recipes/{$photo}' /></li>\n";
      //   }
      //   echo "</ul>";
      //   $thumbs_html .= "</ul>";
      //   echo $thumbs_html;
      //   echo "</div>";

    ?>        

<?php
        /* Ingredients list and directions */        
        echo "<div id='recipeDetail'>
              <h1>Ingredientes</h1>
                <ul>";
        foreach ($recipe['ingredients'] as $key => $ingredient_id) {
            echo "<li>{$recipe['quantities'][$key]} <span class='ingredient'>{$db->ingredients[$ingredient_id]}</span></li>";
        }
        echo "</ul>";
        echo "<h1>Modo de Preparo</h1>
              <p>{$recipe['directions']}</p>";

        /* Show evaluations */
        echo "<br />";
        echo "<h1>Avaliações</h1>";
        foreach ($recipe['evaluations'] as $evaluation) {
            echo "<br />
                  <div style='width: 180px'>
                  <a href='#' class='notImplemented'>
                    <img style='float: left; margin: 5px;' src='images/users/{$evaluation['photo']}' width='60' />
                  </a>
                  <span>
                  <b>{$evaluation['user']}</b>
                  <div style='display: inline-block'>".htmlGrade($evaluation['rate'])."</div>
                  <span></div>
                  <p style='float: left'>{$evaluation['comments']}</p>
                  <div style='clear: both'></div>
                  ";
        }
        echo "</div>";
        
    ?>
    </div>

    <?php include_once("ingredientsBar.php"); ?>

    </div>


</body>
</html>
