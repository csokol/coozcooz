<div id="menu">
	<div id="menuWrapper" class="roundedBordersBottom">
		<div id="logo">
			<a href="index.php">Cooz Cooz</a>
		</div>
		<?php 
			if (isset($_GET['c']) && $_GET['c'] == "search") {
				?>
				<div id="refineSearch">
					<form id="refineSearchForm">
						<div id="search" class="roundedBorders" >
							<input type="text" id="searchInput" />
							<button type="submit"></button>
						</div>
					</form>
				</div>
				<?php
			}
		?>
		<div id="controls">
			<ul>
				<li><a href="#">Criar conta</a></li>
				<li><a href="#">Entrar</a></li>
			</ul>
		</div>
	</div>
</div>
