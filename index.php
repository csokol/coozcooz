<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php include("head.php"); ?>
	<script type="text/javascript" src="js/search.js"></script>
<body>
	<?php include("top.php"); ?>
	
	<div id="content" class="roundedBorders">
		<?php 
			$ingredients = $dislikes = array();
	
			if (isset($_COOKIE['ingredients']) && $_COOKIE['ingredients']) {
				$ingredients = explode(";", $_COOKIE['ingredients']);
			}
			if (isset($_COOKIE['dislikes']) && $_COOKIE['dislikes']) {
				$dislikes = explode(";", $_COOKIE['dislikes']);
			}
			echo "INGREDIENTS: ";
			print_r($ingredients);
			echo "<br />";
			echo "DISLIKES: ";
			print_r($dislikes);
		?>
		<div id="searchWrapper">
			<h1>Quero cozinhar ...</h1>
			<br />
			<form id="searchForm" action="search.php" method="get">
				<div id="search" class="roundedBorders" >
					<input type="text" id="searchInput" name="q" />
					<button type="submit"></button>
				</div>
			</form>
			<span class="example">Ex: "Lasanha de frango" ou "arroz, batata, tomate"</span>
		</div>
	</div>
</body>
</html>
