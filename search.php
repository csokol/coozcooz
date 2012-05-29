<?php
include_once("db.php");
$db = new DB();
function replace_accents($string) { 
  return str_replace( array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'), array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $string); 
}

function parseIngredients($query, $db) {
	$query = str_replace(",", "", $query);
	$query = str_replace(";", "", $query);
	$query = str_replace(".", "", $query);
	$query = explode(" ", $query);
	$ingredients = array();
	foreach($query as $word) {
		foreach($db->ingredients as $ingredient) {
			$word = replace_accents($word);
			$ingredient = replace_accents($ingredient);
			$word = strtolower($word);
			$ingredient = strtolower($ingredient);
			$result = strcmp($lala1, $lala2);
			print "($lala1, $lala2, $result)<br />";
			if ($result == 0) {
				$ingredients[] = $ingredient;
			}
		}
	}
	return $ingredients;
}


if (isset($_POST['query'])) {
	$q = $_POST['query'];
}
else {
	$q = null;
}

$ingredients = parseIngredients($q, $db);
print_r($ingredients);
exit;

?>


<div id="results">
	<?php
							$filtered = $db->getFilteredRecipes($ingredients, null);
    
							foreach($filtered as $recipe) {
								?>
			<div class="result">
				<div class="resultImage">
					<a href="recipe.php?id=<?php echo $recipe['id']; ?>">
						<img src="images/recipes/<?php echo $recipe['thumbUrl']; ?>" />
					</a>
				</div>
				<div class="info">
					<a href="recipe.php?id=<?php echo $recipe['id']; ?>" class="resultName"><?php echo $recipe['title']; ?></a>
					<br />
					<?php
						$i = 0;
						foreach($recipe['ingredients'] as $ingredientId) {
							?>
								<div class="ingredient"><?php echo $db->getIngredientName($ingredientId); ?></div>
							<?php
							$i++;
							if ($i == 4) break;
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
	}?>
</div>
<div id="rightBar">
	<div id="ingredients">
		<h2>Eu tenho:</h2>
		<?php
			foreach ($ingredients as $ingredient) {
				?>
					<div class="tag"><?php echo $ingredient; ?></div>
				<?php
			} 
		?>
							</div>
                            <div id="alsoHave">
                                <h3>Eu também tenho...</h3>
                                <input type="text"/>
                            </div>
							<div id="dislikes">
								<h2>Não gosto de:</h2>
							</div>
							<div id="alsoDislike">
                                <h3>Eu também não gosto de...</h3>
                                <input type="text"/>
                            </div>
						</div>
