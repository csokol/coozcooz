<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
	<link href="css/common.css" rel="stylesheet" type="text/css" />
	<link href="css/mobile.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/tag.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	
	<title><?php echo "Strogonoff de Frango" ?></title>
</head>


<?php
	include("db.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
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


<body>
	<h1 id="logo">Cooz Cooz</h1>
	<div id="content" class="roundedBorders">
		<h2 id="recipeName">
			<?php echo $recipe['title'] ?>
		</h2>
		<img id="photo" alt="foto" src="images/recipes/<?php echo $recipe['photos'][0] ?>"/>
		<h2>Ingredientes</h2>
		<ul id="ingredients">
			<?php
			foreach ($recipe['ingredients'] as $ing_id) {
				$ingredient = $db->getIngredientName($ing_id);
				$quantity = "1Kg"; // $recipe['quantities'][$i]
				$html = "
					<li>
						<span class='quantity'>{$quantity}</span>
						<span class='ingredient'>{$ingredient}</span>
					</li>
				";
				echo $html;
			}
			?>
		</ul>
		<h2>Modo de preparo</h2>
		<p>
			<?php echo $recipe['directions'] ?>
		</p>
	</div>
</body>
</html>
