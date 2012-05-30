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
			
			$word = strtolower(replace_accents($word) );
			$ing = strtolower(replace_accents($ingredient) );
			$result = strcmp($word, $ing);
			if ($result == 0) {
				$ingredients[] = $ingredient;
			}
		}
	}
	return $ingredients;
}


if (isset($_GET['q'])) {
	$q = $_GET['q'];
}
else {
	$q = null;
}

$ingredients = $dislikes = array();

if (isset($_COOKIE['ingredients']) && $_COOKIE['ingredients']) {
	$ingredients = explode(";", $_COOKIE['ingredients']);
}
if (isset($_COOKIE['dislikes']) && $_COOKIE['dislikes']) {
	$dislikes = explode(";", $_COOKIE['dislikes']);
}

$parsedIngredients = parseIngredients($q, $db);
$mergedIngredients = array();
if (count($parsedIngredients) > 0) {
	if (count($ingredients) > 0) {
		$mergedIngredients = array_merge($parsedIngredients, $ingredients);
	}
	else {
		$mergedIngredients = $parsedIngredients;
	}
}
else {
	if (count($ingredients) > 0) {
		$mergedIngredients = $ingredients;
	}
}

if (count($mergedIngredients) > 0) {
	$cookie = join(";", $mergedIngredients);
	setcookie("ingredients", $cookie);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php include("head.php"); ?>
	<script type="text/javascript" src="js/search.js"></script>
<body>
	<?php include("top.php"); ?>
	
	<div id="content" class="roundedBorders">
		<div id="main">
			<?php
				$filtered = $db->getFilteredRecipes($mergedIngredients, $dislikes);
		    
				foreach($filtered as $recipe) { ?>
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
		
		<?php include_once("ingredientsBar.php"); ?>
	</div>
</body>
</html>

