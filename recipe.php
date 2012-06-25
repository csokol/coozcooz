<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php include('head.php'); ?>
<body>
	<?php
        include("top.php");
        include("goodies.php");    
    ?>
    
    <div id="contentWrapper">
		<?php include_once ("ingredientsBar.php"); ?>
		
		<div id="content" class="roundedBorders medium dropShadow">
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
	        ?>

			<h1><?php echo $recipe['title']; ?></h1>
			<div id='overviewRecipe'>
				<div class='time'><?php echo $recipe['time']; ?> min</div>
				<?php echo htmlGrade($recipe['rate']); ?>
				<p style="margin-top: 2em">
					Vá para o fogão!<br/>
					Esta receita <b>no celular:</b><br/>
					<?php $img_src = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/mobile.php?id={$recipe['id']}&size=100x100"; ?>
					<img src='http://api.qrserver.com/v1/create-qr-code/?data=<?php echo $img_src; ?>'/>
				</p>
			</div>

			<?php $photo = $recipe['photos'][0]; ?>
			<img id='recipePhoto' src='images/recipes/<?php echo $photo; ?>'/>
			<div style="clear: both"></div>

	        <?php
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

			<div id='recipeDetail'>
				<h1>Ingredientes</h1>
				<table class="ingredients">
					<thead>
						<tr>
							<th>Quantidade</th>
							<th>Ingrediente</th>
						</tr>
					</thead>
					<tbody>
						<?php
					        foreach ($recipe['ingredients'] as $key => $ingredient_id) {
					        	?>
					            	<tr>
					            		<td>
						            		<div class='ingredient'>
						            			<div class='ingredientName'>
							            			<?php echo $db->ingredients[$ingredient_id]; ?>
						            			</div>
						            			<div class='showOptions'></div>
						            		</div>
					            		</td> 
					            		<td>
					            			<?php echo $recipe['quantities'][$key]; ?>
					            		</td>
									</tr>
					            <?php
					        }
						?>
					</tbody>
				</table>
			<?php
		        echo "<h1>Modo de Preparo</h1>
		              <p>{$recipe['directions']}</p>";
		
		        /* Show evaluations */
		        echo "<br />";
		        if (count($recipe['evaluations']) > 0) {
		          echo "<h1>Avaliações</h1>";
		        }
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
		
		    <?php $backButton = 1; include_once("ingredientsBar.php"); ?>
    	</div>
    </div>
</body>
</html>
