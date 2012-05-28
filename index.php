<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <link href="css/common.css" rel="stylesheet" type="text/css" />
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	
	<title>Cooz Cooz</title>
</head>
<body>
	<?php include("header.php"); ?>
	<?php include("db.php"); ?>
	<div id="content" class="roundedBorders">
		<?php
			$db = new DB();
			
			if (isset($_GET['c'])) {
				$c = $_GET['c'];
			}
			else {
				$c = null;
			}
			
			switch($c) {
				case "search":
					if (isset($_GET['q'])) {
						$q = $_GET['q'];
					}
					else {
						$q = null;
					}
					$q = str_replace(",", "", $q);
					$q = str_replace(";", "", $q);
					$q = str_replace(".", "", $q);
					$q = explode(" ", $q);
					$ingredients = array();
					foreach($q as $word) {
						foreach($db->ingredients as $ingredient) {
							if (strcmp(strtolower($word), strtolower($ingredient) ) == 0) {
								$ingredients[] = $ingredient;
							}
						}
					}
					
					?>
						<div id="results">
							<?php
							$filtered = $db->getFilteredRecipes($ingredients, null);
    
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
							<div id="dislikes">
								<h2>Não gosto de:</h2>
							</div>
						</div>
					<?php
					break;
				default:
					?>
						<div id="searchWrapper">
							<h1>Quero cozinhar ...</h1>
							<br />
							<form id="searchForm">
								<div id="search" class="roundedBorders" >
									<input type="text" id="searchInput" />
									<button type="submit"></button>
								</div>
							</form>
							<span class="example">Ex: "Lasanha de frango" ou "arroz, batata, tomate"</span>
						</div>
					<?php
					break;
			}
		?>
	</div>
</body>
</html>
