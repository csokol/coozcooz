<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php include("head.php"); ?>
	<script type="text/javascript" src="js/search.js"></script>
<body>
	<?php include("top.php"); ?>
	
	<div id="contentWrapper">
		<div id="content" class="roundedBorders full">
			<div id="searchWrapper">
				<h1 class="big">Quero cozinhar ...</h1>
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
	</div>
</body>
</html>
