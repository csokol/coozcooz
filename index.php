<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/tag.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	
	<title>Cooz Cooz</title>
</head>
<body>
	<?php include("header.php"); ?>
	<div id="content" class="roundedBorders">
		<?php
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
					?>
						<div id="results">
							<div class="ingredient">Frango</div>
							<div class="ingredient">Tomate</div>
							<div class="ingredient">Água</div>
						</div>
						<div id="rightBar">
							<div id="ingredients">
								<h2>Eu tenho:</h2>
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
