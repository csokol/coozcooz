<div id="menu">
	<div id="menuWrapper" class="roundedBordersBottom">
		<div id="logo">
			<a href="index.php">Cooz Cooz</a>
		</div>
		<?php 
			if ($_SERVER["SCRIPT_NAME"] != "/coozcooz/index.php" && false) {
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
				<li><a href="#" class="notImplemented">Criar conta</a></li>
				<li><a href="#" class="notImplemented">Entrar</a></li>
			</ul>
		</div>
	</div>
</div>
