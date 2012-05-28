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
        include("db.php");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else {
            echo "<h4>Parâmetros inválidos!</h4>";
            die();
        }
        $db = new DB();
        if ($db.getRecipe($id) == null) {
            echo "<h4>A receita solicitada não existe!</h4>";
            die();
        }
        
        $recipe = $db.getRecipe($id);

        
    ?>
		
	</div>
</body>
</html>
