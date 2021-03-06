<?php
	include_once("db.php");
	$db = new DB();
    
    if (isset($_POST['ingredients'])) {
    	$ingredients = $_POST['ingredients'];
    }
    else {
    	$ingredients = null;
    }
    if (isset($_POST['dislikes'])) {
    	$dislikes = $_POST['dislikes'];
    }
    else {
    	$dislikes = null;
    }

    $filtered = $db->getFilteredRecipes($ingredients, $dislikes);
    
	foreach($filtered as $recipe) {
		?>
			<div class="result">
				<div class="resultImage">
					<a href="recipe.php?id=<?php echo $recipe['id']; ?>">
						<img src="images/recipes/<?php echo $recipe['thumbUrl']; ?>" />
					</a>
					<br />
					<div class="time"><?php echo $recipe['time']; ?> min</div>
					<div class="grade">
						<?php
							for($i = 0; $i < $recipe['rate']; $i++) {
								?>
									<div class="starFull"></div>
								<?php
							}
							for($i = 5; $i > $recipe['rate']; $i--) {
								?>
									<div class="starEmpty"></div>
								<?php
							}	 
						?>
					</div>
				</div>
				<div class="info">
					<a href="recipe.php?id=<?php echo $recipe['id']; ?>" class="resultName"><?php echo $recipe['title']; ?></a>
					<br />
					<?php
						$i = 0;
						foreach($recipe['ingredients'] as $ingredientId) {
							?>
								<div class='ingredient'>
			            			<div class='ingredientName'><?php echo $db->getIngredientName($ingredientId); ?></div>
			            			<div class='showOptions'></div>
			            		</div>
							<?php
							$i++;
							if ($i == 4) break;
						}
					?>
				</div>
			</div>
		<?php
	}
?>