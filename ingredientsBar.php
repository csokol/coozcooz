<?php
if (!isset($backButton)) {
	$backButton = false;
}
?>

<div id="ingredientsBar">
	<?php
		if ($backButton) {
			echo "<a id='backToSearch' href='search.php'><img src='images/back.png'/>Ver outras receitas</a>";
		}
	 ?>
	<div id="ingredients">
		<h2>Eu tenho:</h2>
	</div>
	<br />
	<div id="alsoHave">
		<input type="text" class="autoComplete roundedBorders" />
	</div>
	<div id="dislikes">
		<h2>Não gosto de:</h2>
	</div>
	<br />
	<div id="alsoDislike">
		<input type="text" class="autoComplete roundedBorders" />
	</div>
</div>