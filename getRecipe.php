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
						<img src="<?php echo $recipe['thumbUrl']; ?>" />
					</a>
				</div>
				<div class="info">
					<a href="recipe.php?id=<?php echo $recipe['id']; ?>" class="resultName"><?php echo $recipe['title']; ?></a>
					<br />
					<?php
						foreach($recipe['ingredients'] as $ingredientId) {
							?>
								<div class="ingredient"><?php echo $db->getIngredientName($ingredientId); ?></div>
							<?php
						}
					?>
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
			</div>
		<?php
	}
?>