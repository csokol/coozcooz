<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/something.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	
	<title>Cooz Cooz</title>
</head>
<body>
	<div id="menu">
		<div id="menuWrapper" class="roundedBordersBottom">
			<div id="logo">
				<a href="index.php">Cooz Cooz</a>
			</div>
			<div id="controls">
				<ul>
					<li><a href="#">Criar conta</a></li>
					<li><a href="#">Entrar</a></li>
				</ul>
			</div>
		</div>
	</div>
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
							Resultados para <b><?php echo $q; ?></b>
							<br />
							<br />
							<br />
						</div>
						<div id="ingredients">
							<h2>Eu tenho:</h2>
							<div class="tag">Frango</div>
							<br />
							<div class="tag">Tomate</div>
							<br />
							<div class="tag">Queijo</div>
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
